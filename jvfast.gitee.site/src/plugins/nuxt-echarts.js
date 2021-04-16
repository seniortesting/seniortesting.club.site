import Vue from 'vue'
import ECharts from '~/src/plugins/nuxt-echarts' // refers to components/ECharts.vue in webpack
export default () => {
// register component to use
  Vue.component('v-chart', ECharts)
}

// 采用按需加载方式在各个页面中引入
