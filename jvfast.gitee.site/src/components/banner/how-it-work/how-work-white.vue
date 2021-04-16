<template>
  <!--works start -->
  <section id="works" class="works">
    <div class="container">
      <div class="section-header">
        <h2>{{ title }}</h2>
        <p>{{ desc }}</p>
      </div><!--/.section-header-->
      <div class="works-content">
        <div class="row">
          <div v-for="item in data" :key="item.title" class="col-md-4 col-sm-6">
            <div class="single-how-works">
              <div class="single-how-works-icon">
                <i class="fas" :class="item.icon" />
              </div>
              <h2><a :href="item.url">{{ item.title }}</a></h2>
              <p>
                {{ item.desc }}
              </p>
              <button class="welcome-hero-btn how-work-btn" @click="$router.push(item.url)">
                read more
              </button>
            </div>
          </div>
        </div>
      </div>
    </div><!--/.container-->
  </section><!--/.works-->
  <!--works end -->
</template>

<script>
export default {
  name: 'HowWorkWhite',
  props: {
    title: {
      type: String,
      default: 'how it works'
    },
    desc: {
      type: String,
      default: 'Learn More about how our website works'
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            icon: 'fa-address-card',
            title: 'Create Account',
            desc: ' Clarinet accustomed. Would legs of framework officers. We\'ve to morning like a contracting',
            url: '#'
          },
          {
            icon: 'fa-bell',
            title: 'Make a Shedule',
            desc: ' Clarinet accustomed. Would legs of framework officers. We\'ve to morning like a contracting',
            url: '#'
          },
          {
            icon: 'fa-bell',
            title: 'Get Notification',
            desc: ' Clarinet accustomed. Would legs of framework officers. We\'ve to morning like a contracting',
            url: '#'
          }
        ]
      }
    }
  }
}
</script>

<style scoped>

  *{
    -webkit-box-sizing:border-box;
    -moz-box-sizing:border-box;
    -o-box-sizing:border-box;
    -ms-box-sizing:border-box;
    box-sizing:border-box;
  }
  a,a:hover,a:active,a:focus {
    display:inline-block;
    text-decoration:none;
    color: #343a3f;
    font-size:16px;
    padding:0;
    font-weight: 500;
    text-transform: capitalize;
  }
  h1,h2,h3,h4,h5,h6 {
    margin: 0;
    color:#343a3f;
    font-size: 18px;
    font-weight: 500;
    text-transform: capitalize;
  }
  button,
  select { /* 1 */
    text-transform: none;
  }
  .single-how-works-icon [class^="fa-"]:before,.single-how-works-icon [class*="fa-"]:before,.single-how-works-icon [class^="fa-"]:after,.single-how-works-icon [class*=" fa-"]:after {
    font-size: 35px;
  }
  .single-how-works:hover .single-how-works-icon [class^="fa-"]:before,.single-how-works:hover .single-how-works-icon [class*=" fa-"]:before,.single-how-works:hover .single-how-works-icon [class^="fa-"]:after,.single-how-works:hover .single-how-works-icon [class*=" fa-"]:after {
    color: #ff545a;
  }
  .section-header{
    position: relative;
    text-align: center;
  }
  .section-header h2{
    color: #505866;
    font-size:24px;
    font-weight: 500;
    margin-bottom: 24px;
    text-transform: uppercase;
    letter-spacing: 1.3px;
  }
  .section-header h2 span{text-transform: lowercase;}
  .section-header p{
    font-size:16px;
  }
  .works{padding: 100px 0 90px;}
  .works-content {margin-top: 73px;}

  .single-how-works{
    text-align: center;
    padding:50px 42px;
    border-radius: 3px;
    box-shadow: 0 0px 5px rgba(71,71,71,.2);
    margin-bottom: 30px;
    -webkit-transition: .3s linear;
    -moz-transition:.3s linear;
    -ms-transition:.3s linear;
    -o-transition:.3s linear;
    transition: .3s linear;
  }

  .single-how-works-icon {
    display: inline-block;
    color: #50616c;
    width: 80px;
    height: 80px;
    line-height: 80px;
    background: #eef2f6;
    border-radius: 50%;
  }
  .fas {
    line-height: 80px !important;
  }
  .single-how-works h2 a {
    font-size:  18px;
    margin: 35px 0 20px;
  }
  .single-how-works h2 a span {text-transform:  lowercase;}
  .single-how-works p {margin-bottom: 25px;text-transform: initial;}

  .single-how-works-icon [class^="flaticon-"]:before,.single-how-works-icon [class*=" flaticon-"]:before,.single-how-works-icon [class^="flaticon-"]:after,.single-how-works-icon [class*=" flaticon-"]:after {font-size: 35px;}
  .single-how-works:hover .single-how-works-icon [class^="flaticon-"]:before,.single-how-works:hover .single-how-works-icon [class*=" flaticon-"]:before,.single-how-works:hover .single-how-works-icon [class^="flaticon-"]:after,.single-how-works:hover .single-how-works-icon [class*=" flaticon-"]:after {color:#ff545a;}

  .welcome-hero-btn.how-work-btn {
    display: inline-block;
    margin: 0;
    width: 100px;
    height: 35px;
    font-size: 12px;
    background: transparent;
    color: #767f86;
    border: 1px solid #d3d6d9;
    border-radius: 3px;
  }

  .single-how-works:hover h2 a,.single-how-works:hover p{color: #fff;}
  .single-how-works:hover .single-how-works-icon{background: #fff;}
  .single-how-works:hover .welcome-hero-btn.how-work-btn{background: #fff;color: #ff545a;}
  .single-how-works:hover{box-shadow: 0 0px 10px rgba(71,71,71,.4);background: #ff545a;}
  .welcome-hero-btn {
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 14px;
    color: #fff;
    width: 170px;
    height: 70px;
    background: #ff545a;
    text-transform: capitalize;
    margin-left: 30px;
    border-radius: 3px;
    -webkit-transition: 0.3s linear;
    -moz-transition: 0.3s linear;
    -ms-transition: 0.3s linear;
    -o-transition: 0.3s linear;
    transition: 0.3s linear;
  }

  select,input,textarea,button {
    box-shadow: none;
    outline: 0!important;
  }

  .welcome-hero-btn:hover {
    /*background: #fd4043;*/
    background: #f43032;
  }

  .welcome-hero-btn svg {
    width: 14px;
    height: auto;
    margin-left: 12px;
  }

  @media screen and (max-width:767px){
    .single-how-works,.single-blog-item {max-width: 350px;margin: 30px auto;}
  }
</style>
