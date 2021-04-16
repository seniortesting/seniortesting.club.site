<template>
  <div id="cases">
    <div class="sub-banner sub-banner__cases">
      <h2>客户的选择和信任是我们成长的动力</h2>
    </div>
    <portfolio-flow
      title="解决方案"
      :type="solutionType"
    />
    <div class="foot1">
      <h2>
        <span id="changenum"><count-up :delay="300" :end-val="3000" /></span>
        用户的选择，加入我们吧！
      </h2>
      <div class="zhuce-both">
        <span class="span1 ">
          <input type="text" class="input-phone letter18nor" placeholder="输入手机号码" maxlength="11" style="border-color: rgb(23, 152, 252);">
        </span>
        <a class="zhuce-a">
          <span class="zhuce-btn">输入手机号码</span>
        </a>
      </div>
    </div>
    <!--    <partner-->
    <!--      title="合作伙伴"-->
    <!--      desc="感谢所有合作伙伴和赞助商的支持！"-->
    <!--    />-->
  </div>
</template>

<script>
// import Partner from '../../components/banner/partner/client-list'
import PortfolioFlow from '../../components/banner/portfolio/portfolio-waterfall'

export default {
  name: 'Case',
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
      title: '案例,合作伙伴 | JVFast管理框架',
      meta: [
        { hid: 'description', name: 'description', content: 'JVFast管理框架是最敏捷的前后端脚手架系统快速解决方案，通用服务器端/SPA渲染，SEO优化' }
      ]
    }
  }
}
</script>

<style scoped>
  #cases .sub-banner {
    background: #DDD url('~assets/img/case/sub-cases.jpg') no-repeat center top;
    background-size: auto auto;
  }
  .sub-banner {
    height: 600px;
    background: #DDD;
  }
  .sub-banner h2 {
    text-align: center;
    line-height: 660px;
    color: #FFF;
    font-weight: bold;
    font-size: 36px;
  }

  .foot1 {
    width: 100%;
    padding-bottom: 48px;
    box-sizing: border-box;
    border-bottom: 1px solid #e1e4e6;
  }
  .foot1 h2 {
    color: #1f2122;
    font-size: 24px;
    letter-spacing: 1px;
    line-height: 31px;
    text-align: center;
    padding: 48px 0 40px 0;
  }
  .foot1 #changenum {
    font-size: 24px;
    letter-spacing: 2px;
  }

  .foot1 span {
    font-size: 18px;
    line-height: 24px;
    letter-spacing: 0;
  }
  .foot1 .zhuce-both {
    width: 525px;
    height: 50px;
    /* border: 2px solid black; */
    margin: auto;
  }
  .foot1 .span1 {
    float: left;
  }
  .foot1 span {
    font-size: 18px;
    line-height: 24px;
    letter-spacing: 0;
  }
  .letter18nor {
    font-size: 18px;
    letter-spacing: 1px;
    color: #1F2122;
  }
  .letter18nor {
    font-size: 18px;
    letter-spacing: 1px;
    color: #1F2122;
    line-height: 24px;
  }
  input {
    outline: none;
  }
  input {
    color: #44494b;
    box-sizing: border-box;
    height: 48px;
    width: 380px;
    border: 2px solid #1798fc;
    text-indent: 10px;
    border-radius: 2px 0 0 2px;
  }
  a {
    color: #1798FC;
  }
  a {
    text-decoration: none;
  }
  a {
    cursor: pointer;
  }
  .foot1 span.zhuce-btn {
    color: #FFFFFF;
    background: #1798FC;
    padding: 12px 0;
    float: left;
    cursor: pointer;
    margin-left: 0px;
    border-radius: 0 2px 2px 0;
    width: 145px;
    text-align: center;
  }
  .foot1 span {
    font-size: 18px;
    line-height: 24px;
    letter-spacing: 0;
  }
  .foot1 div.letter14red {
    padding-top: 5px;
    letter-spacing: 0px;
    width: 520px;
    margin: auto;
  }
  .letter14red {
    font-size: 14px;
    color: #F04134;
    line-height: 22px;
  }
  .hide {
    display: none;
  }
</style>
