<template>
  <!--=== call to action ===-->
  <section class="call-to-action">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="call-to-action-wrap">
            <div class="call-to-action-title">
              <h3>立即体验JVFast快速开发框架</h3>
              <div class="call-btn-wrap text-center">
                <a href="https://gitee.com/jvfast/jvfast-vue" class="btn btn-primary main-btn">立即体验</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'CallToAction'
}
</script>

<style scoped>
  *,
  *::after,
  *::before {
    margin: 0;
    padding: 0;
    border-radius: 0;
    -webkit-box-sizing: inherit;
    box-sizing: inherit;
  }
  *{
    outline-color: transparent !important;
  }
  .container-fluid {
    width: 75% !important;
    padding-right: 15px !important;
    padding-left: 15px !important;
    margin-right: auto !important;
    margin-left: auto !important;
  }
  .main-btn:hover {
    border-color: #10b765;
    background-color: #10b765;
  }
  .main-btn {
    border: 3px solid #222;
    -webkit-box-shadow: none;
    box-shadow: none;
    text-transform: uppercase;
    font-weight: 600;
    letter-spacing: 1px;
    border-radius: 0;
    background-color: transparent;
    padding: 13px 32px;
    color: #222;
    font-size: 18px;
    min-width: 205px;
    text-align: center;
  }
  /*==================== call to action =====================*/
  .call-to-action {
    background-color: #E4ECF4;
    min-height: 150px;
    padding: 15px 0;
  }
  .call-to-action-title { position: relative; }
  .call-to-action-title h3 {
    color: #3d4853;
    font-size: 28px;
    display: inline-block;
    margin-top: 15px;
    margin-bottom: 15px;
    font-weight: 500;
    font-family: Raleway;
    max-width: 900px;
    line-height: 40px;
  }
  .call-to-action-title .call-btn-wrap  {
    display: inline-block;
    top: 50%;
    position: absolute;
    transform: translate(100%, -50%);
  }
  .call-to-action-title a.main-btn:hover {
    background-color: #fff;
    color: #666;
  }
  .call-to-action .call-to-action-title a.main-btn{
    background-color: #10B765;
    border: none;
    color: #fff;
    letter-spacing: .5px;
    font-size: 15px;
    font-weight: 500;
  }
  /* Large devices (desktops plus, less than 1695px) */
  @media (max-width: 1398px) {
    .container-fluid {
      width: 95%;
    }

    .call-btn-wrap.text-center {
      transform: none;
    }
  }
  /* Large devices (desktops, less than 1200px) */
  @media (max-width: 1199.98px) {
    .container-fluid {
      width: 95%;
    }

    .call-to-action-title .call-btn-wrap {
      top: 0;
      transform: none;
      margin-top: 10px;
    }
  }
  /* Medium devices (tablets, less than 992px) */
  @media (max-width: 991.98px) {

    .container-fluid {
      width: 95%;
    }
    .call-to-action-wrap {
      text-align: center;
    }
  }
  /* Small devices (landscape phones, less than 768px) */
  @media (max-width: 767.98px) {

    .container-fluid {
      width: 95%;
    }

    .call-to-action-title h3 {
      font-size: 24px;
    }
  }
  /* Extra small devices (portrait phones, less than 576px) */
  @media (max-width: 575.98px) {
    .container-fluid {
      width: 95%;
    }
    .call-to-action-title h3 {
      font-size: 18px;
      margin-top: 0;
    }
  }
</style>
