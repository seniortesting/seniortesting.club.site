// const Unsplash = require('unsplash-js').default
// const unsplash = new Unsplash({
//   accessKey: config.unsplash.accessKey,
//   secret: config.unsplash.secretKey,
//   headers: {
//     'Access-Original': 'Walter'
//   },
//   timeout: 500 // values set in ms
// })
// const toJson = unsplash.toJson
const axios = require('axios')
const config = require('../config')
const db = require('../model/db')
const mail = require('../model/mail')
const baseUrl = 'https://api.unsplash.com'

const photo = {
  // collections 接口
  // photos ,随机图片
  getPhotos: async (req, res) => {
    const query = req.query
    const page = query.page || 1
    const perPage = query.limit || 10
    const orderBy = query.orderBy || 'latest'
    const url = '/photos'
    const result = db.result()
    try {
      const params = {
        client_id: config.unsplash.accessKey,
        page,
        per_page: perPage,
        order_by: orderBy
      }
      const { status, data } = await axios.get(`${baseUrl}${url}`, { params })
      if (status === 200) {
        result.data = data
      }
      res.json(result)
    } catch (err) {
      result.code = 500
      result.message = JSON.stringify(err) || err.message
      res.json(result)
    }
  },
  getRandomPhotos: async (req, res) => {
    const query = req.query
    const q = query.query
    const featured = query.featured
    const username = query.username
    const url = '/photos/random'
    const result = db.result()
    try {
      const params = {
        client_id: config.unsplash.accessKey,
        query: q,
        username,
        featured
      }
      const { status, data } = await axios.get(`${baseUrl}${url}`, { params })
      if (status === 200) {
        result.data = data
      }
      // 发送邮件通知
      const emailSubject = '有查询随机图片请求-来自评布客'
      const emailContent = `
          <div>
              <div style="background-color:#e1e4e8;font-family:'segoe ui',calibri,helvetica,arial;text-align:center;padding:50px 0"
                  align="center">
                  <div style="width:740px;margin:0 auto;padding:20px 0">
                      <img width="93" src="https://pingbook.top/res/img/logo.65f3f5c.png" style="border-radius: 15px" />
                      <br />
                      <br />
                  </div>
                  <div style="background-color:#ffffff;width:740px;text-align:left;font-size:14px;border-radius:4px;margin:0 auto"
                      align="left">
                      <div style="width:620px;color:#222;margin:0 auto;padding:40px">
                          <div>
                              <p>您好,</p>
                              <p>网站有新的请求随机图片了!</p>
                              <br />
                              <p>请点击进入<a href="https://pingbook.top/randomimgenerator">评布客</a>查看页面!</p>
                              <p>谢谢支持!</p>
                              <br /><br />
                              <p><b>评布客团队敬上</b></p>
                          </div>
                          <br />
                          <br />
                          <!--   <table>
                          <tbody>
                              <tr>
                              <td valign="top"> <img style="border-radius:2px;width:70px" src="二维码" /> </td>
                              <td valign="top">
                              <div style="padding-left:7px;line-height:130%;font-size:14px;font-family:'segoe ui',calibri,helvetica,arial">
                              <br /> 关注「<b>评布客</b>」官方微信号
                              <br /> 便捷访问网站，获取产品资讯
                              </div> </td>
                              </tr>
                          </tbody>
                          </table>  -->
                      </div>
                  </div>
                  <div style="width:540px;text-align:center;font-size:12px;margin:10px auto" align="center">
                      <span style="margin-top:3px;color:#888888;text-decoration:none"> <span>
                              <a href="https://pingbook.top/" style="color:#888888;text-decoration:none;margin-left:10px"
                                  target="_blank">评布客</a> <a href="#"
                                  style="color:#888888;text-decoration:none;margin-left:10px" target="_blank"> 官方微博 </a> </span>
                          <span> <a href="#" style="color:#888888;text-decoration:none;margin-left:10px" target="_blank"> 退订 </a>
                          </span> </span>
                  </div>
              </div>
          </div>
          `
      mail.sendHtmlEmail(null, null, emailSubject, emailContent)
      res.json(result)
    } catch (err) {
      result.code = 500
      result.message = JSON.stringify(err) || err.message
      res.json(result)
    }
  }
  // search查询
  // stats
  // users
}

module.exports = photo
