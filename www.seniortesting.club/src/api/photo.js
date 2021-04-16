import request from './index'
import config from '@/config'
const PHOTO_LIST_URL = config.serverUrls.API_BASE_URL + '/photo/list'
const PHOTO_RANDOM_URL = config.serverUrls.API_BASE_URL + '/photo/random'

const photo = {
  PHOTO_LIST_URL,
  listPhotoPage (data) {
    return request.$get(PHOTO_LIST_URL, { params: data })
  },
  randomPhoto (data) {
    return request.$get(PHOTO_RANDOM_URL, { params: data })
  }
}
export default photo
