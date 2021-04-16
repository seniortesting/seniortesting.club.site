import AOS from 'aos'

import 'aos/dist/aos.css'
// 参考： https://www.yasminzy.com/nuxt/aos.html#steps
export default ({ app }) => {
  app.AOS = new AOS.init({ disable: 'phone' }) // eslint-disable-line new-cap
}
