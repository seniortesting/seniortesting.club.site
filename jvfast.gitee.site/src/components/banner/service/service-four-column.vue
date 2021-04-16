<template>
  <!-- what we offer begin -->
  <div id="offers" class="offers">
    <div class="container">
      <div class="heading">
        <p>{{ title }}</p>
        <h2>{{ desc }}</h2>
      </div>
      <ul id="myTab" class="nav nav-tabs" role="tablist">
        <li v-for="(item,index) in data" :key="item.title1" class="nav-item">
          <a
            id="analyst-tab"
            class="nav-link"
            :class="activeIndex===index? 'active':null"
            aria-controls="analyst"
            aria-selected="true"
            @click="navClickHandle(item,index)"
          >
            <img :src="item.icon" alt="img1">
            {{ item.title1 }}
          </a>
        </li>
      </ul>
      <div id="myTabContent" class="tab-content">
        <div id="analyst" class="tab-pane animated fadeInUp show active" role="tabpanel" aria-labelledby="analyst-tab">
          <div class="row justify-content-between">
            <div class="col-xl-6 col-lg-6 col-md-5">
              <div class="part-img">
                <img :src="currentItem.img" alt="image-1">
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-7">
              <div class="part-txt">
                <h3>{{ currentItem.title2 }}</h3>
                <p>{{ currentItem.desc }}</p>
                <ul>
                  <li v-for="f in currentItem.feaures" :key="f">
                    <i class="fas fa-external-link-alt" />{{ f }}
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- what we offer end -->
</template>

<script>
export default {
  name: 'ServiceWeOffer',
  props: {
    title: {
      type: String,
      default: 'OFFERS'
    },
    desc: {
      type: String,
      default: 'What We Offer'
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            icon: require('@/assets/img/service/service-icon7.png'),
            title1: 'Keywords Research',
            img: require('@/assets/img/service/service-tab1.png'),
            title2: 'Keywords Startup Agencies',
            desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, possimus officiis amet eveniet commodi reiciendis dolores? Vero exercitationem repellendus.',
            feaures: [
              'Advance Advisory Team',
              'Professional Consulting Services',
              '24/7 Support Help Center',
              'Customer Service & Operations'
            ]
          },
          {
            icon: require('@/assets/img/service/service-icon8.png'),
            title1: 'optimization',
            img: require('@/assets/img/service/service-tab2.png'),
            title2: 'optimization Learning Based Startup Agencies',
            desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, possimus officiis amet eveniet commodi reiciendis dolores? Vero exercitationem repellendus.',
            feaures: [
              'Advance Advisory Team',
              'Professional Consulting Services',
              '24/7 Support Help Center',
              'Customer Service & Operations'
            ]
          },
          {
            icon: require('@/assets/img/service/service-icon9.png'),
            title1: 'security',
            img: require('@/assets/img/service/service-tab1.png'),
            title2: 'Security We Are Machine Learning Based Startup Agencies',
            desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, possimus officiis amet eveniet commodi reiciendis dolores? Vero exercitationem repellendus.',
            feaures: [
              'Advance Advisory Team',
              'Professional Consulting Services',
              '24/7 Support Help Center',
              'Customer Service & Operations'
            ]
          },
          {
            icon: require('@/assets/img/service/service-icon9.png'),
            title1: 'healthcare',
            img: require('@/assets/img/service/service-tab2.png'),
            title2: 'Healthcare We Are Machine Learning Based Startup Agencies',
            desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, possimus officiis amet eveniet commodi reiciendis dolores? Vero exercitationem repellendus.',
            feaures: [
              'Advance Advisory Team',
              'Professional Consulting Services',
              '24/7 Support Help Center',
              'Customer Service & Operations'
            ]
          }
        ]
      }
    }
  },
  data () {
    return {
      activeIndex: 0,
      currentItem: this.data[0]
    }
  },
  methods: {
    navClickHandle (item, index) {
      this.activeIndex = index
      this.currentItem = item
    }
  }
}
</script>

