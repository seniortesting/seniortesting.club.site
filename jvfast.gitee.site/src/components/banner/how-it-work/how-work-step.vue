<template>
  <!-- how it's works begin -->
  <div class="how-its">
    <div class="container">
      <div class="heading">
        <p>{{ title }}</p>
        <h2>how does sutent Work</h2>
      </div>
      <div class="row">
        <div v-for="(item,index) in data" :key="item.title" class="col-xl-4 col-lg-4 col-md-4">
          <div class="part-box" :class="index!=data.length-1? 'after':null">
            <div class="part-img">
              <img :src="item.icon" alt="how it's">
            </div>
            <div class="part-txt">
              <h3>{{ item.title }}</h3>
              <p>{{ item.desc }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- how it's works end -->
</template>

<script>
export default {
  name: 'HowWorkStep',
  props: {
    title: {
      type: String,
      default: 'how it\'s work'
    },
    desc: {
      type: String,
      default: 'Learn More about how our website works'
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            icon: require('@/assets/img/howitworks/how-work1.png'),
            title: 'Create Account',
            desc: ' Clarinet accustomed. Would legs of framework officers. We\'ve to morning like a contracting',
            url: '#'
          },
          {
            icon: require('@/assets/img/howitworks/how-work2.png'),
            title: 'Make a Shedule',
            desc: ' Clarinet accustomed. Would legs of framework officers. We\'ve to morning like a contracting',
            url: '#'
          },
          {
            icon: require('@/assets/img/howitworks/how-work3.png'),
            title: 'Get Notification',
            desc: ' Clarinet accustomed. Would legs of framework officers. We\'ve to morning like a contracting',
            url: '#'
          }
        ]
      }
    }
  }
}
</script>

<style scoped>
  h3 {
    font-size: 26px;
    line-height: 1.0833333333333333; }

  h4 {
    font-size: 22px;
    line-height: 1.2380952380952381; }

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    color: #131333;
    font-family: "Rubik", sans-serif; }

  p {
    font-size: 16px;
    color: #555;
    line-height: 1.625;
    -webkit-hyphens: auto;
    -moz-hyphens: auto;
    -ms-hyphens: auto;
    hyphens: auto; }
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
          how-work section
  =============================*/
  .how-its {
    padding-top: 120px;
    padding-bottom: 110px; }
  .how-its .part-box {
    text-align: center;
    padding: 0 20px; }
  .how-its .part-box.after {
    position: relative; }
  .how-its .part-box.after:after {
    position: absolute;
    content: "";
    top: -20px;
    left: 80%;
    width: 50%;
    height: 50%;
    background: url(./after.png) center center no-repeat;
    background-size: contain; }
  .how-its .part-box .part-img {
    margin: 0 auto;
    margin-bottom: 30px; }
  .how-its .part-box .part-img img {
    width: 90px; }
  .how-its .part-box .part-txt h3 {
    font-size: 20px;
    font-weight: 700;
    text-transform: capitalize;
    margin-bottom: 20px; }
  .how-its .part-box .part-txt p {
    font-size: 16px;
    line-height: 30px;
    margin-bottom: 0; }
  @media only screen and (min-width: 768px) and (max-width: 991px) {
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
    /* how works section */
    .how-its {
      padding: 60px 0;
    }
    .how-its .part-box {
      padding: 0;
    }
  }
  @media only screen and (min-width: 576px) and (max-width: 767px) {
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
    /* how works section */
    .how-its {
      padding-top: 60px;
      padding-bottom: 30px;
    }
    .how-its .part-box {
      margin-bottom: 30px;
    }
    .how-its .part-box.after:after {
      display: none;
    }
    .how-its .part-box .part-img {
      margin-bottom: 15px;
    }
    .how-its .part-box .part-txt h3 {
      margin-bottom: 10px;
    }
  }
  @media only screen and (min-width: 320px) and (max-width: 479px) {
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
  }
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
    /* how works section */
    .how-its {
      padding-top: 60px;
      padding-bottom: 30px;
    }
    .how-its .part-box {
      margin-bottom: 30px;
    }
    .how-its .part-box.after:after {
      display: none;
    }
    .how-its .part-box .part-img {
      margin-bottom: 15px;
    }
    .how-its .part-box .part-txt h3 {
      margin-bottom: 10px;
    }
  }
  @media only screen and (min-width: 320px) and (max-width: 479px) {
    /* how works section */
    .how-its {
      padding-top: 60px;
      padding-bottom: 30px;
    }
    .how-its .part-box {
      margin-bottom: 30px;
    }
    .how-its .part-box.after:after {
      display: none;
    }
    .how-its .part-box .part-img {
      margin-bottom: 15px;
    }
    .how-its .part-box .part-txt h3 {
      margin-bottom: 10px;
    }
  }
</style>
