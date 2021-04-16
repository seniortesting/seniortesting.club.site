<template>
  <!--footer start-->
  <footer id="footer" class="footer">
    <div class="container">
      <div class="footer-menu">
        <div class="row">
          <div class="col-sm-3">
            <div class="navbar-header">
              <a class="navbar-brand" href="index.html">{{ name }}</a>
            </div><!--/.navbar-header-->
          </div>
          <div class="col-sm-9">
            <ul class="footer-menu-item">
              <li class="scroll">
                <a href="#works">how it works</a>
              </li>
              <li class="scroll">
                <a href="#explore">explore</a>
              </li>
              <li class="scroll">
                <a href="#reviews">review</a>
              </li>
              <li class="scroll">
                <a href="#blog">blog</a>
              </li>
              <li class="scroll">
                <a href="#contact">contact</a>
              </li>
              <li class=" scroll">
                <a href="#contact">my account</a>
              </li>
            </ul><!--/.nav -->
          </div>
        </div>
      </div>
      <div class="hm-footer-copyright">
        <div class="row">
          <div class="col-sm-5">
            <p>Copyright &copy; {{ new Date().getFullYear() }} {{ name }}. All rights reserved.</p><!--/p-->
          </div>
          <div class="col-sm-7">
            <div class="footer-social">
              <!--              <span><i class="fa fa-phone"> +1  (222) 777 8888</i></span>-->
              <a v-for="item in social" :key="item.name" :href="item.url"><i class="fab" :class="item.icon" /></a>
            </div>
          </div>
        </div>
      </div><!--/.hm-footer-copyright-->
    </div><!--/.container-->
  </footer><!--/.footer-->
  <!--footer end-->
</template>

<script>
export default {
  name: 'FooterWhiteTwoRow',
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

  a,a:hover,a:active,a:focus {
    display:inline-block;
    text-decoration:none;
    color: #343a3f;
    font-size:16px;
    padding:0;
    font-weight: 500;
    text-transform: capitalize;
  }
  ul{
    padding: 0;
    margin: 0 auto;
    list-style: none;
  }
  ul li {
    list-style: none;

  }
  /*.navbar-brand*/
  .navbar-header a.navbar-brand,.navbar-header a.navbar-brand:hover,.navbar-header a.navbar-brand:focus {
    display: inline-block;
    color: #1b1e20;
    font-size: 20px;
    font-weight: 700;
    padding: 34px 0px;
    text-transform:capitalize;
  }
  .navbar-header a.navbar-brand span{display: inline-block;color:#ff545a;text-transform:capitalize;}
  /*-------------------------------------
          12. Footer
  --------------------------------------*/
  .footer-menu {padding: 45px 0;}
  .footer-menu .navbar-header{padding:0;}
  .footer-menu .navbar-header a.navbar-brand,.footer-menu.footer-menu .navbar-header a.navbar-brand:hover,.footer-menu .navbar-header a.navbar-brand:focus{
    padding:0;
    height: 0;
  }
  .footer-menu ul.footer-menu-item{text-align: right;}
  .footer-menu ul.footer-menu-item li{display: inline-block;}
  .footer-menu ul.footer-menu-item li a {
    color: #859098;
    font-size: 14px;
    text-transform: uppercase;
    padding-left: 40px;
    -webkit-transition:0.3s linear;
    -moz-transition:0.3s linear;
    -o-transition:0.3s linear;
    transition:0.3s linear;
  }
  .footer-menu ul.footer-menu-item li a:hover{color: #5e00d9;}
  .hm-footer-copyright {
    padding: 40px 0;
    border-top: 1px solid #e1e5eb;
  }
  .hm-footer-copyright p,.hm-footer-copyright p a {
    color: #a5adb3;
    font-size: 14px;
    font-weight: 400;
    text-transform: capitalize;
  }
  .footer-social {text-align: right;}
  .footer-social .fa-phone:before {
    position: relative;
    top: 2px;
  }
  .footer-social a ,.footer-social span {
    display: inline-block;
    color: #afb4bf;
    font-size: 14px;
    margin-left: 15px;
    -webkit-transition: .3s;
    -moz-transition:.3s;
    -ms-transition:.3s;
    -o-transition:.3s;
    transition: .3s;
  }
  .footer-social a {
    width: 35px;
    height: 35px;
    line-height: 35px;
    background: #eef2f6;
    text-align: center;
    border-radius: 50%;
  }
  .footer-social span {margin-right:15px;margin-left: 0;color: #a5adb3;}
  .footer-social span:hover{color: #5e00d9;}
  .footer-social a:hover {background:#5e00d9;color: #fff;}

  @media screen and (max-width:991px){
    .footer-menu ul.footer-menu-item li a {padding-left: 15px;}
  }
  @media screen and (max-width:767px){
    .footer-menu .navbar-header a.navbar-brand, .footer-menu.footer-menu .navbar-header a.navbar-brand:hover, .footer-menu .navbar-header a.navbar-brand:focus {height: auto;}
    .footer-social {text-align:left;margin-top: 20px;}
    .footer-menu ul.footer-menu-item {text-align: left;margin-top: 20px;}
    .footer-menu ul.footer-menu-item li a {padding-right: 15px;padding-left: 0;margin-bottom: 15px;}
  }
  @media screen and (max-width: 399px){
    .footer-social span {display: block;margin-bottom: 15px;}
  }
  @media screen and (max-width:350px){
    .wrap-sticky nav.navbar.bootsnav.sticked .navbar-header a.navbar-brand, .wrap-sticky nav.navbar.bootsnav.sticked .navbar-header a.navbar-brand:hover,.wrap-sticky nav.navbar.bootsnav.sticked .navbar-header a.navbar-brand:focus {padding: 25px 0px;}
  }
</style>
