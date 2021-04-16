from spider_yanzhi.spiders.dao.basedao import BaseDao


class VRPanoNewsDao(BaseDao):
    def save(self, params):
        sql = """
                INSERT INTO cvr_news(id,title,content,from_source,publish_at,original_url,create_time,update_time) 
                SELECT %(id)s,%(title)s,%(content)s,%(from_source)s,%(publish_at)s,%(original_url)s,%(date)s,%(date)s 
                FROM DUAL WHERE NOT EXISTS (SELECT id FROM cvr_news WHERE title =%(title)s)
                """
        result = self.execute(sql, params)
        self.commit()
        self.close()
        return result
