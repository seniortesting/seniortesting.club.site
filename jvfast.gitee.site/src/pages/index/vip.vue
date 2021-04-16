<template>
  <div>
    <price-table
      title="产品套餐计划"
      :desc="desc"
      :data="data"
    />
  </div>
</template>

<script>
import PriceTable from '../../components/banner/price-plan/price-table'
export default {
  name: 'Vip',
  components: { PriceTable },
  data () {
    return {
      desc: 'JVFast是采用MIT许可的开源产品，但是开源不易，随着我们业务功能和模块的逐步完善增加，我们也需要投入更多的时间和精力才能继续项目的开发维护工作。<br/>除下表列出的开发版和商用版个别功能外，其他所有功能全部开源免费使用，没有任何限制。',
      data: {
        price: {
          free: {
            name: '开源版',
            price: '免费'
          },
          standard: {
            name: '开发版',
            price: '￥30.00/永久'
          },
          premium: {
            name: '商用版',
            price: '￥80.00/永久'
          }
        },
        features: [
          {
            name: '包含常用功能模块用户,角色,菜单,岗位等，支持系统监控等功能',
            free: true,
            standard: true,
            premium: true
          },
          {
            name: '版本持续更新，高效迭代',
            free: true,
            standard: true,
            premium: true
          },
          {
            name: '完善的开发文档，开发demo，快速入门',
            free: true,
            standard: true,
            premium: true
          },
          {
            name: '集成第三方平台(例如微信公众号,小程序开发,常用对象存储平台阿里云七牛云等）',
            free: false,
            standard: true,
            premium: true
          },
          {
            name: '附送多套建站模板（通用vue组件封装）',
            free: false,
            standard: true,
            premium: true
          },
          {
            name: '定期新功能修复更新通知',
            free: false,
            standard: false,
            premium: true
          },
          {
            name: '专属会员群/专人解决问题(支持远程、语音)',
            free: false,
            standard: false,
            premium: true
          },
          {
            name: '公司企业商用',
            free: false,
            standard: false,
            premium: true
          }
        ]
      }
    }
  },
  head () {
    return {
      title: '授权升级,产品套餐计划 | JVFast管理框架',
      meta: [
        { hid: 'description', name: 'description', content: 'JVFast管理框架价格套餐' }
      ]
    }
  }
}
</script>

<style scoped>

</style>
