<template>
  <header id="header" :class="[navFixed? 'fixed-top header-scrolled':null]">
    <div class="container">
      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
        <a href="#intro" class="scrollto"><img :src="brand.img" alt="" class="img-fluid"><span>顿站旁</span></a>
      </div>
      <button type="button" class="mobile-nav-toggle d-lg-none" @click="toggleBtnHandle">
        <i class="fa" :class="showOverly?'fa-times fa-bars': 'fa-bars'" />
      </button>
      <nav :class="[$device.isDesktop?'main-nav p-left d-none d-lg-block': 'mobile-nav d-lg-none']">
        <ul>
          <template
            v-for="item in data"
          >
            <li
              v-if="!item.list"
              :key="item.title"
              :class="$route.path===item.url?'active':null"
            >
              <a :href="item.url"> {{ item.title }}</a>
            </li>
            <li v-else :key="item.title" class="drop-down">
              <a @click.prevent.stop="dropdownClickHandler">{{ item.title }}</a>
              <ul>
                <li
                  v-for="child in item.list"
                  :key="child.title"
                  :class="child.list? 'drop-down':null"
                >
                  <a v-if="child.list" @click.prevent.stop="dropdownClickHandler"><i class="fa fa-chevron-right" />{{ child.title }}</a>
                  <a v-else :href="child.url"><i class="fa fa-chevron-right" />{{ child.title }}</a>
                  <ul v-if="child.list">
                    <li
                      v-for="d in child.list"
                      :key="d.title"
                    >
                      <a :href="d.url"><i class="fa fa-chevron-right" />{{ d.title }}</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          </template>
        </ul>
      </nav><!-- .main-nav -->
    </div>
    <!--    手机端样式-->
    <div v-show="showOverly" class="mobile-nav-overly" />
  </header><!-- #header -->
</template>

<script>
export default {
  name: 'HeaderWhite',
  props: {
    brand: {
      type: Object,
      default: () => {
        return {
          title: 'SiteName',
          img: require('@/assets/img/logo.png'),
          url: '/'
        }
      }
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            title: 'Home',
            url: '/'
          },
          {
            title: 'Feature',
            url: '/feature'
          },
          {
            title: 'Overview',
            url: '/overview'
          },
          {
            title: 'Pricing',
            url: '/pricing'
          },
          {
            title: 'Blog',
            list: [
              {
                title: 'Blog Grid',
                url: '/blogGrid'
              },
              {
                title: 'RU',
                url: '/ru',
                list: [
                  {
                    title: 'Deep Child1',
                    url: '/blogGrid1'
                  },
                  {
                    title: 'Deep Child2',
                    url: '/blogGrid2'
                  }
                ]
              },
              {
                title: 'Baidu',
                url: 'https://www.baidu.com'
              }
            ]
          }
        ]
      }
    },
    button: {
      type: Array,
      default: () => {
        return [
          {
            title: 'Download',
            name: ''
          }
        ]
      }
    }
  },
  data () {
    return {
      navFixed: false,
      showOverly: false
    }
  },
  mounted () {
    // 监听滚动事件
    document.addEventListener('scroll', this.scrollHandler)
    document.addEventListener('click', this.clickHandler)
  },
  beforeDestroy () {
    document.removeEventListener('scroll', this.scrollHandler)
    document.removeEventListener('click', this.clickHandler)
  },
  methods: {
    scrollHandler () {
      const scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
      //  当滚动超过 50 时，实现吸顶效果
      if (scrollTop > 49) {
        this.navFixed = true
      } else {
        this.navFixed = false
      }
    },
    clickHandler (e) {
      const target = e.target
      if (this.showOverly && target.className === 'mobile-nav-overly') {
        this.toggleBtnHandle()
      }
    },
    toggleBtnHandle () {
      // 顶部body样式
      const body = document.querySelector('body')
      if (body.className) {
        body.removeAttribute('class', 'mobile-nav-active')
      } else {
        body.className = 'mobile-nav-active'
      }
      // 图标更改
      this.showOverly = !this.showOverly
    },
    dropdownClickHandler (e) {
      if (this.showOverly) {
        const listElement = e.currentTarget.nextElementSibling
        if (listElement.className) {
          listElement.removeAttribute('class', 'display-ul')
        } else {
          listElement.className = 'display-ul'
        }
      }
    }
  }
}
</script>

