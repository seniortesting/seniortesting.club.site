<template>
  <!-- Testimonial Start -->
  <section id="testimonial" class="testimonial">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="section-heading">
            <h2 class="title">
              {{ title }}
            </h2>
            <p class="text">
              {{ desc }}
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <client-only>
            <vue-slider
              ref="tinySlider"
              v-bind="options"
              class="testimonial-slider"
            >
              <div v-for="item in data" :key="item.name" class="slider-item">
                <div class="single-review">
                  <div class="stars">
                    <i class="fas fa-star" />
                    <i class="fas fa-star" />
                    <i class="fas fa-star" />
                    <i class="fas fa-star" />
                    <i class="fas fa-star" />
                  </div>
                  <div class="content">
                    <p>
                      {{ item.content }}
                    </p>
                  </div>
                  <div class="reviewr">
                    <div class="img">
                      <img :src="item.avatar" alt="">
                    </div>
                    <div class="content">
                      <h4 class="name">
                        {{ item.name }}
                      </h4>
                      <p>
                        {{ item.title }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </vue-slider>
          </client-only>
        </div>
      </div>
    </div>
  </section>
  <!-- Testimonial End -->
</template>

<script>

export default {
  name: 'TestimonialSlide',
  props: {
    title: {
      type: String,
      default: ' What Users Says'
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
  },
  data () {
    return {
      options: {
        items: '3',
        nav: 'false',
        controls: 'false',
        gutter: '0',
        center: 'true',
        loop: 'true',
        autoplay: 'true',
        autoplayTimeout: '6000',
        autoplayButtonOutput: 'false',
        speed: '1000',
        lazyload: 'false',
        mouseDrag: 'true',
        responsive: {
          0: {
            items: 1
          },
          576: {
            items: 1
          },
          768: {
            items: 2
          },
          992: {
            items: 3
          }
        }
      }
    }
  }
}
</script>

<style scoped>
  @import url("https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Rubik:300,400,500,700&display=swap");
  h1 {
    font-size: 60px;
    line-height: 1.0833333333333333; }

  h2 {
    font-size: 52px;
    line-height: 1.4444444444444444; }

  h3 {
    font-size: 26px;
    line-height: 1.0833333333333333; }

  h4 {
    font-size: 22px;
    line-height: 1.2380952380952381; }

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    color: #131333;
    font-family: "Rubik", sans-serif; }

  p {
    font-size: 16px;
    color: #555;
    line-height: 1.625;
    -webkit-hyphens: auto;
    -moz-hyphens: auto;
    -ms-hyphens: auto;
    hyphens: auto; }
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

  /* Testimonial Start */
  .testimonial {
    padding: 121px 0px 115px;
    background: #F7F8FC; }
  .testimonial .section-heading {
    margin-bottom: 41px; }
  .testimonial .section-heading .title {
    margin-bottom: 20px; }
  .testimonial .testimonial-slider .slider-item {
    padding: 15px; }

  .single-review {
    background: #fff;
    padding: 26px 30px 30px;
    border-radius: 7px;
    -webkit-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.08);
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.08); }
  .single-review .stars {
    margin-bottom: 19px;
    display: block; }
  .single-review .stars i {
    font-size: 14px;
    color: #ffcc00; }
  .single-review .content p {
    margin-bottom: 0px; }
  .single-review .reviewr {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-top: 26px; }
  .single-review .reviewr .img img {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    margin-right: 20px; }
  .single-review .reviewr .content {
    -ms-flex-item-align: center;
    -ms-grid-row-align: center;
    align-self: center; }
  .single-review .reviewr .content .name {
    font-size: 18px;
    line-height: 28px;
    font-weight: 500;
    margin-bottom: 0px; }
  .single-review .reviewr .content p {
    font-size: 14px;
    line-height: 24px;
    margin-bottom: 0px; }

  /* Testimonial End */
</style>
