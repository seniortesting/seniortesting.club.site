// import { MessageBox, Message } from 'element-ui'
import cfg from '@/config'
import encrypt from '@/util/EncryptUtil'
import { setClient } from '@/api'

const enableSecret = cfg.secretEnabled
const tokenHeader = cfg.tokenHeader
const tokenRefreshHeader = cfg.tokenRefreshHeader
const updateTokenAction = 'sys/user/updateToken'
const logoutAction = 'sys/user/logout'
export default ({ $axios, error, store, router }) => {
  $axios.defaults.timeout = 30000
  // 拦截请求
  $axios.onRequest((config) => {
    //  配置对应的请求token
    const tokenInfo = store.getters.token
    if (tokenInfo) {
      config.headers[tokenHeader] = tokenInfo
    }
    // 是否进行加密数据请求包,只针对json put/post/delete格式的body数据进行加密,其他格式不进行加密
    const data = config.data
    if (enableSecret && data && data instanceof Object & config.headers.common.Accept.startsWith('application/json')) {
      // 如果对应的有data数据并且需要加解密
      config.headers['Content-Type'] = 'application/json;charset=UTF-8'
      const jsonStr = JSON.stringify(data)
      const encryptJsonData = encrypt.encode(jsonStr)
      config.data = encryptJsonData
    }
  })
  $axios.onResponse((response) => {
    const refreshToken = response.headers[tokenRefreshHeader]
    const data = response.data
    // 更新token
    if (refreshToken) {
      store.dispatch(updateTokenAction, refreshToken)
    }
    if (data) {
      const code = data.code
      // 进行json数据的解密
      if (enableSecret && (typeof data === 'string')) {
        const decodeJsonStr = encrypt.decode(data)
        response.data = JSON.parse(decodeJsonStr)
      }
      // 跳转页面
      if (code === 401) {
        store.dispatch(logoutAction).then(() => router.push({ name: cfg.page.loginComponentName }))
      }
    }
  })
  $axios.onError((error) => {
    console.log('err' + error)
  })
  // 暴露$axios对象,方便在外部文件访问对应的$axios实例
  setClient($axios)
  window.axios = $axios
}
