import Vue from 'vue'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import locale from 'element-ui/lib/locale/lang/zh-CN'
import ElImageViewer from 'element-ui/packages/image/src/image-viewer'

export default ({ app }) => {
  Vue.use(ElementUI, { locale })
  Vue.component(ElImageViewer.name, ElImageViewer)
}
