<template>
  <!-- team begin -->
  <div id="team" class="team">
    <div class="container">
      <div class="heading">
        <p>{{ title }}</p>
        <h2>{{ desc }}</h2>
      </div>
      <div class="row justify-content-around">
        <div v-for="item in data" :key="item.name" class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
          <div class="member">
            <div class="part-img">
              <img :src="item.avatar" alt="img-1">
            </div>
            <div class="part-txt">
              <p>{{ item.title }}</p>
              <h3>{{ item.name }}</h3>
            </div>
            <div class="social">
              <a v-for="social in item.socials" :key="social.name" :href="social.url"><i class="fab" :class="social.name" /></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- team end -->
</template>

<script>
export default {
  name: 'TeamFourImage',
  props: {
    title: {
      type: String,
      default: 'Our Creative Team'
    },
    desc: {
      type: String,
      default: 'Meet Our Dedicated Team'
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
  h1, h2, h3 {
    font-family: "Raleway", sans-serif; }

  a {
    -webkit-transition: 0.6s;
    -o-transition: 0.6s;
    transition: 0.6s; }
  a:hover {
    text-decoration: none; }

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
  .team {
    padding: 120px 0;
    background: #F0F7FF; }
  .team .member {
    position: relative;
    overflow: hidden;
    -webkit-transition: 0.6s;
    -o-transition: 0.6s;
    transition: 0.6s; }
  .team .member .part-img img {
    width: 100%; }
  .team .member .part-txt {
    position: absolute;
    bottom: -54px;
    left: 0;
    width: 100%;
    text-align: center;
    -webkit-transition: 0.6s;
    -o-transition: 0.6s;
    transition: 0.6s; }
  .team .member .part-txt p {
    font-size: 15px;
    line-height: 30px;
    color: #fff;
    text-transform: uppercase;
    padding-top: 5px;
    margin-bottom: 0;
    position: relative;
    z-index: 2; }
  .team .member .part-txt p:after {
    position: absolute;
    content: "";
    top: 0;
    left: 52px;
    width: 130px;
    height: 100%;
    background: #05BB59;
    border-radius: 5px 0 0 0;
    -webkit-transform: skew(-5deg);
    -ms-transform: skew(-5deg);
    transform: skew(-5deg);
    z-index: -1; }
  .team .member .part-txt p:before {
    position: absolute;
    content: "";
    top: 0;
    right: 52px;
    width: 130px;
    height: 100%;
    background: #05BB59;
    border-radius: 0 5px 0 0;
    -webkit-transform: skew(5deg);
    -ms-transform: skew(5deg);
    transform: skew(5deg);
    z-index: -1; }
  .team .member .part-txt h3 {
    color: #343EAF;
    background: #fff;
    border-top: 3px solid #05BB59;
    margin-bottom: 0;
    font-size: 20px;
    font-weight: 700;
    text-transform: capitalize;
    padding: 15px 0; }
  .team .member .social {
    position: absolute;
    top: 10px;
    right: -37px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    background: #fff;
    padding: 10px 0;
    border-radius: 5px 0 0 5px;
    -webkit-transition: 0.6s;
    -o-transition: 0.6s;
    transition: 0.6s; }
  .team .member .social i {
    display: inline-block;
    font-size: 16px;
    padding: 10px;
    color: #05BB59;
    -webkit-transition: 0.6s;
    -o-transition: 0.6s;
    transition: 0.6s; }
  .team .member .social i:hover {
    color: #343EAF; }
  .team .member:hover {
    -webkit-box-shadow: 0px 5px 15px -5px #000;
    box-shadow: 0px 5px 15px -5px #000; }
  .team .member:hover .part-txt {
    bottom: 0; }
  .team .member:hover .social {
    right: 0; }
  /*laptop or medium pc*/
  @media only screen and (min-width: 992px) and (max-width: 1199px) {
    /* team section */
    .team .member .part-txt {
      bottom: -44px;
    }
    .team .member .part-txt p {
      padding-top: 0;
    }
    .team .member .part-txt p:before {
      width: 100px;
      right: 50px;
    }
    .team .member .part-txt p:after {
      width: 100px;
      left: 50px;
    }
    .team .member .part-txt h3 {
      padding: 10px 0;
    }
  }
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
    /* team section */
    .team {
      padding-top: 60px;
      padding-bottom: 30px;
    }
    .team .member {
      margin-bottom: 30px;
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
    /* team section */
    .team {
      padding-top: 60px;
      padding-bottom: 30px;
    }
    .team .member {
      margin-bottom: 30px;
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
    /* team section */
    .team {
      padding-top: 60px;
      padding-bottom: 30px;
    }
    .team .member {
      width: 290px;
      height: 330px;
      margin: 0 auto 30px auto;
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
    /* team section */
    .team {
      padding-top: 60px;
      padding-bottom: 30px;
    }
    .team .member {
      width: 290px;
      height: 330px;
      margin: 0 auto 30px auto;
    }
  }
</style>
