<template>
  <!--==========================
    Team Section
  ============================-->
  <section id="team">
    <div class="container">
      <div class="section-header">
        <h3>Team</h3>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
      </div>

      <div class="row">
        <div v-for="(item,index) in data" :key="item.name" class="col-lg-3 col-md-6" data-aos="fade-up" :data-aos-delay="1000+100*index">
          <div class="member">
            <img :src="item.avatar" class="img-fluid" alt="">
            <div class="member-info">
              <div class="member-info-content">
                <h4>{{ item.name }}</h4>
                <span>{{ item.title }}</span>
                <div class="social">
                  <a v-for="social in item.socials" :key="social.name" :href="social.url" :title="social.tip"><i class="fab" :class="social.name" /></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- #team -->
</template>

<script>
export default {
  name: 'TeamFourColumn',
  props: {
    title: {
      type: String,
      default: 'Our Creative Team'
    },
    desc: {
      type: String,
      default: 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque'
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            avatar: require('@/assets/img/team/team-avatar6.jpg'),
            name: 'Jameson',
            title: 'CEO at Softio',
            socials: [
              { name: 'fa-qq', tip: 'QQ', url: '#' },
              { name: 'fa-weibo', tip: 'WeiBo', url: '#' },
              { name: 'fa-weixin', tip: 'WeiXin', url: '#' },
              { name: 'fa-twitter', tip: 'Twitter', url: '#' }
            ]
          },
          {
            avatar: require('@/assets/img/team/team-avatar7.jpg'),
            name: 'Zachary',
            title: 'CTO at Softio',
            socials: [
              { name: 'fa-qq', tip: 'QQ', url: '#' },
              { name: 'fa-weibo', tip: 'WeiBo', url: '#' },
              { name: 'fa-weixin', tip: 'WeiXin', url: '#' },
              { name: 'fa-twitter', tip: 'Twitter', url: '#' }
            ]
          },
          {
            avatar: require('@/assets/img/team/team-avatar8.jpg'),
            name: 'Nathaniel',
            title: 'COO at Softio',
            socials: [
              { name: 'fa-qq', tip: 'QQ', url: '#' },
              { name: 'fa-weibo', tip: 'WeiBo', url: '#' },
              { name: 'fa-weixin', tip: 'WeiXin', url: '#' },
              { name: 'fa-twitter', tip: 'Twitter', url: '#' }
            ]
          },
          {
            avatar: require('@/assets/img/team/team-avatar9.jpg'),
            name: 'Austin Bishop',
            title: 'MH at Softio',
            socials: [
              { name: 'fa-qq', tip: 'QQ', url: '#' },
              { name: 'fa-weibo', tip: 'WeiBo', url: '#' },
              { name: 'fa-weixin', tip: 'WeiXin', url: '#' },
              { name: 'fa-twitter', tip: 'Twitter', url: '#' }
            ]
          }
        ]
      }
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

  p {
    padding: 0;
    margin: 0 0 30px 0;
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

  /* Team Section
  --------------------------------*/

  #team {
    background: #fff;
    padding: 60px 0;
    box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.1);
  }

  #team .member {
    text-align: center;
    margin-bottom: 20px;
    position: relative;
    border-radius: 50%;
    overflow: hidden;
  }

  #team .member .member-info {
    opacity: 0;
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
    position: absolute;
    bottom: 0;
    top: 0;
    left: 0;
    right: 0;
    transition: 0.2s;
  }

  #team .member .member-info-content {
    margin-top: 50px;
    transition: margin 0.2s;
  }

  #team .member:hover .member-info {
    background: rgba(0, 62, 128, 0.7);
    opacity: 1;
    transition: 0.4s;
  }

  #team .member:hover .member-info-content {
    margin-top: 0;
    transition: margin 0.4s;
  }

  #team .member h4 {
    font-weight: 700;
    margin-bottom: 2px;
    font-size: 18px;
    color: #fff;
  }

  #team .member span {
    font-style: italic;
    display: block;
    font-size: 13px;
    color: #fff;
  }

  #team .member .social {
    margin-top: 15px;
  }

  #team .member .social a {
    transition: none;
    color: #fff;
  }

  #team .member .social a:hover {
    color: #007bff;
  }

  #team .member .social i {
    font-size: 18px;
    margin: 0 2px;
  }

</style>
