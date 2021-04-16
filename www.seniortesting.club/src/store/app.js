import config from '@/config'
export const state = () => ({
  website: config.website,
  // other setting
  loginUserInfo: {}
})

export const mutations = {
  // user info
  STORE_LOGIN_USERINFO: (state, loginUserInfo) => {
    state.loginUserInfo = loginUserInfo
  },
  REMOVE_LOGIN_USERINFO: (state) => {
    state.loginUserInfo = {}
  }
}
export const actions = {
  storeLoginUserInfo ({ commit }, loginUserInfo) {
    return new Promise((resolve, reject) => {
      commit('STORE_LOGIN_USERINFO', loginUserInfo)
      resolve(loginUserInfo)
    })
  },
  logout ({ commit }) {
    return new Promise((resolve, reject) => {
      commit('REMOVE_LOGIN_USERINFO')
      resolve()
    })
  }
}
