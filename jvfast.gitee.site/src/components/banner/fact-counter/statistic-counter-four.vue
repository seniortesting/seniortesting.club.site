<template>
  <!-- statistics strat -->
  <section id="statistics" class="statistics">
    <div class="container">
      <div class="statistics-counter">
        <div v-for="item in data" :key="item.title" class="col-md-3 col-sm-6">
          <div class="single-ststistics-box">
            <div class="statistics-content">
              <div class="counter">
                <count-up class="count-text" :end-val="item.number" :options="{ useEasing: true, useGrouping: true,duration: 3, decimal: '.',decimalPlaces: item.decimalPlaces}" />{{ item.suffix }}
              </div>
            </div><!--/.statistics-content-->
            <h3>{{ item.title }}</h3>
          </div><!--/.single-ststistics-box-->
        </div><!--/.col-->
      </div><!--/.statistics-counter-->
    </div><!--/.container-->
  </section><!--/.counter-->
  <!-- statistics end -->
</template>

<script>
export default {
  name: 'StatisticCounter',
  props: {
    data: {
      type: Array,
      default: () => {
        return [
          {
            title: 'Listings',
            number: 12.3,
            decimalPlaces: 1,
            suffix: 'K+'
          },
          {
            title: 'Listing Categories',
            number: 47.5,
            decimalPlaces: 1,
            suffix: 'K+'
          },
          {
            title: 'Visitors',
            number: 83.9,
            decimalPlaces: 1,
            suffix: 'K+'
          },
          {
            title: 'Happy Clients',
            number: 2.6,
            decimalPlaces: 1,
            suffix: 'K+'
          }
        ]
      }
    }
  }
}
</script>

<style scoped>
  h1,h2,h3,h4,h5,h6 {
    margin: 0;
    color:#343a3f;
    font-size: 18px;
    font-weight: 500;
    text-transform: capitalize;
  }
  .statistics{
    position:relative;
    display: flex;
    align-items: center;
    background:url(~assets/img/bg/counter-bg.jpg)no-repeat fixed;
    background-position:center;
    background-size:cover;
    padding:127px 0 120px;
  }
  .statistics:before{
    position:absolute;
    content:'';
    background: rgba(75,75,75,.60);
    height:100%;
    width:100%;
    top:0;
    left:0;
  }
  /* single-ststistics-box */
  .single-ststistics-box {
    text-align: center;
    margin-bottom:30px;

  }
  /* single-ststistics-box */
  .statistics-content{
    display: flex;
    justify-content: center;
    color:#fff;
    font-size:60px;
  }
  .statistics-content span {
    margin-left: 5px;
  }
  .single-ststistics-box h3{
    color:#fff;
    font-size:24px;
    text-transform:capitalize;
    font-weight: 500;
  }
  @media screen and (max-width:1199px){
    .statistics-content {font-size: 40px;}
    .single-ststistics-box h3 {font-size: 18px;}
  }
  @media (min-width: 992px) {
    .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9 {
      float: left
    }
  }
  @media screen and (max-width:767px){
    .statistics{padding:60px 0;}
  }
</style>
