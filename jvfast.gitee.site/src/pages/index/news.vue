<template>
  <div>
    <blog-slide
      title="最新动态"
      desc="采用最新的技术和工具整合以帮助用户获取最优体验和技术更新，我们会定期发布相关动态"
      :data="news"
    />
  </div>
</template>

<script>
import BlogSlide from '../../components/banner/blog/blog-slide'
import news from '../../api/news'
export default {
  name: 'News',
  components: { BlogSlide },
  data () {
    return {
      news: [
        {
          id: 1001,
          img: require('@/assets/img/news/sorellfruitfarm.png'),
          time: '26 April, 2020',
          author: 'Walter Hu',
          title: 'Sorell Fruit Farm website UI design and integeration',
          url: 'https://sorellfruitfarm.com/'
        },
        {
          id: 1002,
          img: require('@/assets/img/news/pingbook.png'),
          time: '20 March, 2020',
          author: 'Walter Hu',
          title: '评博客博客界面设计和文案整理',
          url: 'https://blog.pingbook.top/'
        },
        {
          id: 1003,
          img: require('@/assets/img/news/cvr.png'),
          time: '5 February, 2020',
          author: 'Walter Hu',
          title: 'CVR数据管理系统',
          url: 'https://console.cvr.yitieyilu.com/'
        }
      ]
    }
  },
  mounted () {
    this.fetchNews()
  },
  methods: {
    fetchNews () {
      const pageData = {
        pageNo: 1,
        pageSize: 5
      }
      news.listNewsPage(pageData).then((res) => {
        const resCode = res.code
        if (resCode === 0) {
          const resData = res.data.records
          this.news = resData
        }
      }).catch((err) => {
        console.log(err)
      })
    }
  },
  head () {
    return {
      title: '新闻动态 | JVFast管理框架',
      meta: [
        { hid: 'description', name: 'description', content: 'JVFast管理框架是最敏捷的前后端脚手架系统快速解决方案，通用服务器端/SPA渲染，SEO优化' }
      ]
    }
  }
}
</script>

<style scoped>

</style>
