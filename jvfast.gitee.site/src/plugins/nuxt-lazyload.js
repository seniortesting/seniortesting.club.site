import Vue from 'vue'
import VueLazyload from 'vue-lazyload'

import error from '@/assets/img/error.svg'
import loading from '@/assets/img/loading.svg'
// 参考使用 ： https://www.yasminzy.com/nuxt/vue-lazyload.html#steps
Vue.use(VueLazyload, {
  preLoad: 1,
  error,
  loading,
  attempt: 3
})
