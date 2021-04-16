<template>
  <div style="height: 100%;background-color:#333;">
    <div id="alertBox" class="alertBox" style="top: 30.48px;">
      <div style="padding-top:8px" />

      <button
        type="button"
        class="alertBoxBut"
        title="返回原播放地址"
        @click="backUrl"
      >
        ×
      </button>

      <div style="padding:0px 20px 5px;">
        <h4 style="font-size:14px;">
          提示：浏览器首次打开请先点击「<a
            href="http://www.macromedia.com/go/getflashplayer"
            target="_blank"
          ><b>Flash插件</b></a>」允许安装Flash插件，如视频无法正常播放，请更换线路重新播放。&nbsp;&nbsp;<a
            href="#"
            title="使用教程"
            @click.prevent="howModal=!howModal"
          ><b>使用教程</b>
          </a>・<a
            href=""
            @click.prevent="saveUrl"
          >
            <b>收藏</b></a>
          ・<a
            href="https://cdn.80note.com/erwwma.png"
            @click.prevent="helpModal=!helpModal"
          ><b>帮助/反馈</b></a>
          <!--          ・<a-->
          <!--            href="https://cdn.80note.com/ds.jpg"-->
          <!--            target="_blank"-->
          <!--          ><b>帮助/反馈</b>-->
          <!--          </a>-->
        </h4>
      </div>
      <!--视频box区域-->
      <iframe
        id="palybox"
        :src="playUrl"
        allowtransparency="true"
        frameborder="0"
        scrolling="no"
        allowfullscreen="true"
        name="jx_play"
        style="height: 533.4px;"
      />

      <div class="url-box">
        <div class="input-group row">
          <div class="col-lg-8 col-md-6 col-sm-12">
            <input
              id="url"
              v-model="url"
              type="text"
              class="form-control url-text"
              aria-label="Text input with segmented button dropdown"
              placeholder="请粘贴VIP视频网址"
              title="请复制你想要看的视频网址，粘贴到此处点击解析播放即可！"
            >
          </div>
          <div class="col-lg-2 col-md-3 col-sm-6">
            <div class="input-group-addon">
              <select id="jk" v-model="api" class="url-c url-text" title="如发现视频无法正常播放请更换线路重新播放！">
                <option v-for="item in vipUrls" :key="item.value" :value="item.value">
                  {{ item.title }}
                </option>
              </select>
            </div>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-6">
            <div class="input-group-btn">
              <button
                type="button"
                class="btn btn-default btn-play"
                title="点击开始解析并开始播放"
                @click.prevent="play"
              >
                解析播放
              </button>
            </div>
          </div>
        </div>
      </div>
      <div style="padding-bottom:10px" />
    </div>
    <!--    弹出框-->
    <b-modal v-model="howModal" dialog-class="zdlg" hide-footer title="使用说明">
      <p>1. 在优酷、腾讯、爱奇艺、芒果、土豆等各大视频网站观看vip视频，进入需要看的视频页</p>
      <p>2. 复制视频地址到下方的输入框中即可</p>
      <div>
        <Adsense
          ins-style="display:block;text-align:center;width: 100%;"
          data-ad-client="ca-pub-1893384651266286"
          data-ad-slot="3377657013"
          data-ad-format="auto"
          :data-full-width-responsive="true"
        />
      </div>
    </b-modal>
    <b-modal v-model="helpModal" dialog-class="zdlg" hide-footer title="帮助反馈">
      <p>发送邮箱：<a href="mailto:alterhu2020@gmail.com" target="_blank">alterhu2020@gmail.com</a></p>
      <div>
        <Adsense
          ins-style="display:block;text-align:center;width: 100%;"
          data-ad-client="ca-pub-1893384651266286"
          data-ad-slot="3377657013"
          data-ad-format="auto"
          :data-full-width-responsive="true"
        />
      </div>
    </b-modal>
  </div>
</template>

<script>
import Adsense from '../../components/vue-google-adsense/ads/AdsenseComponent'
import vipData from './vipdata'

