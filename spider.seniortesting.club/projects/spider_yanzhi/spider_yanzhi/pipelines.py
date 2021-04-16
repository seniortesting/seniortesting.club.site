# -*- coding: utf-8 -*-

# Define your item pipelines here
#
# Don't forget to add your pipeline to the ITEM_PIPELINES setting
# See: https://docs.scrapy.org/en/latest/topics/item-pipeline.html
import logging
import uuid

from spider_yanzhi.items import SpiderYanzhiItem
from spider_yanzhi.spiders.dao.vrpanonewsdao import VRPanoNewsDao

logger = logging.getLogger(__name__)

class SpiderYanzhiPipeline(object):
    def process_item(self, item, spider):
        if isinstance(item, SpiderYanzhiItem):
            # 填入对应的数据
            vrpnonews = VRPanoNewsDao()
            import datetime
            update_time = datetime.datetime.now().strftime('%Y-%m-%d %H:%M:%S')
            id = uuid.uuid4().node
            params = {
                'id': id,
                'title': item['title'],
                'content': item['content'],
                'from_source': item['from_source'],
                'publish_at': item['publish_at'],
                'original_url': item['original_url'],
                'date': update_time
            }
            vrpnonews.save(params=params)
            logger.info('持久化数据: %s 完成!', id)
        return item
