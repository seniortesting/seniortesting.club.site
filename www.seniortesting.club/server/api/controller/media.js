const { validationResult } = require('express-validator')
const db = require('../model/db')

const sql = {
  addMediaSql: `
  INSERT INTO we_media (id, title,file_token,remark,create_time,create_by,update_time,update_by )
   VALUES(?,?,?,?,NOW(),'',NOW(),'' )  ON DUPLICATE KEY UPDATE title =?,file_token=?,remark=?,update_time=NOW()
  `,
  addTagSql: `
     INSERT INTO we_tag(id, name, create_time, update_time )
     VALUES ? ON DUPLICATE KEY UPDATE update_time=NOW()
  `,
  addMediaTagSql: `
  INSERT INTO we_tag_media(id,media_id,tag_id,create_time,update_time )
  VALUES ? ON DUPLICATE KEY UPDATE update_time=NOW()
  `,
  searchMediaSql: `
    SELECT wm.id,wm.title,wm.remark,sfu.url,wm.update_time FROM we_media wm
  LEFT JOIN sys_file_upload sfu ON wm.file_token=sfu.token
  WHERE EXISTS (
  SELECT wtm.media_id FROM we_tag_media wtm
     INNER JOIN we_tag wt ON wt.id =wtm.tag_id
     WHERE wt.name LIKE ? AND wtm.media_id =wm.id
  )
  `
}

const media = {
  searchMedia: (req, res, next) => {
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
      const body = req.body
      const keyword = body.keyword
      const params = ['%' + keyword]
      db.exec(sql.searchMediaSql, params, (error, results, fields) => {
        if (error) {
          result.code = 500
          result.message = JSON.stringify(error)
          res.json(result)
        } else {
          result.code = 0
          result.data = results
          res.json(result)
        }
      })
    } catch (err) {
      result.code = 500
      result.message = JSON.stringify(err)
      res.json(result)
    }
  },
  publishMedia: (req, res, next) => {
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
      const body = req.body
      const mediaId = body.id || db.nextId()
      const title = body.title
      const fileToken = body.fileToken
      const tags = body.tags
      const remark = body.remark
      const params = [mediaId, title, fileToken, remark, title, fileToken, remark]
      db.exec(sql.addMediaSql, params, (error, results, fields) => {
        if (error) {
          result.code = 500
          result.message = JSON.stringify(error)
          res.json(result)
        } else {
          // 插入标签
          const tagsParams = []
          const mediaTagsParams = []
          tags.forEach((tag) => {
            const tagId = db.nextId()
            const mediaTagId = db.nextId()
            const now = require('dayjs')(new Date()).format('YYYY-MM-DD HH:mm:ss')
            const params = [tagId.toString(), tag, now, now]
            tagsParams.push(params)
            mediaTagsParams.push([mediaTagId, mediaId, tagId, now, now])
          })
          db.exec(sql.addTagSql, [tagsParams], (error, results, fields) => {
            if (error) {
              result.code = 500
              result.message = JSON.stringify(error)
              res.json(result)
            } else {
              db.exec(sql.addMediaTagSql, [mediaTagsParams], (error, results, fields) => {
                if (error) {
                  result.code = 500
                  result.message = JSON.stringify(error)
                  res.json(result)
                } else {
                  result.code = 0
                  const resData = { mediaId: mediaId.toString(), tagId: tagsParams }
                  result.data = resData
                  res.json(result)
                }
              })
            }
          })
        }
      })
    } catch (err) {
      result.code = 500
      result.message = JSON.stringify(err)
      res.json(result)
    }
  },
  getTagsPage: (req, res) => {
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
      const body = req.body
      const pageSize = body.pageSize
      let pageNum = body.pageNum
      if (pageNum <= 1) {
        pageNum = 0
      }
      const listSql = `
      SELECT COUNT(1) AS tagCount FROM we_tag;
      SELECT
      id,
      name
      FROM we_tag ORDER BY update_time DESC
      LIMIT ?,?;
      `
      const parameters = [pageNum, pageSize]
      db.exec(listSql, parameters, (error, results, fields) => {
        if (error) {
          result.code = 500
          result.message = JSON.stringify(error)
          res.json(result)
        } else {
          // 查询所有条数
          const count = parseInt(results[0][0].tagCount)
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
  }
}

module.exports = media
