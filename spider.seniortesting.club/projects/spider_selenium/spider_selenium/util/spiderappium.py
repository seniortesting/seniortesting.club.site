import time

from appium import webdriver  # 导入appium包


class SpiderAppium(object):
    def __init__(self, desiredCapacibilities: dict = {}, hubUrl: str = 'http://127.0.0.1:4723/wd/hub'):
        self.hubUrl = hubUrl
        self.driver = webdriver.Remote(hubUrl, desiredCapacibilities)

    def wait(self, seconds) -> 'SpiderAppium':
        time.sleep(seconds)
        return self

    def clickElementById(self, id):
        self.driver.find_element_by_id(id_=id).click()

    def clickElementByXpath(self, css_selector):
        self.driver.find_element_by_xpath(xpath=css_selector).click()
        return self

    def close(self):
        if self.driver is None:
            return
        try:
            self.driver.close()
            self.driver.quit()
        finally:
            self.driver = None
