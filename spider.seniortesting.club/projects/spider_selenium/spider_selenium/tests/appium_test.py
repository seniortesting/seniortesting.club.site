from spider_selenium.util.spiderappium import SpiderAppium

if __name__ == '__main__':
    desiredCapabilities={
        'deviceName': '688190fa0705',
        "platformVersion": "10 QKQ1.19104.001",
        "platformName": "Android",
        "appPackage": "com.miui.calculator",
        "appActivity": "com.miui.calculator.cal.CalculatorActivity"
    }
    driver=SpiderAppium(desiredCapabilities)
    # 点击元素
    driver.wait(3)
    driver.clickElementById('com.miui.calculator:id/btn_c_s')
    driver.clickElementById('com.miui.calculator:id/btn_8_s')
    driver.clickElementById('com.miui.calculator:id/btn_plus_s')
    driver.clickElementById('com.miui.calculator:id/btn_9_s')
    driver.clickElementById('com.miui.calculator:id/btn_equal_s')

    driver.close()