<style scoped>
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
          offers section
  =============================*/
  .offers {
    padding: 120px 0;
    background: #F0F7FF; }
  .offers .nav {
    border-bottom: 0;
    background: #fff;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden; }
  .offers .nav .nav-item {
    width: 25%;
    text-align: left;
    margin-bottom: 0;
    border-right: 1px solid rgba(0, 0, 0, 0.1); }
  .offers .nav .nav-item:last-child {
    border-right: 0; }
  .offers .nav .nav-item .nav-link {
    font-size: 20px;
    font-weight: 700;
    text-transform: capitalize;
    padding: 20px 0;
    color: #343EAF;
    border: 0px;
    position: relative; }
  .offers .nav .nav-item .nav-link.active {
    position: relative; }
  .offers .nav .nav-item .nav-link.active:after {
    position: absolute;
    content: "";
    left: 0;
    bottom: 0;
    width: 100%;
    height: 5px;
    background: #05BB59;
    -webkit-transition: 0.6s;
    -o-transition: 0.6s;
    transition: 0.6s; }
  .offers .nav .nav-item .nav-link img {
    width: 60px; }
  .offers .nav .nav-item .nav-link:after {
    position: absolute;
    content: "";
    left: 50%;
    bottom: 0;
    width: 0;
    height: 5px;
    background: #05BB59;
    -webkit-transition: 0.6s;
    -o-transition: 0.6s;
    transition: 0.6s; }
  .offers .nav .nav-item .nav-link:hover:after {
    left: 0;
    width: 100%; }
  .offers .tab-content {
    padding: 50px;
    padding-bottom: 0; }
  .offers .tab-content .tab-pane .part-img img {
    width: 400px; }
  .offers .tab-content .tab-pane .part-txt h3 {
    font-size: 30px;
    font-weight: 700;
    line-height: 45px;
    text-transform: capitalize;
    margin-bottom: 30px;
    color: #343EAF; }
  .offers .tab-content .tab-pane .part-txt p {
    font-size: 16px;
    line-height: 30px;
    text-transform: capitalize;
    margin-bottom: 15px; }
  .offers .tab-content .tab-pane .part-txt ul {
    padding: 0;
    margin: 0; }
  .offers .tab-content .tab-pane .part-txt ul li {
    list-style: none;
    padding-top: 20px;
    text-transform: capitalize;
    font-weight: 500; }
  .offers .tab-content .tab-pane .part-txt ul li i {
    margin-right: 10px;
    color: #05BB59; }

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
    /* offers section */
    .offers {
      padding: 60px 0;
    }
    .offers .nav {
      display: block;
      border-radius: 0;
    }
    .offers .nav .nav-item {
      width: 50%;
      float: left;
    }
    .offers .nav .nav-item:nth-child(2n+0) {
      border-right: 0;
    }
    .offers .nav .nav-item .nav-link {
      padding: 5px 0;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
      font-size: 18px;
    }
    .offers .nav .nav-item:nth-last-child(2) .nav-link {
      border-bottom: 0px;
    }
    .offers .nav .nav-item:last-child .nav-link {
      border-bottom: 0px;
    }
    .offers .nav .nav-item .nav-link img {
      width: 45px;
      margin-right: 10px;
    }
    .offers .nav .nav-item .nav-link:after {
      height: 2px;
    }
    .offers .nav .nav-item .nav-link.active:after {
      height: 2px;
    }
    .offers .tab-content .tab-pane .part-img img {
      width: 100%;
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
    /* offers section */
    .offers {
      padding: 60px 0;
    }
    .offers .nav {
      display: block;
      border-radius: 0;
    }
    .offers .nav .nav-item {
      width: 100%;
      border-right: 0;
    }
    .offers .nav .nav-item .nav-link {
      padding: 5px 0;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
      font-size: 18px;
    }
    .offers .nav .nav-item:last-child .nav-link {
      border-bottom: 0px;
    }
    .offers .nav .nav-item .nav-link img {
      width: 45px;
      margin-right: 10px;
    }
    .offers .nav .nav-item .nav-link:after {
      height: 2px;
    }
    .offers .nav .nav-item .nav-link.active:after {
      height: 2px;
    }
    .offers .tab-content {
      padding: 10px;
      padding-bottom: 0;
      margin-bottom: -6px;
    }
    .offers .tab-content .tab-pane .part-img img {
      width: 100%;
    }
    .offers .tab-content .tab-pane .part-txt h3 {
      font-size: 20px;
      line-height: 30px;
      margin-bottom: 15px;
    }
    .offers .tab-content .tab-pane .part-txt p {
      margin-bottom: 0;
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
    /* offers section */
    .offers {
      padding: 60px 0;
    }
    .offers .nav {
      display: block;
      border-radius: 0;
    }
    .offers .nav .nav-item {
      width: 100%;
      border-right: 0;
    }
    .offers .nav .nav-item .nav-link {
      padding: 5px 0;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
      font-size: 18px;
    }
    .offers .nav .nav-item:last-child .nav-link {
      border-bottom: 0px;
    }
    .offers .nav .nav-item .nav-link img {
      width: 45px;
      margin-right: 10px;
    }
    .offers .nav .nav-item .nav-link:after {
      height: 2px;
    }
    .offers .nav .nav-item .nav-link.active:after {
      height: 2px;
    }
    .offers .tab-content {
      padding: 10px;
      padding-bottom: 0;
      margin-bottom: -6px;
    }
    .offers .tab-content .tab-pane .part-img img {
      width: 100%;
    }
    .offers .tab-content .tab-pane .part-txt h3 {
      font-size: 20px;
      line-height: 30px;
      margin-bottom: 15px;
    }
    .offers .tab-content .tab-pane .part-txt p {
      margin-bottom: 0;
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
    /* offers section */
    .offers {
      padding: 60px 0;
    }
    .offers .nav {
      display: block;
      border-radius: 0;
    }
    .offers .nav .nav-item {
      width: 100%;
      border-right: 0;
    }
    .offers .nav .nav-item .nav-link {
      padding: 5px 0;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
      font-size: 18px;
    }
    .offers .nav .nav-item:last-child .nav-link {
      border-bottom: 0px;
    }
    .offers .nav .nav-item .nav-link img {
      width: 45px;
      margin-right: 10px;
    }
    .offers .nav .nav-item .nav-link:after {
      height: 2px;
    }
    .offers .nav .nav-item .nav-link.active:after {
      height: 2px;
    }
    .offers .tab-content {
      padding: 10px;
      padding-bottom: 0;
      margin-bottom: -6px;
    }
    .offers .tab-content .tab-pane .part-img img {
      width: 100%;
    }
    .offers .tab-content .tab-pane .part-txt h3 {
      font-size: 20px;
      line-height: 30px;
      margin-bottom: 15px;
    }
    .offers .tab-content .tab-pane .part-txt p {
      margin-bottom: 0;
    }
  }
</style>
