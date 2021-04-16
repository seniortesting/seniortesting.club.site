<template>
  <div class="page-wrapper">
    <!--    重要通知部分-->
    <!--    <notify id="12" />-->
    <!--    <header-white />-->
    <header-purple
      :brand="brand"
      :data="menu"
      :button="button"
    />
    <div class="page-content">
      <transition name="fade-up">
        <nuxt-child keep-alive />
      </transition>
    </div>
    <footer-blue />
    <!--    <footer-white-two-row />-->
    <!--    <footer-white />-->
    <back-top />
  </div>
</template>

<script>
import backTop from '../components/backtop/back-top'
// import Notify from '../components/banner/notice/notify-message'
// import FooterWhiteTwoRow from '../components/footer/footer-white-two-row'
import FooterBlue from '../components/footer/footer-blue'
// import headerWhite from '@/components/header/header-White'
import headerPurple from '@/components/header/header-white'
// import DetailFooter from '@/components/footer/footer-detail'
// import FooterBlue from '@/components/footer/footer-purple'
// import FooterWhite from '@/components/footer/footer-white'
export default {
  name: 'HomeLayout',
  components: {
    headerPurple,
    // headerWhite,
    FooterBlue,
    // FooterWhiteTwoRow,
    // FooterWhite,
    // Notify,
    backTop
  },
  data () {
    return {
      brand: {
        title: 'JVFast管理框架',
        url: '/'
      },
      menu: [
        {
          title: '首页',
          url: '/'
        },
        {
          title: '快速开始',
          url: 'https://jvfast.gitee.io/quick-start/'
        },
        {
          title: '源码',
          url: 'https://gitee.com/jvfast/jvfast-vue/'
        },
        {
          title: '案例',
          url: '/case'
        },

        {
          title: '授权升级',
          url: '/vip'
        },
        {
          title: '技术服务',
          url: 'https://gitee.com/jvfast/jvfast-vue/issues/',
          list: [
            {
              title: '网站建设',
              url: ''
            },
            {
              title: '网络爬虫',
              url: ''
            }
          ]
        }

        // {
        //   title: '社区',
        //   list: [
        //     {
        //       title: '博客',
        //       url: 'https://code.pingbook.top/blog/'
        //     }
        //   ]
        // }
      ],
      button: [
        {
          title: '立即体验',
          url: 'https://jvfast.pingbook.top'
        }
      ]
    }
  }
}
</script>

<style scoped>
  .page-wrapper {
    position: relative;
    margin: 0 auto;
    width: 100%;
    min-width: 300px;
  }

  .page-content::before {
    /* background: linear-gradient(0deg, #97BEE5 15%, transparent 100%, rgba(0, 0, 0, 0) 100%); */
    content: "";
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    /*background: linear-gradient(to right, #43e97b 0%, #38f9d7 100%);*/
    opacity: .6;
    /*取消间隙*/
    margin: 0;
    padding: 0;
    border-radius: 0;
  }
</style>
