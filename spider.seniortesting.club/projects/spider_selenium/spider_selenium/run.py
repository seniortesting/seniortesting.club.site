# -*- coding: utf-8 -*-
if __name__ == '__main__':
    crawl_name = 'maomi_china_selfie'
    cmd = 'scrapy crawl {0}'.format(crawl_name)
    # cmdline.execute(['scrapy','crawl','csgbidding'])
    cmdline.execute(cmd.split())
