<template>
  <!-- Header -->
  <header id="header" class="header" :style="{background: 'linear-gradient(to bottom right, rgba(72, 72, 212, 0), rgba(241, 104, 104, 0)), url('+hero+') center center no-repeat'}">
    <div class="header-content">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="text-container">
              <h1>
                前后端分离通用管理框架 <vue-slider
                  id="js-rotating"
                  :items="1"
                  axis="horizontal"
                  :controls="false"
                  :nav="false"
                  :loop="true"
                  :autoplay="true"
                  :autoplay-timeout="3000"
                  :autoplay-button-output="false"
                  animate-in="fadeInUp"
                  animate-out="fadeInDown"
                >
                  <span>服务端渲染</span><span>权限控制</span><span>代码生成</span>
                </vue-slider>
              </h1>
              <p class="p-large">
                {{ desc }}
              </p>
              <a class="btn-solid-lg page-scroll" href="https://jvfast.pingbook.top" target="_blank"><i class="fa fa-play" />立即体验</a>
              <a class="btn-solid-lg page-scroll" href="https://jvfast.gitee.io/references/CHANGELOG.html" target="_blank"><i class="fa fa-info" />更新日志</a>
              <p class="p-version">
                当前版本: {{ version.name }}, 更新时间: {{ version.time }}
              </p>
            </div>
          </div> <!-- end of col -->
          <div class="col-lg-6">
            <div class="image-container">
              <img class="img-fluid" src="~assets/img/screen/laptop.png" alt="alternative">
            </div> <!-- end of image-container -->
          </div> <!-- end of col -->
        </div> <!-- end of row -->
      </div> <!-- end of container -->
    </div> <!-- end of header-content -->
  </header> <!-- end of header -->
  <!-- end of header -->
</template>

<script>
export default {
  name: 'HeroTransparent',
  props: {
    title: {
      type: String,
      default: 'THE BEST BOOTSTRAP THEME EVER SEEN'
    },
    desc: {
      type: String,
      default: '基于Vue/Nuxt+SpringBoot/Mybatis强力驱动,节省60%代码量快速开发'
    },
    action: {
      type: Array,
      default: () => {
        return [
          {
            title: ' GET STARTED',
            url: '#',
            class: 'bg-main'
          },
          {
            title: 'Purchase Now',
            url: '#',
            class: 'bg-green'
          }
        ]
      }
    },
    hero: {
      type: String,
      default: require('@/assets/img/hero/hero-p5.jpg')
    }
  },
  data () {
    return {
      version: {
        name: '1.4.12',
        time: '2020-07-20'
      }
    }
  }
}
</script>

<style scoped>
  h1 {
    color: #f1f1f8;
    font: 700 2.5rem/2.875rem "Montserrat", sans-serif;
  }
   p {
    color: #f1f1f8;
    font: 400 0.875rem/1.375rem "Open Sans", sans-serif;
  }
  a {
    color: #f1f1f8;
    text-decoration: underline;
  }

  a:hover {
    color: #f1f1f8;
    text-decoration: underline;
  }

  .p-large {
    color: #f1f1f8;
    font: 400 1rem/1.5rem "Open Sans", sans-serif;
  }
  .p-version {
    color:#fff;
    font-size: 13px;
  }
  .btn-solid-lg {
    display: inline-block;
    padding: 1.375rem 2.925rem 1.375rem 2.925rem;
    border: 0.125rem solid #00c9db;
    border-radius: 2rem;
    background-color: #00c9db;
    color: #fff;
    font: 700 0.75rem/0 "Montserrat", sans-serif;
    text-decoration: none;
    transition: all 0.2s ease;
  }

  .btn-solid-lg:hover {
    background-color: transparent;
    color: #00c9db;
    text-decoration: none;
  }

  .btn-solid-lg .fa {
    margin-right: 0.5rem;
    font-size: 1.25rem;
    line-height: 0;
    vertical-align: top;
  }

  .btn-solid-lg .fab.fa-google-play {
    font-size: 1rem;
  }
  /*********************/
  /*    04. Header     */
  /*********************/
  .header {
    /*background: linear-gradient(to bottom right, rgba(72, 72, 212, 0), rgba(241, 104, 104, 0)),  center center no-repeat;*/
    background-size: cover;
  }

  .header .header-content {
    padding-top: 8.5rem;
    padding-bottom: 7rem;
    text-align: center;
  }

  .header .text-container {
    margin-bottom: 3rem;
  }

  .header h1 {
    margin-bottom: 1rem;
  }

  .header #js-rotating {
    color: #40e0ee;
  }

  .header .p-large {
    margin-bottom: 2rem;
  }

  .header .btn-solid-lg {
    margin-right: 0.5rem;
    margin-bottom: 1.25rem;
  }
  /* Min-width width 768px */
  @media (min-width: 768px) {
    h1 {
      font: 700 3.25rem/3.75rem "Montserrat", sans-serif;
    }

    /* Header */
    .header .header-content {
      padding-top: 11rem;
    }
    /* end of header */
  }

  /* Min-width width 992px */
  @media (min-width: 992px) {
    /* Header */
    .header .header-content {
      padding-top: 13rem;
      padding-bottom: 10rem;
      text-align: left;
    }

    .header .text-container {
      margin-top: 6.5rem;
    }
    /* end of header */
  }
  /* Min-width width 1200px */
  @media (min-width: 1200px) {
    /* Header */
    .header .text-container {
      margin-top: 1.5rem;
      margin-left: 2.5rem;
    }

    .header .image-container {
      margin-left: 3rem;
    }
    /* end of header */
  }
</style>
