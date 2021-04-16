<template>
  <div class="video">
    <!--    头部部分-->
    <!--  代码参考：https://baiyue.one/vip.html-->
    <header class="header-global">
      <nav
        id="navbar-main"
        class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom headroom--not-bottom headroom--pinned headroom--top"
      >
        <div class="container">
          <a class="navbar-brand mr-lg-5" href="https://blog.pingbook.top" /><a
            class="navbar-brand smooth "
            style="font-size: large"
            href="/"
          >全网视频解析</a>
          <!--
                <img src="../assets/img/brand/white.png"/></a>
            -->
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbar_global"
            aria-controls="navbar_global"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon" />
          </button>
          <div id="navbar_global" class="navbar-collapse collapse">
            <ul class="navbar-nav align-items-lg-center ml-lg-auto">
              <li class="nav-item">
                <a
                  class="nav-link nav-link-icon"
                  href="https://blog.pingbook.top"
                  target="_blank"
                  data-toggle="tooltip"
                  title="博客"
                  data-original-title="Follow us on Youtube"
                >
                  <i class="fa fa-piggy-bank" />
                  <span class="nav-link-inner--text d-lg-none">博客</span>
                </a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link nav-link-icon"
                  href="https://pingbook.top"
                  target="_blank"
                  data-toggle="tooltip"
                  title="JVFast管理系统"
                  data-original-title="See more shops"
                >
                  <i class="fa fa-chess-queen" />
                  <span class="nav-link-inner--text d-lg-none">JVFast</span>
                </a>
              </li>
              <!--              <li class="nav-item">-->
              <!--                <a-->
              <!--                  class="nav-link nav-link-icon"-->
              <!--                  href="https://space.bilibili.com/97254526"-->
              <!--                  target="_blank"-->
              <!--                  data-toggle="tooltip"-->
              <!--                  title=""-->
              <!--                  data-original-title="Follow us on Bilibili"-->
              <!--                >-->
              <!--                  <i class="fab fa-viadeo-square" />-->
              <!--                  <span class="nav-link-inner&#45;&#45;text d-lg-none">Bilibili</span>-->
              <!--                </a>-->
              <!--              </li>-->
              <!--              <li class="nav-item">-->
              <!--                <a-->
              <!--                  class="nav-link nav-link-icon"-->
              <!--                  href="https://pingbook.top"-->
              <!--                  target="_blank"-->
              <!--                  data-toggle="tooltip"-->
              <!--                  title=""-->
              <!--                  data-original-title="Star us on Github"-->
              <!--                >-->
              <!--                  <i class="fa fa-github" />-->
              <!--                  <span class="nav-link-inner&#45;&#45;text d-lg-none">首页</span>-->
              <!--                </a>-->
              <!--              </li>-->
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!--    主体部分-->
    <main class="profile-page">
      <section class="section-profile-cover section-shaped my-0">
        <!-- Circles background -->
        <div class="shape shape-style-1 shape-primary alpha-4">
          <span />
          <span />
          <span />
          <span />
          <span />
          <span />
          <span />
          <span />
          <span />
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew">
          <svg
            x="0"
            y="0"
            viewBox="0 0 2560 100"
            preserveAspectRatio="none"
            version="1.1"
            xmlns="http://www.w3.org/2000/svg"
          >
            <polygon class="fill-white" points="2560 0 2560 100 0 100" />
          </svg>
        </div>
      </section>
      <section class="section">
        <div class="container">
          <div class="card card-profile shadow mt--300 ">
            <div class="px-4">
              <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                  <div class="card-profile-image">
                    <a href="/video">
                      <img src="~/assets/img/logo.png" class="rounded-bottom">
                    </a>
                  </div>
                </div>
                <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                  <div class="card-profile-actions py-4 mt-lg-0">
                    <a
                      v-b-popover.hover.top="'使用方法：复制任意视频网站VIP播放链接，粘贴到下方的视频地址处，点击解析播放即可。'"
                      href=""
                      class="btn btn-sm btn-info float-right"
                      data-toggle="popover"
                      title="使用帮助"
                      data-content="使用方法：复制任意视频网站VIP链接，粘贴到视频地址栏，点击开始解析即可。"
                      data-original-title="说明帮助"
                    >使用帮助</a>
                    <!--                    <a-->
                    <!--                      v-b-popover.hover.top="'VIY云解析调用接口均为GitHub开源库，相关视频内容，非原始视频存档，内容大多为720p的高清视频。'"-->
                    <!--                      href="#"-->
                    <!--                      class="btn btn-sm btn-google-plus mr-4"-->
                    <!--                      data-toggle="popover"-->
                    <!--                      title="使用说明"-->
                    <!--                      data-content=""-->
                    <!--                      data-original-title="说明"-->
                    <!--                    >说明</a>-->
                  </div>
                </div>
                <div class="col-lg-4 order-lg-1">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <span class="heading">65</span>
                      <span class="description">解析线路</span>
                    </div>
                    <div>
                      <span class="heading">10+</span>
                      <span class="description">视频网站</span>
                    </div>
                    <div>
                      <span class="heading">1+</span>
                      <span class="description">全平台</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="hr mt-4" />
              <div class="row justify-content-center">
                <h5>线路更新日期：{{ updateDay }}</h5><span class="tip">声明: 所有视频播放线路资源均采集自网络,本站对其概不负责，亦不承担任何法律责任!</span>
              </div>
              <div class="hr mt-4" />
              <form>
                <div class="form-group row focused">
                  <span class="col-sm-2 col-form-label">请选择线路:</span>
                  <div class="col-sm-10">
                    <select id="api" v-model="api" class="form-control">
                      <option v-for="item in vipUrls" :key="item.value" :value="item.value">
                        {{ item.title }}
                      </option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <span class="col-sm-2 col-form-label">视频地址:</span>
                  <div class="col-sm-10">
                    <input id="url" v-model="videoUrl" type="text" class="form-control" placeholder="视频地址,例如：https://v.qq.com/x/cover/ihhsfwvvhcm16nd.html">
                  </div>
                </div>
                <div class=" text-center">
                  <button id="play" class="btn btn-success btn-round" @click.prevent="parseVideo">
                    <i class="fa fa-play" /> 解析播放
                  </button>
                </div>
              </form>

              <!--              <div class="main text-center sr-only sr-only-focusable">-->
              <!--                <div class="form-horizontal">-->
              <!--                  <div class="form-group focused">-->
              <!--                    <div class="col-sm-10">-->
              <!--                      <textarea id="apiList" rows="10" class="form-control">-->
              <!--                        http://api.baiyug.vip/index.php?url=-->
              <!--                http://www.82190555.com/index/qqvod.php?url=-->
              <!--                http://jiexi.071811.cc/jx2.php?url=-->
              <!--                http://beaacc.com/api.php?url=-->
              <!--                http://qxkkk.bid/jx/jx.php?url=-->
              <!--                http://o8ve.cn/1/?url=-->
              <!--                http://api.xyingyu.com/?url=-->
              <!--                http://api.greatchina56.com/?url=-->
              <!--                http://jx.618g.com/?url=-->
              <!--                http://api.baiyug.vip/index.php?url=-->
              <!--                http://api.xyingyu.com/?url=-->
              <!--                http://jx.iaeec.cn/jx.php/?url=-->
              <!--                https://api.flvsp.com/?url=-->
              <!--                http://jiexi.071811.cc/jx2.php?url=-->
              <!--                http://www.82190555.com/index/qqvod.php?url=-->
              <!--                https://api.flvsp.com/?url=-->
              <!--                http://www.82190555.com/index/qqvod.php?url=-->
              <!--                http://2gty.com/apiurl/yun.php?url=-->
              <!--                http://v.2gty.com/apiurl/yun.php?url=-->
              <!--                      </textarea>-->
              <!--                    </div>-->
              <!--                  </div>-->
              <!--                </div>-->
              <!--              </div>-->
              <div class="mt-5 py-5 border-top text-center">
                <div class="row justify-content-center">
                  <div class="col-sm-9">
                    <a class="btn btn-success mt-3" href="http://www.le.com/" rel="nofollow" target="_blank">乐视视频</a>
                    <a class="btn btn-danger mt-3" href="http://www.iqiyi.com/" rel="nofollow" target="_blank">奇艺视频</a>
                    <a class="btn btn-info mt-3" href="http://www.mgtv.com/" rel="nofollow" target="_blank">芒果视频</a>
                    <a
                      class="btn btn-warning  mt-3"
                      href="http://www.tudou.com/"
                      rel="nofollow"
                      target="_blank"
                    >土豆视频</a>

                    <br>
                    <div class="hr " />
                    <a class="btn btn-primary mt-3" href="http://v.qq.com/" rel="nofollow" target="_blank">腾讯视频</a>
                    <a class="btn btn-info mt-3" href="http://www.youku.com/" rel="nofollow" target="_blank">优酷视频</a>
                    <a class="btn btn-success mt-3" href="http://tv.sohu.com/" rel="nofollow" target="_blank">搜狐视频</a>
                    <a class="btn btn-success mt-3" href="https://bilibili.com/" rel="nofollow" target="_blank">哔哩哔哩</a>
                    <a class="btn btn-success mt-3" href="https://www.acfun.cn/" rel="nofollow" target="_blank">AcFun弹幕视频网</a>
                    <a class="btn btn-success mt-3" href="http://www.vzuu.com/" rel="nofollow" target="_blank">V 族网</a>
                    <a
                      class="btn btn-primary mt-3"
                      href="http://www.pptv.com/"
                      rel="nofollow"
                      target="_blank"
                    >pptv视频</a>
                  </div>
                </div>
              </div>
              <div class="mt-5 py-5 border-top text-center">
                <div class="row justify-content-center">
                  <div class="col-12">
                    <Adsense
                      ins-style="display:block;text-align:center;width: 100%;"
                      data-ad-client="ca-pub-1893384651266286"
                      data-ad-slot="3377657013"
                      data-ad-format="auto"
                      :data-full-width-responsive="true"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--      页脚部分-->
      <footer class="footer">
        <div class="container">
          <div class="row row-grid align-items-center mb-5">
            <div class="col-lg-6">
              <h3 class="text-primary font-weight-light mb-2">
                全网视频解析,感谢分享！
              </h3>
            </div>
            <div class="col-lg-6 text-lg-center btn-wrapper">
              <a
                target="_blank"
                href="https://jq.qq.com/?_wv=1027&k=5UOnVMh"
                class="btn btn-neutral btn-icon-only btn-twitter btn-round btn-lg"
                data-toggle="tooltip"
                data-original-title="Follow us"
              >
                <i class="fab fa-qq" />
              </a>
              <!--              <a-->
              <!--                target="_blank"-->
              <!--                href="https://jvfast.pingbook.top"-->
              <!--                class="btn btn-neutral btn-icon-only btn-facebook btn-round btn-lg"-->
              <!--                data-toggle="tooltip"-->
              <!--                title="JVFast系统"-->
              <!--                data-original-title="Like us"-->
              <!--              >-->
              <!--                <i class="fab fa-youtube" />-->
              <!--              </a>-->
              <!--              <a-->
              <!--                target="_blank"-->
              <!--                href="https://space.bilibili.com/97254526"-->
              <!--                class="btn btn-neutral btn-icon-only btn-dribbble btn-lg btn-round"-->
              <!--                data-toggle="tooltip"-->
              <!--                data-original-title="Follow us"-->
              <!--              >-->
              <!--                <i class="fab fa-dribbble" />-->
              <!--              </a>-->
              <a
                target="_blank"
                href="https://blog.pingbook.top"
                class="btn btn-neutral btn-icon-only btn-github btn-round btn-lg"
                data-toggle="tooltip"
                data-original-title="Star on Github"
              >
                <i class="fa fa-piggy-bank" />
              </a>
            </div>
          </div>
          <hr>
          <div class="row align-items-center justify-content-md-between">
            <div class="col-md-6">
              <div class="copyright">
                © {{ new Date().getFullYear() }}
                <a href="https://blog.pingbook.top" target="_blank">品博客</a> 版权所有
              </div>
            </div>
            <div class="col-md-6">
              <ul class="nav nav-footer justify-content-end">
                <li class="nav-item">
                  <a href="https://blog.pingbook.top" class="nav-link" target="_blank">博客</a>
                </li>
                <!--                <li class="nav-item">-->
                <!--                  <a href="https://pingbook.top" class="nav-link" target="_blank">JVFast系统</a>-->
                <!--                </li>-->
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </main>
  </div>
