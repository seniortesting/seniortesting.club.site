# -*- coding: utf-8 -*-
import datetime
import logging

import scrapy
from scrapy.http import Response

from spider_zxtj.items import ZxtjbiddingItem



class CsgbiddingSpider(scrapy.Spider):
    name = 'csgbidding'
    allowed_domains = ['www.bidding.csg.cn']
    start_urls = ['http://www.bidding.csg.cn/zbcg/index.jhtml']

    def parse(self, response: Response):
        # 获取列表内容
        bidding_count = 0

        sub_selectors = response.xpath('//div[@class="BorderEEE NoBorderTop List1 Black14 Padding5"]/ul/li')
        bidding_len = len(sub_selectors)
        for sub_selector in sub_selectors:
            item = ZxtjbiddingItem()
            bidding_count += 1
            # 获取标题
            # title = sub_selector.extract()[0].strip()
            # sub_selector.xpath('string()').extract_first()
            # item.title = title
            # 获取详情链接
            url_selector = sub_selector.xpath("a/@href")
            if url_selector:
                item['url'] = 'http://www.bidding.csg.cn' + url_selector.extract_first()

            # 下一页
            next_page = response.xpath("//div[@class='Top10 TxtCenter']/div/a[3]/@href").extract_first()
            # next_text = response.xpath("//div[@class='Top10 TxtCenter']/div/a[3]/text()").extract_first()
            next_page_url = None
            if next_page:
                next_page_url = 'http://www.bidding.csg.cn/zbcg/' + next_page

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
        title = response.xpath("//h1[@class='TxtCenter Padding10']/text()").extract_first()
        html_content = response.xpath("//div[@class='Contnet']")

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
