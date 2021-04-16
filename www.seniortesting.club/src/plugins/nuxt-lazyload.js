import Vue from 'vue'
import VueLazyload from 'vue-lazyload'

import error from '@/assets/img/loader/error.svg'
import loading from '@/assets/img/loader/loading.svg'
// 参考使用 ： https://www.yasminzy.com/nuxt/vue-lazyload.html#steps
Vue.use(VueLazyload, {
  preLoad: 1,
  error,
  loading,
  attempt: 3
})