export default {
  name: 'Player',
  components: { Adsense },
  validate ({ params, query, store }) {
    return query.url && query.api
  },
  data () {
    return {
      howModal: false,
      helpModal: false,
      vipUrls: vipData,
      url: '',
      api: vipData[0].value
    }
  },
  computed: {
    playUrl () {
      return this.api + this.url
    }
  },
  mounted () {
    console.log(' VIP视频解析-免费无广告客户端解析！')
    this.parseParameters()
    this.listenClipboard()
    this.preventDebugger()
  },
  methods: {
    parseParameters () {
      const api = this.$route.query.api
      const url = this.$route.query.url
      this.url = url
      this.api = api
    },
    play () {
      this.$router.replace({ query: { url: this.url, api: this.api } })
    },
    backUrl () {
      location.href = this.url
    },
    saveUrl () {
      const url = window.location || 'https://pingbook.top/video'
      const title = document.title || 'VIP视频播放'
      const ua = navigator.userAgent.toLowerCase()
      if (ua.includes('360se')) {
        alert('由于360浏览器功能限制，请按 Ctrl+D 手动收藏！')
      } else if (ua.includes('msie 8')) {
        window.external.AddToFavoritesBar(url, title) // IE8
      } else if (document.all) {
        try {
          window.external.addFavorite(url, title)
        } catch (e) {
          alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!')
        }
      } else if (window.sidebar) {
        window.sidebar.addPanel(title, url, '')
      } else {
        alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!')
      }
    },
    listenClipboard () {
      // 监听的是paste粘贴事件
      // document.body.addEventListener('paste', function (event) {
      //   const items = event.clipboardData && event.clipboardData.items
      //   if (items && items.length) {
      //     const item = items[0]
      //     if (item.kind === 'string') {
      //       item.getAsString((str) => {
      //         this.url = str
      //       })
      //     } else if (item.kind === 'file') {
      //
      //     }
      //   }
      // })
    },
    preventDebugger () {
      setInterval(function () {
        const t1 = new Date().getTime()
        // eslint-disable-next-line no-debugger
        debugger
        const t2 = new Date().getTime()
        if (t2 - t1 > 100) {
          let tt = ''
          for (let i = 0; i < 10000000; i++) {
            tt += i.toString()
            history.pushState(0, 0, tt)
          }
        }
      }, 500)
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

<style scoped>
  * {
    margin: 0;
    padding: 0;
    font-family: Arial, "Microsoft Yahei", sans-serif, "å®‹ä½“";
  }
  a{
    text-decoration: none;
  }

  body::-webkit-scrollbar {
    width: 5px;
    height: 5px;
  }

  body::-webkit-scrollbar-button {
    width: 0;
    height: 0;
    background-color: royalblue;
  }

  body::-webkit-scrollbar-track {
    background: #ccc;
    border-radius: 5px;
  }

  body::-webkit-scrollbar-thumb {
    background: #0093ff;
    border-radius: 5px;
  }

  body::-webkit-scrollbar-corner {
    background: #82AFFF;
  }

  /*body::-webkit-scrollbar-resizer {*/
  /*  background: #FF0BEE;*/
  /*}*/

  .btnColor-jb {}

  header {
    background: #333333;
  }

  header a {
    color: #fff;
  }

  header .container {
    padding: 0;
  }

  header nav.navbar {
    margin-bottom: 0;
  }

  header nav.navbar-default {
    background-color: transparent;
    border: 0;
  }

  header .navbar-brand {
    padding: 0px 0px;
    margin: 4px 10px;
  }

  .icon-bar {
    background-color: #fff !important;
  }

  header .navbar-toggle {
    border: none;
  }

  .navbar-default .navbar-toggle:hover,
  .navbar-default .navbar-toggle:focus {
    background-color: #333333;
  }

  .navbar-default .navbar-nav>li>a:hover,
  .navbar-default .navbar-nav>li>a:focus {
    color: #fff;
    background-color: transparent;
  }

  .logo {
    display: inline-block;
    width: 150px;
    height: 42px;
    float: left;
    background-position: -183px 0;
    /*background-image: url(../img/jingling.png);*/
    background-repeat: no-repeat;
  }

  .video-box {
    /*background-image: url(../img/mbj.jpg);*/
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;
    margin-top: 50px;
    padding-right: 8px;
    padding-left: 8px;
    position: relative;
  }

  .video-box>.container {
    padding-right: 0px;
    padding-left: 0px;
  }

  #palybox {
    width: 100%;

  }

  .tit-name {
    text-align: center;
    line-height: 35px;
    margin-top: 20px;
    vertical-align: middle;
    color: #3376f3;
    background: #0f1856;
    vertical-align: middle;
    text-overflow: ellipsis;
    white-space: nowrap;
    word-wrap: normal;
  }

  .tit-name h1 {
    display: inline-block;
    font-size: 16px;
    width: 70%;
    overflow: hidden;
    margin-top: 0px;
    margin-bottom: 0px;
    vertical-align: middle;
    text-overflow: ellipsis;
    white-space: nowrap;
    word-wrap: normal;
  }

  .url-text {
    height: 35px;
    padding-left: 15px;
    border: 1px solid #060c37;
    background: #060c37;
    color: #3376f3;
  }

  .url-box {
    background: #0f1856;
  }

  div.url-box .input-group-addon {
    padding: 0;
    border: none;
  }

  .url-text:focus {
    border-color: #66afe9;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
  }

  .btn-play {
    height: 35px;
    padding: 0 10px;
    color: #fff;
    border: none;
    background: -webkit-linear-gradient(to left, #19c3ff, #0093ff);
    /* Safari 5.1 - 6.0 */
    background: -o-linear-gradient(to left, #19c3ff, #0093ff);
    /* Opera 11.1 - 12.0 */
    background: -moz-linear-gradient(to left, #19c3ff, #0093ff);
    /* Firefox 3.6 - 15 */
    background: linear-gradient(to left, #19c3ff, #0093ff);
    /*  */
  }

  div.url-box .input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle) {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
  }

  div.url-box .btn-play:focus {
    outline-style: none;
    color: #FFFFFF;
  }

  div.url-box .btn-play:active {
    color: #0093ff;
    background: -webkit-linear-gradient(to left, #ffb199, #fa709a);
    /* Safari 5.1 - 6.0 */
    background: -o-linear-gradient(to left, #ffb199, #fa709a);
    /* Opera 11.1 - 12.0 */
    background: -moz-linear-gradient(to left, #ffb199, #fa709a);
    /* Firefox 3.6 - 15 */
    background: linear-gradient(to left, #ffb199, #fa709a);
    /* */
  }

  div.url-box .btn-play:hover {
    color: #FFFFFF;
  }

  .tit-gg {
    text-align: center;
    line-height: 35px;
    margin-bottom: 80px;
    vertical-align: middle;
    color: #3376f3;
    background: #0f1856;
    vertical-align: middle;
    text-overflow: ellipsis;
    white-space: nowrap;
    word-wrap: normal;
  }
  /*logo*/
  .title-tit {
    font-family: "å¾®è½¯é›…é»‘";
    padding: 20px 0 10px;
  }
  .title-tit h4 {
    display: inline-block;
    border-left: 5px solid #0093FF;
    padding-left: 10px;
    font-size: 16px;
    line-height: 1rem;
    font-weight: bold;
  }
  .title-tit p {
    display: inline-block;
    font-size: 12px;
    color: #555555;
  }
  .logo-lie {
    background: #fff;
    text-align: center;
    padding: 4px 10px;
    border-radius: 4px;
    border: 1px solid #EEEEEE;
    -webkit-transition: border linear .2s, box-shadow linear .2s;
    -moz-transition: border linear .2s, box-shadow linear .2s;
    -o-transition: border linear .2s, box-shadow linear .2s;
    transition: border linear .2s, box-shadow linear .2s;
  }

  .logo-lie a {
    text-align: center;
  }

  .logo-box>.container>.row>.col-xs-4 {
    padding-right: 5px;
    padding-left: 5px;
    margin-bottom: 5px;
  }

  .logo-box>.container>.row>.col-lg-12 {
    padding-right: 0px;
    padding-left: 0px;
  }
  /*è¯„è®ºåŒº*/
  .cy-box .container{
    padding-right: 0px;
    padding-left: 0px;
  }

  /*é¡µå°¾*/
  .footer{
    margin-top: 30px;
    background:#26282c;
  }
  .branding_link{
    display: none;
    text-align: center;
  }
  .footer-tit{
    text-align: center;
    color: #888;
  }
  .toot-tto{
    margin-bottom:3em;
  }
  .foot-tt{
    color: #777777;
  }
  .counter{
    margin: 15px 0;
    color: rgba(255, 255, 255, 0.7);
  }
  /**/
  .ch1{
    display: none;
  }
  /**/

  @media (min-width: 768px) {
    a{
      text-decoration: none;
    }
    a:hover{
      text-decoration: none;
    }

    /**/
    header {
      background: #fff;
      background: #FFFFFF;
      width: 100%;
      height: 70px;
      box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.27);
      -webkit-box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.27);
    }
    header a {
      color: #333;
    }
    header .navbar>.container-fluid .navbar-brand {
      margin-left: 0px;
    }
    header .container-fluid {
      padding-right: 0px;
      padding-left: 0px;
    }
    header .navbar-brand {
      margin: 14px 0px;
      margin-left: 0px;
      line-height: 40px;
    }
    .video-box{
      margin-top: 70px;
    }
    .nav .open>a,
    .nav .open>a:hover,
    .nav .open>a:focus {
      border-color: #0093ff;
    }
    .logo {
      background-position: 0px 0;
    }
    header .navbar-nav>li>a {
      line-height: 40px;
      color: #333 !important;
      padding-bottom: 11px;
      border-bottom: 4px solid #fff;
      transition: all 0.5s;
      -webkit-transition: all 0.5s;
    }
    header .navbar-nav>li>a:hover {
      color: #0093ff !important;
      border-bottom: 4px solid #0093ff;
    }
    header .active {
      background-color: transparent;
    }
    header .navbar-nav>li>a:focus {
      background-color: transparent !important;
    }
    header ul.dropdown-menu {
      border: 1px solid #0093FF;
      box-shadow: 0 3px 6px rgba(0, 0, 0, .175);
    }
    .weibo-box {
      width: 300px;
      height: 530px;
    }
    .weibo-tit {
      text-align: center;
    }
    .video-box {
      /*background: url(../img/video.jpg);*/
      background-repeat: no-repeat;
      background-size: cover;
      width: 100%;
    }
    /*palyboxè*/
    #palybox {
      height: 659px;
    }
    .tit-name {
      text-align: left;
      margin-top: 30px;
      padding: 10px 20px;
      color: #fff;
      /*background: #fff;*/
      /*color: #333;*/
      border-radius: 5px 5px 0 0;
      background: rgba(0,0,0,.49);
    }
    .tit-name h1{
      font-size: 1.2em;
    }

    .tit-name span {
      color: #b2b2b2;
      font-size: 1em;
      vertical-align: middle;
    }
    .url-box {
      background: #fff;

    }
    .url-text {
      height: 40px;
      background: #f2f3f5;
      border: 1px solid #f2f3f5;
      border-right: 0px;
      border-radius: 20px 0 0 20px;
    }
    .btn-play {
      height: 40px;
      color: #fff;
      padding: 0 40px;
      border-radius: 20px;
    }
    div.url-box .btn-play:hover {
      color: #FFFFFF;
      background: -webkit-linear-gradient(to left, #ffb199, #fa709a);
      /* Safari 5.1 - 6.0 */
      background: -o-linear-gradient(to left, #ffb199, #fa709a);
      /* Opera 11.1 - 12.0 */
      background: -moz-linear-gradient(to left, #ffb199, #fa709a);
      /* Firefox 3.6 - 15 */
      background: linear-gradient(to left, #ffb199, #fa709a);
      /*  */
    }
    .url-c {
      border-radius: 0px 0 0 0px;
      padding: 0 15px;
      box-shadow: 0px 1px 2px rgba(153, 153, 153, 0.32) inset;
    }
    div.url-box .input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle) {
      border-top-right-radius: 20px;
      border-bottom-right-radius: 20px;
    }
    .tit-gg {
      text-align: left;
      border-top: 1px solid #F5F5F5;
      padding: 10px 20px;
      background: #fff;
      color: #999;
    }
    /*logo*/
    .logo-box>.container {
      padding-right: 0px;
      padding-left: 0px;
    }
    .logo-box>.container>.row {
      margin-right: 0px;
      margin-left: 0px;
    }
    .title-tit {
      font-family: "å¾®è½¯é›…é»‘";
      padding: 50px 0 10px;
      margin-bottom: 10px;
    }
    .title-tit h4 {
      display: inline-block;
      border-left: 5px solid #0093FF;
      padding-left: 10px;
      font-size: 16px;
      font-weight: bold;
    }
    .title-tit p {
      padding-left: 20px;
      display: inline-block;
      font-size: 12px;
      color: #555555;
    }
    .logo-box>.col-sm-2 {
      padding-right: 0px;
      padding-left: 0px;
    }
    .logo-box>.container>.row>.col-xs-4 {
      margin-bottom: 15px;
    }
    .logo-lie {
      padding: 10px 15px;
    }
    .logo-lie:hover {
      border: 1px solid #0093FF;
      box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(0, 147, 255, .6);
    }
    /*é¡µå°¾*/
    .footer{
      background:#333;
    }
    .footer a:hover{
      color: #0093ff;
    }
    .branding_link{
      display: block;
      text-align: center;
      padding: 10px 0;
    }
    /*ä¾§æ»‘*/
    .ch1 {
      display: block;
      position: fixed;
      width: 50px;
      z-index: 999;
      left: 10%;
      bottom: 30%;
    }

    .ch1 a {
      display: inline-block;
    }

    .ch {
      position: fixed;
      width: 50px;
      z-index: 999;
      right: 15px;
      bottom: 15px;
    }
    .rollbar-weibo {
      /*background: url(../img/ce.png) no-repeat scroll -156px 0px;*/
    }

    .rollbar-weibo,
    .rollbar-item,
    .rollbar-weix {
      text-align: center;
      height: 50px;
      border-radius: 0px;
      background-color: #666;
      color: #fff;
      opacity: 0.5;
      cursor: pointer;
      -webkit-transition: all .3s ease-in-out;
      -moz-transition: all .3s ease-in-out;
      transition: all .3s ease-in-out;
    }

    .rollbar-weibo a,
    .rollbar-item a {
      width: 50px;
      height: 50px;
      display: inline-block;
    }

    .rollbar-item {
      /*background: url(../img/ce.png) no-repeat scroll -208px 0px;*/
    }

    .rollbar-item:hover,
    .rollbar-weibo:hover,
    .rollbar-weix:hover {
      color: #fff;
      opacity: 0.9;
    }

    .rollbar-weix {
      /*background: url(../img/ce.png) no-repeat scroll -104px 0px;*/
    }

    .rollbar-weix:hover .weixinx {
      display: block;
    }

    .weixinx {
      display: none;
      width: 164px;
      height: 206px;
      position: absolute;
      left: -164px;
      bottom: 0;
      -webkit-transition: all .3s ease-in-out;
      -moz-transition: all .3s ease-in-out;
      transition: all .3s ease-in-out;
    }

    .weixinx {
      /*background: url(../img/ce.png) no-repeat scroll 0px -52px;*/
    }
  }
  /*// 基本样式*/
  .alertBox{
    position: absolute;right: 0;left: 0;
    z-index:99;
    opacity:1;
    width:70%;
    margin:0 auto 0px;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 6px;
    background-color:#FFF;
    background-clip: padding-box;
    box-shadow: 0 5px 10px rgba(0,0,0,1);

  }

  .alertBoxBut{
    position:absolute;
    top:0;
    right:5px;
    font-size:30px;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    cursor: pointer;
    border:0;
    background:0 0;

  }
  .zlg {
    z-index: 100003333333;
  }
</style>
