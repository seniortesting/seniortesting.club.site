<template>
  <!-- Faq Start -->
  <section id="faq" class="faq white-bg-third clearfix" data-scroll-index="4">
    <div class="container">
      <div class="section-title text-center mb-45">
        <div class="row">
          <div class="col-centered col-sm-10 col-md-10">
            <h1 class="dark-gray-text" data-aos="fade-up" data-aos-duration="1000">
              {{ title }}
            </h1>
            <p data-aos="fade-up" data-aos-duration="1200" v-html="desc" />
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Col Start -->
        <div class="col-sm-6 col-md-6" data-aos="fade-up" data-aos-duration="1600" style="visibility: visible;animation-duration: 1.6s;animation-name: fadeInUp;">
          <div id="accordion" class="panel-group" role="tablist" aria-multiselectable="true">
            <div v-for="(item,index) in leftData" :key="item.title" class="panel panel-default">
              <div id="headingfive" class="panel-heading" role="tab">
                <h4 class="panel-title">
                  <a
                    :class="item.visible ? null : 'collapsed'"
                    :aria-expanded="item.visible ? 'true' : 'false'"
                    :aria-controls="'collapseleft'+index"
                    role="button"
                    @click.prevent="$set(item, 'visible', !item.visible)"
                  >
                    <i class="more-less fa waves-effect" :class="[item.visible? 'fa-minus': 'fa-plus']" />
                    {{ item.title }}
                  </a>
                </h4>
              </div>
              <b-collapse :id="'collapseleft'+index" :visible="item.visible" class="panel-collapse collapse in" role="tabpanel" :aria-labelledby="'headingleft'+index">
                <div class="panel-body" v-html="item.desc" />
              </b-collapse>
            </div>
          </div>
        </div>
        <!-- Col End -->
        <!-- Col Start -->
        <div class="col-sm-6 col-md-6" data-aos="fade-up" data-aos-duration="2000" style="visibility: visible;animation-duration: 1.6s;animation-name: fadeInUp;">
          <div id="accordion1" class="panel-group" role="tablist" aria-multiselectable="true">
            <div v-for="(item,index) in rightData" :key="item.title" class="panel panel-default">
              <div id="headingOne" class="panel-heading" role="tab">
                <h4 class="panel-title">
                  <a
                    :class="item.expand ? null : 'collapsed'"
                    :aria-expanded="item.expand ? 'true' : 'false'"
                    :aria-controls="'collapseright'+index"
                    role="button"
                    @click.prevent="$set(item, 'expand', !item.expand)"
                  >
                    <i class="more-less fa waves-effect" :class="[item.expand? 'fa-minus': 'fa-plus']" />
                    {{ item.title }}
                  </a>
                </h4>
              </div>
              <b-collapse
                :id="'collapseright'+index"
                :visible="item.expand"
                class="panel-collapse collapse"
                :class="item.expand? 'in':null"
                role="tabpanel"
                :aria-labelledby="'headingright'+index"
              >
                <div class="panel-body" v-html="item.desc" />
              </b-collapse>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Faq End -->
</template>

<script>
export default {
  name: 'Faq',
  props: {
    title: {
      type: String,
      default: 'Frequently Asked Questions'
    },
    desc: {
      type: String,
      default: 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected<br> humour,'
    },
    leftData: {
      type: Array,
      default: () => {
        return [
          {
            expand: true,
            title: ' Is SiteBuilder a CMS or a page builder?',
            desc: 'Both! SiteBuilder comes with an intuitive drag&drop page builder which allows you to put page and entire sites together swiftly. Combined with it\'s built-in publishing feature, SiteBuilder can also be used as a basic CMS where you edit your site through SiteBuilder and them publish them online.'
          },
          {
            title: ' Will you be adding more blocks?',
            desc: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'
          },
          {
            title: 'Are you available for customisation work?',
            desc: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'
          },
          {
            title: 'Can I see the documentation before I purchase?',
            desc: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'
          }
        ]
      }
    },
    rightData: {
      type: Array,
      default: () => {
        return [
          {
            visible: true,
            title: 'Can I add my own blocks?',
            desc: 'Both! SiteBuilder comes with an intuitive drag&drop page builder which allows you to put page and entire sites together swiftly. Combined with it\'s built-in publishing feature, SiteBuilder can also be used as a basic CMS where you edit your site through SiteBuilder and them publish them online.'
          },
          {
            title: 'I have run into issues, do you offer support?',
            desc: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'
          },
          {
            title: 'Is there a Pro version?',
            desc: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'
          },
          {
            title: 'Are assets such as images/stylesheets in the export?',
            desc: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'
          }
        ]
      }
    }
  },
  watch: {
  },
  mounted () {}
}
</script>

<style scoped>
  .mb-45 {
    margin-bottom:45px !important;
  }
  .white-bg-third {
    background:#f7f8fc;
  }
  .col-centered {
    float:none;
    margin:0 auto;
  }
  .dark-gray-text{
    color: #666666;
  }
  h2, h3, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1;
    color: inherit;
  }

  h1 {
    font-size: 36px;
  }
  h1 h4{
    font-family: 'Source Sans Pro', sans-serif !important;
    font-weight: 700;
    color: #333;
    margin: 0 0 15px;
  }
  .panel-group {
    margin-bottom: 20px;
  }
  .panel-group .panel + .panel {
    margin-top: 5px;
  }
  .panel-group .panel {
    margin-bottom: 0;
    border-radius: 4px;
  }
  .panel-title {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 16px;
    color: inherit;
  }
  /*----------- Link style------------*/
  a {
    color: #fff;
  }
  a,
  a > * {
    outline: none;
    cursor: pointer;
    text-decoration: none;
  }
  a:focus,
  a:hover {
    color: #e90052;
    outline: none;
    text-decoration: none;
  }
  .waves-effect {
    position: relative;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
    vertical-align: middle;
    z-index: 1;
    will-change: opacity, transform;
    transition: all .3s ease-out;
  }

  /* ================= Faq Area ==================== */

  .faq {
    padding:150px 0 130px;
    overflow:hidden;
    color: #666;
  }

  .more-less {
    background:#66ccff;
    height:25px;
    width:25px;
    border-radius:50%;
    -webkit-border-radius:50%;
    -ms-border-radius:50%;
    color:#fff;
    position:absolute;
    right:15px;
    top:50%;
    transform:translate(0,-50%);
    -webkit-transform:translate(0,-50%);
    -moz-transform:translate(0,-50%);
    -ms-transform:translate(0,-50%);
    -o-transform:translate(0,-50%);
  }

  .more-less::before {
    position:absolute;
    top:52%;
    left:52%;
    transform:translate(-50%,-50%);
    -webkit-transform:translate(-50%,-50%);
    -ms-transform:translate(-50%,-50%);
  }

  .panel-default > .panel-heading {
    background:#fff;
    padding:20px 45px 16px 25px;
    border:none;
    border-radius:0;
    position:relative;
  }

  .panel-group .panel {
    border:none;
    margin-bottom:20px;
    background:none;
    box-shadow:none;
  }

  .panel-heading a {
    display:block;
    font-size:18px;
    line-height:18px;
    font-family: 'Source Sans Pro', sans-serif;
    font-weight:700;
    color:#666;
  }

  .panel-body {
    padding:28px 25px 22px 25px;
    font-size:16px;
    line-height:26px;
    border-top-color:#fff !important;
  }

  .panel-title [aria-expanded="true"] {
    color:#66ccff;
  }

</style>
