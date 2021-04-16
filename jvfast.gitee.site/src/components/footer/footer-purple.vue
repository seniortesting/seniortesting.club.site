<template>
  <!-- Footer Area Start -->
  <footer id="footer" class="footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-lg-4">
          <div class="footer-widget about-widget">
            <div class="fotter-logo">
              <img src="~assets/img/logo.png" style="width: 60px;height: 60px" alt="">
              <h2 style="display: inline-block;color: #fff; padding-left: 12px;text-align: center;vertical-align: middle">
                {{ name }}
              </h2>
            </div>
            <div class="about-content">
              <p>
                {{ desc }}
              </p>
            </div>
            <div class="subscribe-area">
              <form class="subscribe-form" @submit.prevent="subscrible">
                <input v-model="phone" type="text" placeholder="Enter Phone Number to Subscribe">
                <button type="submit" class="submit-btn">
                  <i class="far fa-paper-plane" title="submit" />
                </button>
              </form>
            </div>
          </div>
        </div>
        <div v-for="item in column" :key="item.name" class="col-sm-6 col-lg-4">
          <div class="footer-widget info-link-widget">
            <h4 class="title">
              {{ item.name }}
            </h4>
            <ul class="link-list">
              <li v-for="link in item.data" :key="link.name">
                <a :href="link.url">
                  <i class="fas fa-angle-double-right" />{{ link.name }}
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="copy-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <div class="left-area">
              <p>Copyright &copy; {{ new Date().getFullYear() }} {{ name }}. All rights reserved.</p>
            </div>
          </div>
          <div class="col-lg-7">
            <ul class="social-links">
              <li v-for="item in social" :key="item.name">
                <a :href="item.url" data-toggle="tooltip" data-placement="top" :title="item.name">
                  <i class="fab" :class="item.icon" />
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Area End -->
</template>

