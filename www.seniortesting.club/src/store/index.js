import createLogger from 'vuex/dist/logger'

const debug = process.env.NODE_ENV !== 'production'

export const persistPaths = [
  'app.loginUserInfo'
]
export const getters = {
  // global setting
  website: state => state.app.website,
  // other setting
  loginUserInfo: state => state.app.loginUserInfo
}
// export const actions = {
//   nuxtServerInit ({ commit, state }, { app, store }) {
//   }
// }
export const plugins = debug ? [createLogger()] : []
