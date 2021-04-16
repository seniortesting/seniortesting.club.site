import createLogger from 'vuex/dist/logger'

const debug = process.env.NODE_ENV !== 'production'

export const persistPaths = []
export const getters = {
  // 用户对应相关数据
}
export const plugins = debug ? [createLogger()] : []
