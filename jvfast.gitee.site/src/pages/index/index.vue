<template>
  <div>
    <!--    <hero-green />-->
    <hero-transparent />
    <!--    <hero-purple />-->
    <!--    <hero-blue />-->
    <!--    <hero-introduce />-->
    <!--    <feature-highlight />-->
    <!--    <feature-important />-->
    <!--    <feature-one-column />-->
    <!--    <features-three-column />-->
    <features-three-column-top
      title="功能特性"
      desc="JVFast框架天然集成服务端渲染功能，这可以帮助你的网站快速进行SEO优化，提高网站排名，增加流量<br/>其内置的功能模块和代码生成功能更能帮助快速开发通用系统功能"
      :data="features"
    />
    <!--    <service-we-offer />-->
    <!--    <team-four-image />-->

    <!--    <how-work-step />-->
    <!--    <client-four-column />-->
    <!--    <testtimonial-slide-nav />-->
    <!--    <why-choose-us />-->
    <!--    <contact-us />-->
    <!--    portfolio作品展示-->
    <!--    <portfolio-card />-->
    <!--    <portfolio-flow-->
    <!--      title="作品展示"-->
    <!--      :type="portfolioType"-->
    <!--    />-->
    <!--    <portfolio-white />-->
    <!--    <blog-slide-->
    <!--      title="新闻动态"-->
    <!--      desc=""-->
    <!--    />-->
    <!--    <blog-three-column />-->
    <!--    <statistic />-->
    <!--    <client-card />-->
    <!--    <explore />-->
    <!--    <how-work-white />-->
    <!--    <service-three-column-expert />-->
    <!--    <service-three-column />-->
    <!--    <fact-counter-four />-->

    <!--    <client-list />-->
    <!--    <get-in-touch />-->
    <!--    <testimonial-slide />-->
    <!--    <how-it-work-three-column />-->
    <!--    <service-two-column />-->
    <!--    <faq-collapse />-->
    <!--    <div :style="{background: 'url('+adsenseBgImg+')'}">-->
    <!--      <Adsense-->
    <!--        ins-style="display:block;text-align:center;width: 100%"-->
    <!--        data-ad-client="ca-pub-1893384651266286"-->
    <!--        data-ad-slot="3377657013"-->
    <!--        data-ad-format="auto"-->
    <!--        :data-full-width-responsive="true"-->
    <!--      />-->
    <!--    </div>-->
    <call-to-action />
  </div>
</template>

<script>
// import FaqLeftRight from '../../components/banner/faq/faq-left-right'
// import PriceTable from '../../components/banner/price-plan/price-table'
// import PartnerSlide from '../../components/banner/partner/partner-slide'
// import TestimonialSlide from '../../components/banner/testimonial/testimonial-slide'
// import HowItWorkThreeColumn from '../../components/banner/how-it-work/how-work-three-column'
// feature部分
// import FeatureImportant from '../../components/banner/feature/feature-important'
// import FeatureHighlight from '../../components/banner/feature/feature-highlight'
// import FeatureOneColumn from '../../components/banner/feature/feature-one-column'
// import FeaturesThreeColumn from '../../components/banner/feature/feature-three-column'
import FeaturesThreeColumnTop from '../../components/banner/feature/feature-three-column-top'

// import FaqCollapse from '../../components/banner/faq/faq-collapse'
// import ServiceTwoColumn from '../../components/banner/service/service-two-column'
// import HowWorkGreen from '../../components/banner/how-it-work/how-work-green'

// import GetInTouch from '../../components/banner/contact/get-in-touch'
// import HeroPurple from '../../components/banner/hero/hero-purple'
// import HeroBlue from '../../components/banner/hero/hero-blue'
// import HeroIntroduce from '../../components/banner/hero/hero-introduce'
// import HeroGreen from '../../components/banner/hero/hero-green'
import HeroTransparent from '../../components/banner/hero/hero-transparent'
// import ClientList from '../../components/banner/partner/client-list'
// import FactCounterFour from '../../components/banner/fact-counter/fact-counter-four'
// import ServiceThreeColumn from '../../components/banner/service/service-three-column'
// import serviceThreeColumnExpert from '../../components/banner/service/service-three-column-expert'
// import HowWorkWhite from '../../components/banner/how-it-work/how-work-white'
// import Explore from '../../components/banner/recommand/recommand-explore'
// import ClientCard from '../../components/banner/testimonial/client-card'
// import Statistic from '../../components/banner/fact-counter/statistic-counter-four'
// blog博客模块
// import BlogSlide from '../../components/banner/blog/blog-slide'
// import BlogThreeColumn from '../../components/banner/blog/blog-three-column'
// import WhyChooseUs from '../../components/banner/service/service-why-choose-us'
// import ContactUs from '../../components/banner/contact/contact-us'
// portfolio作品
// import PortfolioCard from '../../components/banner/portfolio/portfolio-card'
// import PortfolioFlow from '../../components/banner/portfolio/portfolio-waterfall'
// import PortfolioWhite from '../../components/banner/portfolio/portfolio-white'

