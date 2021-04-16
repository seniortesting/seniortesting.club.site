<template>
  <!--Feature Section-->
  <section class="featured-section">
    <div class="auto-container">
      <!--Sec Title-->
      <div class="sec-title centered">
        <div class="title-icon">
          <span class="icon"><img src="~assets/img/separater.png" alt=""></span>
        </div>
        <h2>{{ title }}</h2>
        <div class="text" v-html="desc" />
      </div>

      <div class="row clearfix">
        <!--Feature Block Two-->
        <div v-for="(item,index) in data" :key="item.title" class="feature-block-two col-lg-4 col-md-6 col-sm-12">
          <div class="inner-box" :data-aos=" index%2===0? 'fade-right': 'fade-left'" data-aos-delay="0" data-aos-duration="1000">
            <div class="icon-box">
              <span class="icon"><img :src="item.icon" alt=""></span>
            </div>
            <h3><a :href="item.url">{{ item.title }}</a></h3>
            <div class="text">
              {{ item.desc }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--End Feature Section-->
</template>

<script>
export default {
  name: 'FeatureThreeColumnTop',
  props: {
    title: {
      type: String,
      default: 'Features That Deserve Top Rankings'
    },
    desc: {
      type: String,
      default: 'Objectively innovate new methods has evolved from generation the runway heading streamlined cloud solutions that <br> user generated content in real-time will have multiple touchpoints for offshoring.'
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            icon: require('@/assets/img/feature/feature-circle1.png'),
            title: 'Fully Responsive',
            desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.',
            url: ''
          },
          {
            icon: require('@/assets/img/feature/feature-circle2.png'),
            title: 'Latest Bootstrap',
            desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.',
            url: ''
          },
          {
            icon: require('@/assets/img/feature/feature-circle3.png'),
            title: 'Dedicated Support',
            desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.',
            url: ''
          },
          {
            icon: require('@/assets/img/feature/feature-circle4.png'),
            title: 'Love Customer',
            desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.',
            url: ''
          },
          {
            icon: require('@/assets/img/feature/feature-circle5.png'),
            title: 'Mordern Design',
            desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.',
            url: ''
          },
          {
            icon: require('@/assets/img/feature/feature-circle6.png'),
            title: 'Html5/Css3',
            desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.',
            url: ''
          }
        ]
      }
    }
  }
}
</script>

