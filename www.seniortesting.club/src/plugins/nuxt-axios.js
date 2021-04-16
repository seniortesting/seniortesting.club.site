// import cfg from '@/config'
import { setClient } from '@/api'
export default ({ $axios, error, store, router }) => {
  $axios.defaults.timeout = 30000
  // 拦截请求
  $axios.onRequest((config) => {

  })
  $axios.onResponse((response) => {

  })
  $axios.onError((error) => {
    console.log('err' + error)
  })
  // 暴露$axios对象,方便在外部文件访问对应的$axios实例
  setClient($axios)
  window.axios = $axios
}
