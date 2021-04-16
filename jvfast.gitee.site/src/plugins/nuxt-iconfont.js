import config from '@/config'
import { loadStyle } from '@/util/DomUtil'

const iconfontVersions = config.iconfont
const iconfontUrl = `//at.alicdn.com/t/$t.css`

export default () => {
  iconfontVersions.forEach((v) => {
    loadStyle(iconfontUrl.replace('$t', v))
  })
}
