<template>
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 footer-info">
            <!--            <h3>{{ name }}</h3>-->
            <div>
              <div class="row">
                <div class="col-lg-6 col-md-12 text-center">
                  <h5 style="padding-bottom: 10px;text-align: center">
                    JVFast微信群
                  </h5>
                  <img style="width: 130px;height: 130px;border-radius: 10px" src="https://gitee.com/walterhu2020/img-hub/raw/master/pingbook/wechatgroup2.png">
                </div>
                <div class="col-lg-6 col-md-12 text-center">
                  <h5 style="padding-bottom: 10px;text-align: center;">
                    JVFastQQ群
                  </h5>
                  <img style="width: 130px;height: 130px;border-radius: 10px" src="https://gitee.com/walterhu2020/img-hub/raw/master/pingbook/qqgroup2.png">
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>关于</h4>
            <ul>
              <li><a href="/aboutus">关于我们</a></li>
              <li><a href="/contact">商务合作</a></li>
              <li><a href="/news">进展动态</a></li>
              <li><a href="/agreement">用户协议</a></li>
              <li><a href="/privacy">隐私政策</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-6 footer-links">
            <h4>服务支持</h4>
            <ul>
              <li><a href="/solution">解决方案</a></li>
              <li><a href="https://blog.pingbook.top">评布客博客</a></li>
              <li><a href="/video" target="_blank">全网视频解析</a></li>
              <!--                            <li><a href="/scrapy">若伊后台框架</a></li>-->
              <!--                            <li><a href="/scrapy"></a></li>-->
              <!--              <li><a href="/framework">前后端框架/工具/类库</a></li>-->
              <!--              <li><a href="/mobile">移动开发</a></li>-->
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>联系我们</h4>
            <p>
              <!--              上海市浦东新区 <br>-->
              <!--              New York, NY 535022<br>-->
              <!--              United States <br>-->
              <strong>邮箱: </strong> <a class="email" href="mailto:alterhu2020@gmail.com"> alterhu2020@gmail.com</a><br>
              <strong>QQ群:</strong> <a class="email" target="_blank" href="https://jq.qq.com/?_wv=1027&k=5UOnVMh">JVFast学习交流</a><br>
            </p>

            <div class="social-links">
              <a id="wechat" title="WeChat"><i class="fab fa-weixin" /></a>
              <a href="https://jq.qq.com/?_wv=1027&k=5UOnVMh" title="QQ"><i class="fab fa-qq" /></a>
              <!--              <a href="#" title="WeiBo"><i class="fab fa-weibo" /></a>-->
              <a href="https://twitter.com/alterhu2020" title="Twitter"><i class="fab fa-twitter" /></a>
              <!--              <a href="https://www.linkedin.com/in/walter-hu-a6591591" title="linkedin"><i class="fab fa-linkedin" /></a>-->
            </div>
          </div>

          <!--          <div class="col-lg-3 col-md-6 footer-newsletter">-->
          <!--            <h4>Our Newsletter</h4>-->
          <!--            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>-->
          <!--            <form @submit.prevent="subscrible">-->
          <!--              <input v-model="email" type="email" name="email" style="outline: none"><input type="submit" value="Subscrible">-->
          <!--            </form>-->
          <!--          </div>-->
          <b-popover
            target="wechat"
            triggers="focus hover"
            placement="topleft"
          >
            <template v-slot:title>
              <h5 style="text-align: center">
                打开微信扫一扫
              </h5>
            </template>
            <template v-slot:default>
              <img style="width: 190px;height: 190px;" src="https://gitee.com/walterhu2020/img-hub/raw/master/pingbook/wechatgroup2.png">
            </template>
          </b-popover>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        Copyright &copy;{{ new Date().getFullYear() }} {{ name }}版权所有
      </div>
      <div class="credits" />
    </div>
  </footer><!-- #footer -->
</template>

<script>
export default {
  name: 'FooterBlue',
  props: {
    name: {
      type: String,
      default: 'JVFast框架'
    },
    desc: {
      type: String,
      default: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor nemo error sit voluptatem consectetur repellat.'
    }
  },
  data () {
    return {
      email: ''
    }
  },
  methods: {
    subscrible () {
      this.$toast.success('提交成功', {
        position: 'top-center',
        fitToScreen: true,
        icon: 'success'
      })
    }
  }
}
</script>

<style scoped>

  #footer {
    background: #00428a;
    padding: 0 0 30px 0;
    color: #eee;
    font-size: 14px;
  }

  #footer .footer-top {
    background: #00428a;
    padding: 60px 0 30px 0;
  }

  #footer .footer-top .footer-info {
    margin-bottom: 30px;
  }

  #footer .footer-top .footer-info h3 {
    font-size: 34px;
    margin: 0 0 20px 0;
    padding: 2px 0 2px 0;
    line-height: 1;
    font-family: "Montserrat", sans-serif;
    color: #fff;
    font-weight: 400;
    letter-spacing: 3px;
    text-transform: uppercase;
  }

  #footer .footer-top .footer-info p {
    font-size: 13px;
    line-height: 24px;
    margin-bottom: 0;
    font-family: "Montserrat", sans-serif;
    color: #ecf5ff;
  }

  #footer .footer-top .social-links a {
    font-size: 18px;
    display: inline-block;
    background: #007bff;
    color: #fff;
    line-height: 1;
    padding: 8px 0;
    margin-right: 4px;
    border-radius: 50%;
    text-align: center;
    width: 36px;
    height: 36px;
    transition: 0.3s;
  }

  #footer .footer-top .social-links a:hover {
    background: #0067d5;
    color: #fff;
  }

  #footer .footer-top h4 {
    font-size: 14px;
    font-weight: bold;
    color: #fff;
    text-transform: uppercase;
    position: relative;
    padding-bottom: 10px;
  }

  #footer .footer-top .footer-links {
    margin-bottom: 30px;
  }

  #footer .footer-top .footer-links ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  #footer .footer-top .footer-links ul li {
    padding: 8px 0;
  }

  #footer .footer-top .footer-links ul li:first-child {
    padding-top: 0;
  }

  #footer .footer-top .footer-links ul a {
    color: #ecf5ff;
  }

  #footer .footer-top .footer-links ul a:hover {
    color: #74b5fc;
  }

  #footer .footer-top .footer-contact {
    margin-bottom: 30px;
  }

  #footer .footer-top .footer-contact p {
    line-height: 26px;
  }

  #footer .footer-top .footer-newsletter {
    margin-bottom: 30px;
  }

  #footer .footer-top .footer-newsletter input[type="email"] {
    border: 0;
    padding: 6px 8px;
    width: 65%;
  }

  #footer .footer-top .footer-newsletter input[type="submit"] {
    background: #007bff;
    border: 0;
    width: 35%;
    padding: 6px 0;
    text-align: center;
    color: #fff;
    transition: 0.3s;
    cursor: pointer;
  }

  #footer .footer-top .footer-newsletter input[type="submit"]:hover {
    background: #0062cc;
  }

  #footer .copyright {
    text-align: center;
    padding-top: 30px;
  }

  #footer .credits {
    text-align: center;
    font-size: 13px;
    color: #f1f7ff;
  }

  #footer .credits a {
    color: #bfddfe;
  }

  #footer .credits a:hover {
    color: #f1f7ff;
  }
  #footer .email {
    text-decoration: none;
    color: #eee;
  }
</style>