</template>

<script>
import Adsense from '../../components/vue-google-adsense/ads/AdsenseComponent'
import vipData from './vipdata'
import { subtractDay } from '@/util/DateUtil'
export default {
  name: 'PlayerHome',
  components: { Adsense },
  data () {
    return {
      vipUrls: vipData,
      api: vipData[0].value,
      videoUrl: ''
    }
  },
  computed: {
    updateDay () {
      return subtractDay(1)
    }
  },
  watch: {
    $route: {
      handler (to, from) {
        setTimeout(() => { // 避免首次获取不到window._czc
          if (window._czc) {
            const location = window.location
            const contentUrl = location.pathname + location.hash
            const refererUrl = '/'
            // 用于发送某个URL的PV统计请求，
            window._czc.push(['_trackPageview', contentUrl, refererUrl])
          }
        }, 300)
      },
      immediate: true // 首次进入页面即执行
    }
  },
  mounted () {
    this.initCNZZ()
  },
  methods: {
    parseVideo () {
      if (!this.videoUrl) {
        this.$toasted.error('视频地址不能为空!')
        return
      }
      const routeData = this.$router.resolve({ name: 'video-player', query: { api: this.api, url: this.videoUrl } })
      window.open(routeData.href, '_blank')
    },
    initCNZZ () {
      // 添加脚本
      const script = document.createElement('script')
      script.src = 'https://s4.cnzz.com/z_stat.php?id=1278031322&web_id=1278031322'
      script.language = 'JavaScript'
      script.id = 'cnzz'
      document.body.appendChild(script)
    }
  },
  head () {
    return {
      title: '支持爱奇艺、优酷、土豆、乐视、搜狐等视频解析|全网VIP影视会员解析',
      meta: [
        { hid: 'description', name: 'description', content: 'VIP视频云解析,支持爱奇艺、优酷、土豆、乐视、搜狐等视频解析.' }
      ]
    }
  }
}
</script>

<style>
@import url('../../assets/css/argon.min.css');
  .video {
    font-family: 'Open Sans',sans-serif;
    font-size: 1.2rem;
    font-weight: 400;
    line-height: 1.5;
    margin: 0;
    text-align: left;
    color: #525f7f;
    /*background-color: #fff;*/
  }
  .tip {
    margin-left: 13px;
    align-content: center;
    margin-top: 5px;
    font-size: 12px;
  }
</style>
