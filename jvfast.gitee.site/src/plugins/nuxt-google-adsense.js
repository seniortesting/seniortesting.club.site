import Vue from 'vue'
import Ads from '../components/vue-google-adsense/VueGoogleAdsense'
export default () => {
  Vue.use(require('vue-script2'))

  Vue.use(Ads.AutoAdsense, { adClient: 'ca-pub-1893384651266286' })
  Vue.use(Ads.Adsense)
  Vue.use(Ads.InArticleAdsense)
  Vue.use(Ads.InFeedAdsense)
}
