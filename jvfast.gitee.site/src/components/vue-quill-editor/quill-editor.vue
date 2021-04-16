<template>
  <div class="avue-ueditor">
    <quill-editor
      ref="myQuillEditor"
      v-model="text"
      :style="{height:`${minRows*40+100}px`,maxHeight:`${maxRows*40+100}px`}"
      :disabled="disabled"
      :options="option"
      @change="handleChange"
      @click.native="handleClick"
      @dblclick.native="handleDbClick"
    />
    <transition name="fade">
      <div
        v-show="box"
        class="avue-ueditor__dialog"
      >
        <div
          class="avue-ueditor__mask"
          @click.stop="box=false"
        />

        <div class="avue-ueditor__content">
          <p class="avue-ueditor__tip">
            <span v-if="loading">
              正在上传中，请稍后
            </span>
          </p>
          <div class="avue-ueditor__img">
            <div class="avue-ueditor__img-left">
              <p>
                <small>宽度</small>:
                <input
                  v-model="img.width"
                  :disabled="imgFlag"
                  type="text"
                  class="avue-ueditor__img-input"
                >
              </p>
              <p>
                <small>高度</small>:
                <input
                  v-model="img.height"
                  :disabled="imgFlag"
                  type="text"
                  class="avue-ueditor__img-input"
                >
              </p>
            </div>
            <div class="avue-ueditor__img-right">
              <img
                ref="img"
                :src="img.url"
                :width="img.width"
                :height="img.height"
                class="avue-ueditor__img-img"
                alt=""
              >
            </div>
          </div>
          <div class="avue-ueditor__menu">
            <div
              v-if="!isImg"
              class="avue-ueditor__upload"
            >
              <button class="avue-ueditor__btn avue-ueditor__btn--plan">
                上 传
              </button>
              <input
                id="file"
                type="file"
                class="avue-ueditor__file"
                @change="handleUpload"
              >
            </div>
            &nbsp;
            <button
              :class="{'avue-ueditor__btn--disabled':imgFlag}"
              class="avue-ueditor__btn avue-ueditor__btn--plan"
              @click="handleSubmit"
            >
              确 定
            </button>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>
<script>
import quillEditor from 'vue-quill-editor/src/editor'
import { getClient } from './upload/ali'
import { getToken } from './upload/qiniu'
import { getObjValue } from './upload/util'

