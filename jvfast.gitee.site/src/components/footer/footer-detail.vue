<template>
  <!--Main Footer-->
  <footer class="main-footer">
    <!--Widgets Section-->
    <div class="auto-container">
      <!--Discuss Section-->
      <div class="discuss-section">
        <div class="inner-section">
          <div class="clearfix">
            <div class="pull-left">
              <h2>专业追求，极致体验</h2>
              <div class="text">
                获取最新更新的代码，快速构建企业级应用和解决方案
              </div>
            </div>
            <div class="btn-box pull-right">
              <a href="#" class="theme-btn btn-style-four"><span class="txt">沟通</span></a>
            </div>
          </div>
        </div>
      </div>

      <!--Widgets Section-->
      <div class="widgets-section">
        <div class="row clearfix">
          <!--Column-->
          <div class="big-column col-lg-6 col-md-12 col-sm-12">
            <div class="row clearfix">
              <!--Footer Column-->
              <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                <div class="footer-widget about-widget">
                  <div class="logo">
                    <a href="/"><img src="/img/logo.png" alt=""></a>
                  </div>
                  <div class="copyright">
                    Copyright &copy; {{ new Date().getFullYear() }} {{ name }}. All rights reserved.
                  </div>
                  <ul class="social-icon-one clearfix">
                    <li><a href="#" class="fas fa-twitter" /></li>
                    <li><a href="#" class="fas fa-facebook" /></li>
                    <li><a href="#" class="fas fa-linkedin" /></li>
                    <li><a href="#" class="fas fa-google-plus" /></li>
                    <li><a href="#" class="fas fa-dribbble" /></li>
                  </ul>
                </div>
              </div>

              <!--Footer Column-->
              <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                <div class="footer-widget links-widget">
                  <h2>关于我们</h2>
                  <ul class="list">
                    <li><a href="#">介绍</a></li>
                    <li><a href="#">隐私政策</a></li>
                    <li><a href="#">服务协议</a></li>
                    <li><a href="#">帮助</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!--Column-->
          <div class="big-column col-lg-6 col-md-12 col-sm-12">
            <div class="row clearfix">
              <!--Footer Column-->
              <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                <div class="footer-widget links-widget">
                  <h2>产品</h2>
                  <ul class="list">
                    <li><a href="#">全栈爬虫</a></li>
                    <li><a href="#">影视分享</a></li>
                    <li><a href="#">博客</a></li>
                  </ul>
                </div>
              </div>

              <!--Footer Column-->
              <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                <div class="footer-widget contact-widget">
                  <h2>联系我们</h2>
                  <div class="widget-content">
                    <div class="text">
                      上海市浦东新区东辰大厦13楼
                    </div>
                    <ul>
                      <li>电话: <a href="tel:13052113519">130 5211 3519</a></li>
                      <li>邮箱: <a href="mailto:support@rex-seo.com">alterhu2020@gmail.com</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
// import config from '@/config'
export default {
  name: 'DetailFooter',
  props: {
    name: {
      type: String,
      default: 'Heap Stack'
    }
  }
}
</script>

