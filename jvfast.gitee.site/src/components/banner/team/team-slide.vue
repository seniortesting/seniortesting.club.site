<template>
  <!-- Team Area Start -->
  <section id="team" class="team">
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
              :items="4"
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
              :responsive=" {
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
                },
                1200: {
                  items: 3
                }
              }"
              class="team-slider"
            >
              <div v-for="item in data" :key="item.name" class="slider-item">
                <div class="single-team">
                  <div class="img">
                    <img :src="item.avatar" alt="">
                  </div>
                  <div class="content">
                    <h4 class="name">
                      {{ item.name }}
                    </h4>
                    <p class="designation">
                      {{ item.title }}
                    </p>
                    <ul class="social-links">
                      <li v-for="social in item.socials" :key="social.url">
                        <a :href="social.url" class="link" data-toggle="tooltip" data-placement="top" :title="social.tip">
                          <i class="fab" :class="social.name" />
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </vue-slider>
          </client-only>
        </div>
      </div>
    </div>
  </section>
  <!-- Team Area End -->
</template>

<script>
export default {
  name: 'TeamSlide',
  props: {
    title: {
      type: String,
      default: 'Our Creative Team'
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
            avatar: require('@/assets/img/team/team-avatar1.jpg'),
            name: 'Jameson',
            title: 'CEO at Softio',
            socials: [
              { name: 'fa-qq', tip: 'QQ', url: '#' },
              { name: 'fa-weibo', tip: 'WeiBo', url: '#' },
              { name: 'fa-weixin', tip: 'WeiXin', url: '#' },
              { name: 'fa-twitter', tip: 'Twitter', url: '#' }
            ]
          },
          {
            avatar: require('@/assets/img/team/team-avatar2.jpg'),
            name: 'Zachary',
            title: 'CTO at Softio',
            socials: [
              { name: 'fa-qq', tip: 'QQ', url: '#' },
              { name: 'fa-weibo', tip: 'WeiBo', url: '#' },
              { name: 'fa-weixin', tip: 'WeiXin', url: '#' },
              { name: 'fa-twitter', tip: 'Twitter', url: '#' }
            ]
          },
          {
            avatar: require('@/assets/img/team/team-avatar3.jpg'),
            name: 'Nathaniel',
            title: 'COO at Softio',
            socials: [
              { name: 'fa-qq', tip: 'QQ', url: '#' },
              { name: 'fa-weibo', tip: 'WeiBo', url: '#' },
              { name: 'fa-weixin', tip: 'WeiXin', url: '#' },
              { name: 'fa-twitter', tip: 'Twitter', url: '#' }
            ]
          },
          {
            avatar: require('@/assets/img/team/team-avatar4.jpg'),
            name: 'Austin Bishop',
            title: 'MH at Softio',
            socials: [
              { name: 'fa-qq', tip: 'QQ', url: '#' },
              { name: 'fa-weibo', tip: 'WeiBo', url: '#' },
              { name: 'fa-weixin', tip: 'WeiXin', url: '#' },
              { name: 'fa-twitter', tip: 'Twitter', url: '#' }
            ]
          },
          {
            avatar: require('@/assets/img/team/team-avatar5.jpg'),
            name: 'Harrison',
            title: 'DH at Softio',
            socials: [
              { name: 'fa-qq', tip: 'QQ', url: '#' },
              { name: 'fa-weibo', tip: 'WeiBo', url: '#' },
              { name: 'fa-weixin', tip: 'WeiXin', url: '#' },
              { name: 'fa-twitter', tip: 'Twitter', url: '#' }
            ]
          }
        ]
      }
    }
  },
  data () {
    return {
      navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
    }
  }
}
</script>

<style scoped>
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
  /* Team Area Start */
  .team {
    padding: 121px 0px 115px; }
  .team .section-heading {
    margin-bottom: 36px; }
  .team .team-slider .slider-item {
    padding: 60px 15px 15px; }

  .single-team {
    -webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
    padding: 20px 20px 25px;
    border-radius: 7px; }
  .single-team .img {
    position: relative;
    top: -60px; }
  .single-team .img img {
    width: 100%;
    border-radius: 7px;
    -webkit-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1); }
  .single-team .content {
    text-align: center;
    position: relative;
    margin-top: -37px; }
  .single-team .content .name {
    font-size: 18px;
    line-height: 28px;
    margin-bottom: 0px;
    color: #131333; }
  .single-team .content .designation {
    font-size: 14px;
    line-height: 24px;
    color: #555;
    margin-bottom: 18px; }
  .single-team .content .social-links {
    display: block; }
  .single-team .content .social-links li {
    display: inline-block; }
  .single-team .content .social-links li a {
    color: #131333;
    font-size: 14px;
    margin: 0px 4px;
    display: block; }

  /* Team Area End */
</style>
