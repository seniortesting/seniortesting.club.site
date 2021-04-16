<template>
  <!-- Portfolio Section Start -->
  <section class="portfolio padding-top-100 padding-bottom-150" data-scroll-index="2">
    <!-- Container Section Start -->
    <div class="container">
      <!-- Section Title Start -->
      <div class="section-title text-center">
        <div class="row">
          <div class="col-centered col-sm-10 col-md-8">
            <h1>{{ title }}</h1>
          </div>
        </div>
      </div>
      <!-- Section Title End -->
      <!-- Filter Selection Section Start -->
      <div class="filter-product" data-aos="fade-up" data-aos-duration="400">
        <ul id="filters" class="clearfix portfolio-gal-filter" data-option-key="filter">
          <li v-for="(item,index) in type" :key="item.key">
            <a :class="activeIndex===index? 'active':null" :data-option-value="item.key" @click.prevent="filterHandle(item,index)">{{ item.value }}</a>
          </li>
          <!--          <li><a href="#filter" data-option-value=".art">Art</a></li>-->
          <!--          <li><a href="#filter" data-option-value=".logo">Logo</a></li>-->
          <!--          <li><a href="#filter" data-option-value=".printdesign">Print Design</a></li>-->
          <!--          <li><a href="#filter" data-option-value=".webdesign">Web Design</a></li>-->
          <!--          <li><a href="#filter" data-option-value=".fashion">Fashion</a></li>-->
        </ul>
      </div>
      <!-- Filter Selection Section End -->
      <!-- Portfolio-Filter Start -->
      <div class="portfolio-gal isotope masonry_wrapper">
        <div class="row">
          <div v-for="(d,index) in currentData" :key="d.title" class="col-xs-12 col-sm-4" data-aos="fade-up" :data-aos-duration="1000+index*200">
            <a class="img fancybox">
              <div class="image">
                <img class="img-responsive" :src="d.img" alt="">
              </div>
              <div class="image-detail">
                <p>{{ d.title }}</p>
              </div>
            </a>
          </div>
        </div>
      </div>
      <!-- Portfolio-Filter End -->
      <!-- More Button Start -->
      <!--      <div class="more-button clearfix text-center wow fadeInUp" data-wow-duration="2.4s">-->
      <!--        <a href="#" data-section="top" class="scroll-top red-bg padding-all-1623 radius-full box-shadow-10 waves-effect waves-light"><i class="fa fa-plus" aria-hidden="true" /></a>-->
      <!--      </div>-->
      <!-- More Button End -->
    </div>
    <!-- Container Section End -->
  </section>
  <!-- Portfolio Section End -->
</template>

<script>
export default {
  name: 'PortfolioWhite',
  props: {
    title: {
      type: String,
      default: 'PORTFOLIO'
    },
    type: {
      type: Array,
      default: () => {
        return [
          {
            key: 'all',
            value: 'All'
          },
          {
            key: 'art',
            value: 'Art'
          },
          {
            key: 'logo',
            value: 'Logo'
          },
          {
            key: 'printdesign',
            value: 'Print Design'
          },
          {
            key: 'webdesign',
            value: 'Web Design'
          },
          {
            key: 'fashion',
            value: 'Fashion'
          }
        ]
      }
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            type: 'webdesign',
            title: 'Khamu - PSD Template',
            img: require('@/assets/img/portfolio/portfolio-img1.jpg')
          },
          {
            type: 'logo',
            title: 'Macro - Logo Design',
            img: require('@/assets/img/portfolio/portfolio-img2.jpg')
          },
          {
            type: 'art',
            title: 'Minimal Resume',
            img: require('@/assets/img/portfolio/portfolio-img3.jpg')
          },
          {
            type: 'fashion',
            title: 'Fashion Artist',
            img: require('@/assets/img/portfolio/portfolio-img4.jpg')
          },
          {
            type: 'webdesign',
            title: 'Syndwire - Web Template',
            img: require('@/assets/img/portfolio/portfolio-img5.jpg')
          },
          {
            type: 'printdesign',
            title: 'Business Card',
            img: require('@/assets/img/portfolio/portfolio-img6.jpg')
          }
        ]
      }
    }
  },
  data () {
    return {
      activeIndex: 0,
      currentData: this.data
    }
  },
  methods: {
    filterHandle (type, index) {
      this.activeIndex = index
      const typeKey = type.key
      if (typeKey !== 'all') {
        this.currentData = this.data.filter((d) => { return d.type === typeKey })
      } else {
        this.currentData = this.data
      }
    }
  }
}
</script>