// 工具栏配置
const toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'], // 加粗 斜体 下划线 删除线
  ['blockquote', 'code-block'], // 引用  代码块
  // [{ header: 1 }, { header: 2 }], // 1、2 级标题
  [{ list: 'ordered' }, { list: 'bullet' }], // 有序、无序列表
  [{ script: 'sub' }, { script: 'super' }], // 上标/下标
  [{ indent: '-1' }, { indent: '+1' }], // 缩进  2
  [{
    color: [
      '#ffffff', '#ffd7d5', '#ffdaa9', '#fffed5', '#d4fa00', '#73fcd6', '#a5c8ff', '#ffacd5', '#ff7faa',
      '#d6d6d6', '#ffacaa', '#ffb995', '#fffb00', '#73fa79', '#00fcff', '#78acfe', '#d84fa9', '#ff4f79',
      '#b2b2b2', '#d7aba9', '#ff6827', '#ffda51', '#00d100', '#00d5ff', '#0080ff', '#ac39ff', '#ff2941',
      '#888888', '#7a4442', '#ff4c00', '#ffa900', '#3da742', '#3daad6', '#0052ff', '#7a4fd6', '#d92142',
      '#000000', '#7b0c00', '#ff0000', '#d6a841', '#407600', '#007aaa', '#021eaa', '#797baa', '#ab1942'
    ]
  }, {
    background: [
      '#ffffff', '#ffd7d5', '#ffdaa9', '#fffed5', '#d4fa00', '#73fcd6', '#a5c8ff', '#ffacd5', '#ff7faa',
      '#d6d6d6', '#ffacaa', '#ffb995', '#fffb00', '#73fa79', '#00fcff', '#78acfe', '#d84fa9', '#ff4f79',
      '#b2b2b2', '#d7aba9', '#ff6827', '#ffda51', '#00d100', '#00d5ff', '#0080ff', '#ac39ff', '#ff2941',
      '#888888', '#7a4442', '#ff4c00', '#ffa900', '#3da742', '#3daad6', '#0052ff', '#7a4fd6', '#d92142',
      '#000000', '#7b0c00', '#ff0000', '#d6a841', '#407600', '#007aaa', '#021eaa', '#797baa', '#ab1942'
    ]
  }], // 字体颜色、字体背景颜色
  [{ size: ['small', false, 'large', 'huge'] }], // 字体大小 2
  [{ header: [1, 2, 3, 4, 5, 6, false] }], // 标题
  [{ font: [] }], // 字体种类 2
  [{ direction: 'rtl' }], // 文本方向  2
  [{ align: [] }], // 对齐方式 2
  ['clean'], // 清除文本格式
  ['link', 'image', 'video'] // 链接、图片、视频
]
export default {
  name: 'AvueEditor',
  components: {
    quillEditor
  },
  props: {
    options: {
      type: Object,
      default: () => {
        return {}
      }
    },
    upload: {
      type: Object,
      default: () => {
        return {}
      }
    },
    value: {
      type: String,
      default: ''
    },
    disabled: {
      type: Boolean,
      default: false
    },
    readonly: {
      type: Boolean,
      default: false
    },
    height: {
      type: String,
      default: ''
    },
    minRows: {
      type: Number,
      default: 8
    },
    maxRows: {
      type: Number,
      default: 10
    }
  },
  data () {
    return {
      myQuillEditor: {},
      loading: false,
      text: undefined,
      box: false,
      img: {
        obj: {},
        url: '',
        width: 0,
        height: 0,
        calc: ''
      },
      option: {
        placeholder: '请输入内容',
        theme: 'snow', // or 'bubble'
        readonly: false,
        modules: {
          toolbar: {
            container: toolbarOptions
          }
        }
      }
    }
  },
  computed: {
    imgFlag () {
      return this.img.url === ''
    },
    isImg () {
      return this.img.obj.src
    },
    urlKey () {
      return this.props.url || 'url'
    },
    props () {
      return this.options.props || this.upload.props
    },
    oss () {
      return this.options.oss || this.upload.oss
    },
    action () {
      return this.options.action || this.upload.action
    },
    qiniu () {
      return this.options.qiniu || this.upload.qiniu
    },
    ali () {
      return this.options.ali || this.upload.ali
    },
    isQiniuOSS () {
      return this.oss === 'qiniu'
    },
    isAliOSS () {
      return this.oss === 'ali'
    }
  },
  watch: {
    'img.width' (n, o) {
      if (n === 0 || o === 0) { return }
      this.img.height = parseInt(n * this.img.calc)
    },
    // Walter 20200130： 此处的watch可能有错，暂时注释掉
    // disabled: {
    //   handle () {
    //     this.$nextTick(() => {
    //       this.myQuillEditor.enable(false)
    //     })
    //   }
    // },
    value () {
      this.text = this.value
    }
  },
  created () {
    this.init()
  },
  mounted () {
    this.myQuillEditor = this.$refs.myQuillEditor.quill
    this.myQuillEditor
      .getModule('toolbar')
      .addHandler('image', this.imgHandler)
  },
  methods: {
    handleSubmit () {
      if (this.imgFlag) { return }
      const index = this.myQuillEditor.selection.savedRange.index || this.text.length
      if (this.isImg) {
        this.img.obj.width = this.$refs.img.width
        this.img.obj.height = this.$refs.img.height
      } else {
        this.myQuillEditor.insertEmbed(index, 'image', this.img.url)
        this.myQuillEditor.focus()
      }
      this.clearImg()
      this.box = false
    },
    clearImg () {
      this.img.obj = {}
      this.img.url = ''
      this.img.width = 0
      this.img.height = 0
    },
    handleUpload (e) {
      this.loading = true
      const file = e.target.files[0]
      this.handleFile(file).then(() => {
        this.setImgParam()
      })
    },
    handleFile (file) {
      return new Promise((resolve) => {
        const headers = { 'Content-Type': 'multipart/form-data' }
        let ossConfig = {}
        let client
        const param = new FormData()
        let url = this.action
        param.append('file', file, file.name)
        if (this.isQiniuOSS) {
          ossConfig = this.qiniu
          const token = getToken(ossConfig.AK, ossConfig.SK, {
            scope: ossConfig.scope,
            deadline: new Date().getTime() + ossConfig.deadline * 3600
          })
          param.append('token', token)
          url = 'http://up.qiniu.com/'
        } else if (this.isAliOSS) {
          ossConfig = this.ali
          client = getClient({
            region: ossConfig.region,
            endpoint: ossConfig.endpoint,
            accessKeyId: ossConfig.accessKeyId,
            accessKeySecret: ossConfig.accessKeySecret,
            bucket: ossConfig.bucket
          })
        }
        (() => {
          if (this.isAliOSS) {
            return client.put(file.name, file)
          } else {
            return this.$httpajax.post(url, param, { headers })
          }
        })().then((res) => {
          let list = {}
          if (this.isAliOSS) {
            list = res
            this.img.url = list.url
          } else if (this.isQiniuOSS) {
            list = res.data
            list.key = ossConfig.url + list.key
            this.img.url = list.key
          } else {
            list = getObjValue(res.data, this.props.res, 'object')
            this.img.url = list[this.urlKey]
          }
          this.img.width = false
          this.img.height = false
          this.loading = false
          resolve()
        })
      })
    },
    setImgParam () {
      const img = this.$refs.img
      img.onload = () => {
        this.img.width = img.width
        this.img.height = img.height
        this.img.calc = img.height / img.width
      }
    },
    imgHandler () {
      this.clearImg()
      this.box = true
    },
    init () {
      this.text = this.value
      this.option.placeholder = this.placeholder || '请输入内容'
      this.option.readonly = this.readonly
      this.option = Object.assign(this.option, this.options, this.upload)
      this.handlePaste()
    },
    handlePaste () {
      // 粘贴键
      document.addEventListener('paste', (e) => {
        // 获取剪切板文件
        const getFile = (event) => {
          if (event.clipboardData || event.originalEvent) {
            const clipboardData =
                event.clipboardData || event.originalEvent.clipboardData
            if (clipboardData.items) {
              const items = clipboardData.items
              const len = items.length
              let blob = null
              for (let i = 0; i < len; i++) {
                if (items[i].type.includes('image')) {
                  blob = items[i].getAsFile()
                  return blob
                }
              }
            }
          }
        }
        const file = getFile(e)
        if (file) {
          this.box = true
          this.handleFile(file).then(() => {
            this.setImgParam()
          })
        }
      })
    },

    handleClick () {
      if (typeof this.click === 'function') { this.click({ value: this.text, column: this.column }) }
    },
    handleDbClick (e) {
      if (e.target.nodeName === 'IMG') {
        const img = e.target
        this.img.obj = e.target
        this.img.url = img.src
        this.img.width = img.width
        this.img.height = img.height
        this.img.calc = img.height / img.width
        this.box = true
      }
    },
    handleChange (value) {
      if (typeof this.change === 'function') { this.change({ value: value.html, column: this.column }) }
      this.$emit('input', value.html)
      this.$emit('change', value.html)
    }
  }
}
</script>
<style lang="scss">
  @import "./theme-chack/index.scss";
</style>
