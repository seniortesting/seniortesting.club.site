<template>
  <section id="testimonials" class="section-bg">
    <div class="container">
      <header class="section-header">
        <h3>{{ title }}</h3>
      </header>

      <div class="row justify-content-center">
        <div class="col-lg-8">
          <client-only>
            <vue-slider
              ref="tinySlider"
              :items="1"
              :nav="true"
              nav-position="bottom"
              :controls="false"
              controls-position="bottom"
              :gutter="0"
              :center="true"
              :loop="true"
              :autoplay="true"
              :autoplay-timeout="6000"
              :autoplay-button-output="false"
              :speed="1000"
              :lazyload="false"
              :mouse-drag="true"
              :responsive="{
                0: {
                  items: 1
                },
                576: {
                  items: 1
                },
                768: {
                  items: 1
                },
                992: {
                  items: 1
                }
              }"
              class="owl-carousel testimonials-carousel"
            >
              <div v-for="item in data" :key="item.name" class="testimonial-item">
                <img :src="item.avatar" class="testimonial-img" alt="">
                <h3>{{ item.name }}</h3>
                <h4>{{ item.title }}</h4>
                <p>
                  {{ item.content }}
                </p>
              </div>
            </vue-slider>
          </client-only>
        </div>
      </div>
    </div>
  </section><!-- #testimonials -->
</template>

<script>
export default {
  name: 'TestimonialSlide',
  props: {
    title: {
      type: String,
      default: 'Testimonials'
    },
    desc: {
      type: String,
      default: 'We use the latest technologies and tools in order to create a better code that not only works great, but it is easy easy to work with too.'
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            stars: 5,
            content: 'Believed attentive assisted picture sharpness to I to she waved the are and slide understand the that set task. The you due back',
            name: 'Austin Bishop',
            avatar: require('@/assets/img/reviewer/reviewer-p1.png'),
            title: 'CEO at ABC'
          },
          {
            stars: 5,
            content: 'Believed attentive assisted picture sharpness to I to she waved the are and slide understand the that set task. The you due back',
            name: 'Sebastian',
            avatar: require('@/assets/img/reviewer/reviewer-p2.png'),
            title: 'CEO at DEF'
          },
          {
            stars: 5,
            content: 'Believed attentive assisted picture sharpness to I to she waved the are and slide understand the that set task. The you due back',
            name: 'Alexander',
            avatar: require('@/assets/img/reviewer/reviewer-p3.png'),
            title: 'CEO at ECS'
          },
          {
            stars: 5,
            content: 'Believed attentive assisted picture sharpness to I to she waved the are and slide understand the that set task. The you due back',
            name: 'Christopher',
            avatar: require('@/assets/img/reviewer/reviewer-p4.png'),
            title: 'CEO at KCS'
          }
        ]
      }
    }
  }
}
</script>

<style scoped>

  .section-header h3 {
    font-size: 36px;
    color: #283d50;
    text-align: center;
    font-weight: 500;
    position: relative;
  }

  .section-header p {
    text-align: center;
    margin: auto;
    font-size: 15px;
    padding-bottom: 60px;
    color: #556877;
    width: 50%;
  }
  .section-bg {
    background: #ecf5ff;
  }
  #testimonials {
    padding: 60px 0;
    box-shadow: inset 0px 0px 12px 0px rgba(0, 0, 0, 0.1);
  }

  #testimonials .section-header {
    margin-bottom: 40px;
  }

  #testimonials .testimonial-item .testimonial-img {
    width: 120px;
    border-radius: 50%;
    border: 4px solid #fff;
    float: left;
  }

  #testimonials .testimonial-item h3 {
    font-size: 20px;
    font-weight: bold;
    margin: 10px 0 5px 0;
    color: #111;
    margin-left: 140px;
  }

  #testimonials .testimonial-item h4 {
    font-size: 14px;
    color: #999;
    margin: 0 0 15px 0;
    margin-left: 140px;
  }

  #testimonials .testimonial-item p {
    font-style: italic;
    margin: 0 0 15px 140px;
  }
  @media (min-width: 992px) {
    #testimonials .testimonial-item p {
      width: 80%;
    }
  }

  @media (max-width: 767px) {
    #testimonials .testimonial-item {
      text-align: center;
    }

    #testimonials .testimonial-item .testimonial-img {
      float: none;
      margin: auto;
    }

    #testimonials .testimonial-item h3,
    #testimonials .testimonial-item h4,
    #testimonials .testimonial-item p {
      margin-left: 0;
    }
  }

</style>
<style>
  /*设置导航条*/
  .tns-controls { text-align: center; margin-bottom: 10px; }
  .tns-controls [aria-controls] {
    font-size: 15px;
    margin: 0 5px;
    padding: 0 1em;
    height: 2.5em;
    color: #000;
    background: #66CCFF;
    border-radius: 3px;
    border: 0;
  }
  .lt-ie9 .tns-controls > [aria-controls] {
    line-height: 2.5em;
  }
  [data-action] {
    display: block;
    margin: 10px auto;
    font-size: 17px;
    min-width: 3em;
    text-align: center;
    background: transparent;
    border: 0;
  }
  .tns-controls [disabled] {
    color: #999999;
    background: #B3B3B3;
    cursor: not-allowed !important;
  }
  .tns-nav {
    text-align: center;
    margin: 10px 0;
  }
  .tns-nav > [aria-controls] {
    width: 9px;
    height: 9px;
    padding: 0;
    margin: 0 5px;
    border-radius: 50%;
    background: #ddd;
    border: 0;
  }
  .tns-nav > .tns-nav-active { background: #999; }
</style>
