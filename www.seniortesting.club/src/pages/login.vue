<template>
  <div class="wrapper">
    <div class="page-container">
      <h1>评布客数据系统</h1>

      <form class="form" @submit.prevent>
        <input v-model="form.user" type="text" placeholder="Username">
        <input v-model="form.pass" type="password" placeholder="Password" @keydown.enter.prevent="handleLoginSubmit">
        <button class="login-button" @click.prevent="handleLoginSubmit">
          登录
        </button>
      </form>
      <!-- Remind Passowrd -->
      <div class="form-footer">
        <a class="underline-link" href="" @click.prevent="handleForgetPasswd">忘记密码?</a>
      </div>
    </div>

    <ul class="bg-bubbles">
      <li />
      <li />
      <li />
      <li />
      <li />
      <li />
      <li />
      <li />
      <li />
      <li />
    </ul>
  </div>
</template>

<script>
import login from '@/api/login'
import encrypt from '@/util/EncryptUtil'
export default {
  name: 'Login',
  data () {
    return {
      form: {
        user: '',
        pass: ''
      }
    }
  },
  watch: {
    $route: {
      immediate: true,
      handler (to, from) {
        if (this.$store.getters.loginUserInfo.id) {
          return this.$router.push({ name: 'console', query: { redirect: to.path } })
        }
      }
    }
  },
  methods: {
    handleLoginSubmit () {
      if (!this.form.user || !this.form.pass) {
        this.$swal({
          position: 'center',
          icon: 'warning',
          title: '登录错误提示',
          text: '请输入合法的用户名和密码!',
          timer: 3000,
          timerProgressBar: true,
          confirmButtonText: '好的'
        })
        return
      }
      const loginData = {
        username: this.form.user,
        passwd: encrypt.md5(this.form.pass)
      }
      login.loginByUseNameAndPassword(loginData).then((res) => {
        const resCode = res.code
        if (resCode === 0) {
          const userInfo = res.data
          this.handleLoginSuccess(userInfo)
        } else {
          const message = res.message
          this.$swal({
            position: 'top',
            icon: 'error',
            title: message,
            toast: true,
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: true,
            confirmButtonText: '好的'
          })
        }
      }).catch((err) => {
        console.log('login error', err)
        this.$swal({
          position: 'top',
          icon: 'error',
          title: err,
          toast: true,
          timer: 3000,
          timerProgressBar: true,
          showConfirmButton: true,
          confirmButtonText: '好的'
        })
      })
    },
    handleLoginSuccess (userInfo) {
      // 保存用户信息
      this.$store.dispatch('app/storeLoginUserInfo', userInfo).then((userInfo) => {
        this.$router.push({ name: 'mediahub' })
        // message
        this.$swal({
          position: 'top',
          icon: 'success',
          title: 'login success!',
          toast: true,
          timer: 3000,
          timerProgressBar: true,
          showConfirmButton: true,
          confirmButtonText: '好的'
        })
      })
    },
    handleForgetPasswd () {
      const message = '联系管理员寻求帮助: <a target="_blank" href="mailto:alterhu2020@gmail.com?subject=Forget Sorell Fruit Farm\'s login password for help">alterhu2020@gmail.com</a>'
      this.$swal({
        position: 'center',
        icon: 'warning',
        title: '忘记密码提示',
        html: message,
        timer: 3000,
        timerProgressBar: true,
        confirmButtonText: '好的'
      })
    }
  }
}
</script>

