const isDevelopment = process.env.NODE_ENV === 'development'
const config = {
  // 接口地址前缀
  prefix: '/api',
  uploadFolder: 'upload',
  uploadUrlPrefix: 'static',
  db: {
    // 连接池设置
    acquireTimeout: 10 * 1000,
    waitForConnections: true,
    connectionLimit: 10,
    connectTimeout: 10 * 1000,
    queueLimit: 0,
    // 连接设置
    host: isDevelopment ? 'localhost' : 'localhost',
    port: isDevelopment ? 3306 : 7328,
    user: isDevelopment ? 'syscorer' : 'syscorer',
    password: isDevelopment ? 's6s@#@!L0ngh' : 'cLPJ@Hw$fXbO%kCr&PYo3qq)0Z4cpg=',
    database: isDevelopment ? 'jvfast' : 'we_media',
    supportBigNumbers: true,
    bigNumberStrings: true,
    timezone: '+08:00',
    stringifyObjects: false,
    multipleStatements: true,
    typeCast: true,
    dateStrings: true
  },
  snowflake: {
    // worker_id 是 0-31的机器ID（用来配置分布式的多机器，最多支持32个机器）
    worker_id: 1,
    // datacenter_id 是 0-31的数据ID（用来配置某个机器下面的某某服务，每台机器最多支持32个服务）
    datacenter_id: 30
  },
  mail: {
    smtp: 'smtp.qq.com',
    port: 465,
    user: '1725641479@qq.com',
    // 邮箱的“授权码”
    pass: 'qwzxsgnsrmvngceh',
    from: '评布客通知服务<no-reply@pingbook.top>',
    defaultReceiver: isDevelopment ? 'alterhu2020@gmail.com' : 'alterhu2020@gmail.com'
  },
  // Tunnel to serve the app over HTTPS and be able to receive webhooks locally.
  // Optionally, if you have a paid ngrok account, you can specify your `subdomain`
  // and `authtoken` in your `.env` file to use it.
  ngrok: {
    enabled: isDevelopment,
    port: process.env.PORT || 3000,
    subdomain: process.env.NGROK_SUBDOMAIN,
    authtoken: process.env.NGROK_AUTHTOKEN
  },
  unsplash: {
    accessKey: 'XP-TatavjUeDPjdxs5WYCxNeq2_7lhn3p9z4jiHGyJU',
    secretKey: 'c3662-bmabVuzyIfelCEhBPXo5yQp-3k9qlLmbq3dsI'
  }

}
module.exports = config
