<template>
  <!--Fun Facts Section-->
  <div class="fact-counter-section">
    <div class="fact-counter">
      <div class="auto-container">
        <div class="row clearfix" data-aos="fade-up" data-aos-duration="1300">
          <!--Column-->
          <div v-for="item in data" :key="item.title" class="column counter-column col-lg-3 col-md-6 col-sm-12">
            <div class="inner">
              <div class="count-outer count-box">
                <count-up class="count-text" :end-val="item.number" :options="{ useEasing: true, useGrouping: true,duration: 3, decimal: '.',decimalPlaces: item.decimalPlaces}" />{{ item.suffix }}
                <h4 class="counter-title">
                  {{ item.title }}
                </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End Fun Facts Section-->
</template>

<script>
export default {
  name: 'FactCounter',
  props: {
    data: {
      type: Array,
      default: () => {
        return [
          {
            title: 'Projects In Queue',
            number: 120,
            decimalPlaces: 0
          },
          {
            title: 'Registered Clients',
            number: 475,
            decimalPlaces: 0
          },
          {
            title: 'Web Analytics Done',
            number: 839,
            decimalPlaces: 0
          },
          {
            title: 'Rankings Achieved',
            number: 2.6,
            decimalPlaces: 1,
            suffix: 'K'
          }
        ]
      }
    }
  }
}
</script>

<style scoped>
  .fact-counter-section{
    position:relative;
    background-color:#f9fafb;
    padding:60px 0px 30px 0px;
  }

  .auto-container{
    position:static;
    max-width:1200px;
    padding:0px 15px;
    margin:0 auto;
  }
  h1,h2,h3,h4,h5,h6 {
    position:relative;
    font-weight:normal;
    margin:0px;
    background:none;
    line-height:1.6em;
    font-family: 'Poppins', sans-serif;
  }

  /*Fact Counter*/

  .fact-counter{
    position:relative;
  }

  .fact-counter .column{
    position:relative;
    z-index:5;
    margin-bottom:30px;
  }

  .fact-counter .column .inner{
    position:relative;
    text-align:center;
    padding:35px 0px;
    transition:all 500ms ease;
    -moz-transition:all 500ms ease;
    -webkit-transition:all 500ms ease;
    -ms-transition:all 500ms ease;
    -o-transition:all 500ms ease;
  }

  .fact-counter .column .inner:before{
    position:absolute;
    content: '';
    right: -30px;
    top: 0px;
    width: 1px;
    height: 100%;
    transition: all 900ms ease;
    -moz-transition: all 900ms ease;
    -webkit-transition: all 900ms ease;
    -ms-transition: all 900ms ease;
    -o-transition: all 900ms ease;
    background-color:#e4e5e5;
    -moz-transform: rotate(30deg);
    -webkit-transform:rotate(30deg);
    -ms-transform: rotate(30deg);
    -o-transform: rotate(30deg);
    transform:rotate(30deg);
  }

  .fact-counter .column:last-child .inner:before{
    display:none;
  }

  .fact-counter .counter-column:nth-child(2) .count-outer,
  .fact-counter .counter-column:nth-child(2) .count-outer .count-text{
    color:#08c8af;
  }

  .fact-counter .counter-column:nth-child(3) .count-outer,
  .fact-counter .counter-column:nth-child(3) .count-outer .count-text{
    color:#f96d49;
  }

  .fact-counter .counter-column:nth-child(4) .count-outer,
  .fact-counter .counter-column:nth-child(4) .count-outer .count-text{
    color:#8641f3;
  }

  .fact-counter .count-outer{
    position:relative;
    font-weight:600;
    color:#41acf3;
    font-size: 60px;
    font-family: 'Poppins', sans-serif;
  }

  .fact-counter .count-outer .count-text{
    position:relative;
    font-weight:600;
    color:#41acf3;
    font-size: 60px;
    font-family: 'Poppins', sans-serif;
  }

  .fact-counter .column .counter-title{
    position:relative;
    font-size:16px;
    font-weight:300;
    color:#777777;
    display:block;
    margin-top:25px;
    text-transform:capitalize;
  }

</style>
