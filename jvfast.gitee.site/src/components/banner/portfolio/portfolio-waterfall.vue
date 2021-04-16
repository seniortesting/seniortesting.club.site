<template>
  <section id="portfolio" class="clearfix">
    <div class="container">
      <header class="section-header">
        <h3 class="section-title">
          {{ title }}
        </h3>
      </header>

      <div class="row">
        <div class="col-lg-12">
          <ul id="portfolio-flters">
            <li v-for="(item,index) in type" :key="item.key" :class="activeIndex===index? 'filter-active':null" :data-option-value="item.key" @click.prevent="filterHandle(item,index)">
              {{ item.value }}
            </li>
          </ul>
        </div>
      </div>

      <water-fall
        ref="waterfall"
        :data="currentData"
        :breakpoints="{
          1200: { //当屏幕宽度小于等于1200
            rowPerView: 3,
          },
          800: { //当屏幕宽度小于等于800
            rowPerView: 2,
          },
          500: { //当屏幕宽度小于等于500
            rowPerView: 1,
          }
        }"
        class="row portfolio-container"
      >
        <template slot="item" slot-scope="scope">
          <div class="portfolio-item">
            <div class="portfolio-wrap">
              <img
                class="img-fluid"
                :src="scope.data.img"
                alt=""
                @load="$refs.waterfall.refresh()"
              >
              <div class="portfolio-info">
                <h4><a href="#">{{ scope.data.title }}</a></h4>
                <p>{{ scope.data.desc }}</p>
                <div>
                  <a class="link-preview" title="Preview" @click.prevent="previewHandle(scope.data)"><i class="fa fa-eye" /></a>
                  <a :href="scope.data.url" class="link-details" title="More Details"><i class="fa fa-box-open" /></a>
                </div>
              </div>
            </div>
          </div>
        </template>
      </water-fall>
      <!-- 模态框（Modal） -->
      <b-modal
        id="previewer"
        :title="modalData.title"
        size="lg"
        centered
        hide-footer
        hide-header-close
      >
        <p style="text-align: center">
          <img :src="modalData.img" style="width: 100%;height: 100%">
        </p>
      </b-modal>
    </div>
  </section><!-- #portfolio -->
</template>

