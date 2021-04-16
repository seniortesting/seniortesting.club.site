const path = require('path')
const express = require('express')
const config = require('./api/config')
const useMiddlewares = require('./middleware')
const api = require('./api/controller')
// start express app
const app = express()
const staticPath = path.join(process.cwd(), config.uploadFolder)
useMiddlewares(app)
// 静态访问路径
app.use('/' + config.uploadUrlPrefix, express.static(staticPath, { index: ['index.html', 'index.htm'] }))
app.use(api)
// ngrok
require('./middleware/handleNgrok')
module.exports = app
// const consola = require('consola')
// const { Nuxt, Builder } = require('nuxt')
// 方法二：Router: Import API Routes
// app.use(config.prefix, api)
// async function start () {
//   // Init Nuxt.js
//   const nuxtConfig = require('../nuxt.config.js')
//   // Import and Set Nuxt.js options
//   nuxtConfig.dev = isDev
//   const nuxt = new Nuxt(nuxtConfig)
//   const { host, port } = nuxt.options.server
//
//   await nuxt.ready()
//   // Build only in dev mode
//   if (nuxtConfig.dev) {
//     const builder = new Builder(nuxt)
//     await builder.build()
//   }
//
//   // Give nuxt middleware to express
//   app.use(nuxt.render)
//
//   // Listen the server
//   app.listen(port, host)
//   consola.ready({
//     message: `Server listening on http://${host}:${port}`,
//     badge: true
//   })
// }
// start()
