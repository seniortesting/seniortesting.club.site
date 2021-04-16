import Vue from 'vue'
// 引入avue的包
import Avue from '@smallwei/avue/lib/avue.min'
import '@smallwei/avue/lib/index.css'
// 导出插件,excel导出功能，npm方式: { "xlsx": "^0.15.4", "file-saver": "^2.0.2"}
// import { saveAs } from 'file-saver'
// import XLSX from 'xlsx'
import html2canvas from 'html2canvas'
// 其他组件
import BasicContainer from '@/components/basic-container/main'
import IframeContainer from '@/components/iframe/main'
import avueEditor from '@/components/vue-quill-editor'
import avueMap from '@/components/avue-map'
export default () => {
  Vue.use(Avue, {
    size: 'medium',
    menuType: 'text'
    // ali: {
    //   region: '',
    //   endpoint: '',
    //   stsToken: '',
    //   accessKeyId: ''
    // }
  })
  Vue.component('BasicContainer', BasicContainer)
  Vue.component('IframeContainer', IframeContainer)
  Vue.use(avueEditor)
  Vue.use(avueMap)
  // 其他
  // excel导出功能,此处不起作用
  // window.saveAs = saveAs
  // window.XLSX = XLSX
  // screenshot: html2canvas
  window.html2canvas = html2canvas
}