<style scoped>
  a {
    color: #007bff;
    transition: 0.5s;
  }

  a:hover,
  a:active,
  a:focus {
    color: #0b6bd3;
    outline: none;
    text-decoration: none;
  }
  /*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/

  /* Desktop Navigation */

  .main-nav {
    /* Drop Down */
    /* Deep Drop Down */
  }
  .p-left {
    padding-left: 100px !important;
  }
  .main-nav,
  .main-nav * {
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .main-nav > ul > li {
    position: relative;
    white-space: nowrap;
    float: left;
  }

  .main-nav a {
    display: block;
    position: relative;
    color: rgba(0, 0, 0, 0.9);
    padding: 10px 15px;
    transition: 0.3s;
    font-size: 14px;
    font-family: "Montserrat", sans-serif;
    font-weight: 500;
  }

  .main-nav a:hover,
  .main-nav .active > a,
  .main-nav li:hover > a {
    color: #10b765;
    text-decoration: none;
  }

  .main-nav .drop-down ul {
    display: block;
    position: absolute;
    left: 0;
    top: calc(100% + 30px);
    z-index: 99;
    opacity: 0;
    visibility: hidden;
    padding: 10px 0;
    background-color: #313a44;
    box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
    transition: ease all 0.3s;
  }

  .main-nav .drop-down:hover > ul {
    opacity: 1;
    top: 100%;
    visibility: visible;
    ackground-color: #313a44;
  }

  .main-nav .drop-down li {
    min-width: 180px;
    position: relative;
  }

  .main-nav .drop-down ul a {
    padding: 15px 25px;
    font-size: 13px;
    color: #fff;
    font-weight: 500;
    line-height: 1.2;
    font-size: 11px;
    transition: all .2s ease-in-out;
  }

  .main-nav .drop-down ul a:hover,
  .main-nav .drop-down ul .active > a,
  .main-nav .drop-down ul li:hover > a {
    padding: 15px 20px 15px 40px;
    position: relative;
    background-color: #10b765;
    color: #fff;
    text-decoration: none;
  }
  .main-nav .drop-down ul li:hover > a .fa {
    opacity: 1;
    visibility: visible;
    left: 25px;

  }
  .main-nav .drop-down ul li > a .fa {
    position: absolute;
    opacity: 0;
    visibility: hidden;
    left: 0;
    transition: all .2s ease-in-out;
  }
  .main-nav .drop-down > a:after {
    content: "\f107";
    font-family: 'Font Awesome 5 Free';
    padding-left: 10px;
    font-weight: 600;
  }

  .main-nav .drop-down .drop-down ul {
    top: 0;
    left: calc(100% - 30px);
  }

  .main-nav .drop-down .drop-down:hover > ul {
    opacity: 1;
    top: 0;
    left: 100%;
  }

  .main-nav .drop-down .drop-down > a {
    padding-right: 35px;
  }

  .main-nav .drop-down .drop-down > a:after {
    content: "\f107";
    font-family: 'Font Awesome 5 Free';
    position: absolute;
    right: 15px;
  }

  /* Mobile Navigation */

  .mobile-nav {
    position: fixed;
    top: 0;
    bottom: 0;
    z-index: 9999;
    overflow-y: auto;
    left: -260px;
    width: 260px;
    padding-top: 18px;
    background: rgba(19, 39, 57, 0.8);
    transition: 0.4s;
  }

  .mobile-nav * {
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .mobile-nav a {
    display: block;
    position: relative;
    color: #fff;
    padding: 10px 20px;
    font-weight: 500;
  }

  .mobile-nav a:hover,
  .mobile-nav .active > a,
  .mobile-nav li:hover > a {
    color: #74b5fc;
    text-decoration: none;
  }

  .mobile-nav .drop-down > a:after {
    content: "\f107";
    font-family: 'Font Awesome 5 Free';
    font-weight: 600;
    padding-left: 10px;
    position: absolute;
    right: 15px;
  }

  .mobile-nav .active.drop-down > a:after {
    content: "\f077";
  }

  .mobile-nav .drop-down > a {
    padding-right: 35px;
  }

  .mobile-nav .drop-down ul {
    display: none;
    overflow: hidden;
  }

  .mobile-nav .drop-down li {
    padding-left: 20px;
  }

  .mobile-nav-toggle {
    position: fixed;
    right: 0;
    /*top: 0;*/
    z-index: 9998;
    border: 0;
    background: none;
    font-size: 24px;
    transition: all 0.4s;
    outline: none !important;
    line-height: 1;
    cursor: pointer;
    text-align: right;
  }

  .mobile-nav-toggle i {
    margin: 8px 18px 0 0;
    color: #004289;
  }

  .mobile-nav-overly {
    width: 100%;
    height: 100%;
    z-index: 9997;
    top: 0;
    left: 0;
    position: fixed;
    background: rgba(19, 39, 57, 0.8);
    overflow: hidden;
    display: none;
  }

  .mobile-nav-active {
    overflow: hidden;
  }

  .mobile-nav-active .mobile-nav {
    left: 0;
  }

  .mobile-nav-active .mobile-nav-toggle i {
    color: #fff;
  }

  /*--------------------------------------------------------------
 # Header
 --------------------------------------------------------------*/

  #header {
    position: fixed;
    right: 0;
    left: 0;
    height: 80px;
    transition: all 0.5s;
    z-index: 997;
    transition: all 0.5s;
    padding: 10px 0;
    background: #fff;
    box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.3);
  }

  #header.header-scrolled,
  #header.header-pages {
    height: 60px;
    padding: 10px 0;
  }

  #header .logo h1 {
    font-size: 36px;
    margin: 0;
    padding: 0;
    line-height: 1;
    font-weight: 400;
    letter-spacing: 3px;
    text-transform: uppercase;
  }

  #header .logo h1 a,
  #header .logo h1 a:hover {
    color: #00366f;
    text-decoration: none;
  }

  #header .logo img {
    padding: 0;
    margin: 7px 0;
    max-height: 26px;
  }

  .main-pages {
    margin-top: 60px;
  }

  .display-ul {
    display: block !important;
  }
  /*-------------------------------------响应式布局-------------------------------------*/
  @media screen and (max-width:1680px){

  }/*max-width:1680px*/
  @media screen and (max-width:1440px){

  }/*max-width:1440px*/

  @media screen and (max-width:1199px){

  }/*max-width:1199px*/

  @media screen and (max-width:1024px){

  }/*max-width:1024px*/

  @media screen and (max-width:1008px){
    .mobile-nav-overly {
      display: block;
    }
  }/*max-width:1008px*/

  @media screen and (max-width:992px){

  }/*max-width:992px*/

  @media screen and (max-width:991px){

  }/*max-width:991px*/

  @media screen and (max-width:768px){

  }/*max-width:768px*/

  @media screen and (max-width:767px){

  }/*max-width:767px*/

  @media screen and (max-width: 660px){

  }/*max-width:660px*/

  @media screen and (max-width: 640px){

  }/*max-width:640px*/

  @media screen and (max-width: 580px){

  }/*max-width:580px*/

  @media screen and (max-width: 540px){

  }/*max-width:540px*/

  @media screen and (max-width: 480px){

  }/*max-width:480px*/

  @media screen and (max-width: 440px){

  }/*max-width:400px*/

  @media screen and (max-width: 399px){

  }/*max-width:399px*/

  @media screen and (max-width:350px){

  }/*max-width:350px*/

  @media screen and  (max-width: 320px){

  }/*max-width:320px*/

</style>
