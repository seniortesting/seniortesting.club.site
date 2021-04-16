from scrapy import cmdline

if __name__ == '__main__':
    crawl_name = 'csgbidding'
    # crawl_name = 'hainanbidding'
    cmd = 'scrapy crawl {0}'.format(crawl_name)
    # cmdline.execute(['scrapy','crawl','csgbidding'])
    cmdline.execute(cmd.split())
