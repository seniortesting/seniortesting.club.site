<template>
  <!-- Footer Start -->
  <footer class="footer white-bg clearfix wow fadeInUp" data-wow-duration="1.0s">
    <!--    <div class="scroll-top-btn">-->
    <!--      <a  class="waves-effect scroll-top position-absolute white-bg padding-all-1623 radius-full box-shadow-10 mr-30 top-0 mt-reverse-30 waves-effect"><i class="fa fa-angle-up font-25 dark-gray-text" /></a>-->
    <!--    </div>-->
    <div class="container">
      <div class="row">
        <!-- Col Start -->
        <div class="col-sm-6 col-md-6">
          <div class="social-icon">
            <ul>
              <li v-for="item in social" :key="item.name">
                <a :href="item.url"><i class="fab" :class="item.icon" aria-hidden="true" /></a>
              </li>
              <!--              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true" /></a></li>-->
              <!--              <li><a href="#"><i class="fa fa-rss" aria-hidden="true" /></a></li>-->
              <!--              <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true" /></a></li>-->
              <!--              <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true" /></a></li>-->
              <!--              <li><a href="#"><i class="fa fa-skype" aria-hidden="true" /></a></li>-->
              <!--              <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true" /></a></li>-->
              <!--              <li><a href="#"><i class="fa fa-tumblr" aria-hidden="true" /></a></li>-->
            </ul>
          </div>
        </div>
        <!-- Col End -->
        <!-- Col Start -->
        <div class="col-sm-6 col-md-6">
          <div class="copy-right">
            <p>Copyright &copy; {{ new Date().getFullYear() }} {{ name }}. All rights reserved.</p>
          </div>
        </div>
        <!-- Col End -->
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: 'FooterWhite',
  props: {
    name: {
      type: String,
      default: 'Heap Stack'
    },
    social: {
      type: Array,
      default: () => {
        return [
          {
            name: 'Facebook',
            icon: 'fa-facebook-f',
            url: '#'
          },
          {
            name: 'Twitter',
            icon: 'fa-twitter',
            url: '#'
          },
          {
            name: 'Linkedin',
            icon: 'fa-linkedin-in',
            url: '#'
          },
          {
            name: 'Instagram',
            icon: 'fa-instagram',
            url: '#'
          }
        ]
      }
    }
  }
}
</script>

<style scoped>
  .white-bg{
    background: #fff;
  }
  .clearfix {
    clear: both;
  }
  .top-0{
    top: 0;
  }
  .position-absolute{
    position:absolute;
  }
  .box-shadow-10{
    box-shadow: 0 5px 5px rgba(0,0,0,.1);
  }
  .radius-full{
    border-radius: 100%;
  }
  .padding-all-1623{
    padding: 16px 23px !important;
  }
  .mr-30 {
    margin-right: 30px;
  }
  .mt-reverse-30 {
    margin-top: -30px;
  }
  .waves-effect {
    position: relative;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
    vertical-align: middle;
    z-index: 1;
    will-change: opacity, transform;
    transition: all .3s ease-out;
  }
  .dark-gray-text{
    color: #666666;
  }
  .font-25 {
    font-size: 25px;
  }
  /* ================= Footer Area ==================== */
  .footer {
    padding:50px 0  40px;
    position:relative;
  }

  .social-icon ul {
    display:block;
    padding:0;
    margin:0;
  }

  .social-icon li {
    display:inline-block;
    padding:0 11px;
  }

  .social-icon li a {
    color:#000;
  }

  .social-icon li:hover a i {
    color:#63b7e6;
  }

  .social-icon li a i {
    font-size:25px;
  }

  .copy-right p {
    font-size:16px;
    color:#999999;
    text-align:right;
    margin-bottom:0;
  }

  .scroll-top-btn a {
    left:50%;
    transform:translateX(-50%);
    -webkit-transform:translateX(-50%);
    -ms-transform:translateX(-50%);
  }
  @media (max-width: 767px) {
    .footer .social-icon { text-align:center; padding-bottom:10px; }
    .footer .copy-right p { text-align:center; }
  }
</style>
