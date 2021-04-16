import requests


def download():
    for k in range(80,91,1):
        if k<10:
            index="0"+str(k)
        else:
            index= str(k)
        filename="emoji_"+index+".png"
        r=requests.get("https://www.thorui.cn/wx/static/images/im_face/"+filename)
        content=r.content
        with open("D:\\emoji\\"+filename , 'wb') as file:
            file.write(content)
            print("下载完成文件:",filename)



if __name__ == '__main__':
    download()
