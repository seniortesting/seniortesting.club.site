<template>
  <!-- START FEATURES -->
  <section id="feature" class="feature_area section-padding">
    <div class="container">
      <div class="row">
        <div
          class="col-lg-6 col-sm-12 col-xs-12"
          data-aos="fade-up-right"
          data-aos-offset="0"
          data-aos-duration="1000"
          data-aos-delay="0"
          data-aos-easing="ease-in-out"
          data-aos-anchor-placement="center-center"
        >
          <div class="single_feature">
            <h2>{{ title }}</h2>
            <ul>
              <li v-for="item in features" :key="item">
                <span class="fas fa-check" />{{ item }}
              </li>
            </ul>
            <a :href="readMore.url">{{ readMore.title }}</a>
          </div>
        </div><!-- END COL -->
        <div
          class="col-lg-6 col-sm-12 col-xs-12"
          data-aos="fade-up-left"
          data-aos-duration="1000"
          data-aos-delay="300"
          data-aos-offset="0"
          data-aos-easing="ease-in-out"
        >
          <div class="feature_img">
            <img :src="img" class="img-fluid" alt="">
          </div>
        </div><!-- END COL -->
      </div><!-- END ROW -->
    </div><!-- END CONTAINER -->
  </section>
  <!-- END FEATURES -->
</template>

<script>
export default {
  name: 'FeatureHighlight',
  props: {
    title: {
      type: String,
      default: 'Make business easy with beautiful landing page Lalvai'
    },
    features: {
      type: Array,
      default: () => {
        return [
          'There are many variations of passages',
          'If you are going to use a passage of Lorem Ipsum, you need to be sure',
          'All the Lorem Ipsum generators on the Internet tend',
          'If you use this site regularly and would like to help'
        ]
      }
    },
    readMore: {
      type: Object,
      default: () => {
        return {
          title: 'Read More',
          url: ''
        }
      }
    },
    img: {
      type: String,
      default: require('@/assets/img/feature/feature-icon1.png')
    }
  }
}
</script>

<style scoped>
  @import url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800');
  a {
    font-family: 'Poppins', sans-serif;
    text-decoration: none;
    transition: all 0.2s ease 0s;
  }
  a:hover {
    color: #fff;
    text-decoration: none;
  }
  a:focus {
    outline: none;
    text-decoration: none;
  }
  p {
    margin: 0;
    padding: 0;
  }
  ul,
  li {
    margin: 0;
    padding: 0;
  }
  /*START SECTION TITLE DESIGN*/
  .section-padding {padding: 80px 0;}
  .section-title{margin-bottom:60px;}
  .section-title h1 {
    font-size: 46px;
    font-weight: 500;
    line-height: 55px;
    margin-top: 0;
    position: relative;
    text-transform: capitalize;
    margin-bottom: 15px;
  }
  .single_feature {
    margin-bottom:30px;
  }
  .single_feature{}
  .single_feature h2 {
    font-weight: 500;
    font-size: 50px;
    margin-bottom: 30px;
    line-height: 60px;
  }
  @media only screen and (max-width:480px) {
    .single_feature h2 {font-size: 40px;line-height: 50px;}
  }
  .single_feature ul{list-style:none;margin-bottom: 30px;}
  .single_feature ul li{line-height:30px;}
  .single_feature ul li span{
    margin-right:10px;
    color:#35ac39;
  }
  .single_feature a{
    background: #35ac39;
    border: 2px solid #35ac39;
    border-radius: 500px;
    color: #fff;
    display: inline-block;
    font-size: 16px;
    overflow: hidden;
    padding: 10px 30px;
    text-transform: capitalize;
    transition: all 0.3s ease 0s;
  }
  @media only screen and (max-width:360px) {
    .single_feature {padding: 10px 40px;}
  }
  .single_feature a:hover, .single_feature a:focus{
    background:#35ac39;
    color:#fff;
    border: 2px solid #35ac39;
  }
</style>