// import TesttimonialSlideNav from '../../components/banner/testimonial/testimonial-slide-nav'
// import TeamFourColumn from '../../components/banner/team/team-four-column'
// import ClientFourColumn from '../../components/banner/partner/client-four-column'
// import HowWorkStep from '../../components/banner/how-it-work/how-work-step'
// import ServiceWeOffer from '../../components/banner/service/service-four-column'
// import TeamFourImage from '../../components/banner/team/team-four-image'
import CallToAction from '../../components/banner/notice/call-to-action'
// import Adsense from '../../components/vue-google-adsense/ads/AdsenseComponent'
export default {
  name: 'Index',
  components: {
    // FaqLeftRight,
    // PriceTable,
    // TestimonialSlide,
    // HowItWorkThreeColumn,
    // ServiceTwoColumn
    // HowWorkGreen,
    // feature部分
    // FeatureImportant,
    // FeatureHighlight,
    // FeatureOneColumn,
    // FeaturesThreeColumn,
    FeaturesThreeColumnTop,
    // BlogSlide,
    // BlogThreeColumn,
    // PortfolioCard,
    // PortfolioFlow,
    // PortfolioWhite,
    // GetInTouch,
    // HeroGreen,
    HeroTransparent,
    // Adsense
    CallToAction
    // HeroPurple,
    // HeroBlue,
    // HeroIntroduce,
    // ServiceWeOffer,
    // TeamFourImage,
    // HowWorkStep
    // ClientFourColumn
    // TeamFourColumn
    // TesttimonialSlideNav
    // WhyChooseUs,
    // ContactUs
    // Statistic
    // ClientCard
    // Explore
    // HowWorkWhite
    // serviceThreeColumnExpert
    // ServiceThreeColumn,
    // FactCounterFour
    // ClientList
    // FaqCollapse
  },
  data () {
    return {
      hero: require('@/assets/img/screen/laptop.png'),
      adsenseBgImg: require('@/assets/img/bg/hero-bg.jpg'),
      features: [
        {
          icon: require('@/assets/img/feature/feature-circle1.png'),
          title: '服务端渲染',
          desc: '采用Vue+Nuxt驱动,配置通用的前端插件模块，SEO优化排名从未如此丝滑',
          url: ''
        },
        {
          icon: require('@/assets/img/feature/feature-circle2.png'),
          title: '响应式布局',
          desc: 'HTML5+CSS3响应式设计，电脑端和手机端通用一套代码，开发一次，全端可用',
          url: ''
        },
        {
          icon: require('@/assets/img/feature/feature-circle4.png'),
          title: '权限安全控制',
          desc: '采用通用的Shiro安全认证框架，保证接口数据操作的安全',
          url: ''
        },
        {
          icon: require('@/assets/img/feature/feature-circle3.png'),
          title: '功能完善',
          desc: '内置系统，监控，常用第三方平台模块，代码生成等常用功能，可快速自由定制扩展模块',
          url: ''
        },
        {
          icon: require('@/assets/img/feature/feature-circle5.png'),
          title: '持续迭代更新',
          desc: '采用当前市面流行的最新前后端技术栈，保证技术社区活跃，功能完善，定期发布新版本，保持功能迭代更新',
          url: ''
        },
        {
          icon: require('@/assets/img/feature/feature-circle6.png'),
          title: '技术支持',
          desc: '多平台获取最新源码，快速响应功能需求和修复问题',
          url: ''
        }
      ],
      portfolioType: [
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
          value: '网页'
        },
        {
          key: 'card',
          value: '后端'
        },
        {
          key: 'card',
          value: '脚本'
        }
      ]
    }
  },
  head () {
    return {
      title: 'JVFast管理框架,最敏捷的前后端脚手架系统服务端渲染快速解决方案',
      meta: [
        { hid: 'description', name: 'description', content: 'JVFast管理框架是最敏捷的前后端脚手架系统快速解决方案,通用服务器端/SPA渲染,SEO优化' }
      ]
    }
  }
}
</script>

<style scoped>

</style>
