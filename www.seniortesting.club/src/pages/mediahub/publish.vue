<template>
  <div class="publish">
    <div class="publish-form">
      <el-form
        ref="publishForm"
        v-loading="publishLoading"
        class="publish-form-content"
        :model="publishForm"
        :rules="rules"
        size="medium"
        label-width="100px"
        label-position="left"
        @submit.native.prevent
      >
        <el-form-item label-width="0" prop="fileToken">
          <div v-loading.lock="uploadLoading" class="el-upload__dragger">
            <el-upload
              ref="fileToken"
              multiple
              drag
              :auto-upload="true"
              :file-list="uploadFileList"
              :action="uploadAction"
              :limit="uploadLimit"
              :before-upload="handleUploadBefore"
              :http-request="handleUploadHttpRequest"
              :on-success="handleUploadSuccess"
              :on-error="handleUploadError"
              :before-remove="handleUploadRemove"
              :on-remove="handleUploadOnRemove"
              :on-preview="handleUploadPreview"
              :on-change="handleUploadChange"
            >
              <i class="el-icon-upload" />
              <div class="el-upload__text">
                拖拽文件到此处或点击下方按钮<br>
                <el-button type="primary">
                  上传音视频
                </el-button>
                <div class="el-upload__tip">
                  当前审核队列 <el-tag type="success">
                    畅通
                  </el-tag>
                </div>
              </div>
            </el-upload>
            <el-dialog
              append-to-body
              class="avue-upload__dialog"
              :modal-append-to-body="false"
              :visible.sync="uploadPreviewDlgShow"
            >
              <img
                :src="uploadPreviewDlgImgUrl"
                style="max-width:100%"
                alt
              >
            </el-dialog>
          </div>
        </el-form-item>
        <template v-if="continueUpload">
          <el-form-item label="标题" prop="title">
            <el-input
              v-model="publishForm.title"
              placeholder="请输入多媒体标题"
              show-word-limit
              clearable
              :style="{width: '100%'}"
            />
          </el-form-item>
          <el-form-item label="标签" prop="tags">
            <el-input-tag v-model="publishForm.tags" placeholder="按回车键Enter创建标签" />
          </el-form-item>
          <el-form-item label="描述" prop="remark">
            <el-input
              v-model="publishForm.remark"
              placeholder="请输入一些详细的描述"
              type="textarea"
              clearable
              show-word-limit
              :autosize="{ minRows: 8, maxRows: 18}"
            />
          </el-form-item>
          <el-form-item class="publish-btn" size="large">
            <el-button type="primary" :disabled="publishLoading" :loading="publishLoading" @click="submitForm">
              保存
            </el-button>
            <el-button @click="resetForm">
              返回
            </el-button>
          </el-form-item>
        </template>
      </el-form>
    </div>
  </div>
</template>

