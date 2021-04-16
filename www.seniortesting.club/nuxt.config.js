const config = require('./src/config')
const server = require('./server')
const serverConfig = require('./server/api/config')
module.exports = {
  mode: 'universal',
  /*
    ** Headers of the page
    */
  buildDir: '.dist',
  srcDir: 'src/',
  env: {
    RUNTIME: process.env.NODE_ENV
  },
  ignore: ['pages/video/vipdata.js'],
  head: {
    title: config.website.name + ',' + config.website.desc,
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' },
      { hid: 'keywords', name: 'keywords', content: '评布客,评布客博客' },
      { hid: 'description', name: 'description', content: config.website.desc || '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      // Web字体 + CSS
      // { rel: 'stylesheet', href: 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' },
      { rel: 'stylesheet', href: 'https://cdn.bootcss.com/font-awesome/5.12.1/css/all.min.css' }
    ],
    script: [
      // { src: '' }
    ]
  },
  /*
    ** loading
    */
  loading: { color: '#ff1a1a', height: '3px' },
  // loading
  loadingIndicator: {
    name: '~/static/loading.html',
    color: '#3B8070',
    background: 'white'
  },
  css: [
    '~/assets/css/app.scss'
  ],
  plugins: [
    { src: '~/plugins/nuxt-element', ssr: false },
    { src: '~/plugins/nuxt-axios', ssr: false },
    { src: '~/plugins/nuxt-adsense', ssr: false },
    { src: '@/plugins/nuxt-persist', ssr: false },
    { src: '~/plugins/nuxt-lazyload', ssr: false },
    { src: '~/plugins/nuxt-clipboard', ssr: false },
    { src: '~/plugins/nuxt-highlightjs', ssr: false },
    { src: '~/plugins/nuxt-wavesurfer', ssr: false }
  ],
  buildModules: [
    // Doc: https://github.com/nuxt-community/eslint-module
    '@nuxtjs/eslint-module'
  ],
  modules: [
    ['@nuxtjs/axios', {
      progress: true,
      retry: false,
      credentials: true
    }],
    ['@nuxtjs/device'],
    ['@nuxtjs/sitemap', {
      hostname: config.website.url,
      path: 'sitemap_index.xml',
      gzip: false,
      exclude: []
    }],
    // 采用官方推荐的toast组件
    [
      'vue-sweetalert2/nuxt',
      {
        confirmButtonColor: '#41b882',
        cancelButtonColor: '#ff7674'
      }
    ]
  ],
  build: {
    publicPath: config.serverUrls.CDN_BASE_URL,
    extractCSS: true,
    analyze: false,
    corejs: '3',
    babel: {
      presets ({ isServer }) {
        return [
          [
            require.resolve('@nuxt/babel-preset-app'),
            // require.resolve('@nuxt/babel-preset-app-edge'), // For nuxt-edge users
            {
              buildTarget: isServer ? 'server' : 'client',
              corejs: { version: 3 }
            }
          ]
        ]
      },
      plugins: [
        [
          'component',
          {
            libraryName: 'element-ui',
            styleLibraryName: 'theme-chalk'
          }
        ]
      ],
      comments: true
    },
    transpile: [/^element-ui/],
    extend (config, ctx) {
      if (ctx.isDev) {
        config.devtool = ctx.isClient ? 'source-map' : 'inline-source-map'
      }
    }
  },
  // 服务端渲染组件
  serverMiddleware: [
    { path: serverConfig.prefix, handler: server }
  ]
}
