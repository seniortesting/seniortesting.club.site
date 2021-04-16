# -*- coding: utf-8 -*-

# Define your item pipelines here
#
# Don't forget to add your pipeline to the ITEM_PIPELINES setting
# See: https://docs.scrapy.org/en/latest/topics/item-pipeline.html
import logging
import uuid

from spider_pingbook.items import ShortVideoItem
from spider_pingbook.spiders.maomi.shortvideo_dao import ShortVideoDao

logger = logging.getLogger(__name__)


class SpiderPingbookPipeline(object):
    def process_item(self, item, spider):
        # 处理
        if isinstance(item, ShortVideoItem):
            # 填入对应的数据
            maomiVideoDao = ShortVideoDao()
            import datetime
            update_time = datetime.datetime.now().strftime('%Y-%m-%d %H:%M:%S')
            id = uuid.uuid4().node
            params = {
                'id': id,
                'pageId': item['id'],
                'img': item['img'],
                'title': item['title'],
                'category': item['category'],
                'page_url': item['pageUrl'],
                'url': item['url'],
                'porn_date': item['pornDate'],
                'update_time': update_time
            }
            maomiVideoDao.save(params=params)
            logger.info('持久化数据: %s 完成!', str(params))
        return item
