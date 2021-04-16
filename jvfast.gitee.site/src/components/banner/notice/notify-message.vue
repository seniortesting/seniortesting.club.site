<template>
  <section v-show="isShow" class="notify" :data-position="position" :data-notify="type">
    <div class="container notify-con">
      <div class="row">
        <div class="col-md-12" style="padding:5px;font-size: 16px">
          <span class="sp_title" />
          <span class="notify-content">
            <span class="notify-content" v-html="content" />
          </span>
          <p><a class="notify-close" @click.prevent="close">关闭</a></p>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'NotifyMessage',
  props: {
    id: {
      type: String,
      require: true,
      default: 'notify'
    },
    position: {
      type: String,
      default: 'top',
      validator (t) {
        return ['bottom', 'top', 'right', 'left'].includes(t)
      }
    },
    type: {
      type: String,
      default: 'success',
      validator (t) {
        return ['success', 'error'].includes(t)
      }
    },
    content: {
      type: String,
      default: '<span style="margin-right:5px;">Heap Stack</span>推出收费版套餐，<a href="/vip">[<span style="font-size:14px;padding:0px 5px;">点击</span>]</a>查看详情，如有疑问，请加入我们<a href="https://jq.qq.com/?_wv=1027&k=5UOnVMh" class="fab fa-qq"></a> 联系。'
    }
  },
  data () {
    return {
      isShow: true
    }
  },
  watch: {
    isShow: {
      handler (newValue) {

      }
    }
  },
  mounted () {
    const value = localStorage.getItem('188f59f51f414d2d966d32b896f629a6-' + this.id)
    if (!value) {
      // 删除所有以前存放的值
      Object.keys(localStorage).forEach(item => item.includes('188f59f51f414d2d966d32b896f629a6-') ? localStorage.removeItem(item) : '')
    }
    this.isShow = !value
  },
  methods: {
    close () {
      localStorage.setItem('188f59f51f414d2d966d32b896f629a6-' + this.id, true)
      this.isShow = false
    }
  }
}
</script>

<style scoped>
  .notify{padding: 10px;color:#fff;z-index: 999;top: 0px;position:relative;z-index: 999;}
  .notify[data-position="bottom"]{right:0;left:0;bottom:0}
  .notify[data-position="top"]{right:0;left:0;top:0}
  .notify[data-position="right"]{right:0;bottom:0;top:0;max-width:300px}
  .notify[data-position="left"]{left:0;top:0;bottom:0;max-width:300px}
  .notify[data-notify='success']{background:#15cc1f}
  .notify[data-notify='error']{background:#f32750}.notify[data-notify='default']{background:#cf80ad}
  .notify .notify-close{
    cursor: pointer;
    padding: 6px 35px;
    font-size: 17px;
    font-weight: 500;
    display: inline-block;
    text-decoration: none;
    border-radius: 50px;
    background-color: #ffffff;
    color: #6c9be5 !important;
    float: unset;
    transition: 0.5s all ease;
    margin-left: 35px;
  }
  .notify-close{
    animation: notify-close-c 20s;
    -moz-animation: notify-close-c 20s; /* Firefox */
    -webkit-animation: notify-close-c 20s;  /* Safari 和 Chrome */
    -o-animation: notify-close-c 20s;   /* Opera */
    animation-iteration-count:infinite;
    animation-direction:alternate
  }
  .notify-close:hover{
    background-color:#d1d1d1
  }
  .notify-content >>> a{padding:0px 5px;color: #fff !important;}

  .notify-content >>> a{font-size: 23px;transition: 0.2s all ease;position: relative;top: 2px;}
  .notify-content >>> a:hover{
    font-size:29px;
  }

  .notify >>> h1{margin:5px 0 10px 0;text-transform:uppercase;font-size: 20px;font-weight: 900;color:#fff;}
  .notify{
    background-color:#216cd0;
    animation: notify-bg 20s;
    -moz-animation: notify-bg 20s;  /* Firefox */
    -webkit-animation: notify-bg 20s;   /* Safari å’Œ Chrome */
    -o-animation: notify-bg 20s;    /* Opera */
    animation-iteration-count:infinite;
    animation-direction:alternate
  }

  @keyframes notify-bg{
    0%{background-color:#216cd0;}
    50%{background-color:#765fd7;}
    100%{background-color:#e66767;}
  }
  @keyframes notify-close-c{
    0%{color:#216cd0;}
    50%{color:#765fd7;}
    100%{color:#e66767;}
  }
  .accepr_box {
    margin-bottom: 130px;
  }
  .accept_to_chat {
    border-radius: 5px;
    box-shadow: 2px 2px 2px rgba(0,0,0,.3);
    background: -webkit-linear-gradient(right, #e06969 , #2780e3); /* Safari 5.1 - 6.0 */
    background: -o-linear-gradient(right, #e06969 , #2780e3); /* Opera 11.1 - 12.0 */
    background: -moz-linear-gradient(right, #e06969 , #2780e3); /* Firefox 3.6 - 15 */
    color: #fff;
    text-align: center;
    position: fixed;
    bottom: 150px;
    right: 0px;
    width: 150px;
    max-width: 90%;
    padding: 10px;
    margin-bottom: 20px;
    margin-right: 20px;
  }
  .fixed-top {
    position: relative;
    top: 0;
    right: 0;
    left: 0;
  }
  .notify-con p{
    display: inline;
  }
  @media (max-width:1200px) {
    .accept_to_chat{
      width:100px;
      padding:5px 5px;
      font-weight:100;
      font-size: 12px;
    }
  }
  @media (max-width:992px) {
    .accept_to_chat{
      margin-right: 0px;
      position: unset;
      padding:10px 15px;
      min-width: 100%;
      border-radius: 0px;
      background-color: #2780e3;
    }
  }
  @media(max-width:768px){
    .notify-content{
      display: block;
      line-height: 38px;
    }
    .notify-con >>> p{
      display:block;
      text-align: left;
      margin-bottom: 0px;
      margin-top: 25px;
    }
    .notify .notify-close{
      font-size: 16px;
      float: none;
    }
  }

  @media (max-width:430px) {
    .notify .notify-close{
      position: unset;
    }
  }

</style>
