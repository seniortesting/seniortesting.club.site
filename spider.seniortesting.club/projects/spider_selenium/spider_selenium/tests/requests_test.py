# -*- coding: utf-8 -*-
import json

from spider_selenium.util.webrequest import WebRequest

if __name__ == '__main__':
    api = 'https://api.bilibili.com/x/v3/fav/folder/created/list-all'
    req = WebRequest()
    headers = {
        'cookie': 'CURRENT_FNVAL=16; _uuid=D24CD077-FED9-C1E1-B8EE-111A3FED901B12170infoc; buvid3=E8709C3B-3863-4FAE-BA1C-E47A11321E48143072infoc; rpdid=|(J|)k)Rm|Yl0J\'ulmlY~|Yu~; LIVE_BUVID=AUTO7815963257338209; bp_video_offset_652110971=421390739041584097; bp_t_offset_652110971=421390739041584097; DedeUserID=478899332; DedeUserID__ckMd5=10bdfe65ed2987f8; bp_t_offset_478899332=425219375969546034; SESSDATA=c0810ff1%2C1613459933%2C9edc2*81; bili_jct=0c696a0f0df420fa60325504b039a872; sid=b0mpjdlv; PVID=1; bp_video_offset_478899332=428510983068107417; blackside_state=1; bsource=search_baidu; bfe_id=6f285c892d9d3c1f8f020adad8bed553',
        'referer': 'https://www.bilibili.com/video/BV11x41127GD/?spm_id_from=333.788.videocard.4',
    }
    params = {
        'type': 2,
        'rid': 10252650,
        'up_mid': 478899332
    }
    res = req.pc().get(api, headers=headers, params=params,json=True)
    jsonRes=json.loads(res.text)
    print('res', res)
