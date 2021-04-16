import re

if __name__ == '__main__':
    reg='/shipin/84557.html'
    result=re.search(r"^/shipin/(.*).html$",reg)
    print(result)
    bstr="3232"
    print(int(bstr))
