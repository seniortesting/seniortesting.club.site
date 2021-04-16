<template>
  <!--Experts Section-->
  <section class="experts-section">
    <!--Title Box-->
    <div class="title-box">
      <div class="auto-container">
        <h2>{{ title }}</h2>
        <div class="text" v-html="desc" />
      </div>
    </div>

    <div class="auto-container">
      <div class="inner-container">
        <div class="row clearfix">
          <!--Expert Block-->
          <div v-for="item in data" :key="item.title" class="expert-block col-lg-4 col-md-6 col-sm-12">
            <div class="inner-box" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1500">
              <div class="image">
                <img :src="item.icon" alt="" title="">
              </div>
              <div class="lower-content">
                <h3>{{ item.title }}</h3>
                <div class="text">
                  {{ item.desc }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--End Experts Section-->
</template>

<script>
export default {
  name: 'ServiceThreeColumnExpert',
  props: {
    title: {
      type: String,
      default: 'Digital Marketing & SEO Experts'
    },
    desc: {
      type: String,
      default: 'Synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer <br> service with robust ideas dynamically innovate resource-leveling customer SEO Needs'
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            icon: require('@/assets/img/service/service-circle1.png'),
            title: 'Keywords Research',
            desc: 'Frameworks to provide robust synopsis for high level views lterative approaches corporate strategy.',
            url: ''
          },
          {
            icon: require('@/assets/img/service/service-circle2.png'),
            title: 'Search Engine Submission',
            desc: ' Frameworks to provide robust synopsis for high level views lterative approaches corporate strategy.',
            url: ''
          },
          {
            icon: require('@/assets/img/service/service-circle3.png'),
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

  .auto-container{
    position:static;
    max-width:1200px;
    padding:0px 15px;
    margin:0 auto;
  }
  h1,h2,h3,h4,h5,h6 {
    position:relative;
    font-weight:normal;
    margin:0px;
    background:none;
    line-height:1.6em;
    font-family: 'Poppins', sans-serif;
  }

  .expert-block{
    position:relative;
  }
  img{
    display:inline-block;
    max-width:100%;
    height:auto;
  }
  .experts-section{
    position:relative;
  }

  .experts-section .title-box{
    position:relative;
    text-align:center;
    padding-top:90px;
    padding-bottom:220px;
    background-size:cover;
    background-repeat:no-repeat;
    background-image: url(~assets/img/bg/service-bg.jpg);
  }

  .experts-section .title-box:before{
    position:absolute;
    content:'';
    left:0px;
    top:0px;
    width:100%;
    height:100%;
    display:block;
    background-color:rgba(33,71,135,0.98);
  }

  .experts-section .title-box:after{
    position:absolute;
    content:'';
    left:-20px;
    bottom:-60px;
    right:-20px;
    height:100px;
    border-radius:50%;
    background-color:#ffffff;
  }

  .experts-section .title-box h2{
    position:relative;
    color:#ffffff;
    font-size:36px;
    font-weight:600;
    line-height:1.3em;
    margin-bottom:15px;
  }

  .experts-section .title-box .text{
    position:relative;
    font-size:16px;
    font-weight:300;
    line-height:1.7em;
    max-width:770px;
    margin:0 auto;
    color:rgba(255,255,255,0.60);
  }

  .experts-section .inner-container{
    position:relative;
    padding:70px 30px;
    margin-top:-160px;
    background-color:#ffffff;
    box-shadow:0px 0px 45px rgba(0,0,0,0.15);
  }

  .experts-section .inner-container .row{
    margin:0px -30px;
  }

  .experts-section .inner-container .expert-block{
    padding:0px 30px;
  }

  .expert-block{
    position:relative;
  }

  .expert-block .inner-box{
    position:relative;
    text-align:center;
  }

  .expert-block .inner-box .image{
    position:relative;
    width:124px;
    height:128px;
    border-radius:50%;
    overflow:hidden;
    margin:0 auto;
  }

  .expert-block .inner-box .lower-content{
    position:relative;
    padding-top:32px;
  }

  .expert-block .inner-box .lower-content h3{
    position:relative;
    font-size:20px;
    color:#222222;
    font-weight:600;
    line-height:1.4em;
    margin-bottom:15px;
  }

  .expert-block .inner-box .lower-content .text{
    position:relative;
    font-size:16px;
    color:#777777;
    line-height:1.6em;
  }

  @media only screen and (max-width: 991px){
    .experts-section .title-box .text br,
    .main-header .header-upper .contact-number{
      display:none;
    }

    .expert-block{
      margin-bottom:30px;
    }
    .experts-section .inner-container{
      padding-bottom:40px;
    }
  }
  @media only screen and (max-width: 767px){
    .experts-section .title-box h2,
    .performing-section .title-box h2{
      font-size:28px;
    }
  }
</style>
