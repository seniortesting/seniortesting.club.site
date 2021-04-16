<template>
  <div class="mainmenu-area" :class="navFixed? 'nav-fixed':null">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <b-navbar type="light" toggleable="lg">
            <b-navbar-brand :href="brand.url">
              <!--              <img src="/img/logo.png" alt="">-->
              {{ brand.title }}
            </b-navbar-brand>
            <b-navbar-toggle class="toggler" target="main_menu" />
            <b-collapse id="main_menu" is-nav class="fixed-height">
              <b-navbar-nav class="ml-auto">
                <template
                  v-for="item in data"
                >
                  <b-nav-item
                    v-if="!item.list"
                    :key="item.title"
                    exact
                    :target="item.url.indexOf('http')>=0? '_blank': '_self'"
                    :active="$route.path===item.url"
                    :href="item.url"
                  >
                    {{ item.title }}
                    <div class="mr-hover-effect" />
                  </b-nav-item>
                  <b-nav-item-dropdown v-else :key="item.title">
                    <template slot="button-content">
                      {{ item.title }}<div class="mr-hover-effect" />
                    </template>
                    <b-dropdown-item
                      v-for="child in item.list"
                      :key="child.title"
                      exact
                      :target="item.url.indexOf('http')>=0? '_blank': '_self'"
                      :active="$route.path===child.url"
                      :href="child.url"
                    >
                      {{ child.title }}
                    </b-dropdown-item>
                    <!--                    <b-dropdown-item href="#">-->
                    <!--                      ES-->
                    <!--                    </b-dropdown-item>-->
                    <!--                    <b-dropdown-item href="#">-->
                    <!--                      RU-->
                    <!--                    </b-dropdown-item>-->
                    <!--                    <b-dropdown-item href="#">-->
                    <!--                      FA-->
                    <!--                    </b-dropdown-item>-->
                  </b-nav-item-dropdown>
                </template>

                <!--                <b-nav-item href="#">-->
                <!--                  Feature-->
                <!--                  <div class="mr-hover-effect" />-->
                <!--                </b-nav-item>-->
                <!--                <b-nav-item href="#">-->
                <!--                  Overview-->
                <!--                  <div class="mr-hover-effect" />-->
                <!--                </b-nav-item>-->
                <!--                <b-nav-item href="#">-->
                <!--                  Pricing-->
                <!--                  <div class="mr-hover-effect" />-->
                <!--                </b-nav-item>-->
                <!--                <b-nav-item href="#">-->
                <!--                  FAQ-->
                <!--                  <div class="mr-hover-effect" />-->
                <!--                </b-nav-item>-->
                <!--                <b-nav-item-dropdown>-->
                <!--                  <template slot="button-content">-->
                <!--                    Blog<div class="mr-hover-effect" />-->
                <!--                  </template>-->
                <!--                  <b-dropdown-item href="#">-->
                <!--                    Blog Grid-->
                <!--                  </b-dropdown-item>-->
                <!--                  <b-dropdown-item href="#">-->
                <!--                    ES-->
                <!--                  </b-dropdown-item>-->
                <!--                  <b-dropdown-item href="#">-->
                <!--                    RU-->
                <!--                  </b-dropdown-item>-->
                <!--                  <b-dropdown-item href="#">-->
                <!--                    FA-->
                <!--                  </b-dropdown-item>-->
                <!--                </b-nav-item-dropdown>-->
              </b-navbar-nav>
              <a v-for="btn in button" :key="btn.title" :href="btn.url" target="_blank" class="base-btn2">
                {{ btn.title }}
              </a>
            </b-collapse>
          </b-navbar>
        </div>
      </div>
    </div>
  </div>
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
                url: '/ru'
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
            url: ''
          }
        ]
      }
    }
  },
  data () {
    return {
      navFixed: false
    }
  },
  mounted () {
    // 监听滚动事件
    document.addEventListener('scroll', this.scrollHandler)
  },
  beforeDestroy () {
    document.removeEventListener('scroll', this.scrollHandler)
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
    }
  }
}
</script>

