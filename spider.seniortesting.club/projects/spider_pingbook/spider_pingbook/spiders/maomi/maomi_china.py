# -*- coding: utf-8 -*-
import logging
import re

import scrapy
from scrapy.http import Response

from spider_pingbook.items import ShortVideoItem

logger = logging.getLogger(__name__)


class MaomiChinaSpider(scrapy.Spider):
    '''
     爬取国产精品页视频
    '''
    name = 'maomi_china'
    allowed_domains = ['maomiav.com']
    start_urls = ['https://maomiav.com/shipin/list-%E5%9B%BD%E4%BA%A7%E7%B2%BE%E5%93%81.html']
    base_url = 'https://maomiav.com'
    latest_page = 5  # 爬取前几页数据
    pageNo = 1
    # 用到的xpath变量
    XPATH_LIST_ITEM = "//ul[@class='content-list ']/li"
    XPATH_IMG = "a/@href"
    XPATH_IMG_SRC = "a/img/@src"
    XPATH_IMG_TITLE = "div[@class='title']/h5/a/text()"
    XPATH_DATE = "a/span[contains(@class, 'note')]/text()"
    XPATH_NEXT_PAGE = "//div[@class='pagination']/a[10]/@href"

    # XPATH_DETAIL_TITLE="//h2[@class='c_pink text-ellipsis']/text()"
    XPATH_DETAIL_CATEGORY = "//span[@class='cat_pos_l']/a[3]/text()"
    XPATH_DETAIL_DOWNLOAD_URL = "//input[@id='lin1k0']/@value"

    def parse(self, response: Response):
        # xpath
        # 列表 //ul[@id='grid']/li
        # 子项  a:nth-child(1) = a/@href
        #     图片： a > img:nth-child(1)
        #     标题: a > p:nth-child(2)
        #  分页 //div[@class='pagination']
        #  下一页 //div[@class='pagination']/a[10]
        # 总页码 a:nth-child(9)
        sub_items = response.xpath(self.XPATH_LIST_ITEM)
        list_len = len(sub_items) - 1
        list_count = 0
        for sub_item in sub_items:
            list_count += 1
            # 初始化item
            item = ShortVideoItem()
            # 获取对应的详细地址链接
            url_selector = sub_item.xpath(self.XPATH_IMG)
            if url_selector:
                # 详情页地址
                shortUrl = url_selector.extract_first().replace(' ', '').strip()
                # 获取id
                searchPattern = re.search(r"^/shipin/play-(.*).html$", shortUrl)
                if searchPattern:
                    item['id'] = searchPattern.group(1)
                dateContent = sub_item.xpath(self.XPATH_DATE).extract_first()
                # 图片
                item['pageUrl'] = self.base_url + shortUrl
                item['img'] = sub_item.xpath(self.XPATH_IMG_SRC).extract_first()
                item['title'] = sub_item.xpath(self.XPATH_IMG_TITLE).extract_first()
                item['pornDate'] = dateContent.replace('更新：', '').strip()
                # 获取总页面下一页
                next_page_url = None
                next_page = response.xpath(self.XPATH_NEXT_PAGE)
                # next_text = response.xpath("//div[@class='Top10 TxtCenter']/div/a[3]/text()").extract_first()
                if next_page:
                    next_page_url = next_page.extract_first().strip()
                    next_page_url = self.base_url + next_page_url
                # 分析该页的详情页面
                yield scrapy.Request(url=item['pageUrl'], callback=self.parse_detail,
                                     meta={'item': item, 'len': list_len, 'count': list_count,
                                           'next_page_url': next_page_url}, dont_filter=True)

    def parse_detail(self, response: Response):
        item = response.meta['item']
        len = response.meta['len']
        count = response.meta['count']
        next_page_url = response.meta['next_page_url']
        # 获取标题
        # title = response.xpath(self.XPATH_DETAIL_TITLE).extract_first()
        # img = response.xpath("//img[@class='lazy']/@src").extract_first()
        category = response.xpath(self.XPATH_DETAIL_CATEGORY).extract_first()
        url = response.xpath(self.XPATH_DETAIL_DOWNLOAD_URL).extract_first()

        # 保存数据item
        # item['title'] = title.strip() if title else ''
        item['category'] = category.replace('類型：', '').strip()
        # item['img'] = img.strip() if img else ''
        item['url'] = url.strip() if url else ''

        yield item
        # 当前数据遍历完,遍历下一页的数据
        if len == count:
            # 有下一页
            if next_page_url and self.pageNo < self.latest_page:
                self.pageNo = self.pageNo + 1
                logger.info('准备爬取第{}页:{}数据'.format(self.pageNo, next_page_url))
                yield scrapy.Request(url=next_page_url, callback=self.parse, dont_filter=True)
            else:
                logger.info("超过最大爬取页数:{}，该页{}不进行爬取".format(self.latest_page, next_page_url))
