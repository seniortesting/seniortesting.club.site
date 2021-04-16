<template>
  <!-- portfolio begin -->
  <div id="project" class="portfolio">
    <div class="container">
      <div class="heading">
        <p>{{ title }}</p>
        <h2>{{ desc }}</h2>
      </div>
      <div class="row">
        <div v-for="item in data" :key="item.id" class="col-xl-4 col-lg-4 col-sm-6">
          <div class="item">
            <div class="part-img">
              <img :src="item.img" alt="image-1">
            </div>
            <div class="part-txt">
              <h3>{{ item.title }}</h3>
              <p>{{ item.category }}</p>
              <a :href="item.url" class="my-btn"><i class="far fa-eye" /></a>
            </div>
          </div>
        </div>
      </div>
      <div class="part-btn">
        <a :href="more.url" class="my-btn">{{ more.text }}</a>
      </div>
    </div>
  </div>
  <!-- portfolio end -->
</template>

<script>
export default {
  name: 'PortfolioLatest',
  props: {
    title: {
      type: String,
      default: 'Our Portfolio'
    },
    desc: {
      type: String,
      default: 'Our successful works'
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            id: 1001,
            title: 'Data is the new science. big data holds the answers.',
            img: require('@/assets/img/portfolio/portfolio-img1.jpg'),
            category: 'data analysis',
            url: '#'
          },
          {
            id: 1002,
            title: 'Data is the new science. big data holds the answers.',
            img: require('@/assets/img/portfolio/portfolio-img2.jpg'),
            category: 'photography',
            url: '#'
          },
          {
            id: 1003,
            title: 'Data is the new science. big data holds the answers.',
            img: require('@/assets/img/portfolio/portfolio-img3.jpg'),
            category: 'data analysis',
            url: '#'
          }
        ]
      }
    },
    more: {
      type: Object,
      default: () => {
        return {
          text: 'see all projects',
          url: '#'
        }
      }
    }
  }
}
</script>

<style scoped>
  h1, h2, h3 {
    font-family: "Raleway", sans-serif; }

  a {
    -webkit-transition: 0.6s;
    -o-transition: 0.6s;
    transition: 0.6s; }
  a:hover {
    text-decoration: none; }

  .container {
    max-width: 1200px; }
  .my-btn {
    display: inline-block;
    font-size: 16px;
    font-weight: 500;
    text-transform: capitalize;
    padding: 0 30px;
    height: 50px;
    line-height: 50px;
    color: #fff;
    background: #05BB59; }
  .my-btn:hover {
    background: #343EAF;
    color: #fff; }

  .heading {
    text-align: center;
    margin-bottom: 60px; }
  .heading p {
    font-size: 18px;
    text-transform: uppercase;
    color: #05BB59;
    font-weight: 500;
    margin-top: -7px;
    margin-bottom: 10px; }
  .heading h2 {
    font-size: 40px;
    font-weight: 700;
    line-height: 55px;
    text-transform: capitalize;
    color: #343EAF;
    margin-bottom: 0; }
  /*===========================
          portfolio section
  =============================*/
  .portfolio {
    padding: 120px 0; }
  .portfolio .item {
    margin-bottom: 50px;
    position: relative; }
  .portfolio .item .part-img img {
    width: 100%; }
  .portfolio .item .part-txt {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(20%, rgba(0, 0, 0, 0.8)), to(transparent));
    background: -webkit-linear-gradient(rgba(0, 0, 0, 0.8) 20%, transparent);
    background: -o-linear-gradient(rgba(0, 0, 0, 0.8) 20%, transparent);
    background: linear-gradient(rgba(0, 0, 0, 0.8) 20%, transparent);
    padding: 20px 30px; }
  .portfolio .item .part-txt h3 {
    font-size: 28px;
    line-height: 36px;
    font-weight: 700;
    color: #fff;
    font-family: "Roboto", sans-serif;
    padding-bottom: 30px;
    margin-bottom: 30px;
    position: relative; }
  .portfolio .item .part-txt h3:after {
    position: absolute;
    content: "";
    bottom: 0;
    left: 0;
    width: 30px;
    height: 3px;
    background: #fff; }
  .portfolio .item .part-txt p {
    font-size: 16px;
    line-height: 30px;
    color: #fff;
    letter-spacing: 2px;
    text-transform: capitalize;
    margin-bottom: 0; }
  .portfolio .item .part-txt .my-btn {
    position: absolute;
    bottom: 20px;
    right: 30px;
    font-size: 20px; }
  .portfolio .part-btn {
    text-align: center; }

  /*as col-md*/
  /*tablet device*/
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    /* global style */
    .heading {
      margin-bottom: 30px;
    }
    .heading p {
      margin-bottom: 0;
    }
    .heading h2 {
      font-size: 30px;
      line-height: 45px;
    }
    /* portfolio section */
    .portfolio {
      padding: 60px 0;
    }
  }

  /*as col-sm*/
  /*large mobile device*/
  @media only screen and (min-width: 576px) and (max-width: 767px) {
    /* global style */
    .heading {
      margin-bottom: 30px;
    }
    .heading p {
      font-size: 15px;
      margin-bottom: 0;
    }
    .heading h2 {
      font-size: 25px;
      line-height: 40px;
    }
    /* portfolio section */
    .portfolio {
      padding: 60px 0;
    }
    .portfolio .item .part-txt {
      padding: 15px;
    }
    .portfolio .item .part-txt h3 {
      font-size: 23px;
      padding-bottom: 10px;
      margin-bottom: 10px;
    }
    .portfolio .item .part-txt .my-btn {
      right: 15px;
      bottom: 15px;
    }
  }

  /*medium mobile device*/
  @media only screen and (min-width: 480px) and (max-width: 575px) {
    /* global style */
    .heading {
      margin-bottom: 30px;
    }
    .heading p {
      font-size: 15px;
      margin-bottom: 0;
    }
    .heading h2 {
      font-size: 25px;
      line-height: 40px;
    }
    /* portfolio section */
    .portfolio {
      padding: 60px 0;
    }
    .portfolio .item {
      width: 290px;
      margin: 0 auto 30px auto;
    }
    .portfolio .item .part-txt {
      padding: 15px;
    }
    .portfolio .item .part-txt h3 {
      font-size: 23px;
      padding-bottom: 10px;
      margin-bottom: 10px;
    }
    .portfolio .item .part-txt .my-btn {
      right: 15px;
      bottom: 15px;
    }
  }

  /*small mobile device*/
  @media only screen and (min-width: 320px) and (max-width: 479px) {
    /* global style */
    .heading {
      margin-bottom: 30px;
    }
    .heading p {
      font-size: 15px;
      margin-bottom: 0;
    }
    .heading h2 {
      font-size: 25px;
      line-height: 40px;
    }
    /* portfolio section */
    .portfolio {
      padding: 60px 0;
    }
    .portfolio .item {
      width: 290px;
      margin: 0 auto 30px auto;
    }
    .portfolio .item .part-txt {
      padding: 15px;
    }
    .portfolio .item .part-txt h3 {
      font-size: 23px;
      padding-bottom: 10px;
      margin-bottom: 10px;
    }
    .portfolio .item .part-txt .my-btn {
      right: 15px;
      bottom: 15px;
    }

  }
</style>
