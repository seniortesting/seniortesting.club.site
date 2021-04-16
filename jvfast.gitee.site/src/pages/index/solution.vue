<template>
  <div>
    <portfolio-flow
      title="解决方案"
      :type="solutionType"
    />
  </div>
</template>

<script>
import PortfolioFlow from '../../components/footer/footer-white-two-row'

export default {
  name: 'Solution',
  components: { PortfolioFlow },
  data () {
    return {
      solutionType: [
        {
          key: 'all',
          value: '全部'
        },
        {
          key: 'app',
          value: '移动App'
        },
        {
          key: 'web',
          value: 'Web网站'
        },
        {
          key: 'scrapy',
          value: '爬虫'
        },
        {
          key: 'service',
          value: '前后端框架'
        }
      ]
    }
  },
  head () {
    return {
      title: '解决方案,企业方案 | JVFast管理框架',
      meta: [
        { hid: 'description', name: 'description', content: 'JVFast管理框架是最敏捷的前后端脚手架系统快速解决方案，通用服务器端/SPA渲染，SEO优化' }
      ]
    }
  }
}
</script>

<style scoped>

</style>
