const pkg = require('../../package.json')
const isDevelopment = process.env.RUNTIME === 'development'

const config = {
  // 网站通用设置
  website: {
    version: pkg.version,
    buildVersion: process.env.BUILD_VERSION,
    name: 'JVFast脚手架系统',
    shortName: 'JVF',
    desc: 'JVFast管理框架是最敏捷的前后端脚手架系统快速解决方案',
    url: 'https://jvfast.pingbook.top',
    helpUrl: 'https://pingbook.top/help',
    beian: '沪ICP备19010939号-1',
    enableAds: !isDevelopment,
    enableAPPDownload: true,
    appDownloadUrl: 'https://www.baidu.com'
  },
  storeKey: pkg.name,
  // 加载所有的iconfont资源
  iconfont: ['font_1529202_0ms2l5eu5dk'],
  // 服务请求配置
  serverUrls: {
    API_BASE_URL: isDevelopment ? 'http://127.0.0.1:9090/jvfast-service' : 'https://open.pingbook.top/jvfast-service',
    CDN_BASE_URL: isDevelopment ? '/res/' : 'https://res.yitieyilu.com/assets/3f04bebdb8502322b/'
  }
}

export default config
