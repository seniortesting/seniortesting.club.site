# -*- coding: utf-8 -*-
import datetime
import logging
import re

import scrapy
from scrapy.http import Response

from spider_zxtj.items import ZxtjbiddingItem


class HainanbiddingSpider(scrapy.Spider):
    name = 'hainanbidding'
    allowed_domains = ['zw.hainan.gov.cn']
    start_urls = ['http://zw.hainan.gov.cn/ggzy/ggzy/jgzbgg/index.jhtml']

    def parse(self, response: Response):
        sub_selectors = response.xpath('//tbody//tr')
        bidding_len = len(sub_selectors) - 1
        bidding_count = 0
        for sub_selector in sub_selectors:
            bidding_count += 1
            item = ZxtjbiddingItem()
            # title = sub_selector.xpath('a/text()')
            url_selector = sub_selector.xpath('td/a/@href')
            if url_selector:
                item['url'] = url_selector.extract_first()
            # 下一页
            next_page = response.xpath("//div[@class='pagesite']/div/a[3]/@onclick").extract_first()
            # next_text = response.xpath("//div[@class='Top10 TxtCenter']/div/a[3]/text()").extract_first()
            next_page_url = None
            if next_page:
                next_page_url = re.search(r"location.href=encodeURI\('(.*)'\);", next_page).group(1)
                next_page_url = 'http://zw.hainan.gov.cn/ggzy/ggzy/jgzbgg/' + next_page_url

            if url_selector:
                yield scrapy.Request(url=item['url'], callback=self.parse_detail,
                                     meta={'item': item, 'len': bidding_len, 'count': bidding_count,
                                           'next_page_url': next_page_url}, dont_filter=True)

    def parse_detail(self, response: Response):
        item = response.meta['item']
        len = response.meta['len']
        count = response.meta['count']
        next_page_url = response.meta['next_page_url']
        # 获取标题
        title = response.xpath("//div[@class='newsTex']/h1/text()").extract_first()
        html_content = response.xpath("//div[@class='newsCon']")
        item['title'] = title
        item['content'] = html_content.extract_first()
        item['date'] = datetime.datetime.now().strftime('%Y-%m-%d %H:%M:%S')

        yield item
        # 当前数据遍历完
        if len == count:
            # 有下一页
            self.logger.info('准备爬取新的一页{}数据'.format(next_page_url))
            if next_page_url:
                yield scrapy.Request(url=next_page_url, callback=self.parse, dont_filter=True)
