const log = require('../api/util/logger')
// 错误捕捉
module.exports = (err, req, res, next) => {
  log.error(err.message)
  res.status(200).send({
    code: 500,
    success: false,
    message: err.message
  })
}
