<template>
  <!-- Important Features Start -->
  <section id="feature-important" class="important-features">
    <div class="container">
      <div v-for="(item,index) in data" :key="item.title" class="row mb-100">
        <template v-if="item.imageleft">
          <div class="col-lg-6 d-flex align-self-center" :class="[index===data.length-1? 'order-first order-lg-last': null]">
            <div class="image pr-30">
              <img :src="item.image" alt="">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="content">
              <div class="section-heading">
                <h2 class="title">
                  {{ item.title }}
                </h2>
                <p class="text">
                  {{ item.desc }}
                </p>
              </div>
              <ul class="feature-list">
                <li v-for="feature in item.list" :key="feature">
                  <p>
                    <i class="far fa-check-circle" /> {{ feature }}
                  </p>
                </li>
              </ul>
            </div>
          </div>
        </template>
        <template v-else>
          <div class="col-lg-6">
            <div class="content">
              <div class="section-heading">
                <h2 class="title">
                  {{ item.title }}
                </h2>
                <p class="text">
                  {{ item.desc }}
                </p>
              </div>
              <ul class="feature-list">
                <li v-for="feature in item.list" :key="feature">
                  <p>
                    <i class="far fa-check-circle" /> {{ feature }}
                  </p>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-6 d-flex align-self-center" :class="[index===data.length-1? 'order-first order-lg-last': null]">
            <div class="image pl-30">
              <img :src="item.image" alt="">
            </div>
          </div>
        </template>
      </div>
    </div>
  </section>
  <!-- Important Features End -->
</template>

<script>
export default {
  name: 'FeatureImportant',
  props: {
    data: {
      type: Array,
      default: () => {
        return [
          {
            image: require('@/assets/img/feature/feature-screen-714x443.png'),
            imageleft: true,
            title: 'A faster way to do just about anything',
            desc: 'Clarinet accustomed. Would legs of framework officers. We\'ve to morning like a contracting him, the the to said in need gradually wellfeigned.',
            list: [
              'A seo company to meet today’s standers',
              'Digital marketin solutions for tomorrow',
              'Much more than seo company',
              'Services minded - result driven'
            ]
          },
          {
            image: require('@/assets/img/feature/feature-screen2-714x443.png'),
            imageleft: false,
            title: 'The #1 tool for creating Stunning Marketing',
            desc: 'Clarinet accustomed. Would legs of framework officers. Weve to morning like a contracting him, the the to said in need gradually wellfeigned.',
            list: [
              'A seo company to meet today’s standers',
              'Digital marketin solutions for tomorrow',
              'Much more than seo company',
              'Services minded - result driven'
            ]
          }
        ]
      }
    }
  }
}
</script>

<style scoped>
  @import url("https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Rubik:300,400,500,700&display=swap");
  img {
    max-width: 100%; }
  ul {
    padding: 0;
    margin: 0; }
  ul li {
    list-style: none; }
  p {
    font-size: 16px;
    color: #555;
    line-height: 1.625;
    -webkit-hyphens: auto;
    -moz-hyphens: auto;
    -ms-hyphens: auto;
    hyphens: auto; }

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
  /* Important Features Start */
  .important-features .mb-100 {
    margin-bottom: 117px; }

  .important-features .content .section-heading {
    text-align: left;
    margin-bottom: 33px; }
  .important-features .content .section-heading .title {
    margin-bottom: 20px; }

  .important-features .content .feature-list li p {
    position: relative;
    padding-left: 30px; }
  .important-features .content .feature-list li p i {
    position: absolute;
    left: 0px;
    top: 3px;
    font-size: 20px;
    color: #5e00d9; }

  .important-features .content .feature-list li:last-child p {
    margin-bottom: 0px; }

  .important-features .image img {
    -webkit-box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.15);
    box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.15); }

  .important-features .image.pl-30 {
    padding-left: 30px; }

  .important-features .image.pr-30 {
    padding-right: 30px; }

  /* Important Features Start */
  @media (max-width: 991px) {
    .important-features .image.pr-30{
      padding-right: 0px;
    }
    .important-features .image.pl-30{
      padding-left: 0px;
    }
    .features {
      padding-bottom: 100px;
    }
    .important-features .content {
      margin-top: 40px;
    }
    .important-features .mb-100 {
      margin-bottom: 125px;
    }
  }
  @media (max-width: 575px) {
    .section-heading .title {
      font-size: 30px;
      line-height: 40px;
    }
  }
</style>
