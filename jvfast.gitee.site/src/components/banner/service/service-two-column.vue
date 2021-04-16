<template>
  <section id="service" class="services-section-two">
    <div class="auto-container">
      <!--Sec Title-->
      <div class="sec-title centered">
        <div class="title-icon">
          <span class="icon"><img src="images/icons/separater.png" alt=""></span>
        </div>
        <h2>{{ title }}</h2>
        <div class="text" v-html="desc" />
      </div>
      <div class="row clearfix">
        <!-- Services Block Two -->
        <div v-for="(item, index) in data" :key="item.title" class="services-block-two col-lg-6 col-md-12 col-sm-12">
          <div
            class="inner-box"
            :class="{'slideInLeft': index%2==0, 'slideInRight': index%2!==0}"
            :style="{animationName: index%2==0? 'slideInLeft':'slideInRight'}"
            :data-aos="index%2==0? 'slide-left':'slide-right'"
            data-aos-delay="50"
            data-aos-duration="1500"
            style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms;"
          >
            <div class="content">
              <div class="icon-box">
                <span class="icon"><img :src="item.icon" alt=""></span>
              </div>
              <h3><a :href="item.url">{{ item.title }}</a></h3>
              <div class="text" v-html="item.desc" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'ServiceBanner',
  props: {
    title: {
      type: String,
      default: 'SEO Planning Drive More Sales'
    },
    desc: {
      type: String,
      default: 'Going forward new normal that has evolved from generation the runway heading streamlined cloud solution <br> user generated content in real-time will have multiple touchpoints for offshoring'
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            icon: require('@/assets/img/service/service-icon1.png'),
            title: 'Keywords Research',
            desc: 'Frameworks to provide robust synopsis for high level views lterative approaches corporate strategy.',
            url: ''
          },
          {
            icon: require('@/assets/img/service/service-icon2.png'),
            title: 'Search Engine Submission',
            desc: ' Frameworks to provide robust synopsis for high level views lterative approaches corporate strategy.',
            url: ''
          },
          {
            icon: require('@/assets/img/service/service-icon3.png'),
            title: 'Real-Time Analytics',
            desc: ' Frameworks to provide robust synopsis for high level views lterative approaches corporate strategy.',
            url: ''
          },
          {
            icon: require('@/assets/img/service/service-icon3.png'),
            title: 'Content Marketing',
            desc: ' Frameworks to provide robust synopsis for high level views lterative approaches corporate strategy.',
            url: ''
          },
          {
            icon: require('@/assets/img/service/service-icon4.png'),
            title: 'Better SEO Campaigns',
            desc: ' Frameworks to provide robust synopsis for high level views lterative approaches corporate strategy.',
            url: ''
          },
          {
            icon: require('@/assets/img/service/service-icon5.png'),
            title: 'Conversion Boost',
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
  .auto-container{
    position:static;
    max-width:1200px;
    padding:0px 15px;
    margin:0 auto;
  }
  .sec-title{
    position:relative;
    margin-bottom:55px;
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
  .sec-title h2{
    position:relative;
    color:#222222;
    font-size:40px;
    font-weight:600;
    line-height:1.2em;
    margin-bottom: 15px;
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
  /***

  ====================================================================
    Services Section Two
  ====================================================================

  ***/

  .services-section-two{
    position:relative;
    padding:40px 0px 70px;
  }

  .services-section-two.alternate{
    padding:90px 0px 70px;
  }

  /* Services Block Two */

  .services-block-two{
    position: relative;
    margin-bottom: 35px;
  }

  .services-block-two .inner-box{
    position: relative;
    padding: 38px 40px 30px;
    background-color: #f9fafb;
    border-top: 2px solid #f9fafb;
    border-bottom: 2px solid #dddddd;
    transition:all 500ms ease;
    -webkit-transition:all 500ms ease;
    -ms-transition:all 500ms ease;
    -o-transition:all 500ms ease;
  }

  .services-block-two .inner-box:hover{
    border-top-color:#41acf3;
    background-color: #ffffff;
    border-bottom-color: #ffffff;
    box-shadow: 0px 0px 25px rgba(0,0,0,0.15);
  }

  .services-block-two .inner-box .content{
    position: relative;
    padding-left: 90px;
  }

  .services-block-two .inner-box .content .icon-box{
    position: absolute;
    left: 0px;
    top: 0px;
  }

  .services-block-two .inner-box .content h3{
    position: relative;
    font-size: 20px;
    font-weight: 600;
    line-height: 1.3em;
    margin-bottom: 15px;
  }

  .services-block-two .inner-box .content h3 a{
    position: relative;
    color: #222222;
    font-size: 20px;
    font-weight: 600;
    line-height: 1.3em;
    transition:all 300ms ease;
    -webkit-transition:all 300ms ease;
    -ms-transition:all 300ms ease;
    -o-transition:all 300ms ease;
  }

  .services-block-two .inner-box .content h3 a:hover{
    color:#41acf3;
  }

  .services-block-two .inner-box .content .text{
    position: relative;
    font-size: 16px;
    line-height: 1.6em;
  }
</style>
