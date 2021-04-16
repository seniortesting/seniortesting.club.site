<template>
  <div>
    <div ref="loadingContainer" class="content">
      <Adsense
        ins-style="display:block;text-align:center;width: 100%;"
        data-ad-client="ca-pub-1893384651266286"
        data-ad-slot="3377657013"
        data-ad-format="auto"
        :data-full-width-responsive="true"
      />
      <h4 class="p-h1">
        更新日期: {{ porns.length>0?porns[0].pornDate: '无' }}
      </h4>
      <div v-if="porns.length>0">
        <div v-for="item in porns" :key="item.id" class="row">
          <div class="col-md-2">
            <img id="img" v-lazy="item.img" class="img">
          </div>
          <div class="col-md-8">
            <h5 class="text-truncate">
              <a :href="item.pageUrl" target="_blank">{{ item.title }}</a>
            </h5>
            <div class="date">
              <p><span class="tag">{{ item.category }}</span>发布日期: {{ item.pornDate }} </p>
            </div>
          </div>
          <div class="col-md-2">
            <span
              v-clipboard:copy="item.url"
              v-clipboard:success="onCopySuccess"
              class="download fa fa-cloud"
              title="下载"
            />{{ item.downloadNum }}<span class="seperator">|</span>
            <i class="far fa-thumbs-up icon" title="点赞" @click="like(item)" />&nbsp;&nbsp;{{ item.likeNum }}
            <!--            <span class="seperator">|</span>-->
          </div>
        </div>
      </div>
      <div v-else class="text-center">
        <h3>暂无数据，请稍后再试!</h3>
      </div>
      <b-pagination
        v-model="pageNo"
        class="m-page"
        pills
        first-text="首页"
        prev-text="上一页"
        next-text="下一页"
        last-text="末页"
        align="center"
        limit="10"
        :per-page="pageSize"
        :total-rows="total"
        @input="changePage"
      />
    </div>
    <Adsense
      ins-style="display:block;text-align:center;width: 100%;"
      data-ad-client="ca-pub-1893384651266286"
      data-ad-slot="3377657013"
      data-ad-format="auto"
      :data-full-width-responsive="true"
    />
  </div>
</template>

<script>
import porn from '../../api/porn'
import Adsense from '../../components/vue-google-adsense/ads/AdsenseComponent'
export default {
  name: 'Index',
  components: { Adsense },
  data () {
    return {
      porns: [],
      pageNo: 1,
      pageSize: 20,
      total: 0,
      category: '短视频',
      hoverImage: ''
    }
  },
  computed: {
    updateTime () {
      const date = new Date()
      return date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate()
    }
  },
  mounted () {
    this.fetchPornPage()
  },
  methods: {
    fetchPornPage (refresh = true) {
      const pageData = {
        pageNo: this.pageNo,
        pageSize: this.pageSize,
        category: this.category
      }
      const loading = this.$loading.show({
        container: this.$refs.loadingContainer,
        zIndex: 9999999
      }, {
        after: this.$createElement('h3', { attrs: {}, style: { marginTop: '25px' } }, '请稍后。。。')
      })
      porn.listPornPage(pageData).then((res) => {
        const resCode = res.code
        loading.hide()
        if (resCode === 0) {
          const resData = res.data.records
          if (refresh) {
            this.porns = resData
          } else {
            this.porns = this.porns.concat(resData)
          }
          this.total = res.data.total
        } else {
          this.$toasted.error('请求数据失败，请稍后再试！', {
            position: 'top-center',
            duration: 3000
          })
        }
      }).catch((err) => {
        console.log(err)
        loading.hide()
        this.$toasted.error('服务请求异常,请稍后再试！', {
          position: 'top-center',
          duration: 3000
        })
      })
    },
    changePage (pageNum) {
      this.pageNo = pageNum
      this.fetchPornPage(true)
    },
    onCopySuccess (item) {
      this.$toasted.success('下载地址复制成功，请直接打开迅雷等下载工具点击“新建任务”', {
        position: 'top-center',
        duration: 8000
      })
    },
    like (item) {
      const data = {
        id: item.id
      }
      porn.likePorn(data).then((res) => {
        const resCode = res.code
        if (resCode === 0) {
          this.$toasted.success('点赞成功', {
            position: 'top-center'
          })
          this.$set(item, 'likeNum', parseInt(item.likeNum) + 1)
        } else {
          this.$toasted.error('请求数据失败，请稍后再试！', {
            position: 'top-center',
            duration: 3000
          })
        }
      }).catch((err) => {
        console.log(err)
        this.$toasted.error('服务请求异常,请稍后再试！', {
          position: 'top-center',
          duration: 3000
        })
      })
    },
    disLike (item) {

    }
  },
  head () {
    return {
      title: '短视频,国产,偷拍,更多内容，每天更新|私密空间',
      meta: [
        { hid: 'description', name: 'description', content: '持续更新短视频，国产视频，偷拍视频' }
      ]
    }
  }
}
</script>

<style scoped>
 .content {
   padding: 40px 200px;
 }
  .p-h1 {
    padding-bottom: 15px;
  }
  .m-page {
    margin-top: 10px;
  }
  .img {
    padding-right: 10px;
    width: 96px;
    height: 96px;
  }
  .row {
    border-bottom: 2px solid #ECEFF1;
    padding: 12px 12px 8px 45px;
    font-size: 14px;
    color: #263238;
    position: relative;
    word-break: normal;
    word-wrap: break-word;
  }
  .row:after {
    content: ".";
    display: block;
    height: 0;
    clear: both;
    visibility: hidden;
  }
  .col-md-8,.col-md-2 {
    margin: auto;
  }
  .date {
    font-size: 12px;
    padding-top: 12px;
  }
  .tag {
    border: 1px solid #5e00d9;
    border-radius: 50px;
    padding: 1px 5px;
    margin-right: 5px;
  }
  .download {
    cursor: pointer;
  }
  .seperator {
    padding: 0px 18px;
  }
  .icon {
    font-size: 20px !important;
    cursor: pointer;
  }
</style>
