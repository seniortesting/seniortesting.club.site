<template>
  <!-- Pricing  Area Start -->
  <section id="price" class="pricing">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="section-heading">
            <h2 class="title">
              {{ title }}
            </h2>
            <p class="text" v-html="desc" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="table-responsive-lg w-lg-75 mx-lg-auto pricing-table">
            <table class="table table-striped table-borderless">
              <thead class="text-center">
                <tr>
                  <th scope="col" class="w-40 text-left py-3 px-4">
                    功能特性
                  </th>
                  <th scope="col" class="w-20">
                    {{ data.price.free.name }}
                    <small class="d-block">{{ data.price.free.price }}</small>
                  </th>
                  <th scope="col" class="w-20 border-left border-right">
                    {{ data.price.standard.name }}
                    <span class="badge badge-warning  badge-pill ml-1">Hot</span>
                    <small class="d-block text-center text-secondary">{{ data.price.standard.price }}</small>
                  </th>
                  <th scope="col" class="w-20 border-left">
                    {{ data.price.premium.name }}
                    <span class="badge badge-warning badge-pill ml-1">Plus</span>
                    <small class="d-block text-secondary">{{ data.price.premium.price }}</small>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="item in data.features" :key="item.name">
                  <th scope="row" class="font-weight-normal py-3 px-2" v-html="item.name" />
                  <td class="text-center p-3">
                    <small v-if="item.free" class="fas fa-check" />
                  </td>
                  <td class="text-center border-left border-right p-3">
                    <small v-if="item.standard" class="fas fa-check" />
                  </td>
                  <td class="text-center p-3">
                    <small v-if="item.premium" class="fas fa-check" />
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th />
                  <td class="text-center p-3">
                    <button disabled type="button" class="base-btn1">
                      开源免费
                    </button>
                  </td>
                  <td class="text-center border-left border-right p-3">
                    <button id="chat1" type="button" class="base-btn1">
                      立即沟通
                    </button>
                  </td>
                  <td class="text-center p-3">
                    <button id="chat2" type="button" class="base-btn1">
                      立即沟通
                    </button>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
      <b-popover
        target="chat1"
        triggers="focus hover"
        placement="topleft"
      >
        <template v-slot:title>
          <h5 style="text-align: center">
            发送邮件获取授权
          </h5>
        </template>
        <template v-slot:default>
          <span class="pop-content">邮箱地址: <b>alterhu2020@gmail.com</b></span>
        </template>
      </b-popover>
      <b-popover
        target="chat2"
        triggers="focus hover"
        placement="topleft"
      >
        <template v-slot:title>
          <h5 style="text-align: center">
            发送邮件获取授权
          </h5>
        </template>
        <template v-slot:default>
          <span class="pop-content">邮箱地址: <b>alterhu2020@gmail.com</b></span>
        </template>
      </b-popover>
    </div>
  </section>
  <!-- Pricing Area End -->
</template>

<script>
export default {
  name: 'PriceTable',
  props: {
    title: {
      type: String,
      default: 'Affordable Pricing Plan'
    },
    desc: {
      type: String,
      default: 'We use the latest technologies and tools in order to create a better code that not only works great, but it is easy easy to work with too.'
    },
    data: {
      type: Object,
      default: () => {
        return {
          price: {
            free: {
              name: 'Free',
              price: '$0/mon'
            },
            standard: {
              name: 'Standard',
              price: '$60/mon'
            },
            premium: {
              name: 'Premium',
              price: '$60/mon'
            }
          },
          features: [
            {
              name: 'Shared channels',
              free: false,
              standard: true,
              premium: true
            },
            {
              name: 'Searchable messages',
              free: true,
              standard: true,
              premium: true
            },
            {
              name: 'File storage',
              free: false,
              standard: false,
              premium: true
            },
            {
              name: 'Single-channel guests',
              free: true,
              standard: true,
              premium: true
            },
            {
              name: 'Multi-channel guests',
              free: false,
              standard: true,
              premium: true
            },
            {
              name: 'Two-factor authentications',
              free: true,
              standard: true,
              premium: true
            },
            {
              name: 'OAuth with Google',
              free: false,
              standard: false,
              premium: true
            },
            {
              name: 'Data residencys',
              free: false,
              standard: true,
              premium: true
            },
            {
              name: 'Voice and video calls',
              free: true,
              standard: true,
              premium: true
            },
            {
              name: 'Screen sharing',
              free: false,
              standard: false,
              premium: true
            }
          ]
        }
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
  .base-btn1 {
    outline: none;
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
  /* Pricing Area Start */
  .pricing {
    padding: 121px 0px 115px; }
  .pricing .section-heading {
    margin-bottom: 55px; }
  .pricing .section-heading .title {
    margin-bottom: 20px; }
  .pricing .pricing-table thead tr th {
    font-weight: 500 !important;
    font-family: "Rubik", sans-serif;
    font-size: 18px;
    line-height: 28px;
    vertical-align: top; }
  .pricing .pricing-table thead tr th span {
    font-weight: 500 !important; }
  .pricing .pricing-table tbody small {
    color: #5e00d9;
    font-size: 14px; }
  .pricing .pricing-table tfoot tr td .base-btn1 {
    padding: 10px 10px;
    font-size: 14px;
    min-width: 130px; }
   .font-weight-normal {
     font-weight: 400!important;
     font-family:Poppins, sans-serif;
     font-size:16px;
   }
  /* Pricing Area End */
  .pop-content {
    font-size: 14px;
  }
</style>
