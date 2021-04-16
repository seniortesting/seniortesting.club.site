# -*- coding: utf-8 -*-

# Define your item pipelines here
#
# Don't forget to add your pipeline to the ITEM_PIPELINES setting
# See: https://docs.scrapy.org/en/latest/topics/item-pipeline.html
import datetime

from spider_zxtj.spiders.dao.zxtjbiddingdao import ZxtjbiddingDao
from spider_zxtj.items import ZxtjbiddingItem


class SpiderZxtjPipeline(object):

    def process_item(self, item, spider):
        if isinstance(item, ZxtjbiddingItem):
            # 填入对应的数据
            csgbidding = ZxtjbiddingDao()
            update_time = datetime.datetime.now().strftime('%Y-%m-%d %H:%M:%S')
            params = (item['title'], item['content'], item['date'], item['url'], update_time)
            csgbidding.create(params=params)
            spider.logger.info('持久化数据: %s 完成',params)
        return item
