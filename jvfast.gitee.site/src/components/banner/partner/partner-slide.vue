<template>
  <!-- Partner Area Strat -->
  <section id="partner" class="partners">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="section-heading">
            <h2 class="title">
              {{ title }}
            </h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <client-only>
            <vue-slider
              ref="tinySlider"
              :items="3"
              :nav="false"
              :controls="false"
              :gutter="0"
              :center="true"
              :loop="true"
              :autoplay="true"
              :autoplay-timeout="4000"
              :autoplay-button-output="false"
              :speed="300"
              :lazyload="false"
              :mouse-drag="true"
              :touch="true"
              :responsive=" {
                0: {
                  items: 2
                },
                500: {
                  items: 3
                },
                768: {
                  items: 3
                },
                992: {
                  items: 3
                },
                1200: {
                  items: 3
                },
                1920: {
                  items: 3
                }
              }"
              class="partners-slider"
            >
              <div v-for="item in data" :key="item.name" class="slider-item">
                <a :href="item.url">
                  <img :src="item.logo" alt="图片">
                </a>
              </div>
            </vue-slider>
          </client-only>
        </div>
      </div>
    </div>
  </section>
  <!-- Partner Area End -->
</template>

<script>
export default {
  name: 'PartnerSlide',
  props: {
    title: {
      type: String,
      default: 'Trusted by 3,000+ Company'
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            name: 'essence',
            logo: require('@/assets/img/partner/partner-essence.png'),
            url: 'https://www.baidu.com'
          },
          {
            name: 'generic',
            logo: require('@/assets/img/partner/partner-generic.png'),
            url: 'https://www.baidu.com'
          },
          {
            name: 'liua',
            logo: require('@/assets/img/partner/partner-liua.png'),
            url: 'https://www.baidu.com'
          },
          {
            name: 'quadra',
            logo: require('@/assets/img/partner/partner-quadra.png'),
            url: 'https://www.baidu.com'
          }
        ]
      }
    }
  }
}
</script>

<style scoped>
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
  .section-heading {
    text-align: center;
    margin-bottom: 50px; }
  .section-heading .title {
    font-size: 40px;
    line-height: 50px;
    font-weight: 500;
    color: #131333;
    margin-bottom: 12px; }
  .section-heading .title.extra-padding {
    margin-bottom: 20px; }
  .section-heading .text {
    font-size: 16px;
    line-height: 26px; }
  /* Partner Area Start */
  .partners {
    padding: 120px 0px 120px; }
  .partners .section-heading {
    margin-bottom: 56px; }
  .partners .partners-slider .slider-item {
    text-align: center;
    /*display: block;*/
  }
  .partners .partners-slider .slider-item img {
    width: auto;
    display: inline-block;
  }
  .partners .partners-slider .slider-item a {
    display: inline-block;
  }
  /* Partner Area End */
</style>
