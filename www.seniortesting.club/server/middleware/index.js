const error = require('./handleErrors')
const cors = require('./handleCORS')
const logger = require('./handleLogger')
const bodyParser = require('./handleBodyParser')
const responseTime = require('./handleResponseTime')
const robots = require('./handleRobots')
module.exports = (app) => {
  app.use(cors())
  // 处理json数据
  app.use(bodyParser.json())
  app.use(bodyParser.urlencoded({ extended: true }))

  app.use(logger)
  app.use(responseTime)
  app.use(robots)
  app.use(error)
}
