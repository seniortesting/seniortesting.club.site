<template>
  <!-- START CONTACT -->
  <section id="contact" class="contact_us section-padding" style="background-size:cover; background-position: center center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 section-title text-center">
          <h1 class="section-title-white">
            {{ title }}
          </h1>
          <p class="section-title-white">
            {{ desc }}
          </p>
        </div>
        <div class="text-center col-xs-12 col-lg-8 offset-lg-2" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100" data-aos-offset="0">
          <div class="contact">
            <form id="contact-form" ref="contactFrm" @submit.prevent="contactHandle">
              <div class="row">
                <div class="form-group col-md-6">
                  <input
                    v-model="form.name"
                    type="text"
                    class="form-control"
                    :class="[hasNameError?'has-error':null]"
                    placeholder="您的联系姓名"
                  >
                </div>
                <div class="form-group col-md-6">
                  <input v-model="form.email" :class="[hasEmailError?'has-error':null]" type="text" class="form-control" placeholder="您的邮箱">
                </div>
                <div class="form-group col-md-12">
                  <input v-model="form.subject" :class="[hasSubjectError?'has-error':null]" type="text" class="form-control" placeholder="描述一下需要反馈的大致情况">
                </div>
                <div class="form-group col-md-12">
                  <textarea v-model="form.content" :class="[hasContentError?'has-error':null]" rows="6" class="form-control" placeholder="这里填写需要反馈的内容详情" />
                </div>
                <div v-show="hasError" class="form-group col-md-12 p-left">
                  <span>{{ errors }}</span>
                </div>
                <div class="col-md-12 text-center">
                  <button
                    id="submitButton"
                    type="submit"
                    value="Send message"
                    name="submit"
                    class="btn btn-md btn-contact-bg"
                    title="Submit Your Message!"
                  >
                    提交
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div><!-- END COL  -->
      </div><!-- END ROW -->
    </div><!-- END CONTAINER -->
  </section>
  <!-- END CONTACT -->
</template>

<script>
import Validator from 'async-validator'
export default {
  name: 'GetInTouch',
  props: {
    title: {
      type: String,
      default: 'Get in touch'
    },
    desc: {
      type: String,
      default: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis dignissim. Aenean vitae metus in augue pretium ultrices. Duis dictum eget dolor vel blandit.'
    }
  },
  data () {
    return {
      form: {
        name: '',
        email: '',
        subject: '',
        content: ''
      },
      hasError: false,
      hasNameError: false,
      hasEmailError: false,
      hasSubjectError: false,
      hasContentError: false,
      errors: ''
    }
  },
  methods: {
    contactHandle () {
      const self = this
      // 重置错误
      this.hasError = false
      this.hasNameError = false
      this.hasEmailError = false
      this.hasSubjectError = false
      this.hasContentError = false
      // 验证策略
      const descriptor = {
        name: {
          type: 'string',
          required: true,
          validator: (rule, value) => value.length > 3,
          message: '输入联系姓名格式错误，至少三个字符'
        },
        email: {
          type: 'email',
          required: true,
          message: '邮箱格式不正确'
        },
        subject: {
          type: 'string',
          required: true,
          range: { min: 3 },
          message: '反馈的大致情况不能为空，至少三个字符'
        },
        content: {
          type: 'string',
          required: false
        }
      }
      const validator = new Validator(descriptor)
      validator.validate(this.form, {
        suppressWarning: false,
        first: true
      }, (errors, fields) => {
        if (errors) {
          // validation failed, errors is an array of all errors
          // fields is an object keyed by field name with an array of
          // errors per field
          self.hasError = true
          if (fields.name) {
            self.hasNameError = true
          }
          if (fields.email) {
            self.hasEmailError = true
          }
          if (fields.subject) {
            self.hasSubjectError = true
          }
          if (fields.content) {
            self.hasContentError = true
          }
          self.errors = errors[0].message
          return
        }
        this.$emit('submit', this.form)
      })
    }
  }

}
</script>

<style scoped>
  /*@import url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800');*/
  p {
    margin: 0;
    padding: 0;
  }
  .p-left {
    text-align: left !important;
    padding-left: 20px !important;
    color: #ac0505;
  }
  .section-padding {padding: 80px 0;}
  .section-title{margin-bottom:60px;}
  .section-title h1 {
    font-size: 46px;
    font-weight: 500;
    line-height: 55px;
    margin-top: 0;
    position: relative;
    text-transform: capitalize;
    margin-bottom: 15px;
  }
  @media only screen and (max-width:480px) {
    .section-title  h1  {
      font-size:24px;
      line-height: 32px;
      font-weight: 700;
    }
  }
  h1.section-title-white{color:#fff;}
  h4.section-title-white{color:#fff;}
  .section-title p {
    padding: 0 10px;
    width: 80%;
    margin: auto;
    letter-spacing: 1px;
  }
  p.section-title-white{color:#fff;}
  @media only screen and (max-width:768px) {
    .section-title  p{
      padding: 0 10px;
      width: 90%;
      margin: auto;
    }
  }

  .contact_us {
    position: relative;
    background-image: url(~assets/img/contact/contact-bg.jpg);
  }
  .contact_us:before {
    background: rgba(0,0,0,0.5);
    content: "";
    height: 100%;
    left: 0;
    opacity: 0.8;
    position: absolute;
    top: 0;
    width: 100%;
  }
  .contact {
    padding: 60px;
    border: 5px solid #35ac39;
    border-radius: 5px;
    background: #fff;
  }
  .contact input {
    background:none repeat scroll 0 0;
    border: 1px solid #eee;
    border-radius: 30px;
    box-shadow: none;
    color: #333;
    font-size: 16px;
    font-weight: 400;
    height: 50px;
    padding: 10px 10px 10px 30px;
    width: 100%;
  }
  .contact textarea {
    background:none repeat scroll 0 0;
    border: 1px solid #eee;
    border-radius: 30px;
    box-shadow: none;
    color: #333;
    padding: 10px;
    width: 100%;
    font-size:16px;
    padding-left: 30px;
    font-weight: 400;
  }
  .contact input:focus {
    border: 1px solid #35ac39 ;
    box-shadow: none;
    outline: 0 none;
  }
  .contact textarea:focus {
    border: 1px solid #35ac39 ;
    box-shadow: none;
    outline: 0 none;
  }
  .has-error {
    border: 1px solid #ac0505 !important;
    box-shadow: none !important;
    outline: 0 none !important;
  }
  .btn-contact-bg {
    background: #35ac39 none repeat scroll 0 0;
    border-radius: 30px;
    color: #fff;
    display: inline-block;
    font-size: 16px;
    letter-spacing: 0.5px;
    outline: medium none;
    padding: 8px 27px;
    text-transform: capitalize;
    transition: all 0.2s ease 0s;
    cursor: pointer;
  }
  .btn-contact-bg:hover,
  .btn-contact-bg:focus {
    background: #35ac39;
    color: #fff;
  }
</style>
