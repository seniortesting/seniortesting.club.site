<template>
  <!-- Hero Area Start -->
  <div id="hero" class="hero-area">
    <div class="hero-img">
      <img :src="hero" alt="">
      <a href="" class="video-play-btn mfp-iframe">
        <i class="fas fa-play" />
      </a>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="left-content">
            <div class="content">
              <h1 class="title">
                {{ title }}
              </h1>
              <p class="text">
                {{ desc }}
              </p>
              <div class="subscribe-area">
                <form action="#" class="subscribe-form" @submit="subscrible">
                  <input v-model="phone" type="text" placeholder="Enter your phone number">
                  <button type="submit" class="submit-btn">
                    Start Free Trial
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Hero Area End -->
</template>

<script>
export default {
  name: 'HeroBlue',
  props: {
    title: {
      type: String,
      default: 'Simplest way to build tools'
    },
    desc: {
      type: String,
      default: 'Quality control of your data including read length distribution and uniformity assessment.'
    },
    hero: {
      type: String,
      default: require('@/assets/img/hero/hero-p1.png')
    }
  },
  data () {
    return {
      phone: ''
    }
  },
  methods: {
    subscrible () {
      setTimeout(() => {
        this.$emit('subscrible', this.phone)
        this.$toast.success('提交成功', {
          position: 'top-center',
          theme: 'toasted-primary',
          action: [
            {
              icon: 'times-circle',
              onClick: (e, toastObject) => {
                toastObject.goAway(0)
              }
            }
          ]
        })
      }, 100)
    }
  }
}
</script>