<style scoped>
  .padding-bottom-150 {
    padding-bottom: 150px;
  }
  .padding-top-100 {
    padding-top: 100px;
  }
  .col-centered {
    float:none;
    margin:0 auto;
  }
  h1, h2, h3, h4, h5, h6{
    font-family: 'Source Sans Pro', sans-serif !important;
    font-weight: 700;
    color: #333;
    margin: 0 0 15px;
  }

  h1 {
    font-size: 36px;
  }
  .clearfix {
    clear: both;
  }
  ul {
    padding: 0;
    list-style-type: none;
  }
  ul li {
    list-style-type: none;
  }
  a {
    color: #fff;
  }
  a,
  a > * {
    outline: none;
    cursor: pointer;
    text-decoration: none;
  }
  /* ================= NavBar Area ==================== */
  .portfolio {
    background-color:#fff;
    overflow:hidden;
  }

  .portfolio h1 {
    text-transform:uppercase;
    color:#6a6a6a;
  }

  .portfolio-gal {
    float:left;
    width:100%;
    margin-top:45px;
    position:relative;
  }

  .portfolio-gal .img {
    width:100%;
    float:left;
    position:relative;
    margin-bottom:30px;
  }

  .portfolio-gal .img img {
    width:100%;
    transition: all 300ms ease;
    -webkit-transition: all 300ms ease;
    -ms-transition: all 300ms ease;
  }

  .portfolio-gal .img h4 {
    width:60px;
    height:60px;
    line-height:60px;
    text-align:center;
    background-color:#a1b1bc !important;
    font-size:18px;
    color:#fff;
  }

  .portfolio-gal a.img:hover {
    -webkit-box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.1), 0 17px 50px 0 rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.1), 0 17px 50px 0 rgba(0, 0, 0, 0.1);
    box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.1), 0 17px 50px 0 rgba(0, 0, 0, 0.1);
    -ms-box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.1), 0 17px 50px 0 rgba(0, 0, 0, 0.1);
    -o-box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.1), 0 17px 50px 0 rgba(0, 0, 0, 0.1);
  }

  .portfolio-gal a.img:hover h4 {
    color:#fff !important;
    background-color:#63b7e6 !important;
  }

  .portfolio-gal .image-detail {
    background-color:#f4f5f9;
    padding:30px 34px;
  }

  .portfolio-gal .image-detail p {
    color:#999999;
    margin:0;
    font-size:18px;
    line-height:18px;
    font-family: 'Source Sans Pro', sans-serif;
    font-weight:600;
  }

  ul.portfolio-gal-filter {
    text-align:center;
    display:block;
    margin:0;
    padding:0;
  }

  ul.portfolio-gal-filter li {
    padding:0 23px;
    display:inline-block;
  }

  ul.portfolio-gal-filter li:first-child {
    padding-left:0;
  }

  ul.portfolio-gal-filter li:last-child {
    padding-right:0;
  }

  ul.portfolio-gal-filter li a {
    font-family: 'Source Sans Pro', sans-serif;
    font-size:14px;
    line-height:14px;
    color:#999999;
    text-transform:uppercase;
    font-weight:600;
  }

  ul.portfolio-gal-filter li a.active {
    color:#63b7e6;
    border-bottom:2px solid #63b7e6;
  }

  .more-button a:focus,
  .more-button a:hover{
    color:#fff;
  }

  .more-button a {
    background:#63b7e6 !important;
  }

  @media (min-width: 240px) and (max-width: 568px){
    ul.portfolio-gal-filter li { padding:0 6px !important; }
  }
  @media (max-width: 767px) {
    .padding-top-100 { padding-top:25px; }
    .padding-bottom-150 { padding-bottom:25px !important }

    .portfolio-gal .image-detail p { font-size:16px; line-height:16px; }
    .portfolio-gal .image-detail { padding:30px 15px; }
    ul.portfolio-gal-filter li { padding:0 15px; }
  }
  @media (min-width: 768px) and (max-width: 991px){
    .padding-bottom-150 { padding-bottom:25px !important }
    .portfolio-gal .image-detail p { font-size:16px; line-height:16px; }
    .portfolio-gal .image-detail { padding:30px 15px; }
  }
</style>
