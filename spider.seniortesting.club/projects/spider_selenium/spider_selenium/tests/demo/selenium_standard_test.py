from selenium import webdriver
from selenium.webdriver.chrome.options import Options

if __name__ == '__main__':
    url = 'http://www.51testing.com/html/index.html'
    keyword = '51testing'
    # configure options
    options = Options()
    options.add_argument("ignore-certificate-errors")
    # create instance
    driver = webdriver.Chrome(options=options)
    # start the window maximize
    driver.maximize_window()
    # 1. steps
    driver.get(url)
    searchElement = driver.find_element_by_id('searchkey')
    searchElement.send_keys(keyword)
    buttonElement = driver.find_element_by_class_name('search_btn')
    # quit system
    driver.quit()
