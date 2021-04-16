const config = require('../api/config')
// eslint-disable-next-line import/order
const ngrok = config.ngrok.enabled ? require('ngrok') : null
// Turn on the ngrok tunnel in development, which provides both the mandatory HTTPS
// support for all card payments, and the ability to consume webhooks locally.
if (ngrok) {
  ngrok
    .connect({
      addr: config.ngrok.port,
      subdomain: config.ngrok.subdomain,
      authtoken: config.ngrok.authtoken
    })
    .then((url) => {
      console.log(`💳  App URL to see the demo in your browser: ${url}/`)
    })
    .catch((err) => {
      if (err.code === 'ECONNREFUSED') {
        console.log(`⚠️  Connection refused at ${err.address}:${err.port}`)
      } else {
        console.log(`⚠️ Ngrok error: ${JSON.stringify(err)}`)
      }
      process.exit(1)
    })
}
