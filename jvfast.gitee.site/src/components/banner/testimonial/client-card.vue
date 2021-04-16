<template>
  <!--reviews start -->
  <section id="reviews" class="reviews">
    <div class="section-header">
      <h2>{{ title }}</h2>
      <p>{{ desc }}</p>
    </div><!--/.section-header-->
    <div class="reviews-content">
      <div class="testimonial-carousel">
        <div v-for="item in data" :key="item.title" class="single-testimonial-box">
          <div class="testimonial-description">
            <div class="testimonial-info">
              <div class="testimonial-img">
                <img :src="item.avatar" alt="clients">
              </div><!--/.testimonial-img-->
              <div class="testimonial-person">
                <h2>{{ item.name }}</h2>
                <h4>{{ item.title }}</h4>
                <div class="testimonial-person-star">
                  <i class="fa fa-star" />
                  <i class="fa fa-star" />
                  <i class="fa fa-star" />
                  <i class="fa fa-star" />
                  <i class="fa fa-star" />
                </div>
              </div><!--/.testimonial-person-->
            </div><!--/.testimonial-info-->
            <div class="testimonial-comment">
              <p>
                {{ item.content }}
              </p>
            </div><!--/.testimonial-comment-->
          </div><!--/.testimonial-description-->
        </div><!--/.single-testimonial-box-->
      </div>
    </div>
  </section><!--/.reviews-->
  <!--reviews end -->
</template>

<script>
let tns = null
if (process.client || process.BROWSER_BUILD) {
  tns = require('tiny-slider/src/tiny-slider.module').tns
}
export default {
  name: 'ClientCard',
  props: {
    title: {
      type: String,
      default: 'clients reviews'
    },
    desc: {
      type: String,
      default: 'What our client say about us'
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            stars: 5,
            content: 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.',
            name: 'Tom Leakar',
            avatar: require('@/assets/img/reviewer/client-p1.png'),
            title: 'london, UK'
          },
          {
            stars: 5,
            content: 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.',
            name: 'monirul islam',
            avatar: require('@/assets/img/reviewer/client-p2.png'),
            title: 'CEO at ABC'
          },
          {
            stars: 5,
            content: 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.',
            name: 'Austin Bishop',
            avatar: require('@/assets/img/reviewer/client-p3.png'),
            title: 'CEO at ABC'
          }
        ]
      }
    }
  },
  mounted () {
    // eslint-disable-next-line no-unused-vars
    const slider = tns({
      container: '.testimonial-carousel',
      items: 3,
      nav: false,
      controls: false,
      gutter: 0,
      center: true,
      autoplay: true,
      autoplayTimeout: 6000,
      autoplayButtonOutput: false,
      speed: 1000,
      lazyload: false,
      mouseDrag: true,
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
    })
  }
}
</script>

<style scoped>
  h1,h2,h3,h4,h5,h6 {
    margin: 0;
    color:#343a3f;
    font-size: 18px;
    font-weight: 500;
    text-transform: capitalize;
  }
  p {
    margin: 0;
    color:#767f86;
    font-size:14px;
    line-height: 1.8;
    text-transform: initial;
  }
  img{border:none;max-width:100%; height:auto;}
  /* section-header */
  .section-header{
    position: relative;
    text-align: center;
  }
  .section-header h2{
    color: #505866;
    font-size:24px;
    font-weight: 500;
    margin-bottom: 24px;
    text-transform: uppercase;
    letter-spacing: 1.3px;
  }
  .section-header h2 span{text-transform: lowercase;}
  .section-header p{
    font-size:16px;
  }
  .reviews{padding:117px 0 75px;}
  .reviews-content {margin-top:36px;}

  /*single-testimonial-box */
  .single-testimonial-box  {
    padding: 50px 30px;
    box-shadow: 0 0px 5px rgba(71,71,71,.2);
    overflow-x:hidden;
    -webkit-transition: .3s;
    -moz-transition:.3s;
    -ms-transition:.3s;
    -o-transition:.3s;
    transition: .3s;
  }
  .single-testimonial-box:hover{box-shadow:0 10px 20px rgba(21,19,19,.2);}
  .slick-current .single-testimonial-box{box-shadow:0 10px 20px rgba(21,19,19,.2);}
  /*testimonial-description*/
  .single-testimonial-box{
    width: 404px;
    background:#fff;
  }
  /* testimonial-info */
  .testimonial-info {
    display: flex;
    align-items: center;
    text-transform:capitalize;
  }
  .testimonial-img {
    position: relative;
    top: 11px;
    margin-right: 5px;
    border-radius:50%;
    -webkit-transition: .3s;
    -moz-transition:.3s;
    -ms-transition:.3s;
    -o-transition:.3s;
    transition: .3s;
  }
  .testimonial-person {
    margin-left: 15px;
    margin-top: 11px;
  }
  .testimonial-person h2 {
    color: #505866;
    font-size: 18px;
  }
  .testimonial-person h4 {
    color: #a2a5ab;
    font-size: 14px;
    font-weight: 400;
    margin-top: 10px;
  }
  .testimonial-person-star i {
    color: #ffda2b;
    margin: 9px 4px 0 0;
  }/* testimonial-info */

  /* testimonial-comment */
  .testimonial-comment {
    margin-top: 18px;
  }
  .testimonial-comment p{
    color: #8d939e;
    font-size: 14px;
    font-weight: 300;
  }/* testimonial-comment */

  /*.slick-slide*/
  .slick-initialized .slick-slide {
    display: block;
    padding: 40px 0;
  }
  .slick-slide.slick-cloned {outline: 0!important;}
  .slick-slide {
    margin: 0px 10px;
  }
  .slick-slide {
    transition: all ease-in-out .3s;
    opacity: .5;
  }
  .slick-active {
    opacity: .5;
  }
  .slick-current {
    opacity: 1;
  }
  /*.slick-slide*/
</style>
