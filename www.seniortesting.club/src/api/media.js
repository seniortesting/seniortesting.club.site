import request from './index'
import config from '@/config'

const MEDIA_ADD_URL = config.serverUrls.API_BASE_URL + '/media/add'
const TAGS_PAGE_URL = config.serverUrls.API_BASE_URL + '/media/tags'
const MEDIA_SEARCH_URL = config.serverUrls.API_BASE_URL + '/media/search'

const media = {
  addMedia (data) {
    return request.$post(MEDIA_ADD_URL, data)
  },
  getTagsPage (data) {
    return request.$post(TAGS_PAGE_URL, data)
  },
  searchMedia (data) {
    return request.$post(MEDIA_SEARCH_URL, data)
  }
}
export default media
