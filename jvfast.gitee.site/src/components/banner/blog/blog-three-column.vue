<template>
  <!--blog start -->
  <section id="blog" class="blog">
    <div class="container">
      <div class="section-header">
        <h2>{{ title }}</h2>
        <p>{{ desc }} </p>
      </div><!--/.section-header-->
      <div class="blog-content">
        <div class="row">
          <div v-for="item in data" :key="item.id" class="col-md-4 col-sm-6">
            <div class="single-blog-item">
              <div class="single-blog-item-img">
                <img :src="item.img" alt="blog image">
              </div>
              <div class="single-blog-item-txt">
                <h2><a href="#">{{ item.title }}</a></h2>
                <h4>posted <span>by</span> <a href="#">{{ item.author }}</a> {{ item.time }}</h4>
                <p>
                  {{ item.desc }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!--/.container-->
  </section><!--/.blog-->
  <!--blog end -->
</template>

<script>
export default {
  name: 'BlogThreeColumn',
  props: {
    title: {
      type: String,
      default: 'news and articles'
    },
    desc: {
      type: String,
      default: 'Always upto date with our latest News and Articles'
    },
    data: {
      type: Array,
      default: () => {
        return [
          {
            id: 1001,
            img: require('@/assets/img/blog/blog-img5.jpg'),
            time: '21 Aug, 2019',
            author: 'By, Admin',
            title: '5 reasons why your website needs more whitespace',
            desc: 'Lorem ipsum dolor sit amet, consectetur de adipisicing elit, sed do eiusmod tempore incididunt ut labore et dolore magna.',
            url: ''
          },
          {
            id: 1002,
            img: require('@/assets/img/blog/blog-img6.jpg'),
            time: '22 Aug, 2019',
            author: 'By, Admin',
            title: '7 reasons why your website needs more whitespace',
            desc: 'Lorem ipsum dolor sit amet, consectetur de adipisicing elit, sed do eiusmod tempore incididunt ut labore et dolore magna.',
            url: ''
          },
          {
            id: 1003,
            img: require('@/assets/img/blog/blog-img7.jpg'),
            time: '23 Aug, 2019',
            author: 'By, Admin',
            title: '8 reasons why your website needs more whitespace',
            desc: 'Lorem ipsum dolor sit amet, consectetur de adipisicing elit, sed do eiusmod tempore incididunt ut labore et dolore magna.',
            url: ''
          }
        ]
      }
    }
  }
}
</script>

<style scoped>

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
  p {
    margin: 0;
    color:#767f86;
    font-size:14px;
    line-height: 1.8;
    text-transform: initial;
  }
  img{border:none;max-width:100%; height:auto;}
  ul{
    padding: 0;
    margin: 0 auto;
    list-style: none;
  }
  ul li {
    list-style: none;

  }
  /* section-header */
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
  /* section-header */
  /*-------------------------------------
          10. Blog
  --------------------------------------*/
  .blog{padding:120px 0 90px;}
  .blog-content{margin-top: 80px;}

  .single-blog-item{
    margin-bottom: 30px;
    box-shadow: 0 0px 5px rgba(71,71,71,.2);
    -webkit-transition: .3s;
    -moz-transition:.3s;
    -ms-transition:.3s;
    -o-transition:.3s;
    transition: .3s;
  }
  .single-blog-item-txt {padding:  25px 28px 27px;}
  .single-blog-item-txt h2 a {text-transform:  initial;line-height: 1.8;}
  .single-blog-item-txt h4 {
    font-size:  14px;
    color:  #8f949d;
    font-weight:  400;
    margin: 12px 0 20px;
  }
  .single-blog-item-txt h4 a {
    font-size:  14px;
    padding-right:  14px;
    border-right: 1px solid #dde0e4;
    margin-right:  15px;
    text-transform: uppercase;
  }

  .single-blog-item:hover h2 a {color:#ff545a;}
  .single-blog-item:hover{
    box-shadow: 0 10px 20px rgba(21,19,19,.4);
  }

</style>
