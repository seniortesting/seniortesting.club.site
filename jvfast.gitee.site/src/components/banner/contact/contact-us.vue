<template>
  <section class="contact-form ptb-100">
    <div class="container text-center">
      <h2 v-html="desc" />

      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <form @submit.prevent="contactHandle">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group user-name">
                  <label for="nameFive-first" class="sr-only">Name</label>
                  <input
                    id="nameFive-first"
                    v-model="form.name"
                    type="text"
                    class="form-control"
                    placeholder="First Name"
                  >
                </div>

                <div class="form-group user-email">
                  <label for="emailFive" class="sr-only">Email</label>
                  <input
                    id="emailFive"
                    v-model="form.email"
                    type="email"
                    class="form-control"
                    placeholder="Email Address"
                  >
                </div>

                <div class="form-group user-phone">
                  <label for="websiteOne" class="sr-only">Subject</label>
                  <input
                    id="websiteOne"
                    v-model="form.subject"
                    type="text"
                    class="form-control"
                    placeholder="Subject"
                  >
                </div>
              </div><!-- /.col-md-6 -->
              <div class="col-md-6">
                <div class="form-group user-message">
                  <label for="messageOne" class="sr-only">Message</label>
                  <textarea id="messageOne" v-model="form.content" class="form-control" placeholder="Write Message" />
                </div>
              </div><!-- /.col-md-6 -->
            </div><!-- /.row-->
            <button type="submit" class="btn btn-primary">
              Send Message
            </button>
          </form>
        </div><!-- /.col-md-8 -->
      </div>
    </div>
  </section>
  <!-- .contact-form-->
</template>

<script>
export default {
  name: 'ContactUs',
  props: {
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
      }
    }
  },
  methods: {
    contactHandle () {
      this.$emit('submit', this.form)
    }
  }
}
</script>

<style scoped>
  .ptb-100 {
    padding-top    : 100px;
    padding-bottom : 100px;
  }
  .p-left {
    padding-left: 10px !important;
  }
  h2 {
    font-size   : 24px;
    line-height : 24px;
  }
  @media (min-width: 992px){
    .col-md-offset-2 {
      margin-left: 16.66666667%;
    }
    .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9 {
      float: left;
    }
  }
  .btn {
    padding        : 10px 30px;
    margin-bottom  : 0;
    font-size      : 13px;
    border-radius  : 0;
    text-transform : uppercase;
  }

  /*btn-primary*/
  .btn-primary {
    background-color : #31aae2;
    border-color     : #31aae2;
  }

  .btn-primary.active,
  .btn-primary.focus,
  .btn-primary:active,
  .btn-primary:focus,
  .btn-primary:hover,
  .open > .dropdown-toggle.btn-primary {
    background-color : #2281ad;
    border-color     : #2281ad;
  }
  .form-group {
    margin-bottom: 20px;
  }
  .form-control {
    height: 53px;
    padding: 6px 20px 6px 30px;
    font-size: 13px;
    line-height: 24px;
    color: #969595;
    border: 2px solid #F1F1F1;
    border-radius: 0;
    box-shadow: none;
  }
  .form-control:focus {
    border: 2px solid #31aae2 !important;
    box-shadow: none;
  }

  /*---------------
   Contact Form
   -----------------*/

  .contact-form  {}
  .contact-form  h2{
    line-height: 36px;
    margin-bottom: 45px;
  }

  .user-message textarea {
    min-height: 195px;
    padding-top: 12px;
  }
  .contact-form form button {
    margin-top: 10px;
  }

  .user-name,
  .user-email,
  .user-phone,
  .user-url,
  .user-message{
    position: relative;
  }
  .user-name::after,
  .user-email::after,
  .user-phone::after,
  .user-url::after,
  .user-message::after {
    position: absolute;
    left: 15px;
    top: 15px;
    font-family: "Font Awesome 5 Free";
    color: #dadada;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    /*line-height: 1*/
  }

  .user-name::after {
    content: "\f007";
  }
  .user-email::after {
    content: "\f834";
  }
  .user-phone::after {
    content: "\f63f";
  }
  .user-message::after {
    content: "\f086";
  }

</style>
