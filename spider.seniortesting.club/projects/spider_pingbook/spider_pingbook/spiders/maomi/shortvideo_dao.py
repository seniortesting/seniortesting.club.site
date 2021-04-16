import logging

from spider_pingbook.dao.basedao import BaseDao

logger = logging.getLogger(__name__)


class ShortVideoDao(BaseDao):
    def save(self, params):
        sql = """
                INSERT INTO porn_maomi(page_id,img,title,category,page_url,url,porn_date,create_time,update_time) 
                SELECT %(pageId)s, %(img)s,%(title)s,%(category)s,%(page_url)s,%(url)s,%(porn_date)s,%(update_time)s,%(update_time)s 
                FROM DUAL WHERE NOT EXISTS (SELECT id FROM porn_maomi WHERE page_id =%(pageId)s AND title = %(title)s AND category=%(category)s)
                """
        result = self.execute(sql, params)
        if result == 0:
            logger.warning("已经存在记录:{}!".format(params.get('title')))
        return result
