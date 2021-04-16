<template>
  <section id="intro" class="clearfix">
    <div class="container">
      <div class="intro-img">
        <img :src="hero" alt="" class="img-fluid">
      </div>

      <div class="intro-info">
        <h2 v-html="desc" />
        <div>
          <a :href="action[0].url" class="btn-get-started scrollto">{{ action[0].title }}</a>
          <a :href="action[1].url" class="btn-services scrollto">{{ action[1].title }}</a>
        </div>
      </div>
    </div>
  </section><!-- #intro -->
</template>

<script>
export default {
  name: 'HeroIntroduce',
  props: {
    desc: {
      type: String,
      default: 'We provide<br><span>solutions</span><br>for your business!'
    },
    action: {
      type: Array,
      default: () => {
        return [
          {
            title: 'Get Started',
            url: '#'
          },
          {
            title: 'Our Services',
            url: '#'
          }
        ]
      }
    },
    hero: {
      type: String,
      default: require('@/assets/img/hero/hero-intro.svg')
    }
  }
}
</script>

<style scoped>
  a {
    color: #007bff;
    transition: 0.5s;
  }

  a:hover,
  a:active,
  a:focus {
    color: #0b6bd3;
    outline: none;
    text-decoration: none;
  }
  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-family: "Montserrat", sans-serif;
    font-weight: 400;
    margin: 0 0 20px 0;
    padding: 0;
  }
  /*--------------------------------------------------------------
  # Intro Section
  --------------------------------------------------------------*/

  #intro {
    width: 100%;
    position: relative;
    background: url("~assets/img/hero/hero-p3.png") center bottom no-repeat;
    background-size: cover;
    padding: 200px 0 120px 0;
  }

  #intro .intro-img {
    width: 50%;
    float: right;
  }

  #intro .intro-info {
    width: 50%;
    float: left;
  }

  #intro >>> .intro-info h2 {
    color: #fff;
    margin-bottom: 40px;
    font-size: 48px;
    font-weight: 700;
  }

  #intro >>> .intro-info h2 span {
    color: #74b5fc;
    text-decoration: underline;
  }

  #intro .intro-info .btn-get-started,
  #intro .intro-info .btn-services {
    font-family: "Montserrat", sans-serif;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 1px;
    display: inline-block;
    padding: 10px 32px;
    border-radius: 50px;
    transition: 0.5s;
    margin: 0 20px 20px 0;
    color: #fff;
  }

  #intro .intro-info .btn-get-started {
    background: #007bff;
    border: 2px solid #007bff;
    color: #fff;
  }

  #intro .intro-info .btn-get-started:hover {
    background: none;
    border-color: #fff;
    color: #fff;
  }

  #intro .intro-info .btn-services {
    border: 2px solid #fff;
  }

  #intro .intro-info .btn-services:hover {
    background: #007bff;
    border-color: #007bff;
    color: #fff;
  }

  @media (max-width: 991px) {
    #intro {
      padding: 140px 0 60px 0;
    }

    #intro .intro-img {
      width: 80%;
      float: none;
      margin: 0 auto 25px auto;
    }

    #intro .intro-info {
      width: 80%;
      float: none;
      margin: auto;
      text-align: center;
    }

  }
  @media (max-width: 767px) {
    #intro .intro-info {
      width: 100%;
    }

    #intro >>> .intro-info h2 {
      font-size: 34px;
      margin-bottom: 30px;
    }
  }
  @media (max-width: 574px) {
    #intro {
      padding: 100px 0 20px 0;
    }
  }
</style>
