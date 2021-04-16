import config from './src/config/index'
import { formatBuildVersion } from './src/util/DateUtil'

export default {
  mode: 'universal',
  buildDir: '.dist',
  srcDir: 'src/',
  env: {
    BUILD_VERSION: formatBuildVersion(),
    RUNTIME: process.env.NODE_ENV
  },
  head: {
    title: config.website.name + ',' + config.website.desc,
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' },
      { hid: 'keywords', name: 'keywords', content: 'pingbook.top,pingbook,评布客,评布客博客,pingbook jvfast,jvfast,jvfast框架,jvfast后台,jvfast前端,jvfast nuxt,jvfast管理vue服务端渲染,vue seo,vue后台,springboot后台,vue avue,nuxt后台,饿了么服务器端渲染,element seo，element ssr,vue ssr，spring框架,vue框架' },
      { hid: 'description', name: 'description', content: config.website.desc || '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      // Web字体 + CSS
      { rel: 'stylesheet', href: 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' },
      { rel: 'stylesheet', href: 'https://cdn.bootcss.com/font-awesome/5.12.1/css/all.min.css' }
    ],
    script: [
      // { src: '' }
    ]
  },
  /*
  ** Customize the progress-bar color
  */
  loading: { color: '#ff1a1a', height: '3px' },
  // 单页时白屏加载显示
  loadingIndicator: {
    name: '~/static/loading.html',
    color: '#3B8070',
    background: 'white'
  },
  css: [
    'normalize.css', 'animate.css',
    '~/assets/css/app.css'
  ],
  plugins: [
    { src: '~/plugins/nuxt-google-adsense', ssr: false },
    { src: '~/plugins/nuxt-error-handler', ssr: false },
    { src: '~/plugins/nuxt-persist', ssr: false },
    { src: '~/plugins/nuxt-directive', ssr: false },
    { src: '~/plugins/nuxt-axios', ssr: false },
    { src: '~/plugins/nuxt-loading', ssr: false },
    { src: '~/plugins/nuxt-lazyload', ssr: false },
    { src: '~/plugins/nuxt-clipboard', ssr: false },
    { src: '~/plugins/nuxt-aos', ssr: false },
    { src: '~/plugins/nuxt-countup', ssr: false },
    { src: '~/plugins/nuxt-tiny-slider', ssr: false }
    // { src: '@/plugins/nuxt-ant-design', ssr: false },
    // { src: '~/plugins/nuxt-scroll', ssr: false },
    // { src: '~/plugins/nuxt-iconfont', ssr: false },
    // { src: '~/plugins/nuxt-echarts', ssr: false },
    // { src: '~/plugins/nuxt-element-ui', ssr: false },
    // { src: '~/plugins/nuxt-avue', ssr: false }
  ],
  router: {
    middleware: ['nuxt-router'],
    extendRoutes (routes, resolve) {
      // const profileIndex = routes.findIndex(route => route.name === 'profile')
      // routes[profileIndex] = {
      //   ...routes[profileIndex],
      //   components: {
      //     default: routes[profileIndex].component,
      //     notification: resolve(__dirname, 'components/mainTop.vue')
      //   },
      //   chunkNames: {
      //     top: 'components/mainTop'
      //   }
      // }
    }
  },
  /*
 ** Nuxt.js modules
 */
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
      exclude: ['/porn/**']
    }],
    // 采用官方推荐的toast组件
    ['@nuxtjs/toast', {
      position: 'top-center',
      // ['toasted-primary', 'outline', 'bubble']
      theme: 'toasted-primary',
      duration: 3000,
      containerClass: '',
      keepOnHover: true,
      closeOnSwipe: true,
      // ['material', 'fontawesome', 'mdi', 'custom-class', 'callback']
      iconPack: 'fontawesome',
      // 注册全局的响应
      register: [
        {
          // 使用方法：this.$toast.global.app_error();
          name: 'app_error',
          message: 'Oops...Something went wrong',
          options: {
            type: 'error',
            icon: {
              name: 'exclamation-triangle',
              after: false
            },
            action: [
              {
                icon: 'times-circle',
                onClick: (e, toastObject) => {
                  toastObject.goAway(0)
                }
              }
            ]
          }
        }
      ]
    }],
    // bootstrap 最小4.4.1版本
    ['bootstrap-vue/nuxt', {
      bootstrapCSS: false, // Or `css: false`
      bootstrapVueCSS: true, // Or `bvCSS: false`
      icons: true, // Install the IconsPlugin (in addition to BootStrapVue componentPlugins)
      config: {},
      components: ['BPagination'],
      componentPlugins: ['NavbarPlugin', 'CollapsePlugin', 'ModalPlugin', 'PopoverPlugin'],
      directives: [],
      directivePlugins: []
    }]
    /** 网站SEO相关配置 **/
    // ['@nuxtjs/google-tag-manager', { id: config.googleTagManagerId }],
  ],
  /*
  ** Nuxt.js dev-modules
  */
  buildModules: [
    // Doc: https://github.com/nuxt-community/eslint-module
    '@nuxtjs/eslint-module'
    // 自定义vue-router
    // ['@nuxtjs/router', {
    //   fileName: 'router.js',
    //   keepDefaultRouter: true
    // }]
  ],
  /*
  ** Build configuration
  */
  build: {
    // 默认: /_nuxt/, 生产环境配置此处cdn,参考: https://nuxtjs.org/api/configuration-build/#publicpath
    // CDN: nuxt build后复制对应的 /dist/client/目录到对应的cdn服务器上
    publicPath: config.serverUrls.CDN_BASE_URL,
    analyze: {
      analyzerMode: process.env.RUNTIME === 'development' ? 'static' : 'disabled'
    },
    babel: {
      presets: ['@nuxt/babel-preset-app'],
      plugins: [
        // [
        //   'component',
        //   {
        //     libraryName: 'element-ui',
        //     styleLibraryName: 'theme-chalk'
        //   }
        // ],
        // ['import', { libraryName: 'ant-design-vue', libraryDirectory: 'es', style: 'css' }]
      ],
      comments: true
    },
    // babel
    transpile: [
      // element-ui
      // /^element-ui/
    ],
    /*
    ** You can extend webpack config here
    */
    extend (config, ctx) {
      if (ctx.isDev) {
        config.devtool = ctx.isClient ? 'source-map' : 'inline-source-map'
      }
    }
  }
}
