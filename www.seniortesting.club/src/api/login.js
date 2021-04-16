import config from '@/config'
import request from '@/api/index'

const USER_LOGIN_URL = config.serverUrls.API_BASE_URL + '/user/login'
const USER_UPDATE_PROFILE_URL = config.serverUrls.API_BASE_URL + '/user/profile'

const login = {
  loginByUseNameAndPassword: (data) => {
    return request.$post(USER_LOGIN_URL, data)
  },
  updateUserProfile: (data) => {
    return request.$post(USER_UPDATE_PROFILE_URL, data)
  }
}

export default login
