<template>
  <div class="page-wrapper">
    <el-row>
      <div class="section-header">
        <h2>List Images</h2>
        <p>Get a list of images by using the <code>/photo/list</code> endpoint.</p>
      </div>
      <el-col :md="10" :xl="10" :sm="24" :xs="24" :offset="1">
        <div class="img-wrapper">
          <el-row>
            <el-col
              v-for="item in form.photo.img"
              :key="item.id"
              :md="8"
              :xl="8"
              :sm="12"
              :xs="12"
              :offset="1"
            >
              <el-image fit="contain" :src="item.urls.regular">
                <div slot="placeholder" class="image-slot-loading">
                  <svg class="gear" style="width:64px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path id="p" fill="#fdb" d="M94.1 58.8c.6-2.8.9-5.8.9-8.8s-.3-6-.9-8.8l-11.7-.4c-.7-2.6-1.7-5-3-7.3l8-8.5c-3.3-4.9-7.5-9.2-12.5-12.5l-8.5 8c-2.3-1.3-4.7-2.3-7.3-3l-.3-11.6C56 5.3 53 5 50 5s-6 .3-8.8.9l-.4 11.7c-2.6.7-5 1.7-7.3 3l-8.5-8c-4.9 3.3-9.2 7.5-12.5 12.5l8 8.5c-1.3 2.3-2.3 4.7-3 7.3l-11.6.3C5.3 44 5 47 5 50s.3 6 .9 8.8l11.7.4c.7 2.6 1.7 5 3 7.3l-8 8.5c3.3 4.9 7.5 9.2 12.5 12.5l8.5-8c2.3 1.3 4.7 2.3 7.3 3l.4 11.7c2.7.5 5.7.8 8.7.8s6-.3 8.8-.9l.4-11.7c2.6-.7 5-1.7 7.3-3l8.5 8c4.9-3.3 9.2-7.5 12.5-12.5l-8-8.5c1.3-2.3 2.3-4.7 3-7.3l11.6-.3zM50 66.9c-9.3 0-16.9-7.6-16.9-16.9S40.7 33.1 50 33.1 66.9 40.7 66.9 50 59.3 66.9 50 66.9z" /></svg>
                  <svg class="gear" style="width:64px;margin:64px 0 0 -12px;animation-direction:reverse" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><use href="#p" /></svg>
                  <div class="text-muted">
                    Image list loading ...
                  </div>
                </div>
                <div slot="error" class="image-slot-error">
                  <i class="el-icon-picture-outline" />
                </div>
              </el-image>
            </el-col>
          </el-row>
          <div>
            <h5>Photos from <a target="_blank" href="https://unsplash.com/">Unsplash</a></h5>
          </div>
        </div>
      </el-col>
      <el-col :md="12" :xl="12" :sm="24" :xs="24" class="api-wrapper">
        <el-input v-model="form.photo.urlInput" class="input-url-wrapper" placeholder="Please input the url" readonly @focus="copyPostUrl('photo')">
          <template slot="prepend">
            <span>GET</span>
          </template>
          <template slot="append">
            <el-button type="primary" :disabled="form.photo.btnDisable" @click="sendRequest('photo')">
              Send
            </el-button>
          </template>
        </el-input>
        <div class="type-wrapper">
          <span class="title">Content Type: </span><span class="text">JSON(application/json)</span>
        </div>
        <el-table ref="photoTable" :data="table.photosData" style="width: 100%">
          <el-table-column label="Request Parameters">
            <el-table-column
              prop="type"
              label="Parameter Type"
              width="200"
            />
            <el-table-column
              prop="param"
              label="Parameter Name"
              width="150"
            />
            <el-table-column
              label="Value"
            >
              <template slot-scope="scope">
                <el-input v-model="scope.row.value" placeholder="Input the parameter value" />
              </template>
            </el-table-column>
          </el-table-column>
        </el-table>
        <div class="result-header-wrapper">
          <p><strong>Response result</strong></p>
        </div>
        <div class="textarea-wrapper">
          <el-input
            v-model="form.photo.result"
            v-highlightjs
            v-clipboard:copy="form.photo.result"
            v-clipboard:success="onCopySuccessResponseResult"
            class="textarea"
            type="textarea"
            :autosize="{ minRows: 2, maxRows: 30}"
          >
            <code class="json" />
          </el-input>
        </div>
      </el-col>
    </el-row>
    <el-divider />
    <Adsense
      ins-style="display:block;text-align:center;width: 100%;"
      data-ad-client="ca-pub-1893384651266286"
      data-ad-slot="3377657013"
      data-ad-format="auto"
      :data-full-width-responsive="true"
    />
    <el-divider />
    <el-row>
      <div class="section-header">
        <h2>Pick a Random Images</h2>
        <p>Pick a random image by using the <code>/photo/random</code> endpoint.</p>
      </div>
      <el-col :md="10" :xl="10" :sm="24" :xs="24" :offset="1">
        <div class="img-wrapper">
          <el-image fit="contain" :src="form.random.img">
            <div slot="placeholder" class="image-slot-loading">
              <svg class="gear" style="width:64px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path id="p" fill="#fdb" d="M94.1 58.8c.6-2.8.9-5.8.9-8.8s-.3-6-.9-8.8l-11.7-.4c-.7-2.6-1.7-5-3-7.3l8-8.5c-3.3-4.9-7.5-9.2-12.5-12.5l-8.5 8c-2.3-1.3-4.7-2.3-7.3-3l-.3-11.6C56 5.3 53 5 50 5s-6 .3-8.8.9l-.4 11.7c-2.6.7-5 1.7-7.3 3l-8.5-8c-4.9 3.3-9.2 7.5-12.5 12.5l8 8.5c-1.3 2.3-2.3 4.7-3 7.3l-11.6.3C5.3 44 5 47 5 50s.3 6 .9 8.8l11.7.4c.7 2.6 1.7 5 3 7.3l-8 8.5c3.3 4.9 7.5 9.2 12.5 12.5l8.5-8c2.3 1.3 4.7 2.3 7.3 3l.4 11.7c2.7.5 5.7.8 8.7.8s6-.3 8.8-.9l.4-11.7c2.6-.7 5-1.7 7.3-3l8.5 8c4.9-3.3 9.2-7.5 12.5-12.5l-8-8.5c1.3-2.3 2.3-4.7 3-7.3l11.6-.3zM50 66.9c-9.3 0-16.9-7.6-16.9-16.9S40.7 33.1 50 33.1 66.9 40.7 66.9 50 59.3 66.9 50 66.9z" /></svg>
              <svg class="gear" style="width:64px;margin:64px 0 0 -12px;animation-direction:reverse" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><use href="#p" /></svg>
              <div class="text-muted">
                Random image loading ...
              </div>
            </div>
            <div slot="error" class="image-slot-error">
              <i class="el-icon-picture-outline" />
            </div>
          </el-image>
          <div>
            <h5>Photos from <a target="_blank" href="https://unsplash.com/">Unsplash</a></h5>
          </div>
        </div>
      </el-col>
      <el-col :md="12" :xl="12" :sm="24" :xs="24" class="api-wrapper">
        <el-input v-model="form.random.urlInput" class="input-url-wrapper" placeholder="Please input the url" readonly @focus="copyPostUrl('random')">
          <template slot="prepend">
            <span>GET</span>
          </template>
          <template slot="append">
            <el-button type="primary" :disabled="form.random.btnDisable" @click="sendRequest('random')">
              Send
            </el-button>
          </template>
        </el-input>
        <div class="type-wrapper">
          <span class="title">Type: </span><span class="text">JSON(application/json)</span>
        </div>
        <el-table ref="randomTable" :data="table.randomData" style="width: 100%" empty-text=" ">
          <el-table-column label="Request Parameters">
            <el-table-column
              label="Parameter Type"
              width="200"
            >
              <template slot-scope="scope">
                <span style="font-weight: bold">{{ scope.row.type }}</span>
              </template>
            </el-table-column>
            <el-table-column
              prop="param"
              label="Parameter Name"
              width="150"
            />
            <el-table-column
              label="Value"
            >
              <template slot-scope="scope">
                <el-input v-model="scope.row.value" placeholder="Input the parameter value" />
              </template>
            </el-table-column>
          </el-table-column>
        </el-table>
        <div class="result-header-wrapper">
          <p><strong>Response result</strong></p>
        </div>
        <div class="textarea-wrapper">
          <el-input v-model="form.random.result" class="textarea" type="textarea" :autosize="{ minRows: 2, maxRows: 30}" />
        </div>
      </el-col>
    </el-row>
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
export default {
  name: 'Home',
  // async  asyncData ({ $axios }) {
  //   const { data } = await $axios.$get(photo.PHOTO_LIST_URL, { params: { page: 1, limit: 3, orderBy: 'latest' } })
  //   return { images: data }
  // },
  data () {
    return {
      form: {
        photo: {
          img: [{ id: 'dpbXgTh0Lac', urls: { regular: 'https://images.unsplash.com/photo-1593642532400-2682810df593?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjE1MjUxOX0' } }, { id: 'GHOk63pTzvs', urls: { regular: 'https://images.unsplash.com/photo-1596223626684-ddd3204f50fd?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjE1MjUxOX0' } }, { id: 'ZJ0vcVaymb0', urls: { regular: 'https://images.unsplash.com/photo-1596139983893-7932ee9d18f5?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjE1MjUxOX0' } }, { id: 'FoMIvNOGg4c', urls: { regular: 'https://images.unsplash.com/photo-1596223183131-57f7238f07ef?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjE1MjUxOX0' } }, { id: 'QyoyEH-PkR0', urls: { regular: 'https://images.unsplash.com/photo-1596178836648-91085b2cfc5f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjE1MjUxOX0' } }, { id: 'tgq6EdkBTnA', urls: { regular: 'https://images.unsplash.com/photo-1596221780522-71f822d9f63b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjE1MjUxOX0' } }, { id: 'smXTwtqx_jY', urls: { regular: 'https://images.unsplash.com/photo-1595970938640-2ece03cc657c?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjE1MjUxOX0' } }, { id: '48eu_-C0r3g', urls: { regular: 'https://images.unsplash.com/photo-1596213412524-b063f73c7249?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjE1MjUxOX0' } }, { id: '6tK48z_kTDc', urls: { regular: 'https://images.unsplash.com/photo-1596162953891-a09bcaa2bf4d?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjE1MjUxOX0' } }, { id: 'Mis7oALPKdM', urls: { regular: 'https://images.unsplash.com/photo-1596166901298-558710d4c950?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjE1MjUxOX0' } }],
          urlInput: 'https://pingbook.top/api/photo/list',
          page: 1,
          limit: 10,
          orderBy: 'latest',
          btnDisable: false,
          result: `{
 "data": {},
 "code": 0,
 "message": "",
 "timestamp": "2020-07-31T05:26:10.589Z",
 "success": true
}
`
        },
        random: {
          img: 'https://images.unsplash.com/photo-1595860374738-5a920e757223?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjE1MjUxOX0',
          urlInput: 'https://pingbook.top/api/photo/random',
          btnDisable: false,
          result: `{
 "data": {},
 "code": 0,
 "message": "2020-07-31T05:26:10.589Z",
 "success": true
}
`
        }
      },
      table: {
        photosData: [
          {
            type: 'query(Number/String)',
            param: 'page',
            value: '1'
          },
          {
            type: 'query(Number/String)',
            param: 'limit',
            value: '10'
          },
          {
            type: 'query(String)',
            param: 'orderBy',
            value: 'latest'
          }
        ],
        randomData: []
      }
    }
  },
  mounted () {
  },
  destroyed () {
  },
  methods: {
    copyPostUrl (type) {
      let url = ''
      let params = ''
      if (type === 'photo') {
        url = this.form.photo.urlInput
        const rowData = this.table.photosData
        const page = rowData[0].value || 1
        const limit = rowData[1].value || 10
        const orderBy = rowData[2].value || 'latest'
        params = `?page=${page}&limit=${limit}&orderBy=${orderBy}`
      } else if (type === 'random') {
        url = this.form.random.urlInput
      }
      this.$copyText(url + params).then((res) => {
        // console.log(res)
        this.$message.success('Copied request url success!')
      }).catch((err) => {
        console.log(err)
        this.$message.error('Copy error!')
      })
    },
    sendRequest (type) {
      let url = ''
      let params = ''
      if (type === 'photo') {
        url = this.form.photo.urlInput
        const rowData = this.table.photosData
        const page = rowData[0].value || 1
        const limit = rowData[1].value || 10
        const orderBy = rowData[2].value || 'latest'
        params = `?page=${page}&limit=${limit}&orderBy=${orderBy}`
        this.form.photo.btnDisable = true
        this.form.photo.img = []
        url = this.form.photo.urlInput
        this.form.photo.result = `{
}
        `
      } else if (type === 'random') {
        this.form.random.btnDisable = true
        this.form.random.img = ''
        url = this.form.random.urlInput
        this.form.random.result = `{
}
        `
      }
      this.$axios.$get(url + params).then((res) => {
        const resCode = res.code
        if (resCode === 0) {
          const resData = res.data
          if (type === 'photo') {
            this.form.photo.result = JSON.stringify(res, null, 4)
            this.form.photo.img = resData
            // const resultData = resData.map((item) => {
            //   return {
            //     id: item.id,
            //     urls: {
            //       regular: item.urls.regular
            //     }
            //   }
            // })
            // console.log(JSON.stringify(resultData))
          } else if (type === 'random') {
            this.form.random.result = JSON.stringify(res, null, 4)
            this.form.random.img = resData.urls.regular
          }
        }
      }).catch((err) => {
        console.log(err)
        this.$message.error('Request Error, try again later!')
      }).finally(() => {
        if (type === 'photo') {
          setTimeout(() => {
            this.form.photo.btnDisable = false
          }, 500)
        } else if (type === 'random') {
          setTimeout(() => {
            this.form.random.btnDisable = false
          }, 500)
        }
      })
    },
    onCopySuccessResponseResult () {
      this.$message.success('Copied response result success!')
    }
  },
  head () {
    return {
      title: 'Free Random Image Generator',
      meta: [
        { hid: 'keywords', name: 'keywords', content: 'lorem picsum photos,lorem image,lorem photo,lorem picture,random image,random images,random photo,random img,random photos,random picture,random pictures,random free image,random image generator,random image,随机图片,免费图片,free image,free picture,free photo' },
        { hid: 'description', name: 'description', content: 'The Random free Picture and Photo Generator from unsplash' }
      ]
    }
  }
}
</script>

