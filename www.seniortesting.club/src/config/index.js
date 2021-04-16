const pkg = require('../../package.json')
const isDevelopment = process.env.RUNTIME === 'development'
const config = {
  website: {
    version: pkg.version,
    name: '评布客',
    desc: '评布客,好玩的工具集，你需要的都有!',
    url: 'https://pingbook.top'
  },
  // 是否数据都要加密
  secretEnabled: false,
  secretKey: 'b2c17b46e2Yx0ab5a82869856c',
  // vuex持久化存放值键
  storeEncrypted: !isDevelopment,
  storeKey: pkg.name,
  storeExpiredSeconds: 259200, // 3天过期秒数
  // 加载所有的iconfont资源
  iconfont: ['font_1529202_0ms2l5eu5dk'],
  // 服务请求配置
  serverUrls: {
    API_BASE_URL: isDevelopment ? 'http://127.0.0.1:3000/api' : 'https://pingbook.top/api',
    CDN_BASE_URL: isDevelopment ? '/res/' : '/res/'
  }
}
module.exports = config
