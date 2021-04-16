<template>
  <section id="feature" class="our_feature">
    <div class="container">
      <div class="row">
        <div class="section-title text-center">
          <h1>{{ title }}</h1>
          <p>{{ desc }}</p>
        </div>
        <div
          v-for="item in data"
          :key="item.title"
          class="col-lg-4 col-sm-6 col-xs-12"
          data-aos="fade-up"
          data-aos-duration="1000"
          data-aos-delay="100"
          data-aos-offset="0"
          style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;"
        >
          <div class="single_feature">
            <div class="feature_icon">
              <i :class="item.icon" />
            </div>
            <h4>{{ item.title }}</h4>
            <p>{{ item.desc }}</p>
          </div>
        </div><!--- END COL -->
      </div><!--- END ROW -->
    </div><!--- END CONTAINER -->
  </section>
</template>

<script>
export default {
  name: 'FeaturesGrid',
  props: {
    title: {
      type: String,
      default: 'Amazing Features'
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
            icon: 'ti-desktop',
            title: 'Fully Responsive',
            desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.'
          },
          {
            icon: 'ti-book',
            title: 'Latest Bootstrap',
            desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.'
          },
          {
            icon: 'ti-support',
            title: 'Dedicated Support',
            desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.'
          },
          {
            icon: 'ti-heart',
            title: 'Love Customer',
            desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.'
          },
          {
            icon: 'ti-bar-chart',
            title: 'Mordern Design',
            desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.'
          },
          {
            icon: 'ti-html5',
            title: 'Html5/Css3',
            desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.'
          }
        ]
      }
    }
  }
}
</script>

<style scoped>
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
  .section-title p {
    padding: 0 10px;
    width: 80%;
    margin: auto;
    letter-spacing: 1px;
  }
  @media only screen and (max-width:480px) {
    .section-title  h1  {
      font-size:24px;
      line-height: 32px;
      font-weight: 700;
    }
  }
  .our_feature{
    padding-top: 80px;
    padding-bottom: 20px;
  }
  .single_feature {
    margin-bottom:30px;
  }
  .feature_icon{
    border: 1px solid #eee;
    border-radius: 500px;
    display: inline-block;
    float: left;
    height: 110px;
    margin-bottom: 30px;
    margin-right: 18px;
    position: relative;
    width: 110px;
  }
  .single_feature i {
    background: #35ac39 none repeat scroll 0 0;
    border: 1px dashed #e8e8e9;
    border-radius: 500px;
    color: #fff;
    font-size: 30px;
    height: 80px;
    left: 50%;
    line-height: 80px;
    text-align:center;
    margin: auto;
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 80px;
    transition: all 0.2s ease 0s;
  }
  .single_feature:hover i {
    background: #35ac39 none repeat scroll 0 0;
    border: 1px dashed #35ac39;
  }
  .single_feature h4 {
    font-size:20px;
    font-weight: 700;
    margin-bottom: 15px;
    overflow: hidden;
    padding-top: 15px;
    text-transform: capitalize;
  }
  .single_feature p {
    overflow: hidden;
  }
</style>
