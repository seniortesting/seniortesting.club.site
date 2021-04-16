from spider_zxtj.spiders.dao.basedao import BaseDao


class ZxtjbiddingDao(BaseDao):
    def create(self, params):
        sql = """
                insert into zxtj_bidding(title,content,pub_time,origin_url,update_time) values(%s,%s,%s,%s,%s)
                """
        result = self.execute(sql, params)
        self.commit()
        self.close()
        return result