<script>
import ElInputTag from '@/components/el-input-tag'
import { snowflakeId } from '@/util/NumberUtil'
import upload from '@/api/upload'
import media from '@/api/media'
export default {
  name: 'Publish',
  components: { ElInputTag },
  data () {
    const lengthValidator = (rule, value, callback) => {
      if (value.length === 0) {
        callback(new Error('标签不能为空'))
      } else {
        callback()
      }
    }
    return {
      publishForm: {
        id: null,
        fileToken: '',
        title: '',
        tags: [],
        remark: ''
      },
      continueUpload: false,
      publishLoading: false,
      rules: {
        title: [{
          required: true,
          message: '音视频标题不能为空',
          trigger: 'blur'
        }],
        tags: [{
          required: true,
          message: '标签不能为空',
          validator: lengthValidator,
          trigger: 'blur'
        }]
      },
      // 文件上传
      uploadLoading: false,
      uploadDisabled: false,
      uploadAction: '',
      uploadToken: '',
      uploadLimit: 10,
      uploadFileList: [],
      uploadFileUrl: '',
      uploadPreviewDlgShow: false,
      uploadPreviewDlgImgUrl: ''
      // 文件上传结束
    }
  },
  watch: {},
  mounted () {
    const params = this.$route.params
    if (params.id) {
      this.publishForm.id = params.id
      this.publishForm.name = params.name
      this.publishForm.fileToken = params.fileToken
      this.fetchUploadFiles()
    } else {
    }
  },
  methods: {
    fetchUploadFiles () {
      this.uploadToken = this.publishForm.fileToken
      upload.getFileList({ token: this.uploadToken }).then((res) => {
        const resCode = res.code
        if (resCode === 0) {
          const resData = res.data
          this.uploadFileList = resData.map((file) => {
            return {
              name: file.original_name,
              url: file.url,
              uid: file.id
            }
          })
        }
      })
    },
    submitForm () {
      this.$refs.publishForm.validate((valid) => {
        if (!valid) {
          return
        }
        this.publishLoading = true
        this.publishForm.fileToken = this.uploadToken
        if (this.publishForm.id) {
        } else {
          media.addMedia(this.publishForm).then((res) => {
            this.publishLoading = false
            const resCode = res.code
            if (resCode === 0) {
              this.$swal({
                toast: true,
                timer: 3000,
                timerProgressBar: true,
                title: 'Publish media successfully!',
                icon: 'success',
                showConfirmButton: true
              })
              this.$router.push({ name: 'mediahub' })
            } else {
              this.$swal({
                toast: true,
                timer: 3000,
                timerProgressBar: true,
                title: res.message,
                icon: 'error',
                showConfirmButton: true
              })
            }
          }).catch((err) => {
            console.log(err)
            this.publishLoading = false
            this.$message.error('Publish media exception,please retry later!')
          })
        }
      })
    },
    resetForm () {
      // this.$refs.publishForm.resetFields()
      this.$router.go(-1)
    },
    handleUploadBefore (file) {
      // const isRightSize = file.size / 1024 / 1024 < 15
      // if (!isRightSize) {
      //   this.$message.error('File maximum size is 15MB')
      // }
      // const isAccept = new RegExp('image/*').test(file.type)
      // if (!isAccept) {
      //   this.$message.error('Only image file type supported')
      // }
      // return isRightSize && isAccept
    },
    handleUploadHttpRequest (config) {
      const uploadData = new FormData()
      uploadData.append('file', config.file)
      uploadData.append('token', this.uploadToken || snowflakeId())
      return upload.uploadFile(uploadData)
    },
    handleUploadChange (file, fileList) {
      this.uploadFileList = fileList
      this.continueUpload = this.uploadFileList.length > 0
    },
    handleUploadSuccess (res, file, fileList) {
      this.uploadLoading = false
      const resCode = res.code
      if (resCode === 0) {
        const resData = res.data
        this.uploadToken = resData.token
        file.url = resData.url
      } else {
        file.url = ''
        fileList.splice(fileList.length - 1, 1)
      }
      this.$message.success('upload success!')
    },
    handleUploadError (res, file, fileList) {
      this.uploadLoading = false
      file.url = ''
      fileList.splice(fileList.length - 1, 1)
      this.$message.error('upload failed，please retry it later!')
    },
    handleUploadPreview (file) {
      if (file.url) {
        const url = file.url
        this.uploadPreviewDlgImgUrl = url
        this.uploadPreviewDlgShow = true
      }
    },
    // handlePreviewImageChange () {
    //   this.publishForm.preview = this.uploadPreviewDlgImgUrl
    //   this.$swal({
    //     toast: true,
    //     timer: 4000,
    //     timerProgressBar: true,
    //     showConfirmButton: false,
    //     position: 'top',
    //     title: 'Change the product\'s preview image successfully, please submit the changes !'
    //   })
    // },
    // 上传删除文件
    handleUploadRemove (file, fileList) {
      return new Promise((resolve, reject) => {
        this.$confirm('Are you sure to remove it?', {
          confirmButtonText: 'OK',
          cancelButtonText: 'CANCEL',
          type: 'warning'
        }).then(() => {
          resolve()
        }).catch((action) => {
          this.$message.info('Cancel delete file!')
          reject(action)
        })
      })
    },
    handleUploadOnRemove (file, fileList) {
      this.uploadLoading = true
      upload.delFile({ url: file.url, token: this.uploadToken }).then((res) => {
        this.uploadLoading = false
        const resCode = res.code
        const message = res.message
        if (resCode === 0) {
          this.uploadFileUrl = ''
          this.$message({
            type: 'success',
            showClose: true,
            message: 'Delete file succesfully!'
          })
          this.continueUpload = fileList.length > 0
        } else {
          this.$message({
            type: 'error',
            duration: 5000,
            showClose: true,
            message: message || 'Delete file failed,please retry it later!'
          })
        }
      }).finally(() => {
        this.uploadLoading = false
      })
    }
  },
  head () {
    return {
      title: '发布音视频BGM',
      meta: [
        { hid: 'keywords', name: 'keywords', content: 'bgm,抖音bgm,热门bgm,' },
        { hid: 'description', name: 'description', content: '上传音视频BGM文件' }
      ]
    }
  }
}
</script>

<style lang="scss" scoped>
.publish-title {
  padding: 20px 0px;
  text-align: center;
}
.el-upload__tip {
  line-height: 1.2;
}
.publish-form {
  display: flex;
  flex-direction: row;
  justify-content: center;
  .publish-form-content {
    width: 50%;
    .el-upload__dragger {
      /deep/ .el-upload {
        width: 100%;
        .el-upload-dragger {
          width: 100%;
          height: 230px;
        }
      }
    }
    .publish-btn {
      text-align: center;
    }
  }
}
</style>
