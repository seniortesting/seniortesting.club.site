<template>
  <!-- Our-Clients Section Start -->
  <section class="our-clients padding-tb-150">
    <div class="container">
      <div class="section-title text-center">
        <div class="row">
          <div class="col-centered col-sm-10 col-md-8 padding-lf-55">
            <h1 class="dark-gray-text" data-aos="fade-up" data-aos-duration="1000">
              {{ title }}
            </h1>
            <p data-aos="fade-up" data-aos-duration="1600" v-html="desc" />
          </div>
        </div>
      </div>
      <div class="brand-logo">
        <ul>
          <li v-for="(item,index) in data" :key="item.name" data-aos="fade-up" :data-aos-duration="2000+200*index">
            <a href="#">
              <img class="img-responsive orig-logo" :src="item.logo" alt="">
              <img class="img-responsive white-logo" :src="item.logo" alt="">
            </a>
          </li>
        </ul>
      </div>
    </div>
  </section>
  <!-- Our-Clients Section End -->
</template>

<script>
export default {
  name: 'ClientList',
  props: {
    title: {
      type: String,
      default: 'Great Integrations with Others'
    },
    desc: {
      type: String,
      default: 'Suspendisse sed eros mollis, tincidunt felis eget, interdum erat. <br>Nullam sit amet odio eu est aliquet euismod a a urna. Proin eu urna suscipit, dictum quam nec.'
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            name: 'essence',
            logo: require('@/assets/img/partner/partner-essence.png'),
            url: 'https://www.baidu.com'
          },
          {
            name: 'generic',
            logo: require('@/assets/img/partner/partner-generic.png'),
            url: 'https://www.baidu.com'
          },
          {
            name: 'liua',
            logo: require('@/assets/img/partner/partner-liua.png'),
            url: 'https://www.baidu.com'
          },
          {
            name: 'quadra',
            logo: require('@/assets/img/partner/partner-quadra.png'),
            url: 'https://www.baidu.com'
          },
          {
            name: 'google',
            logo: require('@/assets/img/partner/partner-google.png'),
            url: 'https://www.baidu.com'
          },
          {
            name: 'fujitsu',
            logo: require('@/assets/img/partner/partner-fujitsu.png'),
            url: 'https://www.baidu.com'
          },
          {
            name: 'pansonic',
            logo: require('@/assets/img/partner/partner-pansonic.png'),
            url: 'https://www.baidu.com'
          },
          {
            name: 'nokia',
            logo: require('@/assets/img/partner/partner-nokia.png'),
            url: 'https://www.baidu.com'
          },
          {
            name: 'zf',
            logo: require('@/assets/img/partner/partner-zf.png'),
            url: 'https://www.baidu.com'
          },
          {
            name: 'nextel',
            logo: require('@/assets/img/partner/partner-nextel.png'),
            url: 'https://www.baidu.com'
          }
        ]
      }
    }
  }
}
</script>

<style scoped>
  .padding-tb-150 {
    padding: 150px 0 !important;
  }
  .col-centered {
    float:none;
    margin:0 auto;
  }
  .dark-gray-text{
    color: #666666;
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
  ul {
    padding: 0;
    list-style-type: none;
  }
  ul li {
    list-style-type: none;
  }
  a,
  a > * {
    outline: none;
    cursor: pointer;
    text-decoration: none;
  }
  a {
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
  }
  .img-responsive, .thumbnail > img, .thumbnail a > img, .carousel-inner > .item > img, .carousel-inner > .item > a > img {
    display: block;
    max-width: 100%;
    height: auto;
  }
  /* ================= NavBar Area ==================== */
  .our-clients {
    background-color:#f4f5f9;
    overflow:hidden;
  }

  .our-clients h1 {
    text-transform:uppercase;
  }

  .our-clients p {
    font-size:16px;
    line-height:21px;
    color:#6a6a6a;
  }

  .our-clients .brand-logo {
    padding-top:54px;
  }

  .our-clients .brand-logo ul {
    margin:0;
    padding:0;
    display:block;
  }

  .our-clients .brand-logo ul li {
    float:left;
    width:20%;
    padding:0 15px 30px 15px;
  }

  .our-clients .brand-logo ul li a {
    position:relative;
    background-color:#fff;
    height:100px;
    display:block;
    -webkit-box-shadow: 0 1px 3px rgba(31,31,31,.09);
    -moz-box-shadow: 0 1px 3px rgba(31,31,31,.09);
    -o-box-shadow: 0 1px 3px rgba(31,31,31,.09);
    -ms-box-shadow: 0 1px 3px rgba(31,31,31,.09);
    box-shadow: 0 1px 3px rgba(31,31,31,.09);
  }

  .our-clients .brand-logo ul li:hover a {
    background-color: #63b7e6;
    -webkit-box-shadow: 0 3px 9px 1px rgba(31,31,31,.3);
    -moz-box-shadow: 0 3px 9px 1px rgba(31,31,31,.3);
    -ms-box-shadow: 0 3px 9px 1px rgba(31,31,31,.3);
    -o-box-shadow: 0 3px 9px 1px rgba(31,31,31,.3);
    box-shadow: 0 3px 9px 1px rgba(31,31,31,.3);
  }

  .our-clients .brand-logo ul li a img {
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    -webkit-transform:translate(-50%,-50%);
    -moz-transform:translate(-50%,-50%);
    -ms-transform:translate(-50%,-50%);
    -o-transform:translate(-50%,-50%);
  }

  .our-clients .brand-logo ul li a img.orig-logo {
    opacity:1;
  }

  .our-clients .brand-logo ul li:hover a img.orig-logo {
    opacity:0;
  }

  .our-clients .brand-logo ul li a img.white-logo {
    opacity:0;
  }

  .our-clients .brand-logo ul li:hover a img.white-logo {
    opacity:1 !important;
  }
  @media (min-width: 240px) and (max-width: 568px){
    .our-clients .brand-logo ul li { width:50%; padding:0 5px 10px; }
  }
  @media (min-width: 569px) and (max-width: 767px){
    .caption h1 { font-size:45px; line-height:45px; }
    .our-clients .brand-logo ul li { width:33.33%; }
  }
</style>
