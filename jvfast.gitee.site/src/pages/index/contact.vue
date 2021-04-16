<template>
  <div>
    <!--    <contact-us />-->
    <get-in-touch
      title="联系我们"
      desc="请告诉我们一些信息，让我们共同创建一个全新的未来"
      @submit="contactHandle"
    />
  </div>
</template>

<script>
// import ContactUs from '../../components/banner/contact/contact-us'
import GetInTouch from '../../components/banner/contact/get-in-touch'
import feedback from '../../api/feedback'
export default {
  name: 'Contact',
  components: {
    // ContactUs,
    GetInTouch
  },
  methods: {
    contactHandle (data) {
      const loader = this.$loading.show({
        container: this.$refs.contactFrm
      }, {
        after: this.$createElement('h4', { style: { textAlign: 'center' }, paddingTop: '10px' }, '请稍候...')
      })
      const feedbackData = {
        feedbackType: 1001,
        name: data.name,
        email: data.email,
        title: data.subject,
        detail: data.content
      }
      feedback.saveFeedback(feedbackData).then((res) => {
        const resCode = res.code
        if (resCode === 0) {
          this.$toasted.success('感谢您的反馈结果!', {
            position: 'bottom-center',
            containerClass: '',
            icon: 'fa-success'
          })
          this.$router.push({
            name: 'index'
          })
        } else {
          const msg = res.message
          console.log('操作失败:', msg)
          this.$toasted.error(`操作失败，错误信息是: ${msg}`, {
            position: 'bottom-center',
            containerClass: '',
            icon: 'fa-success'
          })
        }
      }).catch((err) => {
        console.log(err)
        this.$toasted.error('服务异常，请稍后再试!', {
          position: 'bottom-center',
          containerClass: '',
          icon: 'fa-success'
        })
      }).finally(() => {
        loader.hide()
      })
    }
  },
  head () {
    return {
      title: '商务合作 | JVFast管理框架',
      meta: [
        { hid: 'description', name: 'description', content: 'JVFast管理框架是最敏捷的前后端脚手架系统快速解决方案，通用服务器端/SPA渲染，SEO优化' }
      ]
    }
  }
}
</script>

<style scoped>

</style>
