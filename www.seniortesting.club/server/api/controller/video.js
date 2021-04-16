const { validationResult } = require('express-validator')
const db = require('../model/db')

/**
 * 相关执行SQL语句
 */
const sql = {
  listVideoSql: `
   INSERT INTO porn_maomi (id, page_id, img, title, category,
   url,page_url,porn_date,like_num,
   status,remark,version,
   create_by, create_time, update_by, update_time)
  VALUES (?,?,?,?,?,
  ?,?,?,?,
  ?,?,?,
   ?, NOW(), ?,NOW());
  `,
  likeVideoSql: `
   UPDATE porn_maomi SET like_num =like_num+1, update_time= NOW() WHERE id= ? and version= ?
  `
}
const video = {
  listVideos: (req, res) => {
    const result = db.result()
    const errors = validationResult(req)
    if (!errors.isEmpty()) {
      result.code = 422
      const errorsArray = errors.array()
      result.message = errorsArray[0].msg
      result.data = errorsArray
      return res.json(result)
    }
    const body = req.body
    const pageSize = body.pageSize
    let pageNum = body.pageNum
    // const phone = body.phone
    // const email = body.email
    // const transactionId = body.transactionId
    try {
      // 数据库端操作，插入数据
      if (pageNum <= 1) {
        pageNum = 0
      }
      const parameters = [pageNum, pageSize]
      // const whereOrderSql = video.buildVideoCondition(phone, email, transactionId)
      const listSql = `
      SELECT COUNT(1) AS videoCount FROM porn_maomi;
      SELECT
      id,
      page_id,
      img,
      title,
      category,
      url,
      page_url,
      porn_date,
      like_num,
      status,
      version,
      remark,
      update_time
      FROM porn_maomi ORDER BY porn_date DESC
      LIMIT ?,?;
      `
      db.exec(listSql, parameters, (error, results, fields) => {
        if (error) {
          result.code = 500
          result.message = JSON.stringify(error)
          res.json(result)
        } else {
          // 查询所有条数
          const count = parseInt(results[0][0].videoCount)
          const resultSets = results[1]
          const data = {
            pageNo: pageNum,
            pageSize,
            total: count,
            records: resultSets
          }
          result.data = data
          res.json(result)
        }
      })
    } catch (err) {
      result.code = 500
      result.message = JSON.stringify(err)
      res.json(result)
    }
  },
  buildVideoCondition: (phone, email, transactionId) => {
    const conditions = []
    if (typeof phone !== 'undefined' && phone.length > 0) {
      conditions.push(`phone= '${phone}'`)
    }
    if (typeof email !== 'undefined' && email.length > 0) {
      conditions.push(`email like '${email}%'`)
    }
    if (typeof transactionId !== 'undefined' && transactionId.length > 0) {
      conditions.push(`transaction_id= '${transactionId}'`)
    }
    return (conditions.length ? conditions.join(' AND ') : '1=1')
  },
  likeVideo: (req, res) => {
    const result = db.result()
    const errors = validationResult(req)
    if (!errors.isEmpty()) {
      result.code = 422
      const errorsArray = errors.array()
      result.message = errorsArray[0].msg
      result.data = errorsArray
      return res.json(result)
    }
    const body = req.body
    const videoId = body.videoId
    const version = body.version
    try {
      // 数据库端操作，插入数据
      const parameters = [videoId, version]
      db.exec(sql.likeVideoSql, parameters, (error, results, fields) => {
        if (error) {
          result.code = 500
          result.message = JSON.stringify(error)
          res.json(result)
        } else {
          // 查询所有条数
          result.data = 'success'
          res.json(result)
        }
      })
    } catch (err) {
      result.code = 500
      result.message = JSON.stringify(err)
      res.json(result)
    }
  }
}

module.exports = video
