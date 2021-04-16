<template>
  <el-container class="container">
    <Adsense
      ins-style="display:block;text-align:center;width: 100%;"
      data-ad-client="ca-pub-1893384651266286"
      data-ad-slot="3377657013"
      data-ad-format="auto"
      :data-full-width-responsive="true"
    />
    <el-header class="top-header">
      <el-row>
        <el-col class="menu-area" :xl="24" :sm="24" :md="24" :lg="24">
          <a href="/random">{{ title }}</a>
          <el-menu
            mode="horizontal"
            :default-active="menuActiveIndex"
            :background-color="menuBackgroundColor"
            :text-color="menuTextColor"
            :active-text-color="menuActiveColor"
            :router="true"
            @select="handleSelect"
          >
            <el-menu-item index="home">
              HOME
            </el-menu-item>
            <el-menu-item @click="goBlogPage">
              BLOG
            </el-menu-item>
            <el-submenu index="dashboard">
              <template slot="title">
                SERVICES
              </template>
              <el-menu-item index="video" :route="{name: 'video'}">
                VIP VIDEO
              </el-menu-item>
              <el-menu-item index="mediahub" :route="{name: 'mediahub'}">
                MEDIA HUB
              </el-menu-item>
            </el-submenu>
          </el-menu>
        </el-col>
      </el-row>
    </el-header>
    <!--      主体部分-->
    <section class="hero">
      <div class="inner">
        <div class="copy">
          <h1>Random Image Generator</h1>
          <p><i class="fa fa-heart" /> Made by <a target="_blank" href="https://unsplash.com">Unsplash</a></p>
        </div>
      </div>
    </section>
    <el-main class="center-main">
      <nuxt-child />
    </el-main>
    <el-footer class="bottom-footer">
      Copyright  © <a target="_blank" href="https://blog.pingbook.top">pingbook.top</a>
      <span><i class="fa fa-heart" /> Made by <a href="https://unsplash.com/randomimgenerator.vue"> Unsplash</a></span>
    </el-footer>
  </el-container>
</template>

<script>
export default {
  name: 'Unsplash',
  data () {
    return {
      title: 'Random Image Generator',
      menuActiveIndex: 'home',
      // 白色主题
      // menuBackgroundColor: '#fff',
      // menuTextColor: '#4d4f52',
      // menuActiveColor: '#0084ff',
      // 蓝色主题
      menuBackgroundColor: '#0366d6',
      menuTextColor: '#fff',
      menuActiveColor: '#fff'
    }
  },
  methods: {
    handleSelect (key, keyPath) {
      this.menuActiveIndex = key
    },
    goBlogPage () {
      const win = window.open('https://pingbook.top', '_blank')
      win.focus()
    }
  },
  head () {
    return {
      title: 'Free Random Image Generator',
      meta: [
        { hid: 'keywords', name: 'keywords', content: 'lorem picsum photos,lorem image,lorem photo,lorem picture,random image,random images,random photo,random img,random photos,random picture,random pictures,随机图片,免费图片,random free image,random image generator,free image,free picture,free photo' },
        { hid: 'description', name: 'description', content: 'The Random free Picture and Photo Generator from unsplash' }
      ]
    }
  }
}
</script>

<style>
  :root {
    --menu-background-color: #0366d6;
    --menu-text-color: #fff;
  }
  body {
    overflow-y: scroll;
  }
</style>
<style lang="scss" scoped>
  .container {
    height: 100vh;
  }
  .hero {
    background:url(https://4.bp.blogspot.com/_AQ0vcRxFu0A/S9shDGGyMTI/AAAAAAAAAYk/kn3WTkY2LoQ/s1600/IMG_0714.JPG);
    background-size:cover;
    background-position:center center;
    background-attachment:fixed;
    text-align:center;
    position:relative;
    width: 100%;
    color:#fff;
    .inner{
      background: rgba(0,0,0,0.7) url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAACCAYAAACddGYaAAAAD0lEQVQIW2NkQABjRmQOAAM+AGkQsDBSAAAAAElFTkSuQmCC) repeat;
      min-height:300px;
      position: relative;
      .copy {
        position:absolute;
        top:50%;
        height:10em;
        margin-top:-5em;
        width:100%;
        h1{
          margin:0px;
          font-family: 'Roboto Slab', serif;
          font-weight:400;
          font-size:32px;
          padding:0px 20px;
        }

        p{
          font-family: 'Noto Sans', sans-serif;
          font-size:14px;
          padding:0px 20px;
          a {
            text-decoration: none;
            color: #fff;
          }
        }
      }
    }
  }

  .top-header {
    font-weight: 500;
    // 设置位置
    /*position: sticky;*/
    /*top: 0;*/
    padding: 0 180px;
    /*z-index: 9999;*/
    // 设置底纹
    background-color: var(--menu-background-color);
    border-bottom: 0;
    box-shadow: 0 0 10px rgba(0,0,0,.1);
    transform: translateZ(0);
    .menu-area {
      display: flex;
      align-items: center;
      justify-content: space-between;
      a {
        padding: 0;
        margin: 0;
        color: var(--menu-text-color);
        text-decoration: none;
        outline: none;
        /*font-size: 1.25rem;*/
        line-height: inherit;
        white-space: nowrap;
      }
    }
  }
  .center-main {
    width: 85%;
    margin: auto;
    overflow: inherit;
  }
  .bottom-footer {
    position: sticky;
    padding: 24px 50px;
    font-size: 12px;
    color: #999;
    text-align: center;
    flex: 0 0 auto;
    /* background: #f0f2f5; */
    a {
      text-decoration: none;
      margin-right: 40px;
      &:hover{
        /*background-color: #409EFF;*/
        color:#409EFF;
      }
    }
  }
</style>