<script>
export default {
  name: 'FooterBlue',
  props: {
    name: {
      type: String,
      default: 'Heap Stack'
    },
    desc: {
      type: String,
      default: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor nemo error sit voluptatem consectetur repellat.'
    },
    column: {
      type: Array,
      default: () => {
        return [
          {
            name: 'Services',
            data: [
              {
                name: 'Profile',
                url: '#'
              },
              {
                name: 'Settings',
                url: '#'
              },
              {
                name: 'Notifications',
                url: '#'
              },
              {
                name: 'Contact',
                url: '#'
              }
            ]
          },
          {
            name: 'Contact Us',
            data: [
              {
                name: 'Terms',
                url: '#'
              },
              {
                name: 'Privacy',
                url: '#'
              },
              {
                name: 'Security',
                url: '#'
              },
              {
                name: 'Support',
                url: '#'
              }
            ]
          }
        ]
      }
    },
    social: {
      type: Array,
      default: () => {
        return [
          {
            name: 'Facebook',
            icon: 'fa-facebook-f',
            url: '#'
          },
          {
            name: 'Twitter',
            icon: 'fa-twitter',
            url: '#'
          },
          {
            name: 'Linkedin',
            icon: 'fa-linkedin-in',
            url: '#'
          },
          {
            name: 'Instagram',
            icon: 'fa-instagram',
            url: '#'
          }
        ]
      }
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
  /* Footer Area Start */
  .footer {
    padding-top: 100px;
    overflow: hidden;
    position: relative;
    background-repeat: no-repeat;
    background-position: center 140px;
    background-size: cover;
    background: -webkit-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);
    background: -o-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);
    background: linear-gradient(50deg, #6e00ff 0, #bb00ff 100%); }
  .footer .footer-logo {
    margin-top: -10px;
    margin-bottom: 25px; }
  .footer .footer-widget .title {
    font-size: 20px;
    line-height: 30px;
    font-weight: 500;
    color: #fff; }
  .footer .about-widget .fotter-logo {
    display: inline-block; }
  .footer .about-widget .about-content {
    margin-top: 23px; }
  .footer .about-widget .about-content p {
    color: rgba(255, 255, 255, 0.8); }
  .footer .about-widget .subscribe-form {
    position: relative;
    margin-top: 25px; }
  .footer .about-widget .subscribe-form input {
    width: 100%;
    height: 50px;
    font-size: 15px;
    border: 0px;
    background: rgba(255, 255, 255, 0.25);
    border-radius: 50px;
    -webkit-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.07);
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.07);
    border: 1px solid rgba(0, 0, 0, 0.05);
    padding: 0px 60px 0px 20px;
    outline: none;
    color: #fff; }
  .footer .about-widget .subscribe-form input::-webkit-input-placeholder {
    color: rgba(255, 255, 255, 0.8) !important; }
  .footer .about-widget .subscribe-form input:-ms-input-placeholder {
    color: rgba(255, 255, 255, 0.8) !important; }
  .footer .about-widget .subscribe-form input::-ms-input-placeholder {
    color: rgba(255, 255, 255, 0.8) !important; }
  .footer .about-widget .subscribe-form input::placeholder {
    color: rgba(255, 255, 255, 0.8) !important; }
  .footer .about-widget .subscribe-form .submit-btn {
    position: absolute;
    top: 5px;
    right: 5px;
    height: 40px;
    width: 40px;
    background: -webkit-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);
    background: -o-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);
    background: linear-gradient(50deg, #6e00ff 0, #bb00ff 100%);
    color: #fff;
    border: 0px;
    border-radius: 50px;
    background-size: 100% 200%;
    -webkit-transition: all 0.3s ease-in;
    -o-transition: all 0.3s ease-in;
    transition: all 0.3s ease-in; }
  .footer .about-widget .subscribe-form .submit-btn:focus {
    outline: 0px;
    -webkit-box-shadow: unset;
    box-shadow: unset; }
  .footer .about-widget .subscribe-form .submit-btn:hover {
    background-size: 200% 100%; }
  .footer .info-link-widget ul {
    padding-left: 0px;
    margin-bottom: 0px; }
  .footer .info-link-widget ul li {
    list-style: none;
    border-bottom: 1px dashed rgba(255, 255, 255, 0.25); }
  .footer .info-link-widget ul li:last-child {
    border-bottom: 0px; }
  .footer .info-link-widget ul li a {
    -webkit-transition: all 0.3s ease-in;
    -o-transition: all 0.3s ease-in;
    transition: all 0.3s ease-in;
    font-size: 16px;
    line-height: 35px;
    font-weight: 400;
    color: rgba(255, 255, 255, 0.8); }
  .footer .info-link-widget ul li a:hover {
    color: white;
    padding-left: 7px; }
  .footer .info-link-widget ul li a i {
    font-size: 14px;
    padding-right: 4px; }
  .footer .copy-bg {
    margin-top: 107px;
    padding: 24px 0px 25px;
    border-top: 1px solid rgba(255, 255, 255, 0.25);
    background: -webkit-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);
    background: -o-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);
    background: linear-gradient(50deg, #6e00ff 0, #bb00ff 100%); }
  .footer .copy-bg .left-area p {
    font-size: 16px;
    line-height: 26px;
    margin-bottom: 0px;
    color: rgba(255, 255, 255, 0.8); }
  .footer .copy-bg .left-area a {
    font-size: 16px;
    line-height: 26px;
    margin-bottom: 0px;
    -webkit-transition: all 0.3s ease-in;
    -o-transition: all 0.3s ease-in;
    transition: all 0.3s ease-in; }
  .footer .copy-bg .left-area a:hover {
    color: white; }
  .footer .copy-bg .social-links {
    text-align: left; }
  .footer .copy-bg .social-links li {
    display: inline-block;
    margin-right: 10px; }
  .footer .copy-bg .social-links li:last-child {
    margin-right: 0px; }
  .footer .copy-bg .social-links li a {
    font-size: 14px;
    border-radius: 50%;
    color: rgba(255, 255, 255, 0.8);
    -webkit-transition: all 0.3s ease-in;
    -o-transition: all 0.3s ease-in;
    transition: all 0.3s ease-in; }
  .footer .copy-bg .social-links li a:hover {
    color: white; }
  .footer .subscribe-box {
    margin-bottom: 110px;
    z-index: 99;
    /*background: url(../images/newsletter.jpg);*/
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    padding: 50px 60px 55px;
    -webkit-box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1); }
  .footer .subscribe-box .heading-area {
    text-align: center; }
  .footer .subscribe-box .heading-area .sub-title {
    font-size: 24px;
    font-weight: 500;
    line-height: 34px;
    text-transform: uppercase;
    margin-bottom: 10px;
    background: -moz-linear-gradient(50deg, #6e00ff 0, #bb00ff 100%);
    background: -webkit-linear-gradient(50deg, #6e00ff 0, #bb00ff 100%);
    background: -ms-linear-gradient(50deg, #6e00ff 0, #bb00ff 100%);
    background: -o-linear-gradient(50deg, #6e00ff 0, #bb00ff 100%);
    background: -webkit-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);
    background: -o-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);
    background: linear-gradient(50deg, #6e00ff 0, #bb00ff 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent; }
  .footer .subscribe-box .heading-area .title {
    font-size: 40px;
    line-height: 50px;
    font-weight: 700;
    margin-bottom: 50px;
    text-transform: uppercase; }
  .footer .subscribe-box .icon {
    width: 100%;
    text-align: right; }
  .footer .subscribe-box .icon img {
    display: inline-block; }
  .footer .subscribe-box .form-area {
    width: 100%; }
  .footer .subscribe-box .form-area input {
    width: 100%;
    height: 50px;
    background: none;
    border: 0px;
    border-bottom: 1px solid #b4b8d1;
    border-radius: 0px;
    color: #555; }
  .footer .subscribe-box .form-area input::-webkit-input-placeholder {
    color: #555; }
  .footer .subscribe-box .form-area input:-moz-placeholder {
    color: #555; }
  .footer .subscribe-box .form-area input::-moz-placeholder {
    color: #555; }
  .footer .subscribe-box .form-area input:-ms-input-placeholder {
    color: #555; }
  .footer .subscribe-box .button-area {
    width: 100%; }
  .footer .subscribe-box .button-area .mybtn1 {
    display: block;
    width: 100%;
    height: 50px;
    position: relative;
    background-image: -webkit-gradient(linear, left top, right top, from(#ff344d), to(#d2273c));
    background-image: -webkit-linear-gradient(left, #ff344d, #d2273c);
    background-image: -o-linear-gradient(left, #ff344d, #d2273c);
    background-image: linear-gradient(to right, #ff344d, #d2273c); }
  .footer .subscribe-box .button-area .mybtn1 span {
    position: absolute;
    top: 0;
    right: 0px;
    width: 50px;
    height: 50px;
    text-align: center;
    line-height: 50px;
    background: #db5263;
    border-radius: 50%; }
  .footer .subscribe-box .button-area .mybtn1:hover {
    background-image: -webkit-gradient(linear, right top, left top, from(#ff344d), to(#d2273c));
    background-image: -webkit-linear-gradient(right, #ff344d, #d2273c);
    background-image: -o-linear-gradient(right, #ff344d, #d2273c);
    background-image: linear-gradient(to left, #ff344d, #d2273c); }

  @media  (max-width: 991px) {
    .footer-widget.info-link-widget.link-w-2{
      margin-top: 20px;
    }
    .copy-bg{
      text-align: center;
    }
    .footer .copy-bg .social-links{
      text-align: center;
      margin-top: 10px;
    }
  }
  @media  (max-width: 575px) {
    .footer-widget.info-link-widget {
      margin-top: 33px;
    }
  }
</style>