<style scoped>
  /*@import url("https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Rubik:300,400,500,700&display=swap");*/
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

  @-webkit-keyframes pulse-border {
    0% {
      -webkit-transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
      transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
      opacity: 1; }
    100% {
      -webkit-transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.3);
      transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.3);
      opacity: 0; } }

  @-moz-keyframes pulse-border {
    0% {
      transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
      opacity: 1; }
    100% {
      transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.3);
      opacity: 0; } }

  @-o-keyframes pulse-border {
    0% {
      transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
      opacity: 1; }
    100% {
      transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.3);
      opacity: 0; } }

  @keyframes pulse-border {
    0% {
      -webkit-transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
      transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
      opacity: 1; }
    100% {
      -webkit-transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.3);
      transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.3);
      opacity: 0; } }

  /* Popup Video CSS */
  .video-play-btn {
    display: inline-block;
    width: 100px;
    height: 100px;
    line-height: 100px;
    text-align: center;
    font-size: 28px;
    background: -webkit-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);
    background: -o-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);
    background: linear-gradient(50deg, #6e00ff 0, #bb00ff 100%);
    border-radius: 50%;
    position: relative;
    z-index: 1;
    color: #fff; }
  .video-play-btn:before {
    content: "";
    position: absolute;
    z-index: 0;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    display: block;
    width: 120px;
    height: 120px;
    background: -webkit-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);
    background: -o-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);
    background: linear-gradient(50deg, #6e00ff 0, #bb00ff 100%);
    border-radius: 50%;
    -webkit-animation: pulse-border 1500ms ease-out infinite;
    animation: pulse-border 1500ms ease-out infinite;
    z-index: -1; }
  .video-play-btn i {
    color: #fff; }

  /* Popup Video CSS */
  /* Hero Area Start */
  .hero-area {
    position: relative;
    position: relative;
    overflow: visible;
    padding: 306px 0px 250px;
    /*font-family: "Poppins", sans-serif;*/
    /*font-size: 16px;*/
    /*margin: 0;*/
    /*color: #555;*/
    background: linear-gradient(50deg, #6e00ff 0, #bb00ff 100%);
    border-radius: 0% 38% 40% 25% / 10% 0% 100% 0%;
  }
  /*.hero-area::after {*/
  /*  position: absolute;*/
  /*  content: "";*/
  /*  top: 0;*/
  /*  left: 0;*/
  /*  width: 100%;*/
  /*  min-height: 100%;*/
  /*  background: -webkit-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);*/
  /*  background: -o-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);*/
  /*  background: linear-gradient(50deg, #6e00ff 0, #bb00ff 100%);*/
  /*  border-radius: 0% 38% 40% 25% / 10% 0% 100% 0%;*/
  /*  z-index: -1; }*/
  .hero-area .hero-img {
    display: inline-block;
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    right: 80px;
    max-width: 46%;
    margin-top: 34px;
    -webkit-box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden; }
  .hero-area .hero-img .video-play-btn {
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    position: absolute;
    z-index: 9; }
  .hero-area .hero-img .pattern {
    position: absolute;
    left: 20px;
    bottom: 30px;
    -webkit-animation: h-p-a 7s linear infinite;
    animation: h-p-a 7s linear infinite;
    z-index: 3; }
  .hero-area .left-content {
    z-index: 9; }
  .hero-area .left-content .content .title {
    font-size: 60px;
    font-weight: 500;
    line-height: 70px;
    margin-bottom: 19px;
    color: #fff; }
  .hero-area .left-content .content .text {
    font-size: 18px;
    line-height: 28px;
    margin-bottom: 40px;
    color: #F7F8FC;
    margin-bottom: 47px; }
  .hero-area .left-content .content .subscribe-area .subscribe-form {
    position: relative; }
  .hero-area .left-content .content .subscribe-area .subscribe-form input {
    width: 100%;
    height: 55px;
    border: 0px;
    background: #fff;
    border-radius: 50px;
    padding: 0px 190px 0px 30px;
    outline: none;
  }
  .hero-area .left-content .content .subscribe-area .subscribe-form .submit-btn {
    position: absolute;
    top: 2px;
    right: 2px;
    height: 51px;
    line-height: 51px;
    padding: 0px 30px;
    background: -webkit-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);
    background: -o-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);
    background: linear-gradient(50deg, #6e00ff 0, #bb00ff 100%);
    background-size: 100% 200%;
    color: #fff;
    border: 0px;
    border-radius: 50px;
    -webkit-transition: all 0.3s ease-in;
    -o-transition: all 0.3s ease-in;
    transition: all 0.3s ease-in; }
  .hero-area .left-content .content .subscribe-area .subscribe-form .submit-btn:focus {
    outline: 0px;
    -webkit-box-shadow: unset;
    box-shadow: unset; }
  .hero-area .left-content .content .subscribe-area .subscribe-form .submit-btn:hover {
    background-size: 200% 100%; }

  /* Hero Area End */
  @media  (max-width: 991px) {
    .hero-area .hero-img{
      position: relative;
      max-width: 50%;
      width: auto;
      left: 50%;
      top: 0px;
      margin-top: 0px;
      transform: translateX(-50%);
    }
    .mainmenu-area{
      background: linear-gradient(50deg, #6e00ff 0, #bb00ff 100%);
      padding: 10px 0px;
      border-bottom: 0px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .hero-area {
      padding: 150px 0px 150px;
    }
    .video-play-btn {
      width: 70px;
      height: 70px;
      line-height: 70px;
      font-size: 20px;
    }
    .video-play-btn:before {
      width: 80px;
      height: 80px;
    }
    .hero-area .left-content .content .title {
      font-size: 40px;
      line-height: 50px;
    }
    .hero-area .left-content .content .text {
      font-size: 16px;
      line-height: 26px;
    }
    .hero-area .left-content{
      margin-top: 44px;
      text-align: center;
    }
    .hero-area .left-content .content .subscribe-area{
      padding: 0px 100px;
    }
    .hero-area{
      border-radius: 0px;
    }
    .hero-area {
      padding: 150px 0px 100px;
    }
  }
  @media  (max-width: 767px) {

    .hero-area .left-content .content .subscribe-area {
      padding: 0px 0px;
    }
    .hero-area .hero-img {
      max-width: 70%;
    }
  }
  @media  (max-width: 414px) {

    .hero-area .hero-img {
      max-width: 90%;
    }

    .hero-area .left-content .content .subscribe-area .subscribe-form .submit-btn {
      padding: 0px 12px;
    }

    .hero-area .left-content .content .subscribe-area .subscribe-form input {
      height: 45px;
      padding: 0px 135px 0px 20px;
      font-size: 14px;
    }

    .hero-area .left-content .content .subscribe-area .subscribe-form .submit-btn {
      height: 41px;
      line-height: 41px;
      padding: 0px 12px;
      font-size: 14px;
    }

    .hero-area .left-content .content .title {
      font-size: 32px;
      line-height: 42px;
    }
  }
  @media  (max-width: 360px) {
    .section-heading .title {
      font-size: 26px;
      line-height: 36px;
    }
    .hero-area .left-content .content .title {
      font-size: 30px;
      line-height: 40px;
    }
  }
</style>
