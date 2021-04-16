from selenium import webdriver
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.support.wait import WebDriverWait

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
        # 1. steps
        openUrlCommand = 'window.location=\'' + url + '\''
        inputCommand = 'document.getElementById(\'searchkey\').value=\'%s\'' % (keyword)
        clickCommand = 'document.getElementsByClassName(\'search_btn\')[0].click()'
        # 高亮
        highlightElementCommand = 'arguments[0].style.border=\'3px solid red\''
        # 注入提示
        toastsrc = ''' 
        const scriptElt = document.createElement('script');
        scriptElt.type = 'text/javascript';
        scriptElt.src = 'https://cdn.jsdelivr.net/npm/sweetalert2@latest';
        document.getElementsByTagName('head')[0].appendChild(scriptElt);
        '''
        driver.execute_script(toastsrc)
        # 此处等待
        # time.sleep(10)
        toastMsg = '''
        Swal.fire({
          title: '执行自动化脚本',
          text: '已经打开页面 %s',
          icon: 'success',
          position: 'top-right',
          toast: true,
          timer: 30000,
          timerProgressBar: true,
          showConfirmButton: true
        })
        ''' % (url)
        driver.execute_script(toastMsg)

        driver.execute_script(openUrlCommand)
        # 获取元素
        # inputBtnElement = driver.execute_script('return document.getElementById(\'searchkey\')')
        # print('element is: %s'%(str(inputBtnElement)))
        driver.execute_script(inputCommand)
        driver.execute_script(clickCommand)
        # driver.execute_script('arguments[0].click();', driver.find_element_by_class_name('search_btn'))
        # 高亮
        driver.execute_script(highlightElementCommand, driver.find_element_by_id('username'))
        # 等待片刻
        # time.sleep(10)
        title = driver.execute_script('return document.title;')
        # driver.title
        # driver.page_source
        # driver.current_url
        driver.execute_script('return document.readyState') == 'complete'
        print('当前页面标题: %s' % (title))
        # originalVersion = driver.execute_script('return $.prototype.jquery;')
        # print('当前百度jquery版本是: %s' % (originalVersion))
        # http://cdn.staticfile.org/jquery/3.5.1/jquery.min.js
        jquerysrc = ''' 
        const scriptElt = document.createElement('script');
        scriptElt.type = 'text/javascript';
        scriptElt.src = 'http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js';
        document.getElementsByTagName('head')[0].appendChild(scriptElt);
        '''
        driver.execute_script(jquerysrc)
        # 等待页面是否加载成功
        wait = WebDriverWait(driver, timeout=timeout, poll_frequency=0.5)
        # 等待条件
        # existJquery = driver.execute_script('return (typeof jQuery != \'undefined\')')
        existJquery = driver.execute_script('return $.prototype.jquery')
        wait.until(lambda driver: existJquery == '3.5.1')
        originalVersion = driver.execute_script('return $.prototype.jquery')
        print('注入后jquery版本是: %s' % (originalVersion))
    except Exception as e:
        print('异常为: ', e)
    finally:
        # quit system
        driver.quit()
