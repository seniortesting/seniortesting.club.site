import Vue from 'vue'
import Loading from 'vue-loading-overlay'
import 'vue-loading-overlay/dist/vue-loading.css'
// @deprecated 全屏弹出层控件, 可以使用element-ui的$loading
export default () => {
  Vue.use(Loading, {
    width: 128,
    height: 128,
    color: '#007bff',
    loader: 'spinner'
  }, {
  })
}

// 使用方法
// const loader = this.$loading.show({
//   // Optional parameters
//   container: this.fullPage ? null : this.$refs.formContainer,
//   canCancel: true,
//   onCancel: this.onCancel
// })
// // simulate AJAX
// setTimeout(() => {
//   loader.hide()
// }, 5000)
