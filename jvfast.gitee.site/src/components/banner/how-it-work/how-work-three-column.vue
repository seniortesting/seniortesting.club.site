<template>
  <!-- How It Work Start -->
  <section id="how-it-work" class="how-it-work">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="section-heading">
            <h2 class="title">
              {{ title }}
            </h2>
            <p class="text">
              {{ desc }}
            </p>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div v-for="item in data" :key="item.title" class="col-lg-4 col-md-6">
          <div class="single-how-it-work">
            <div class="icon">
              <i class="fas" :class="item.icon" />
            </div>
            <div class="content">
              <h4 class="title">
                {{ item.title }}
              </h4>
              <p>
                {{ item.desc }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- How It Work End -->
</template>

<script>
export default {
  name: 'HowWorkThreeColumn',
  props: {
    title: {
      type: String,
      default: 'How does it works'
    },
    desc: {
      type: String,
      default: 'We use the latest technologies and tools in order to create a better code that not only works great, but it is easy easy to work with too.'
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            icon: 'fa-address-card',
            title: 'Create Account',
            desc: ' Clarinet accustomed. Would legs of framework officers. We\'ve to morning like a contracting'
          },
          {
            icon: 'fa-bell',
            title: 'Make a Shedule',
            desc: ' Clarinet accustomed. Would legs of framework officers. We\'ve to morning like a contracting'
          },
          {
            icon: 'fa-bell',
            title: 'Get Notification',
            desc: ' Clarinet accustomed. Would legs of framework officers. We\'ve to morning like a contracting'
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
  /* How It Work Start */
  .how-it-work {
    padding: 96px 0px 130px; }
  .how-it-work .section-heading {
    margin-bottom: 56px; }

  .single-how-it-work {
    text-align: center;
    border: 1px solid rgba(0, 0, 0, 0.08);
    padding: 27px 30px 26px;
    -webkit-transition: all 0.3s ease-in;
    -o-transition: all 0.3s ease-in;
    transition: all 0.3s ease-in; }
  .single-how-it-work .icon {
    font-size: 70px;
    line-height: 70px;
    margin-bottom: 19px;
    font-weight: normal;
    background: -moz-linear-gradient(50deg, #6e00ff 0, #bb00ff 100%);
    background: -webkit-linear-gradient(50deg, #6e00ff 0, #bb00ff 100%);
    background: -ms-linear-gradient(50deg, #6e00ff 0, #bb00ff 100%);
    background: -o-linear-gradient(50deg, #6e00ff 0, #bb00ff 100%);
    background: -webkit-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);
    background: -o-linear-gradient(40deg, #6e00ff 0, #bb00ff 100%);
    background: linear-gradient(50deg, #6e00ff 0, #bb00ff 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent; }
  .single-how-it-work .title {
    font-size: 24px;
    line-height: 34px;
    font-weight: 500;
    margin-bottom: 15px; }
  .single-how-it-work p {
    margin-bottom: 0px; }
  .single-how-it-work:hover {
    -webkit-box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
    -webkit-transform: translateY(-5px);
    -ms-transform: translateY(-5px);
    transform: translateY(-5px); }

</style>
