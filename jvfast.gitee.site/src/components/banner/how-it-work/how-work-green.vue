<template>
  <!-- START WORK PROCESS -->
  <section id="how-work" class="process-content section-padding">
    <div class="container">
      <div class="row text-center">
        <div class="section-title text-center">
          <h1>How it works</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis dignissim. Aenean vitae metus in augue pretium ultrices. Duis dictum eget dolor vel blandit.</p>
        </div>
        <div
          v-for="item in data"
          :key="item.title"
          class="col-lg-4 col-sm-4 col-xs-12"
          data-aos="fade-up"
          data-aos-duration="1000"
          data-aos-delay="100"
          data-aos-offset="0"
        >
          <div class="single-process" :class="item.highlight? 'single-process-bg':null">
            <span :class="item.icon" class="fas" style="font-size: 60px;color: #35ac39" />
            <h4>{{ item.title }}</h4>
            <p>{{ item.desc }}</p>
          </div>
        </div><!--- END COL -->
      </div><!--- END ROW -->
    </div><!--- END CONTAINER -->
  </section>
  <!-- END WORK PROCESS -->
</template>

<script>
export default {
  name: 'HowWorkGreen',
  props: {
    title: {
      type: String,
      default: 'How it works'
    },
    desc: {
      type: String,
      default: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis dignissim. Aenean vitae metus in augue pretium ultrices. Duis dictum eget dolor vel blandit.'
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            icon: 'fa-award',
            title: 'planing',
            desc: ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis.'
          },
          {
            highlight: true,
            icon: 'fa-laptop-code',
            title: 'Reseraching',
            desc: ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis.'
          },
          {
            icon: 'fa-sync-alt',
            title: 'Visualizing',
            desc: ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis.'
          }
        ]
      }
    }
  }
}
</script>

<style scoped>
  @import url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800');
  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-family: 'Poppins', sans-serif;
    letter-spacing: 0px;
    margin: 0px;
    color: #252d35;
    font-weight: 400;
  }
  .process-content{
    background:#f5f8fa;
    padding-bottom:50px;
  }
  .single-process{
    background:#fff;
    padding: 60px;
    margin-bottom:30px;
    border-radius:3px;
    position:relative;
    z-index:2;
    transition: all 0.3s ease 0s;
  }
  @media only screen and (max-width:768px) {
    .single-process{padding: 30px;}
  }
  @media only screen and (max-width:480px) {
    .single-process{padding:40px;}
  }
  .single-process:hover{
    box-shadow:0px 60px 60px rgba(0,0,0,0.1);
    z-index:100;
    transform: translate(0, -10px);
  }
  .single-process-bg{background:#35ac39;}
  .single-process span {
    display: inline-block;
    font-size:60px;
    margin-bottom: 25px;
    text-align: center;
    color:#35ac39;
    -webkit-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
  }
  .single-process h4 {
    text-transform: capitalize;
    font-weight: 600;
    font-size: 22px;
    margin-bottom: 15px;
  }
  .single-process p{}
  .single-process-bg span{color:#fff !important;}
  .single-process-bg h4{color:#fff;}
  .single-process-bg p{color:#fff;}
  /** end  **/
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
</style>
