<template>
  <!-- Blog Area Start -->
  <section id="blog" class="blog-section">
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
              v-if="data.length>0"
              ref="tinySlider"
              :items="3"
              :nav="false"
              :nav-text="navText"
              :controls="false"
              :gutter="30"
              :center="true"
              :loop="true"
              :autoplay="true"
              :autoplay-timeout="6000"
              :autoplay-button-output="false"
              :speed="1000"
              :lazyload="false"
              :mouse-drag="true"
              :touch="true"
              :responsive=" {
                0: {
                  items: 1
                },
                576: {
                  items: 2
                },
                768: {
                  items: 2
                },
                992: {
                  items: 3
                },
                1200: {
                  items: 3
                }
              }"
              class="blog-slider"
            >
              <div v-for="item in data" :key="item.id" class="slider-item">
                <div class="single-blog">
                  <div class="img">
                    <img :src="item.img" alt="">
                  </div>
                  <div class="content">
                    <ul class="top-meta">
                      <li>
                        <p class="date">
                          {{ item.time }}
                        </p>
                      </li>
                      <li>
                        <p class="post-by">
                          {{ item.author }}
                        </p>
                      </li>
                    </ul>
                    <a :href="item.url">
                      <h4 class="title">
                        {{ item.title }}
                      </h4>
                    </a>
                  </div>
                </div>
              </div>
            </vue-slider>
            <div v-else class="text-center">
              <h4>暂无最新数据！</h4>
            </div>
          </client-only>
        </div>
      </div>
    </div>
  </section>
  <!-- Blog Area End -->
</template>

<script>
export default {
  name: 'BlogSlide',
  props: {
    title: {
      type: String,
      default: 'Latest Blog'
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
            id: 1001,
            img: require('@/assets/img/blog/blog-img1.png'),
            time: '21 Aug, 2019',
            author: 'By, Admin',
            title: '5 reasons why your website needs more whitespace',
            url: ''
          },
          {
            id: 1002,
            img: require('@/assets/img/blog/blog-img2.png'),
            time: '22 Aug, 2019',
            author: 'By, Admin',
            title: '7 reasons why your website needs more whitespace',
            url: ''
          },
          {
            id: 1003,
            img: require('@/assets/img/blog/blog-img3.png'),
            time: '23 Aug, 2019',
            author: 'By, Admin',
            title: '8 reasons why your website needs more whitespace',
            url: ''
          },
          {
            id: 1004,
            img: require('@/assets/img/blog/blog-img4.png'),
            time: '24 Aug, 2019',
            author: 'By, Admin',
            title: '9 reasons why your website needs more whitespace',
            url: ''
          }
        ]
      }
    }
  },
  data () {
    return {
      navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>']
    }
  }
}
</script>

<style scoped>
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
  .section-heading {
    text-align: center;
    margin-bottom: 50px;
  }
  .section-heading .title {
    font-size: 40px;
    line-height: 50px;
    font-weight: 500;
    color: #131333;
    margin-bottom: 12px;
  }
  .section-heading .title.extra-padding {
    margin-bottom: 20px;
  }
  .section-heading .text {
    font-size: 16px;
    line-height: 26px;
  }
  /* Blog Area Start */
  .blog-section {
    padding: 120px 0px 119px; }
  .blog-section .section-heading {
    margin-bottom: 56px; }
  .blog-section .section-heading .title {
    margin-bottom: 21px; }

  .single-blog .img {
    position: relative;
    border-radius: 13px;
    height: 326px !important;
    overflow: hidden; }

  .single-blog .img::after {
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.2);
    opacity: 0;
    -webkit-transition: all 0.3s ease-in;
    -o-transition: all 0.3s ease-in;
    transition: all 0.3s ease-in; }
  .single-blog .img img {
    width: 100%;
    /*width: 350px;*/
  }

  .single-blog .content .top-meta {
    margin-top: 23px; }
  .single-blog .content .top-meta li {
    display: inline-block;
    margin-right: 20px; }
  .single-blog .content .top-meta li:last-child {
    margin-right: 0px; }
  .single-blog .content .top-meta li p {
    margin-bottom: 11px; }

  .single-blog .content .title {
    font-size: 20px;
    line-height: 30px;
    font-weight: 500;
    -webkit-transition: all 0.3s ease-in;
    -o-transition: all 0.3s ease-in;
    transition: all 0.3s ease-in; }
  .single-blog .content .title:hover {
    color: #5e00d9; }

  .single-blog:hover .img::after {
    opacity: 1; }

  /* Blog Area End */

</style>
