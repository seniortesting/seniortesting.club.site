// ------morgan: configure morgan
const morgan = require('morgan')
const log = require('../api/util/logger')

// 解决自定义格式时响应时间不着色的问题
const devModify = '[:date[iso]] ":method :url HTTP/:http-version" :status - :res[content-length] - :response-time ms ":referrer" ":user-agent"'
const combinedModify = ':remote-addr - :remote-user [:date[iso]] ":method :url HTTP/:http-version" :status :response-time ms ":referrer" ":user-agent"'
const morganFormat = process.env.NODE_ENV === 'development' ? devModify : combinedModify
// ensure log directory exists
// 1. create stream
// const accessLogStream = fs.createWriteStream(logPath, { flags: 'a' })
// 2. create a rotating write stream, use winston
// const accessLogStream = FileStreamRotator.getStream({
//   date_format: 'YYYYMMDD',
//   filename: path.join(logDirectory, 'access-%DATE%.log'),
//   frequency: 'daily',
//   verbose: false
// })
module.exports = morgan(morganFormat, { stream: log.stream, skip: (req, res) => req.method === 'OPTIONS' }) // configire morgan