<style scoped>
  .auto-container{
    position:static;
    max-width:1200px;
    padding:0px 15px;
    margin:0 auto;
  }
  ul,li{
    list-style:none;
    padding:0px;
    margin:0px;
  }
  .pull-left {
    float: left;
  }
  .pull-right {
    float: right;
  }
  a{
    text-decoration:none;
    /* cursor:pointer; */
    color:#08c8af;
  }
  button,
  a:hover,a:focus,a:visited{
    text-decoration:none;
    outline:none !important;
  }
  .theme-btn{
    display:inline-block;
    transition:all 0.5s ease;
    -moz-transition:all 0.5s ease;
    -webkit-transition:all 0.5s ease;
    -ms-transition:all 0.5s ease;
    -o-transition:all 0.5s ease;
  }
  .theme-btn .txt{
    position:relative;
    z-index:1;
  }
  .btn-style-four{
    position: relative;
    cursor: pointer;
    color: #ffffff;
    font-weight: 600;
    font-size: 18px;
    border-radius: 2px;
    padding: 17px 42px;
    background-color: #f96d49;
    text-transform: capitalize;
    transition: all 500ms ease;
    -webkit-transition: all 500ms ease;
    -ms-transition: all 500ms ease;
    -o-transition: all 500ms ease;
  }
  .btn-style-four:before{
    content:'';
    position:absolute;
    left:0;
    top:0;
    width:100%;
    height:100%;
    background:#202020;
    border-radius: 2px;
    -webkit-transform-origin:left;
    -ms-transform-origin:left;
    transform-origin:left;
    -webkit-transform:scaleX(0);
    -ms-transform:scaleX(0);
    transform:scaleX(0);
    transition:all 0.5s ease;
    -moz-transition:all 0.5s ease;
    -webkit-transition:all 0.5s ease;
    -ms-transition:all 0.5s ease;
    -o-transition:all 0.5s ease;
  }

  .btn-style-four:hover:before{
    -webkit-transform:scaleX(1);
    -ms-transform:scaleX(1);
    transform:scaleX(1);
    -webkit-box-shadow:0px 0px 7px 1px rgba(0,0,0,0.20);
    -ms-box-shadow:0px 0px 7px 1px rgba(0,0,0,0.20);
    box-shadow:0px 0px 7px 1px rgba(0,0,0,0.20);
  }

  .btn-style-four:hover{
    color: #ffffff;
  }
  /**
  * main footer
  **/
  .discuss-section{
    position:relative;
    z-index:1;
  }

  .discuss-section .inner-section{
    position:relative;
    padding:45px 70px 60px;
    background-color:#ffffff;
    border-top:2px solid #08c8af;
    box-shadow:0px 0px 25px rgba(0,0,0,0.10);
  }

  .discuss-section .inner-section h2{
    position:relative;
    font-size:32px;
    color:#222222;
    font-weight:600;
    line-height:1.3em;
    margin-bottom:5px;
  }

  .discuss-section .inner-section .text{
    position:relative;
    font-size:16px;
    font-weight:300;
    line-height:1.4em;
    margin-top:8px;
  }

  .discuss-section .inner-section .btn-box{
    position:relative;
    margin-top:9px;
  }

  .main-footer{
    position:relative;
    overflow:hidden;
    padding:0px 0px 0px;
    background-color: #214787;
  }

  .main-footer:before{
    position: absolute;
    content: '';
    left: -15px;
    top: -40px;
    right: -15px;
    height: 100px;
    border-radius: 50%;
    background-color: #ffffff;
  }

  .main-footer .footer-widget{
    position:relative;
    margin-bottom:40px;
  }

  .main-footer .widgets-section{
    position:relative;
    padding:85px 0px 85px;
  }

  .main-footer .about-widget .logo{
    position:relative;
    margin-bottom:10px;
  }

  .main-footer .about-widget .copyright{
    position:relative;
    font-size:16px;
    font-weight:300;
    margin-bottom:40px;
    color:rgba(254,254,254,0.60);
  }

  /*Social Icon One*/

  .social-icon-one{
    position:relative;
  }

  .social-icon-one li{
    position:relative;
    margin-right:5px;
    color:#222222;
    font-size:18px;
    display:inline-block;
  }

  .social-icon-one li a{
    position:relative;
    width:35px;
    height:35px;
    font-size:15px;
    font-weight:400;
    text-align:center;
    line-height:33px;
    border-radius:50px;
    display:inline-block;
    transition:all 0.3s ease;
    -moz-transition:all 0.3s ease;
    -webkit-transition:all 0.3s ease;
    -ms-transition:all 0.3s ease;
    -o-transition:all 0.3s ease;
    color:rgba(255,255,255,0.30);
    border:1px solid rgba(255,255,255,0.30);
  }

  .social-icon-one li a:hover{
    color:#ffffff;
    border-color:#41acf3;
    background-color:#41acf3;
  }

  .theme_color{
    color:#08c8af;
  }

  img{
    display:inline-block;
    max-width:100%;
    height:auto;
  }

  .main-footer .footer-widget h2{
    position:relative;
    font-size:20px;
    font-weight:600;
    color:#ffffff;
    line-height:1.2em;
    margin-bottom:22px;
    text-transform:capitalize;
  }

  .main-footer .list{
    position:relative;
  }

  .main-footer .list li{
    position:relative;
    margin-bottom:8px;
  }

  .main-footer .list li a{
    position:relative;
    font-size:16px;
    font-weight:300;
    color:rgba(254,254,254,0.60);
    transition:all 300ms ease;
    -webkit-transition:all 300ms ease;
    -ms-transition:all 300ms ease;
    -o-transition:all 300ms ease;
  }

  .main-footer .list li a:hover{
    color:rgba(254,254,254,0.90);
  }

  /* Contact Widget */

  .contact-widget .text{
    position:relative;
    font-size:16px;
    font-weight:300;
    margin-bottom:20px;
    line-height:1.7em;
    color:rgba(254,254,254,0.60);
  }

  .contact-widget ul{
    position:relative;
  }

  .contact-widget ul li{
    position:relative;
    font-size:16px;
    font-weight:300;
    margin-bottom:0px;
    line-height:1.6em;
    color:rgba(254,254,254,0.60);
  }

  .contact-widget ul li a{
    color:rgba(254,254,254,0.60);
  }

  .contact-widget ul li a:hover{
    color:#ffffff;
  }

</style>