<style scoped>
  * {
    margin:0px;
    padding:0px;
    border:none;
    outline:none;
  }
  .auto-container {
    position: static;
    max-width: 1200px;
    padding: 0px 15px;
    margin: 0 auto;
  }
  .sec-title{
    position:relative;
    margin-bottom:55px;
  }

  .sec-title .title{
    position:relative;
    color: #777777;
    font-size: 14px;
    line-height: 1.8em;
    font-weight: 400;
    margin-top:15px;
    letter-spacing: 2px;
    text-transform: uppercase;
  }

  .sec-title h2{
    position:relative;
    color:#222222;
    font-size:40px;
    font-weight:600;
    line-height:1.2em;
    margin-bottom: 15px;
  }

  .sec-title .text{
    position:relative;
    color: #777777;
    font-size: 16px;
    line-height: 1.8em;
  }

  .sec-title .title-icon{
    position:relative;
    width: 30px;
    margin-bottom: 20px;
  }

  .sec-title .title-icon .icon{
    position:relative;
    display:inline-block;
  }

  .sec-title.centered .title-icon{
    margin:0 auto 20px;
  }

  .sec-title.centered{
    text-align: center;
  }

  @-webkit-keyframes zoomInFader {
    0% {
      -webkit-transform: rotate(0deg) scale(0.7);
      transform: rotate(0deg) scale(0.7);
      opacity:0;
    }

    50% {
      -webkit-transform: rotate(180deg) scale(1);
      transform: rotate(180deg) scale(1);
      opacity:1;
    }

    100% {
      -webkit-transform: rotate(360deg) scale(0.7);
      transform: rotate(360deg) scale(0.7);
      opacity:0;
    }
  }

  .sec-title .title-icon .icon{
    animation-name: zoomInFader;
    animation-duration: 3s;
    animation-iteration-count: infinite;
    animation-timing-function: ease-in-out;

    -webkit-animation-name: zoomInFader;
    -webkit-animation-duration: 3s;
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-timing-function: ease-in-out;

    -moz-animation-name: zoomInFader;
    -moz-animation-duration: 3s;
    -moz-animation-iteration-count: infinite;
    -moz-animation-timing-function: ease-in-out;

    -ms-animation-name: zoomInFader;
    -ms-animation-duration: 3s;
    -ms-animation-iteration-count: infinite;
    -ms-animation-timing-function: ease-in-out;

    -o-animation-name: zoomInFader;
    -o-animation-duration: 3s;
    -o-animation-iteration-count: infinite;
    -o-animation-timing-function: ease-in-out;
  }
  a{
    text-decoration:none;
    cursor:pointer;
    color:#08c8af;
  }

  button,
  a:hover,a:focus,a:visited{
    text-decoration:none;
    outline:none !important;
  }

  h1,h2,h3,h4,h5,h6 {
    position:relative;
    font-weight:normal;
    margin:0px;
    background:none;
    line-height:1.6em;
    font-family: 'Poppins', sans-serif;
  }

  .centered{
    text-align:center;
  }
  img{
    display:inline-block;
    max-width:100%;
    height:auto;
  }
  .feature-block-two{
    position:relative;
    margin-bottom:60px;
  }

  .featured-section{
    position:relative;
    padding:100px 0px 50px;
  }

  .feature-block-two{
    position:relative;
    margin-bottom:60px;
  }

  .feature-block-two .inner-box{
    position:relative;
    text-align:center;
    padding:0px 30px;
  }

  .feature-block-two .inner-box .icon-box{
    position:relative;
    margin:0 auto;
    padding-top:30px;
    margin-bottom:60px;
  }

  .feature-block-two .inner-box.animated .icon-box{
    -webkit-animation-name: zoomInStable;
    animation-name: zoomInStable;
    -webkit-animation-duration: 2s;
    animation-duration: 2s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
    -webkit-animation-delay: 0.5s;
    animation-delay: 0.5s;
  }

  .feature-block-two .inner-box .icon-box:before{
    position:absolute;
    content:'';
    left:50%;
    top:0px;
    width:95px;
    height:125px;
    margin-left:-47px;
    border-radius:20px;
    -moz-transform: rotate(-50deg);
    -webkit-transform:rotate(-50deg);
    -ms-transform: rotate(-50deg);
    -o-transform: rotate(-50deg);
    transform:rotate(-50deg);
    background-color:#f9f9f9;
    -webkit-transition: all 900ms ease;
    -moz-transition: all 900ms ease;
    -ms-transition: all 900ms ease;
    -o-transition: all 900ms ease;
    transition: all 900ms ease;
  }

  .feature-block-two .inner-box:hover .icon-box:before{
    background-color:#43adf3;
    opacity:0.30;
    transform:rotate(60deg);
    -moz-transition: rotate(60deg);
    -webkit-transition:rotate(60deg);
    -ms-transition: rotate(60deg);
    -o-transition: rotate(60deg);
  }

  .feature-block-two .inner-box .icon-box .icon{
    position:relative;
    margin:0 auto;
    width:64px;
    height:64px;
    margin-bottom:60px;
  }

  .feature-block-two .inner-box h3{
    position:relative;
    font-size:20px;
    font-weight:600;
    line-height:1.3em;
    margin-bottom:15px;
  }

  .feature-block-two .inner-box h3 a{
    position:relative;
    color:#222222;
    transition:all 300ms ease;
    -webkit-transition:all 300ms ease;
    -ms-transition:all 300ms ease;
    -o-transition:all 300ms ease;
  }

  .feature-block-two .inner-box h3 a:hover{
    color:#43adf3;
  }

  .feature-block-two .inner-box .text{
    position:relative;
    font-size:16px;
    line-height:1.6em;
  }

  .sec-title h2,
  .help-section .title-column .inner-column .title-box h2{
    font-size:32px;
    line-height: 1.3em;
  }
  @media only screen and (max-width: 1140px) {
    @media only screen and (max-width: 767px) {
      .sec-title h2,
      .page-title h1,
      .experts-section .title-box h2,
      .performing-section .title-box h2 {
        font-size: 28px;
      }
    }
  }
  @media only screen and (max-width: 599px){
    .blog-single .inner-box .lower-content h2,
    .sec-title h2,
    .help-section .title-column .inner-column .title-box h2{
      font-size:24px !important;
    }
  }

</style>
