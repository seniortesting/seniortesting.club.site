from selenium import webdriver
from selenium.webdriver.chrome.options import Options

if __name__ == '__main__':
    timeout = 60
    url = 'http://www.51testing.com/html/index.html'
    keyword = '51testing'
    try:
        # configure options
        options = Options()
        options.add_argument("ignore-certificate-errors")
        # create instance
        driver = webdriver.Chrome(options=options)
        # start the window maximize
        driver.maximize_window()
        driver.set_page_load_timeout(timeout)

        driver.get(url)
        asyncScript = '''
        const callback= arguments[arguments.length-1];
        window.setTimeout(function(){ callback('wait') }, 3000);
        '''
        result = driver.execute_async_script(asyncScript)
        print('wait result is: %s' % (result))

        asyncScript2 = '''
            const callback = arguments[arguments.length - 1];
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'https://api.ipify.org/?format=json', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    res = xhr.responseText
                    callback(res)
                }
            }
            xhr.send();
        '''
        result2 = driver.execute_async_script(asyncScript2)
        print('xhr result is: %s' % (result2))
    finally:
        driver.quit()
