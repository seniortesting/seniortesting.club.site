import Vue from 'vue'
import vueTinySlider from '@/components/vue-slide/index'
import 'tiny-slider/dist/tiny-slider.css'
// 插件源码: https://github.com/viktorlarsson/vue-tiny-slider
import 'swiper/css/swiper.min.css'
export default () => {
  const VueTinySlider = {
    install (Vue, options) {
      Vue.component('VueSlider', vueTinySlider)
    }
  }
  Vue.use(VueTinySlider)
}
