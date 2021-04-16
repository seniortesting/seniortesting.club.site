<template>
  <div class="wrapper-flex">
    <div class="container">
      <div class="banner-img" />
      <img src="~/assets/img/home/Emvn9asFvPw.jpg" alt="profile image" class="profile-img">
      <h1 class="name">
        Walter Scott
      </h1>
      <p class="description">
        Hi there! My name is Walter and I am a software developer, traveler and professional blogger. Follow me to stay connected!
      </p>
      <button class="btn">
        <a target="_blank" href="https://blog.pingbook.top">Follow</a>
      </button>
    </div>
    <div class="ads">
      <Adsense
        ins-style="display:block;text-align:center;width: 100%;"
        data-ad-client="ca-pub-1893384651266286"
        data-ad-slot="3377657013"
        data-ad-format="auto"
        :data-full-width-responsive="true"
      />
    </div>
  </div>
</template>
<script>
export default {
  name: 'Home',
  data () {
    return {
      intervalId: null
    }
  },
  mounted () {
    this.intervalId = setInterval(() => {
      this.dynamicBackgroundImage()
    }, 3000)
  },
  destroyed () {
    clearInterval(this.intervalId)
  },
  methods: {
    dynamicBackgroundImage () {
      document.body.style.backgroundColor = '#' + Math.floor(Math.random() * 16777215).toString(16)
    }
  },
  head () {
    return {
      title: 'If not now, when? If not you, who?',
      meta: [
        { hid: 'keywords', name: 'keywords', content: '评布客,评布客博客,vip视频解析,vip视频,国产视频,随机图片,random image,free image,免费图片' },
        { hid: 'description', name: 'description', content: '评布客,优质项目软件开发和心得体会交流，助力项目快速迭代' }
      ]
    }
  }
}
</script>
<style lang="scss">
  :root {
    --clr-primary: #651fff;
    --clr-gray: #37474f;
    --clr-gray-light: #b0bec5;
  }
  body{
    overflow-y:hidden;
    background: #083952;
    color: #f8f8f8;
  }
  .wrapper-flex {
    margin: 6rem;
    color: var(--clr-gray);
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    .container {
      overflow: hidden;
      box-shadow: 0px 2px 8px 0px var(--clr-gray-light);
      background-color: white;
      text-align: center;
      border-radius: 1rem;
      position: relative;
      width: 380px;
      margin-bottom: 1rem;
      margin-left: 1rem;

      .banner-img {
        position: absolute;
        background-image: url(~assets/img/home/mark-basarab-z8ct_Q3oCqM.jpg);
        height: 10rem;
        width: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }

      .profile-img {
        width: 8rem;
        clip-path: circle(60px at center);
        margin-top: 4.5rem;
      }

      .name {
        font-weight: bold;
        font-size: 1.5rem;
      }

      .description {
        margin: 1rem 2rem;
        font-size: 0.9rem;
      }

      .btn {
        width: 100%;
        border: none;
        font-size: 1rem;
        font-weight: bold;
        color: white;
        padding: 1rem;
        background-color: var(--clr-primary);

        a {
          text-decoration: none;
          color: #fff;
        }
      }

    }
    .ads {
      width: 80%;
      height: 130px !important;
    }
  }
  @media all and (max-width: 960px) {
    .wrapper-flex {
      margin: 3rem;
    }
  }

</style>
