# -*- coding: utf-8 -*-
import functools
import random

import chardet
import requests
from requests import Response, packages
from requests.adapters import HTTPAdapter
from requests.exceptions import ProxyError, ConnectTimeout, ReadTimeout, SSLError
import urllib3
from spider_selenium.util.useragents import USER_AGENT_PC, USER_AGENT_MOBILE, USER_AGENT_WECHAT

urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)


class WebRequest(object):
    def __init__(self):
        # disabled the insureException warning: https://stackoverflow.com/questions/27981545/suppress-insecurerequestwarning-unverified-https-request-is-being-made-in-pytho
        self.session = requests.Session()
        self.session.verify = False
        # -----------------------重试次数
        self.session.mount('https://', HTTPAdapter(max_retries=0))
        self.session.mount('http://', HTTPAdapter(max_retries=0))
        # -----------------------set default timeout
        # https://stackoverflow.com/questions/17782142/why-doesnt-requests-get-return-what-is-the-default-timeout-that-requests-get
        for method in ('get', 'options', 'head', 'post', 'put', 'patch', 'delete'):
            # 超时5秒： https://2.python-requests.org/en/master/user/advanced/
            setattr(self.session, method, functools.partial(getattr(self.session, method), timeout=5))
        # 随机客户端
        # self.user_agent = self.mobile()
        self.proxies = None

    def pc(self) -> 'WebRequest':
        self.user_agent = random.choice(USER_AGENT_PC)
        return self

    def mobile(self) -> 'WebRequest':
        self.user_agent = random.choice(USER_AGENT_MOBILE)
        return self

    def wechat(self) -> 'WebRequest':
        self.user_agent = random.choice(USER_AGENT_WECHAT)
        return self

    def proxy(self) -> 'WebRequest':
        content = self.session.get('https://open.yitieyilu.com/proxy/get').json()
        proxy = content.get('data').get('proxy')
        self.proxies = {"http": "http://{proxy}".format(proxy=proxy), "https": "https://{proxy}".format(proxy=proxy)}
        return self

    def get(self, url, **kwargs) -> Response:
        try:
            self.session.headers['User-Agent'] = self.user_agent
            if self.proxies is not None:
                self.session.proxies = self.proxies
                print('发送代理请求,代理地址: {},请求地址: {}'.format(self.proxies, url))
            res = self.session.get(url, timeout=20, **kwargs)
            if res.status_code == 200:
                res.encoding = chardet.detect(res.content)['encoding']
        except (ProxyError, ConnectTimeout, SSLError, ReadTimeout, ConnectionError) as e:
            print("代理: {}请求异常,将会重新请求不带代理:{}".format(str(self.session.proxies), e.__repr__()))
            self.session.proxies = {}
            res = self.session.get(url, **kwargs)
            if res.status_code == 200:
                res.encoding = chardet.detect(res.content)['encoding']
        except Exception as e:
            print(e)
            raise e
        return res

    def post(self, url, data=None, json=None, **kwargs) -> Response:
        try:
            self.session.headers['User-Agent'] = self.user_agent
            if self.proxies is not None:
                self.session.proxies = self.proxies
                print('发送代理请求,代理地址: {},请求地址: {}'.format(self.proxies, url))
            res = self.session.post(url, data=data, json=json, timeout=20, **kwargs)
            if res.status_code == 200:
                res.encoding = chardet.detect(res.content)['encoding']
        except (ProxyError, ConnectTimeout, SSLError, ReadTimeout, ConnectionError) as e:
            print("代理: {}请求异常,将会重新请求不带代理:{}".format(str(self.session.proxies), e.__repr__()))
            self.session.proxies = {}
            res = self.session.post(url, data=data, json=json, **kwargs)
            if res.status_code == 200:
                res.encoding = chardet.detect(res.content)['encoding']
        except Exception as e:
            res = None
            print(e)
        return res
