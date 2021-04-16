<template>
  <section id="why-us" class="wow fadeIn">
    <div class="container">
      <header class="section-header">
        <h3>Why choose us?</h3>
        <p>Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus.</p>
      </header>

      <div class="row row-eq-height justify-content-center">
        <div v-for="item in data" :key="item.title" class="col-lg-4 mb-4">
          <div class="card" data-aos="fade-up" data-aos-duration="1000">
            <i class="fa" :class="item.icon" />
            <div class="card-body">
              <h5 class="card-title">
                {{ item.title }}
              </h5>
              <p class="card-text">
                {{ item.desc }}
              </p>
              <a :href="item.url" class="readmore">Read more </a>
            </div>
          </div>
        </div>
      </div>

      <div class="row counters">
        <div v-for="(d,index) in counters" :key="d.title" class="col-lg-3 col-6 text-center" data-aos="fade-up" :data-aos-delay="1000+index*200">
          <count-up class="counter-up" :end-val="d.number" :options="{ useEasing: true, useGrouping: true,duration: 3, decimal: '.',separator: ',', decimalPlaces: 0}" />
          <p>{{ d.title }}</p>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'ServiceWhyChooseUs',
  props: {
    title: {
      type: String,
      default: 'Why choose us?'
    },
    desc: {
      type: String,
      default: 'Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus.'
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            icon: 'fa-dharmachakra',
            title: 'Corporis dolorem',
            desc: 'Deleniti optio et nisi dolorem debitis. Aliquam nobis est temporibus sunt ab inventore officiis aut voluptatibus.',
            url: ''
          },
          {
            icon: 'fa-language',
            title: 'Voluptates dolores',
            desc: 'Deleniti optio et nisi dolorem debitis. Aliquam nobis est temporibus sunt ab inventore officiis aut voluptatibus.',
            url: ''
          },
          {
            icon: 'fa-object-group',
            title: 'Eum ut aspernatur',
            desc: 'Deleniti optio et nisi dolorem debitis. Aliquam nobis est temporibus sunt ab inventore officiis aut voluptatibus.',
            url: ''
          }
        ]
      }
    },
    counters: {
      type: Array,
      default: () => {
        return [
          {
            title: 'Projects In Queue',
            number: 274,
            decimalPlaces: 0
          },
          {
            title: 'Registered Clients',
            number: 421,
            decimalPlaces: 0
          },
          {
            title: 'Hours Of Support',
            number: 1364,
            decimalPlaces: 0
          },
          {
            title: 'Hard Workers',
            number: 18,
            decimalPlaces: 0
          }
        ]
      }
    }

  }
}
</script>

<style scoped>
  a {
    color: #007bff;
    transition: 0.5s;
  }

  a:hover,
  a:active,
  a:focus {
    color: #0b6bd3;
    outline: none;
    text-decoration: none;
  }

  p {
    padding: 0;
    margin: 0 0 30px 0;
  }

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-family: "Montserrat", sans-serif;
    font-weight: 400;
    margin: 0 0 20px 0;
    padding: 0;
  }
  .section-header h3 {
    font-size: 36px;
    color: #283d50;
    text-align: center;
    font-weight: 500;
    position: relative;
  }

  .section-header p {
    text-align: center;
    margin: auto;
    font-size: 15px;
    padding-bottom: 60px;
    color: #556877;
    width: 50%;
  }

  #why-us {
    padding: 60px 0;
    background: #004a99;
  }

  #why-us .section-header h3,
  #why-us .section-header p {
    color: #fff;
  }

  #why-us .card {
    background: #00458f;
    border-color: #00458f;
    border-radius: 10px;
    margin: 0 15px;
    padding: 15px 0;
    text-align: center;
    color: #fff;
    transition: 0.3s ease-in-out;
    height: 100%;
  }

  #why-us .card:hover {
    background: #003b7a;
    border-color: #003b7a;
  }

  #why-us .card i {
    font-size: 48px;
    padding-top: 15px;
    color: #bfddfe;
  }

  #why-us .card h5 {
    font-size: 22px;
    font-weight: 600;
  }

  #why-us .card p {
    font-size: 15px;
    color: #d8eafe;
  }

  #why-us .card .readmore {
    color: #fff;
    font-weight: 600;
    display: inline-block;
    transition: 0.3s ease-in-out;
    border-bottom: #00458f solid 2px;
  }

  #why-us .card .readmore:hover {
    border-bottom: #fff solid 2px;
  }

  #why-us .counters {
    padding-top: 40px;
  }

  #why-us .counters span {
    font-family: "Montserrat", sans-serif;
    font-weight: bold;
    font-size: 48px;
    display: block;
    color: #fff;
  }

  #why-us .counters p {
    padding: 0;
    margin: 0 0 20px 0;
    font-family: "Montserrat", sans-serif;
    font-size: 14px;
    color: #cce5ff;
  }
  @media (max-width: 991px) {
    #why-us .card {
      margin: 0;
    }
  }
</style>
