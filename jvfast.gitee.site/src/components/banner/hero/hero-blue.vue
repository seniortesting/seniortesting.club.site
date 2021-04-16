<template>
  <section class="banner clearfix" data-aos="fade-up" data-aos-duration="900" data-scroll-index="0">
    <div class="container">
      <!-- Caption Start -->
      <div class="caption">
        <h1 class="text-black white-text" data-aos="fade-up" data-aos-duration="1800">
          {{ title }}
        </h1>
        <h3 class="white-text text-semibold mb-50" data-aos="fade-up" data-aos-duration="2400">
          {{ desc }}
        </h3>
        <button class="white-bg text-uppercase text-bold btn waves-effect subscribe-submit mb-70" data-aos="fade-up" data-aos-duration="2600">
          <a :href="action[0].url">{{ action[0].title }}</a>
        </button>
      </div>
      <!-- Caption End -->
      <!-- Sofware img Start -->
      <div class="software-img text-center" data-aos="fade-up" data-aos-duration="2400">
        <img class="img-responsive" :src="hero" alt="">
      </div>
      <!-- Sofware img End -->
    </div>
  </section>
</template>

<script>
export default {
  name: 'HeroBlue',
  props: {
    title: {
      type: String,
      default: 'WELCOME TO Heap Stack'
    },
    desc: {
      type: String,
      default: 'THE BEST SELLING MULTI-PURPOSE TEMPLATE'
    },
    action: {
      type: Array,
      default: () => {
        return [
          {
            title: ' GET STARTED NOW',
            url: '#'
          }
        ]
      }
    },
    hero: {
      type: String,
      default: require('@/assets/img/hero/hero-p2.png')
    }
  }
}
</script>

<style scoped>
  a,
  a > * {
    outline: none;
    cursor: pointer;
    text-decoration: none;
    color: #66ccff;
  }
  .white-text{
    color: #fff !important;
  }
  .text-black {
    font-weight: 900 !important;
  }
  .text-semibold {
    font-weight: 600 !important;
  }
  .mb-50 {
    margin-bottom: 50px !important;
  }
  .mb-70 {
    margin-bottom:70px !important;
  }
  .white-bg{
    background: #fff;
  }
  .text-uppercase{
    text-transform: uppercase;
  }
  .text-bold {
    font-weight: 700 !important;
  }
  .banner {
    background:#63b7e6;
    padding:145px 0 0 0;
    overflow: hidden;
  }
  .img-responsive{
    display: block;
    max-width: 100%;
    height: auto;
  }

  .caption {
    text-align:center;
  }

  .caption h1 {
    font-size:60px;
    line-height:60px;
    margin-bottom:31px;
    font-family: 'Source Sans Pro', sans-serif;
    position:relative;
    padding-bottom:28px;
    margin-bottom:27px;
  }

  .caption h1:before {
    content:"";
    position:absolute;
    bottom:0;
    left:50%;
    background:#fff;
    height:1px;
    width:200px;
    transform:translateX(-50%);
    -webkit-transform:translateX(-50%);
    -ms-transform:translateX(-50%);
  }

  .caption h3 {
    font-family: 'Open Sans', sans-serif;
    margin:0;
  }

  .caption button {
    color:#66ccff;
    height: 44px;
    line-height: 44px;
    padding: 0 26px;
    border-radius:2px;
    -webkit-border-radius:2px;
    -ms-border-radius:2px;
    -webkit-box-shadow: 0 2px 5px rgba(0,0,0,.25);
    -moz-box-shadow: 0 2px 5px rgba(0,0,0,.25);
    box-shadow: 0 2px 5px rgba(0,0,0,.25);
    border:none;
  }

  .caption button:hover ,
  .caption button:focus {
    background:#fff;
    color:#66ccff;
  }

  .software-img img{
    display:inline-block;
  }
</style>
