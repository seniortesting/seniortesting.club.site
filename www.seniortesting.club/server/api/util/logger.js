const path = require('path')
const fs = require('fs')
const { createLogger, format, transports, addColors } = require('winston')
// 确保项目根目录存在logs文件夹
const rootPwd = process.cwd()
const logDirectory = path.join(rootPwd, 'logs')
fs.existsSync(logDirectory) || fs.mkdirSync(logDirectory)

// 配置等级和颜色
const config = {
  levels: {
    error: 0,
    debug: 1,
    warn: 2,
    data: 3,
    info: 4,
    verbose: 5,
    silly: 6
  },
  colors: {
    error: 'red',
    debug: 'blue',
    warn: 'yellow',
    data: 'grey',
    info: 'green',
    verbose: 'cyan',
    silly: 'magenta'
  }
}

const log = createLogger({
  exitOnError: false,
  format: format.combine(
    format.errors({ stack: true }),
    format.timestamp(),
    // 最终输出格式
    format.printf((info) => {
      return info.timestamp + ' ' + info.level.toUpperCase() + ' ' + (undefined !== info.message ? info.message : '') +
      (info.meta && Object.keys(info.meta).length ? '\n\t' + JSON.stringify(info.meta) : '')
    })
  ),
  transports: [
    new transports.File({
      level: 'info',
      filename: path.resolve(logDirectory, 'access.log'),
      handleExceptions: true,
      json: false,
      maxsize: 5242880, // 5MB
      maxFiles: 5,
      colorize: false
    }),
    new transports.File({
      level: 'error',
      filename: path.resolve(logDirectory, 'error.log'),
      handleExceptions: true,
      json: false,
      maxsize: 5242880, // 5MB
      maxFiles: 5,
      colorize: false
    })
  ]
})
if (process.env.NODE_ENV !== 'production') {
  // 添加自定义颜色
  addColors(config.colors)
  log.add(new transports.Console({
    level: 'debug',
    handleExceptions: true,
    colorize: true,
    format: format.combine(
      format.colorize()
    )
  }))
}
// 添加morgan日志信息
log.stream = {
  write (message, encoding) {
    log.info(message.trim())
  }
}

module.exports = log
