import request from './index'
import config from '@/config'
const NEWS_PAGE_URL = config.serverUrls.API_BASE_URL + '/sys/news/page'
const news = {
  listNewsPage (data) {
    return request.$post(NEWS_PAGE_URL, data)
  }
}
export default news
