# -*- coding: utf-8 -*-
import logging

import scrapy
from scrapy.http import Response

from spider_yanzhi.items import SpiderYanzhiItem

logger = logging.getLogger(__name__)

class VrpanoNewsSpider(scrapy.Spider):
    name = 'vrpano_news'
    allowed_domains = ['sh.joojzz.com']
    start_urls = ['http://sh.joojzz.com/zixun/']

    def parse(self, response):
        sub_selectors = response.xpath('//div[@class=\'mainLeft\']//li')
        list_len = len(sub_selectors) - 1
        list_count = 0
        for sub_selector in sub_selectors:
            list_count += 1
            item = SpiderYanzhiItem()
            # title = sub_selector.xpath('a/text()')
            url_selector = sub_selector.xpath('strong/a/@href')
            if url_selector:
                item['original_url'] = url_selector.extract_first().replace(' ','').strip()
            # 下一页
            next_page = response.xpath("//a[@class='next']/@href")
            # next_text = response.xpath("//div[@class='Top10 TxtCenter']/div/a[3]/text()").extract_first()
            next_page_url = None
            if next_page:
                next_page_url = next_page.extract_first().strip()
                next_page_url = 'http://sh.joojzz.com' + next_page_url

            if url_selector:
                yield scrapy.Request(url=item['original_url'], callback=self.parse_detail,
                                     meta={'item': item, 'len': list_len, 'count': list_count,
                                           'next_page_url': next_page_url}, dont_filter=True)

    def parse_detail(self, response: Response):
        item = response.meta['item']
        len = response.meta['len']
        count = response.meta['count']
        next_page_url = response.meta['next_page_url']
        # 获取标题
        title = response.xpath("//div[@class='title']/h1/text()").extract_first()
        sub_title = response.xpath("//div[@class='title']/h6/font")

        html_content = response.xpath("//div[@class='content']").extract_first()

        # 保存数据item
        item['title'] = title.strip()
        item['content'] = html_content.strip()
        item['from_source'] = sub_title[0].xpath('string()').extract_first()
        item['publish_at'] = sub_title[1].xpath('string()').extract_first()
        item['original_url'] = response.url

        yield item
        # 当前数据遍历完
        if len == count:
            # 有下一页
            logger.info('准备爬取新的一页{}数据'.format(next_page_url))
            if next_page_url:
                yield scrapy.Request(url=next_page_url, callback=self.parse, dont_filter=True)