<style lang="scss" scoped>
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300);
$prim: #53e3a6;
*{
  box-sizing: border-box;
  margin: 0;
  padding: 0;

  font-weight: 300;
}
body{
  font-family:  'Source Sans Pro', sans-serif;
  color: white;
  font-weight: 300;

  ::-webkit-input-placeholder { /* WebKit browsers */
    font-family:  'Source Sans Pro', sans-serif;
    color:    white;
    font-weight: 300;
  }
  :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    font-family:  'Source Sans Pro', sans-serif;
    color:    white;
    opacity:  1;
    font-weight: 300;
  }
  ::-moz-placeholder { /* Mozilla Firefox 19+ */
    font-family:  'Source Sans Pro', sans-serif;
    color:    white;
    opacity:  1;
    font-weight: 300;
  }
  :-ms-input-placeholder { /* Internet Explorer 10+ */
    font-family:  'Source Sans Pro', sans-serif;
    color:    white;
    font-weight: 300;
  }
}
.wrapper{
  background: #50a3a2;
  background: -webkit-linear-gradient(top left, #50a3a2 0%, #53e3a6 100%);
  background: -moz-linear-gradient(top left, #50a3a2 0%, #53e3a6 100%);
  background: -o-linear-gradient(top left, #50a3a2 0%, #53e3a6 100%);
  background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%);

  position: absolute;
  left: 0;
  width: 100%;
  height: 100%;
  padding-top: 200px;
  overflow: hidden;

  &.form-success {
    .page-container{
      h1{
        transform: translateY(85px);
      }
    }
  }
}

.page-container {
  max-width: 600px;
  margin: 0 auto;
  padding: 80px 0;
  height: 80%;
  text-align: center;

  width: 90%;
  max-width: 550px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;

  h1{
    font-size: 30px;
    transition-duration: 1s;
    font-weight: 200;
  }
}

form{
  padding: 50px 0;
  position: relative;
  z-index: 2;

  input{
    display: block;
    appearance: none;
    outline: 0;
    width: 60%;
    background-color: #f6f6f6;
    border: 2px solid #f6f6f6;
    border-radius: 3px;
    padding: 10px 15px;
    margin: 0 auto 10px auto;
    display: block;
    text-align: center;
    font-size: 18px;

    color: #0d0d0d;

    transition-duration: 0.25s;
    font-weight: 300;

    &:hover{
      background-color: #fff;
      border-bottom: 2px solid #5fbae9;
    }

    &:focus{
      background-color: #fff;
      border-bottom: 2px solid #5fbae9;
      width: 80%;

      color: $prim;
    }
  }

  button{
    appearance: none;
    outline: 0;
    background-color: white;
    border: 0;
    padding: 10px 15px;
    color: $prim;
    border-radius: 3px;
    width: 80%;
    cursor: pointer;
    font-size: 18px;
    transition-duration: 0.25s;

    background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%);
    color: white;

    &:hover{
      background-color: rgb(245, 247, 249);
    }
  }
}

.bg-bubbles{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;

  z-index: 1;

  li{
    position: absolute;
    list-style: none;
    display: block;
    width: 40px;
    height: 40px;
    background-color: rgba(255, 255, 255, 0.15);
    bottom: -160px;

    -webkit-animation: square 25s infinite;
    animation:         square 25s infinite;

    -webkit-transition-timing-function: linear;
    transition-timing-function: linear;

    &:nth-child(1){
      left: 10%;
    }

    &:nth-child(2){
      left: 20%;

      width: 80px;
      height: 80px;

      animation-delay: 2s;
      animation-duration: 17s;
    }

    &:nth-child(3){
      left: 25%;
      animation-delay: 4s;
    }

    &:nth-child(4){
      left: 40%;
      width: 60px;
      height: 60px;

      animation-duration: 22s;

      background-color: rgba(255, 255, 255, 0.25);
    }

    &:nth-child(5){
      left: 70%;
    }

    &:nth-child(6){
      left: 80%;
      width: 120px;
      height: 120px;

      animation-delay: 3s;
      background-color: rgba(255, 255, 255, 0.2);
    }

    &:nth-child(7){
      left: 32%;
      width: 160px;
      height: 160px;

      animation-delay: 7s;
    }

    &:nth-child(8){
      left: 55%;
      width: 20px;
      height: 20px;

      animation-delay: 15s;
      animation-duration: 40s;
    }

    &:nth-child(9){
      left: 25%;
      width: 10px;
      height: 10px;

      animation-delay: 2s;
      animation-duration: 40s;
      background-color: rgba(255, 255, 255, 0.3);
    }

    &:nth-child(10){
      left: 90%;
      width: 160px;
      height: 160px;

      animation-delay: 11s;
    }
  }
}

@-webkit-keyframes square {
  0%   { transform: translateY(0); }
  100% { transform: translateY(-700px) rotate(600deg); }
}
@keyframes square {
  0%   { transform: translateY(0); }
  100% { transform: translateY(-700px) rotate(600deg); }
}
//footer
.form-footer {
  background-color: #f6f6f6;
  border-top: 1px solid #dce8f1;
  padding: 25px;
  text-align: center;
  -webkit-border-radius: 0 0 10px 10px;
  border-radius: 0 0 10px 10px;
  /**z-index error **/
  position: relative;
  z-index: 3;
  /* Simple CSS3 Fade-in Animation */
  .underline-link {
    text-decoration: none;
  }
  .underline-link:after {
    display: block;
    left: 0;
    bottom: -10px;
    width: 0;
    height: 2px;
    background-color: #56baed;
    content: "";
    transition: width 0.2s;
  }

  .underline-link:hover {
    color: #0d0d0d;
  }

  .underline-link:hover:after{
    width: 100%;
  }
}
*:focus {
  outline: none;
}
</style>
