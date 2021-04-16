<template>
  <!-- Faq Area Start -->
  <section id="faq" class="faq-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex align-self-center">
          <div class="section-heading">
            <h2 class="title" v-html="title" />
            <p class="text">
              {{ desc }}
            </p>
            <a :href="button.url" class="base-btn1">
              {{ button.desc }}
            </a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="content">
            <div id="tour-faq" class="accordion">
              <div v-for="(item,index) in data" :key="item.title" class="single-accordion">
                <div class="accordion-header">
                  <h4
                    class="title"
                    :class="item.expand ? null : 'collapsed'"
                    :aria-expanded="item.expand ? 'true' : 'false'"
                    :aria-controls="'collapse'+index"
                    role="button"
                    @click.prevent="$set(item, 'expand', !item.expand)"
                  >
                    <i class="fas" :class="item.icon" /> {{ item.title }}
                  </h4>
                </div>

                <b-collapse
                  :id="'collapseright'+index"
                  :visible="item.expand"
                  class="collapse"
                  :class="item.expand? 'show': null"
                  role="tabpanel"
                  data-parent="#tour-faq"
                >
                  <div class="accordion-body" v-html="item.desc" />
                </b-collapse>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Faq Area End -->
</template>

<script>
export default {
  name: 'FaqLeftRight',
  props: {
    title: {
      type: String,
      default: 'Frequently Asked <br/>Qestions'
    },
    desc: {
      type: String,
      default: 'We use the latest technologies and tools in order to create a better code that not only works great, but it is easy easy to work with too.'
    },
    button: {
      type: Object,
      default: () => {
        return {
          desc: 'Ask Anything',
          url: '#'
        }
      }
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            expand: true,
            icon: 'fa-file-pdf',
            title: 'Which license do I need?',
            desc: 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor'
          },
          {
            icon: 'fa-unlock-alt',
            title: 'How do I get access to a App ?',
            desc: 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor'
          },
          {
            icon: 'fa-credit-card',
            title: 'How do I see previous orders?',
            desc: 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor'
          },
          {
            icon: 'fa-money-bill-wave',
            title: 'it is refundable?',
            desc: 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor'
          }
        ]
      }
    }
  }
}
</script>

<style scoped>
  @import url("https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Rubik:300,400,500,700&display=swap");
  h1 {
    font-size: 60px;
    line-height: 1.0833333333333333; }

  h2 {
    font-size: 52px;
    line-height: 1.4444444444444444; }

  h3 {
    font-size: 26px;
    line-height: 1.0833333333333333; }

  h4 {
    font-size: 22px;
    line-height: 1.2380952380952381; }

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    color: #131333;
    font-family: "Rubik", sans-serif; }
  p {
    font-size: 16px;
    color: #555;
    line-height: 1.625;
    -webkit-hyphens: auto;
    -moz-hyphens: auto;
    -ms-hyphens: auto;
    hyphens: auto; }

  a {
    color: #131333;
    text-decoration: none; }

  a,
  a:hover,
  a:focus,
  a:active {
    text-decoration: none;
    outline: none; }
  .base-btn1 {
    font-size: 16px;
    font-weight: 500;
    padding: 12px 35px;
    display: inline-block;
    color: #fff;
    border-radius: 50px;
    cursor: pointer;
    -webkit-transition: all 0.3s ease-in;
    -o-transition: all 0.3s ease-in;
    transition: all 0.3s ease-in;
    background: #5e00d9;
    border: 1px solid #5e00d9; }
  .base-btn1:hover {
    color: #5e00d9;
    background: #fff; }
   /*section部分*/
  .section-heading {
    text-align: center;
    margin-bottom: 50px; }
  .section-heading .title {
    font-size: 40px;
    line-height: 50px;
    font-weight: 500;
    color: #131333;
    margin-bottom: 12px; }
  .section-heading .title.extra-padding {
    margin-bottom: 20px; }
  .section-heading .text {
    font-size: 16px;
    line-height: 26px; }

  /* Faq Area Start */
  .faq-area {
    padding: 130px 0px 130px;
    background: #F7F8FC; }
  .faq-area .section-heading {
    text-align: left;
    margin-bottom: 36px; }
  .faq-area .section-heading .title {
    margin-bottom: 14px; }
  .faq-area .section-heading .base-btn1 {
    margin-top: 40px; }

  .single-accordion {
    -webkit-box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.04);
    box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.04);
    margin-bottom: 30px;
    background: #fff; }
  .single-accordion:last-child {
    margin-bottom: 0px; }
  .single-accordion .accordion-header {
    background: #ffffff;
    border: 1px solid rgba(0, 0, 0, 0.05);
    padding: 15px 20px; }
  .single-accordion .accordion-header .title {
    font-size: 18px;
    line-height: 28px;
    font-weight: 500;
    display: block;
    width: 100%;
    padding: 0px;
    margin: 0px;
    cursor: pointer;
    position: relative;
    padding-left: 34px; }
  .single-accordion .accordion-header .title i {
    position: absolute;
    left: 0;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%); }
  .single-accordion .accordion-body {
    font-size: 16px;
    line-height: 26px;
    padding: 18px 25px 19px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    border-left: 1px solid rgba(0, 0, 0, 0.05);
    border-right: 1px solid rgba(0, 0, 0, 0.05); }

</style>
