# -*- coding: utf-8 -*-
from random import random

from selenium import webdriver
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from . import useragents


class SpiderWebDriver(object):

    def __init__(self, headless: bool = False):
        # 进入浏览器设置
        self.chrome_options = Options()
        # 配置参数: http://chromedriver.chromium.org/capabilities
        # 详细参数： https://peter.sh/experiments/chromium-command-line-switches/
        self.chrome_options.add_argument('lang=zh_CN.UTF-8')
        if headless:
            self.chrome_options.add_argument('headless')
            self.chrome_options.add_argument('window-size=1200x600')
        self.chrome_options.add_argument('no-sandbox')
        self.chrome_options.add_argument("disable-gpu")
        self.chrome_options.add_argument("ignore-certificate-errors")
        self.chrome_options.add_argument("disable-popup-blocking")
        self.chrome_options.add_argument("disable-default-apps")
        # Chrome is being controlled by automated test software
        self.user_agent = None
        self.proxies = None

    def __enter__(self):
        return self

    def __exit__(self, *exc_info):
        del exc_info
        self.close()

    def pc(self) -> 'SpiderWebDriver':
        self.user_agent = random.choice(useragents.USER_AGENT_PC)
        return self

    def mobile(self) -> 'SpiderWebDriver':
        self.user_agent = random.choice(useragents.USER_AGENT_MOBILE)
        return self

    def wechat(self) -> 'SpiderWebDriver':
        self.user_agent = random.choice(useragents.USER_AGENT_WECHAT)
        return self

    def proxy(self) -> 'SpiderWebDriver':
        # content = self.session.get('https://open.yitieyilu.com/proxy/get').json()
        # proxy = content.get('data').get('proxy')
        # self.proxies = {"http": "http://{proxy}".format(proxy=proxy), "https": "https://{proxy}".format(proxy=proxy)}
        return self

    def open(self, url) -> 'SpiderWebDriver':
        if self.user_agent is not None:
            # 默认safari pc端浏览器
            self.chrome_options.add_argument('user-agent="' + self.user_agent + '"')

        if self.proxies is not None:
            proxy_str = "http://{proxy}".format(proxy=self.proxies)
            self.chrome_options.add_argument('proxy-server=' + proxy_str)
        # http://chromedriver.storage.googleapis.com/index.html
        self.driver = webdriver.Chrome(options=self.chrome_options)
        self.driver.maximize_window()
        self.driver.get(url)
        return self

    def wait(self, xpath: str = '', timeout: int = 10) -> 'SpiderWebDriver':
        # 首先操作driver.get()方法
        WebDriverWait(self.driver, timeout).until(EC.presence_of_element_located((By.XPATH, xpath)))
        return self

    def source(self):
        self.source = self.driver.page_source
        return self

    def get_cookies(self):
        cookies_dict = {}
        cookies = self.driver.get_cookies()
        for cookie in cookies:
            cookies_dict[cookie['name']] = cookie['value']
        return cookies_dict

    def execute_js(self, js, *args):
        return self.driver.execute_script(js, args)

    def close(self):
        if self.driver is None:
            return
        try:
            self.driver.close()
            self.driver.quit()
        finally:
            self.driver = None
