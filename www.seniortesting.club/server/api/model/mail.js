const nodemailer = require('nodemailer')
const config = require('../config')

/**
 * 参考：
 * https://www.jianshu.com/p/ee200a67853c
 * https://stackabuse.com/how-to-send-emails-with-node-js/
 */
const mailTransport = nodemailer.createTransport({
  host: config.mail.smtp,
  secureConnection: true, // 使用SSL方式（安全方式，防止被窃取信息）
  auth: {
    user: config.mail.user,
    pass: config.mail.pass
  }
})

const mail = {
  /**
   *  发送邮件
   * @param from 可为空
   * @param to 可为空
   * @param subject 主题
   * @param content 详细html邮件内容
   */
  sendHtmlEmail: (from, to, subject, content) => {
    const data = {
      from: from || config.mail.from,
      to: to || config.mail.defaultReceiver,
      // cc         : ''  //抄送
      // bcc      : ''    //密送
      subject,
      html: content
    }
    mailTransport.sendMail(data, function (err, info) {
      if (err) {
        console.log(`发送邮件失败异常: ${err}`)
      }
    })
  }
}
module.exports = mail
