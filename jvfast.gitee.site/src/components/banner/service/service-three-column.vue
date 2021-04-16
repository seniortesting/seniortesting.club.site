<template>
  <section class="services-section">
    <div class="auto-container">
      <!--Sec Title-->
      <div class="sec-title centered">
        <div class="title-icon">
          <span class="icon"><img src="~assets/img/separater.png" alt=""></span>
        </div>
        <div class="title">
          {{ title }}
        </div>
        <h2 v-html="desc" />
      </div>
      <div class="clearfix">
        <!--Services Block-->
        <div v-for="item in data" :key="item.title" class="services-block col-lg-4 col-md-6 col-sm-12">
          <div class="inner-box" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1500" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
            <div class="icon-box">
              <span class="icon"><img :src="item.icon" alt=""></span>
            </div>
            <div class="lower-content">
              <h3><a :href="item.url">{{ item.title }}</a></h3>
              <div class="text">
                {{ item.desc }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'ServiceThreeColumn',
  props: {
    title: {
      type: String,
      default: 'BOOST YOUR SALES EASILY IN NO TIME'
    },
    desc: {
      type: String,
      default: 'Your Brand Get Complete Focus <br/>For Better Results & Growth'
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            icon: require('@/assets/img/service/service-icon7.png'),
            title: 'Keywords Research',
            desc: 'Frameworks to provide robust synopsis for high level views lterative approaches corporate strategy.',
            url: ''
          },
          {
            icon: require('@/assets/img/service/service-icon8.png'),
            title: 'Search Engine Submission',
            desc: ' Frameworks to provide robust synopsis for high level views lterative approaches corporate strategy.',
            url: ''
          },
          {
            icon: require('@/assets/img/service/service-icon9.png'),
            title: 'Real-Time Analytics',
            desc: ' Frameworks to provide robust synopsis for high level views lterative approaches corporate strategy.',
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
  h1,h2,h3,h4,h5,h6 {
    position:relative;
    font-weight:normal;
    margin:0px;
    background:none;
    line-height:1.6em;
    font-family: 'Poppins', sans-serif;
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
  .auto-container{
    position:static;
    max-width:1200px;
    padding:0px 15px;
    margin:0 auto;
  }
  img{
    display:inline-block;
    max-width:100%;
    height:auto;
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
  .centered{
    text-align:center;
  }
  .services-section{
    position: relative;
    padding:40px 0px 80px;
  }

  .services-section.style-two:before{
    position:absolute;
    content:'';
    left:0px;
    bottom:0px;
    width:100%;
    height:342px;
    display:block;
    background: url(~assets/img/service/service-bg-white.png) left top repeat-x;
  }

  .services-section .services-block{
    padding:0px;
    float: left;
  }

  .services-block{
    position: relative;
  }

  .services-block .inner-box{
    position: relative;
    padding-top: 35px;
    text-align: center;
    overflow: hidden;
    background-color: #08c8af;
  }

  .services-block:nth-child(2) .inner-box{
    background-color: #f96d49;
  }

  .services-block:nth-child(3) .inner-box{
    background-color: #41acf3;
  }

  .services-block .inner-box .icon-box{
    position: relative;
    margin-bottom: 20px;
    display: inline-block;
    transition:all 500ms ease;
    -webkit-transition:all 500ms ease;
    -ms-transition:all 500ms ease;
    -o-transition:all 500ms ease;
  }

  .services-block .inner-box:hover .icon-box{
    /* transform:rotate(45deg); */
  }

  .services-block .inner-box .icon-box:before{
    position: absolute;
    content: '';
    left: 0px;
    top: 0px;
    width: 250px;
    height: 205px;
    background: url(~assets/img/service/service-bg-transparent.png) no-repeat;
    transition:all 700ms ease;
    -webkit-transition:all 700ms ease;
    -ms-transition:all 700ms ease;
    -o-transition:all 700ms ease;
  }

  .services-block .inner-box:hover .icon-box:before{
    -webkit-transform:scale(1.5) rotate(180deg);
    -ms-transform:scale(1.5) rotate(180deg);
    transform:scale(1.5) rotate(180deg);
    opacity:0.80;
  }

  .services-block .inner-box .lower-content{
    position: relative;
    padding: 40px 20px;
  }

  .services-block .inner-box .lower-content:before{
    position:absolute;
    content: '';
    left: 0px;
    bottom: 0px;
    width: 100%;
    height: 0%;
    transition: all 900ms ease;
    -moz-transition: all 900ms ease;
    -webkit-transition: all 900ms ease;
    -ms-transition: all 900ms ease;
    -o-transition: all 900ms ease;
    background-color: rgba(0,0,0,0.08);
  }

  .services-block .inner-box:hover .lower-content:before{
    height:100%;
  }

  .services-block .inner-box .lower-content h3{
    position: relative;
    font-size: 20px;
    font-weight: 600;
    line-height: 1.3em;
    margin-bottom: 20px;
  }

  .services-block .inner-box .lower-content h3:before{
    position:absolute;
    content: '';
    left: -50px;
    top: 12px;
    right: -50px;
    height: 5px;
    transition: all 900ms ease;
    -moz-transition: all 900ms ease;
    -webkit-transition: all 900ms ease;
    -ms-transition: all 900ms ease;
    -o-transition: all 900ms ease;
    background-color: rgba(0,0,0,0.08);
  }

  .services-block .inner-box:hover .lower-content h3:before{
    opacity: 0;
    visibility: hidden;
  }

  .services-block .inner-box .lower-content h3 a{
    position: relative;
    color: #ffffff;
  }

  .services-block .inner-box .lower-content .text{
    position: relative;
    color: #ffffff;
    font-weight: 300;
    font-size: 16px;
    line-height: 1.6em;
    max-width: 270px;
    margin: 0 auto;
  }
  @media only screen and (max-width: 1140px){
    .sec-title h2,
    .help-section .title-column .inner-column .title-box h2{
      font-size:32px;
      line-height: 1.3em;
    }
  }
  @media only screen and (max-width: 991px){
    .sec-title .text br,
    .sec-title h2 br,
    .experts-section .title-box .text br,
    .main-header .header-upper .contact-number{
      display:none;
    }
  }
  @media only screen and (max-width: 767px){
    .sec-title h2,
    .page-title h1,
    .experts-section .title-box h2,
    .performing-section .title-box h2{
      font-size:28px;
    }

  }
  @media only screen and (max-width: 599px){
    .sec-title h2,
    .help-section .title-column .inner-column .title-box h2{
      font-size:24px !important;
    }
  }
</style>
