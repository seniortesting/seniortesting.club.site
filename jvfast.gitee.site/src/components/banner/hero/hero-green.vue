<template>
  <!--=== header intro ===-->
  <section id="home" class="header-intro-1 d-flex align-items-center" :style="{background: 'url('+hero+') no-repeat scroll center top / cover' }">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="header-intro-wrap text-center">
            <div class="header-intro-title">
              <h3>{{ title }}</h3>
            </div>
            <div class="header-intro-tag">
              {{ desc }}
            </div>
            <ul class="list-inline">
              <li v-for="item in action" :key="item.title" class="list-inline-item">
                <a :href="item.url" class="btn btn-primary main-btn" :class="item.class">{{ item.title }}</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'HeroGreen',
  props: {
    title: {
      type: String,
      default: 'THE BEST BOOTSTRAP THEME EVER SEEN'
    },
    desc: {
      type: String,
      default: 'Stop find another theme from now, Guarantee.'
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
      default: require('@/assets/img/hero/hero-p4.jpg')
    }
  }
}
</script>

<style scoped>
  *{
    outline-color: transparent !important;
  }
  *,
  *::after,
  *::before {
    margin: 0;
    padding: 0;
    border-radius: 0;
    -webkit-box-sizing: inherit;
    box-sizing: inherit;
  }
  .btn:focus {
    box-shadow: none;
    outline: none !important;
  }
  .btn.main-btn {
    border-radius: 5px;
  }
  .container-fluid {
    width: 75%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
  }
  .btn.main-btn.bg-main { background-color: #85acd3;}
  .btn.main-btn.bg-green { background-color: #10B765; }
  .main-btn:hover {
    border-color: #10b765;
    background-color: #10b765;
  }
  .main-btn {
    border: 3px solid #222;
    -webkit-box-shadow: none;
    box-shadow: none;
    text-transform: uppercase;
    font-weight: 600;
    letter-spacing: 1px;
    border-radius: 0;
    background-color: transparent;
    padding: 13px 32px;
    color: #222;
    font-size: 18px;
    min-width: 205px;
    text-align: center;
  }
  /*==================== header intro =====================*/
  .header-intro-1 {
    /*background: no-repeat scroll center top / cover ;*/
    position: relative;
    padding: 150px 0;
    min-height: 800px;
    -webkit-clip-path: polygon(50% 0%, 100% 0, 100% 80%, 70% 100%, 0 80%, 0 0);
    clip-path: polygon(50% 0%, 100% 0, 100% 80%, 70% 100%, 0 80%, 0 0);
  }

  .header-intro-1::before {
    /* background: linear-gradient(0deg, #97BEE5 15%, transparent 100%, rgba(0, 0, 0, 0) 100%); */
    content: "";
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    background: linear-gradient(to right, #43e97b 0%, #38f9d7 100%);
    opacity: .6;
  }
  .header-intro-1 .header-intro-wrap {
    max-width: 1000px;
    margin-left: auto;
    margin-right: auto;
    position: relative;
    z-index: 100;
  }
  .header-intro-1 .header-intro-wrap .header-intro-title h3 {
    color: #fff;
    font-weight: 700;
    font-size: 70px;
    letter-spacing: 2px;
    text-transform: uppercase;
  }
  .header-intro-1 .header-intro-wrap .header-intro-tag {
    font-family: 'EB Garamond', serif;
    color: #fff;
    font-size: 30px;
    margin-top: 30px;
    margin-bottom: 65px;
  }
  .header-intro-1 .header-intro-wrap .btn.main-btn {
    background-color: #fff;
    border-color: transparent;
    color: #fff;
    letter-spacing: 0.3px;
    font-size: 15px;
    font-weight: 500;
    padding: 18px 25px;
  }

  .header-intro-1 .btn.main-btn.bg-main {
    background-color: transparent;
    border: 1px solid #fff;
  }
  .header-intro-1 .btn.main-btn.bg-green {
    color: #666;
  }
  .header-intro-1 .header-intro-wrap .btn.main-btn.bg-green:hover {
    background-color: #313a44;
    color: #fff;
  }
  .header-intro-1 .header-intro-wrap .btn.main-btn:hover {
    background-color: #fff;
    color: #555;
  }

  /* Large devices (desktops plus, less than 1695px) */
  @media (max-width: 1398px) {
    .container-fluid {
      width: 95%;
    }
  }
  /* Large devices (desktops, less than 1200px) */
  @media (max-width: 1199.98px) {
    .container-fluid {
      width: 95%;
    }
  }
  /* Large devices (desktops, less than 1200px) */
  @media (max-width: 1199.98px) {
    .container-fluid {
      width: 95%;
    }
  }
  /* Medium devices (tablets, less than 992px) */
  @media (max-width: 991.98px) {
    .container-fluid {
      width: 95%;
    }

    .header-intro-1 .header-intro-wrap .header-intro-title h3 {
      font-size: 50px;
    }
    .header-intro-1 .header-intro-wrap .header-intro-tag {
      font-size: 25px;
      margin-bottom: 50px;
    }

  }
  /* Small devices (landscape phones, less than 768px) */
  @media (max-width: 767.98px) {

    .container-fluid {
      width: 95%;
    }

    .header-intro-1 {
      padding: 150px 0 100px;
      min-height: 550px;
    }

    .header-intro-1 .header-intro-wrap .header-intro-title h3 {
      font-size: 39px;
    }

    .header-intro-1 .header-intro-wrap .header-intro-tag {
      font-size: 21px;
    }
  }
  /* Extra small devices (portrait phones, less than 576px) */
  @media (max-width: 575.98px) {
    .container-fluid {
      width: 95%;
    }

    .header-intro-1 .header-intro-wrap .header-intro-title h3 {
      font-size: 25px;
      line-height: 1.6;
    }
    .header-intro-1 .header-intro-wrap .header-intro-tag {
      font-size: 20px;
      line-height: 1.5;
    }
    .header-intro-1 .header-intro-wrap .btn.main-btn {
      min-width: 195px;
      padding: 12px 25px;
      margin-bottom: 15px;
    }
    .highlight-section-wrap .list-inline-item:not(:last-child),
    .header-intro-wrap .list-inline-item:not(:last-child) {
      margin-right: 0;
    }
  }
</style>
