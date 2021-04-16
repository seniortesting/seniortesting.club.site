from appium.webdriver import webdriver
from selenium.webdriver.chrome.options import Options


class TestSeleniumJavascript():

    def __init__(self):
        self.url = 'http://www.51testing.com/html/index.html'
        self.keyword = '51testing'

    def setup_method(self):
        # configure options
        options = Options()
        options.add_argument("ignore-certificate-errors")
        # create instance
        self.driver = webdriver.Chrome(options=options)
        # start the window maximize
        self.driver.maximize_window()
        self.driver.set_page_load_timeout(130)

    def teardown_method(self):
        self.driver.quit()

    def test_51testing(self):
        # 1. steps
        openUrlCommand = 'window.location=\'' + self.url + '\''
        highlightElementCommand = 'arguments[0].style.border=\'3px solid red\''
        inputCommand = 'document.getElementById(\'searchkey\').value=\'%s\'' % (self.keyword)
        clickCommand = 'document.getElementsByClassName(\'search_btn\').dispatchEvent(new Event(\"click\"))'

        self.driver.execute_script(openUrlCommand)
        self.driver.execute_script(highlightElementCommand, self.driver.find_element_by_id('searchkey'))
        self.driver.execute_script(inputCommand)
        self.driver.execute_script(clickCommand)
        # self.driver.execute_script('arguments[0].click();', self.driver.find_element_by_class_name('search_btn'))