<style scoped>
  .toggler >>> .navbar-toggler-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
  }

  .toggler {
    border: none !important;
    margin: 0px;
    padding: 0px; }

  .toggler:focus {
    outline: 0px; }
  /* Main Menu Area Start */
  .mainmenu-area {
    position: relative;
    /*top: 0;*/
    left: 0;
    right: 0;
    width: 100%;
    z-index: 999;
    background: -webkit-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);
    background: -o-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);
    background: linear-gradient(50deg, #6e00ff 0, #bb00ff 100%);
  }
  .mainmenu-area.nav-fixed {
    position: fixed;
    top: 0;
    z-index: 999;
    background: -webkit-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);
    background: -o-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);
    background: linear-gradient(50deg, #6e00ff 0, #bb00ff 100%);
    border-bottom: 0px;
    -webkit-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }
  .mainmenu-area >>> .navbar {
    padding: 0px 0px; }
  .mainmenu-area >>> .navbar .navbar-brand {
    padding: 0px;
    margin: 0px;
    /*避免黑色字体被遮挡*/
    color: #fff;
  }
  .mainmenu-area >>> .navbar .navbar-brand img {
    max-height: 40px; }
  .mainmenu-area .navbar .mybtn2 {
    margin-left: 20px; }
  .mainmenu-area >>> .navbar #main_menu .navbar-nav .nav-item .nav-link {
    color: #fff;
    line-height: 26px;
    font-size: 16px;
    font-weight: 500;
    position: relative;
    padding: 20px 15px;
    -webkit-transition: all linear .3s;
    -o-transition: all linear .3s;
    transition: all linear .3s;
  }
  .b-nav-dropdown >>> .nav-link {
    color: #fff;
    line-height: 26px;
    font-size: 16px;
    font-weight: 500;
    position: relative;
    padding: 20px 15px;
    -webkit-transition: all linear .3s;
    -o-transition: all linear .3s;
    transition: all linear .3s;
  }
  .ml-auto >>> .nav-link.active, .mainmenu-area .navbar #main_menu .navbar-nav .nav-item .nav-link:hover {
    color: #fff;
  }
  .ml-auto >>> .nav-link.active .mr-hover-effect, .mainmenu-area .navbar #main_menu .navbar-nav .nav-item .nav-link:hover .mr-hover-effect {
    opacity: 1 !important;
    height: 100% !important;
  }
  .mainmenu-area >>> .navbar #main_menu .navbar-nav .nav-item .nav-link .mr-hover-effect {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    left: 0;
    width: 100%;
    height: 50%;
    opacity: 0;
    background: rgba(255, 255, 255, 0.1);
    border-top: 2px solid #fff;
    border-bottom: 2px solid #fff;
    -webkit-transition: all 0.3s ease-in;
    -o-transition: all 0.3s ease-in;
    transition: all 0.3s ease-in;
  }
  .mainmenu-area >>> .navbar #main_menu .navbar-nav .nav-item .dropdown-menu {
    position: absolute;
    z-index: 99;
    margin-top: 0px !important;
    background: #fff;
    border-radius: 0px;
    border: 0px;
    padding-bottom: 0px;
    padding-top: 0px;
    -webkit-box-shadow: 0px 8px 14px 0px rgba(0, 0, 0, 0.15);
    box-shadow: 0px 8px 14px 0px rgba(0, 0, 0, 0.15);
    -webkit-transition: all linear .3s;
    -o-transition: all linear .3s;
    transition: all linear .3s; }
  .mainmenu-area >>> .navbar #main_menu .navbar-nav .nav-item .dropdown-menu .dropdown-item {
    line-height: 26px;
    font-size: 16px;
    font-weight: 500;
    padding: 8px 15px 8px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    -webkit-transition: all linear .3s;
    -o-transition: all linear .3s;
    transition: all linear .3s;
    color: #555; }
  .mainmenu-area >>> .navbar #main_menu .navbar-nav .nav-item .dropdown-menu .dropdown-item i {
    margin-right: 5px;
    font-size: 12px; }
  .mainmenu-area >>> .navbar #main_menu .navbar-nav .nav-item .dropdown-menu .dropdown-item:hover {
    background: #5e00d9;
    color: #fff; }
  .mainmenu-area >>> .navbar #main_menu .navbar-nav .nav-item .dropdown-menu .dropdown-item:focus {
    background: none; }
  .mainmenu-area >>> .navbar #main_menu .navbar-nav .nav-item.dropdown:hover .dropdown-menu {
    display: block; }
  .mainmenu-area .navbar .base-btn2 {
    margin-left: 15px;
    padding: 7px 20px;
    background: #fff;
    border: 1px solid #fff; }
  .mainmenu-area .navbar .base-btn2:hover {
    background: none;
    color: #fff; }

  /* Main Menu Area End */
  a {
    color: #131333;
    text-decoration: none; }

  a,
  a:hover,
  a:focus,
  a:active {
    text-decoration: none;
    outline: none; }

  a i {
    padding: 0 2px; }
  img {
    max-width: 100%; }
  ul {
    padding: 0;
    margin: 0; }
  ul li {
    list-style: none; }
  .toggle >>> .navbar-toggler-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E") !important; }
  .navbar-toggler {
    border: none !important;
    margin: 0px;
    padding: 0px; }

  .navbar-toggler:focus {
    outline: 0px; }
  .base-btn2 {
    font-size: 16px;
    font-weight: 500;
    padding: 12px 35px;
    display: inline-block;
    color: #5e00d9;
    border: 1px solid #5e00d9;
    border-radius: 50px;
    cursor: pointer;
    -webkit-transition: all 0.3s ease-in;
    -o-transition: all 0.3s ease-in;
    transition: all 0.3s ease-in;
    background: none; }
  .base-btn2:hover {
    background: #5e00d9;
    color: #fff; }
  @media  (max-width: 991px) {
    .header .mainmenu-area .navbar #main_menu .navbar-nav .nav-item .nav-link .mr-hover-effect{
      display: none;
    }
    .header .mainmenu-area .navbar #main_menu .navbar-nav .nav-item .nav-link {
      padding: 8px 10px;
    }
    .header .mainmenu-area .navbar .navbar-brand {
      padding-left: 0px;
    }
    .mainmenu-area{
      background: linear-gradient(50deg, #6e00ff 0, #bb00ff 100%);
      padding: 10px 0px;
      border-bottom: 0px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .mainmenu-area .navbar #main_menu .navbar-nav .nav-item .nav-link {

      padding: 5px 15px;
      display: inline-block;
    }
    div#main_menu ul{
      padding: 15px 0px 5px;
    }
    .mainmenu-area .navbar .base-btn2{
      margin-bottom: 8px;
    }

    .mainmenu-area .navbar #main_menu .navbar-nav .nav-item .dropdown-menu{
      position: relative;
      left: 0px;
      width: 100%;
    }

  }
</style>
