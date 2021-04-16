import request from './index'
import config from '@/config'
const FEEDBACK_SAVE_URL = config.serverUrls.API_BASE_URL + '/sys/feedback/add'
const feedback = {
  saveFeedback (data) {
    return request.$post(FEEDBACK_SAVE_URL, data)
  }
}

export default feedback
