<template>
  <!--==========================
    Clients Section
  ============================-->
  <section id="clients" class="section-bg">
    <div class="container">
      <div class="section-header">
        <h3>{{ title }}</h3>
        <p>{{ desc }}</p>
      </div>

      <div class="row no-gutters clients-wrap clearfix">
        <div v-for="(item,index) in data" :key="item.name" class="col-lg-3 col-md-4 col-xs-6" data-aos="fade-up" :data-aos-duration="2000+200*index">
          <div class="client-logo">
            <img :src="item.logo" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'ClientFourColumn',
  props: {
    title: {
      type: String,
      default: 'Our CLients'
    },
    desc: {
      type: String,
      default: 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque dere santome nida.'
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
          }
        ]
      }
    }
  }
}
</script>

<style scoped>
  /* Sections Header
  --------------------------------*/

  .section-header h3 {
    font-size: 36px;
    color: #283d50;
    text-align: center;
    font-weight: 500;
    position: relative;
  }

  .section-header p {
    text-align: center;
    margin: auto;
    font-size: 15px;
    padding-bottom: 60px;
    color: #556877;
    width: 50%;
  }
  /* Clients Section
  --------------------------------*/

  #clients {
    padding: 60px 0;
    box-shadow: inset 0px 0px 12px 0px rgba(0, 0, 0, 0.1);
  }

  #clients .clients-wrap {
    border-top: 1px solid #d6eaff;
    border-left: 1px solid #d6eaff;
    margin-bottom: 30px;
  }

  #clients .client-logo {
    padding: 64px;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    border-right: 1px solid #d6eaff;
    border-bottom: 1px solid #d6eaff;
    overflow: hidden;
    background: #fff;
    height: 160px;
  }

  #clients .client-logo:hover img {
    -webkit-transform: scale(1.2);
    transform: scale(1.2);
  }

  #clients img {
    transition: all 0.4s ease-in-out;
  }
</style>