<style lang="scss" scoped>
  * {
    box-sizing: border-box;
    font-weight: normal;
  }
  /** loading animation start **/
  svg {
    overflow: hidden;
    vertical-align: middle;
  }
  @keyframes r {
    0% { transform: rotate(0deg); } 100% { transform: rotate(45deg); }
  }
  svg.gear { animation: r .5s infinite linear; }
  /** loading animation end **/
  .page-wrapper {
    text-align: center;
    .section-header {
      text-align: left !important;
      padding-left: 60px;
      h2 {
        font-family: 'Roboto', sans-serif;
        font-weight: 600;
        margin-bottom: 0.5em;
      }
      p {
        font-size: 16px;
        line-height: 1.6em;
        code {
          padding: 4px 6px;
          font-size: 90%;
          color: hsl(0, 0%, 23.7%);
          background-color: hsl(0, 0%, 94.9%);
          border-radius: 4px;
        }
      }
    }
  }
  .img-wrapper {
    padding: 50px 50px 50px 0px;
    .el-image {
      border-radius: 15px;
      .image-slot-loading {
        font-size: 25px;
      }
      .image-slot-error {
        font-size: 200px;
      }
    }
  }
  .api-wrapper {
    padding: 1rem 0px;
    .input-url-wrapper {
      /deep/ .el-input-group__prepend {
        background-color: #409EFF;
        color: #FFF;
        border-color: #409EFF;
      }
      /deep/ .el-input-group__append {
        background-color: #409EFF;
        color: #FFF;
        border-color: #409EFF;
      }
    }
    .type-wrapper {
      text-align: left !important;
      padding: 15px 0px;
      .title {
        width: 100px;
        display: inline-block;
        font-size: 14px;
      }
    }
    .result-header-wrapper {
         text-align: left !important;
    }
    .textarea-wrapper {
       .el-textarea /deep/ .el-textarea__inner {
         min-height: 210px !important;
       }
    }
  }
</style>