<script>
import WaterFall from '../../../components/vue-waterfall/index'
export default {
  name: 'PortfolioFlow',
  components: { WaterFall },
  props: {
    title: {
      type: String,
      default: 'Our Portfolio'
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
            key: 'app',
            value: 'App'
          },
          {
            key: 'card',
            value: 'Card'
          },
          {
            key: 'web',
            value: 'Web'
          }
        ]
      }
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            type: 'app',
            title: '物件共享App',
            desc: '基于uniapp的小程序和App',
            img: require('@/assets/img/portfolio/portfolio-app1.jpg')
          },
          {
            type: 'web',
            title: '建站模板大全',
            desc: '基于vue涵盖常用建站banner和单页模板',
            img: require('@/assets/img/portfolio/portfolio-app2.jpg')
          },
          {
            type: 'service',
            title: '微信公众号服务',
            desc: '集成wxjava开发的公众号服务平台',
            img: require('@/assets/img/portfolio/portfolio-img5.jpg')
          },
          {
            type: 'web',
            title: '通用SPA后台系统',
            desc: '采用elementui集成版avue开发前端页面',
            img: require('@/assets/img/portfolio/portfolio-img6.jpg')
          },
          {
            type: 'scrapy',
            title: '新闻更新爬虫',
            desc: '多线程分布式平台搭建的定时爬虫任务',
            img: require('@/assets/img/portfolio/portfolio-img7.jpg')
          },
          {
            type: 'app',
            title: '混合开发App',
            desc: '流行的ionic框架，开发手机APP',
            img: require('@/assets/img/portfolio/portfolio-img8.jpg')
          },
          {
            type: 'scrapy',
            title: '某网站爬虫',
            desc: '通用爬虫快速爬取常用数据',
            img: require('@/assets/img/portfolio/portfolio-img9.jpg')
          }
        ]
      }
    }
  },
  data () {
    return {
      activeIndex: 0,
      col: 3,
      currentData: this.data,
      modalData: {}
    }
  },
  computed: {
    itemWidth () {
      return (138 * 0.5 * (document.documentElement.clientWidth / 375)) // rem to layout, Calculate the value of width
    },
    gutterWidth () {
      return (9 * 0.5 * (document.documentElement.clientWidth / 375)) // rem to layout, Calculate the value of margin
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
    },
    previewHandle (data) {
      this.modalData = data
      this.$bvModal.show('previewer')
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

  /* Portfolio Section
  --------------------------------*/
  #portfolio {
    padding: 60px 0;
    box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.1);
  }

  #portfolio #portfolio-flters {
    padding: 0;
    margin: 5px 0 35px 0;
    list-style: none;
    text-align: center;
  }

  #portfolio #portfolio-flters li {
    cursor: pointer;
    margin: 15px 15px 15px 0;
    display: inline-block;
    padding: 6px 20px;
    font-size: 12px;
    line-height: 20px;
    color: #007bff;
    border-radius: 50px;
    text-transform: uppercase;
    background: #ecf5ff;
    margin-bottom: 5px;
    transition: all 0.3s ease-in-out;
  }

  #portfolio #portfolio-flters li:hover,
  #portfolio #portfolio-flters li.filter-active {
    background: #007bff;
    color: #fff;
  }

  #portfolio #portfolio-flters li:last-child {
    margin-right: 0;
  }

  #portfolio .portfolio-item {
    position: relative;
    overflow: hidden;
    margin-bottom: 30px;
  }

  #portfolio .portfolio-item .portfolio-wrap {
    overflow: hidden;
    position: relative;
    border-radius: 6px;
    margin: 0;
  }

  #portfolio .portfolio-item .portfolio-wrap:hover img {
    opacity: 0.4;
    transition: 0.3s;
  }

  #portfolio .portfolio-item .portfolio-wrap .portfolio-info {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
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
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    text-align: center;
    opacity: 0;
    transition: 0.2s linear;
  }

  #portfolio .portfolio-item .portfolio-wrap .portfolio-info h4 {
    font-size: 22px;
    line-height: 1px;
    font-weight: 700;
    margin-bottom: 14px;
    padding-bottom: 0;
  }

  #portfolio .portfolio-item .portfolio-wrap .portfolio-info h4 a {
    color: #fff;
  }

  #portfolio .portfolio-item .portfolio-wrap .portfolio-info h4 a:hover {
    color: #007bff;
  }

  #portfolio .portfolio-item .portfolio-wrap .portfolio-info p {
    padding: 0;
    margin: 0;
    color: #e2effe;
    font-weight: 500;
    font-size: 14px;
    text-transform: uppercase;
  }

  #portfolio .portfolio-item .portfolio-wrap .portfolio-info .link-preview,
  #portfolio .portfolio-item .portfolio-wrap .portfolio-info .link-details {
    display: inline-block;
    line-height: 1;
    text-align: center;
    width: 36px;
    height: 36px;
    background: #007bff;
    border-radius: 50%;
    margin: 10px 4px 0 4px;
  }

  #portfolio .portfolio-item .portfolio-wrap .portfolio-info .link-preview i,
  #portfolio .portfolio-item .portfolio-wrap .portfolio-info .link-details i {
    padding-top: 6px;
    font-size: 22px;
    color: #fff;
  }

  #portfolio .portfolio-item .portfolio-wrap .portfolio-info .link-preview:hover,
  #portfolio .portfolio-item .portfolio-wrap .portfolio-info .link-details:hover {
    background: #3395ff;
  }

  #portfolio .portfolio-item .portfolio-wrap .portfolio-info .link-preview:hover i,
  #portfolio .portfolio-item .portfolio-wrap .portfolio-info .link-details:hover i {
    color: #fff;
  }

  #portfolio .portfolio-item .portfolio-wrap:hover {
    background: #003166;
  }

  #portfolio .portfolio-item .portfolio-wrap:hover .portfolio-info {
    opacity: 1;
  }
  /*通用样式*/
  /*手机*/
  @@media screen and (max-width:600px){

  }
  /*PC*/
  @@media screen and (min-width:960px){
    #myModal div {
      min-width: 65%;
    }
  }
</style>
