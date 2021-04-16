import request from './index'
import config from '@/config'
const PORN_PAGE_URL = config.serverUrls.API_BASE_URL + '/video/list'
const PORN_LIKE_URL = config.serverUrls.API_BASE_URL + '/video/like'

const porn = {
  listPornPage (data) {
    return request.$post(PORN_PAGE_URL, data)
  },
  likePorn (data) {
    return request.$post(PORN_LIKE_URL, data)
  }
}
export default porn
