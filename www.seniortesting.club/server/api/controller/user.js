
const { validationResult } = require('express-validator')
const CryptoJS = require('crypto-js')
const db = require('../model/db')
const config = require('../../../src/config')

const sql = {
  loginSql: `
   SELECT su.id,su.user_name,su.passwd,su.email,su.avatar,su.status,su.update_time FROM sys_user su WHERE su.user_name=?
  `
}
const user = {
  login: (req, res, next) => {
    const result = db.result()
    const errors = validationResult(req)
    if (!errors.isEmpty()) {
      result.code = 422
      const errorsArray = errors.array()
      result.message = errorsArray[0].msg
      result.data = errorsArray
      return res.json(result)
    }
    try {
      const user = req.body.username
      const pass = req.body.passwd
      const params = [user]
      db.exec(sql.loginSql, params, (error, results, fields) => {
        if (error) {
          result.code = 501
          result.message = JSON.stringify(error)
          return res.json(result)
        }
        if (results.length === 0) {
          result.code = 400
          result.message = 'Not found username'
          return res.json(result)
        }
        const userInfo = results[0]
        // 进行解密操作
        const encryptPasswd = userInfo.passwd
        const secretKey = config.secretKey
        const md5Pass = CryptoJS.AES.decrypt(encryptPasswd, secretKey).toString(CryptoJS.enc.Utf8)
        if (md5Pass !== pass) {
          result.code = 300
          result.message = 'Incorrect password'
          return res.json(result)
        }
        // 返回结果
        delete userInfo.pass
        result.code = 0
        result.data = userInfo
        res.json(result)
      })
    } catch (err) {
      result.code = 500
      result.message = JSON.stringify(err)
      res.json(result)
    }
  },
  updateUserProfileInfo: (req, res, next) => {
    const result = db.result()
    const errors = validationResult(req)
    if (!errors.isEmpty()) {
      result.code = 422
      const errorsArray = errors.array()
      result.message = errorsArray[0].msg
      result.data = errorsArray
      return res.json(result)
    }
    try {
      const id = req.body.id
      const email = req.body.email
      const passwd = req.body.passwd
      const parameters = [id]
      const whereUserSql = user.buildUserCondition(email, passwd)
      const updateSql = `
      UPDATE sys_user SET ${whereUserSql} WHERE id = ?
      `
      db.exec(updateSql, parameters, (error, results, fields) => {
        if (error) {
          result.code = 501
          result.message = JSON.stringify(error)
          return res.json(result)
        }
        // 返回结果
        result.code = 0
        result.data = 'success'
        res.json(result)
      })
    } catch (err) {
      result.code = 500
      result.message = JSON.stringify(err)
      res.json(result)
    }
  },
  buildUserCondition (email, password) {
    const conditions = []
    if (typeof email !== 'undefined' && email.length > 0) {
      conditions.push(`email = '${email}'`)
    }
    if (typeof password !== 'undefined' && password) {
      const secretKey = config.secretKey
      const encryptPass = CryptoJS.AES.encrypt(password, secretKey).toString()
      conditions.push(`passwd = '${encryptPass}'`)
    }
    conditions.push('update_time =NOW() ')
    return (conditions.length ? conditions.join(' , ') : '1=1')
  }

}
module.exports = user
