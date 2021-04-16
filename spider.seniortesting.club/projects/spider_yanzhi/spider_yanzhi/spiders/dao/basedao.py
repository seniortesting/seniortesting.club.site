import logging

import pymysql

from spider_yanzhi import settings

log=logging.getLogger(__name__)

class BaseDao():
    def __init__(self):
        self.__connection = None
        self.__cursor = None

    # 获取数据库的连接
    def getConnection(self):
        # 当有连接对象时返回连接对象
        if self.__connection:
            return self.__connection
        # 否则建立新的连接对象
        # 获取数据库连接
        try:
            self.__connection = pymysql.connect(host=settings.MYSQL_HOST, user=settings.MYSQL_USER,
                                                passwd=settings.MYSQL_PASSWORD,
                                                database=settings.MYSQL_DBNAME, port=settings.MYSQL_PORT, charset="utf8")
            return self.__connection
        except pymysql.MySQLError as e:
            log.error('Exception:%s', e)

    # 执行sql语句的通用方法
    def execute(self, sql, params):
        try:
            self.__cursor = self.getConnection().cursor()
            if params:
                result = self.__cursor.execute(sql, params)
            else:
                result = self.__cursor.execute(sql)
            return result

        except (pymysql.MySQLError, pymysql.DatabaseError, Exception) as e:
            log.error('出现数据库异常： %s' , str(e))
            self.rollback()

    def fetchall(self):
        if self.__cursor:
            return self.__cursor.fetchall()
        pass

    def commit(self):
        if self.__connection:
            self.__connection.commit()

    def rollback(self):
        if self.__connection:
            self.__connection.rollback()

    def close(self):
        if self.__cursor:
            self.__cursor.close()
        if self.__connection:
            self.__connection.close()
