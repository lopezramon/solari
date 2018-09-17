<script>
export default {
  data() {
      return {
        swiperOption: {
          wrapperClass: 'swiper-contenedor',
          slidesPerView: 4,
          spaceBetween: 30,
          // init: false,
          // pagination: {
          //   el: '.swiper-pagination',
          //   clickable: true
          // },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
          },
          breakpoints: {
            
            420: {
              slidesPerView: 1,
              spaceBetween: 10
            },
            768: {
              slidesPerView: 2,
              spaceBetween: 10
            },
            992: {
              slidesPerView: 3,
              spaceBetween: 10
            }
          }
        }
      }
    }
}
</script>

<template>
  <div>
    <div class="bg-imagen hr-bottom py-5" >
      <div class="container">
        <h1 class="text-white font-weight-bold text-center">EFFETTUA IL TUO ORDINE</h1>
        <div class="row">
          <div class="col-12">
            <swiper :options="swiperOption">
              <swiper-slide><img class="img-fluid" src="/images/home/slider_step/infografia_1.png" alt="First slide"></swiper-slide>
              <swiper-slide><img class="img-fluid" src="/images/home/slider_step/infografia_2.png" alt="Second slide"></swiper-slide>
              <swiper-slide><img class="img-fluid" src="/images/home/slider_step/infografia_3.png" alt="Third slide"></swiper-slide>
              <swiper-slide><img class="img-fluid" src="/images/home/slider_step/infografia_4.png" alt="four slide"></swiper-slide>
              <!-- <div class="swiper-pagination" slot="pagination"></div> -->
              <div class="swiper-button-prev" slot="button-prev"></div>
              <div class="swiper-button-next" slot="button-next"></div>
            </swiper>
          </div>

          
        </div>
      </div>
      
    </div>

  </div>
</template>


<style lang="scss" scoped>

  .circulo {
      font-size: 60px;
      width: 100px;
      height: 100px;
      background-color: #e33d25;
      color: white;
      font-size: 60px;
      margin-top: -50px;
      margin-left: 79px;
  }
  .circulo1 {
      font-size: 60px;
      width: 137px;
      height: 137px;
      background-color: #fff;
      color: white;
      font-size: 60px;
      margin-top: -38px;
      margin-left: 71px;
  }

  .cuadrado{
    margin-top:45px !important;
    border-radius:34px !important;
    height:630px;
    background-color:#e20513;
    width: 275px ;
  }
  .cuadrado1{
    margin-top:45px !important;
    border-radius:34px !important;
    height:630px;
    background-color:#1b6501;
    width: 275px;
  }
  .border {
      border: 4px solid #dee2e6 !important;
  }


  .bg_color_red{
    background-color:#e20513;
  }

  .carousel-inner{
    height: 507px !important;  
    background-color:#e20513;
  }

  .img-bg-1{
    width:100%; 
    height:500px;
    background-color: red;
  }
  .img-style{
      width: 50%;
      height: auto;
      margin-top: 40px;

  }
  .img-cuad{
      width: 90%;
      height: auto;
      margin-top: 3px;

  }
  .img-cuad1{
      width: 41%;
      height: auto;
      margin-top: 3px;

  }
  .img-cuad2{
      width: 60%;
      height: auto;
      margin-top: 28px;
      margin-bottom: 22px ;
  }
  .img-style1{
    width:25%; 
    height:auto;
  }
  .img-style2{
      width: 60%;
      height: auto;
  }
  .hr-full{
    background-color: red; 
    height: 20px;
    margin-bottom: 10px!important;
  }
  .hr-bottom{
    border-bottom: 20px solid;
    border-color: #af0c16;
  }
  .hr-white{
    background-color: white;
    height: 3px;
    width: 100%;
  }
  .bg-imagen{
    background-image: url('/images/home/slider_step/imagen4.jpg');
    width: 100%; 
    min-height: 800px; 
    background-repeat: no-repeat; 
    background-position: center;
  }
  #conta {
    padding: 0px !important;
  }
  .carousel-indicators-numbers {
      li {
        text-indent: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        font-size: 20px;
        border: none;
        border-radius: 100%;
        line-height: 1;
        color: #e20513;
        background-color: #fff;
        transition: all 0.25s ease;
        &.active, &:hover {
          background-color:#1b6501;
          color: white;     
        }
      }
  }

  .carousel-indicators{
    margin-bottom: 0px !important;
    max-height: 90vh !important;
  }  
  .carousel-inner {
      height: 620px !important;
  }
  .move{
    width: 94px !important;
  }
    .move1{
    width: 98px !important;
  }

  @media screen and (max-width: 922px){
  /* some CSS here */
    .cuadrado{
      width: 165px;
      height:488px;
      }
    .cuadrado1{
      width: 165px ;
      height: 488px;
    }
    .circulo{
      width: 80px;
      height: 80px;
      margin-left: 36px;
    }
    .move {
    width: 63px !important;
    }
    
    h5 {
      font-size: 1.0rem;
    }
    h4{
      font-size: 1.0rem;
    }
    h3{
      font-size: 1.0rem;
    }
    h2{
      font-size: 1.0rem;
    }
    h1{
      font-size: 2.00rem;
    }
  }

/* swipper slider */

.swiper-slide {
  text-align: center;
}
.swiper-button-prev, .swiper-button-next{
    display: inline-block;
    width: 40px;
    height: 40px;
    background: no-repeat center center;
    background-size: cover;
}

.swiper-button-prev, .swiper-container-rtl .swiper-button-next {
  background-image: url(/images/home/flecha-slider.svg);
  transform: rotateY(180deg);
  left: 10px;
  right: auto;
}

.swiper-button-next, .swiper-container-rtl .swiper-button-prev {
  background-image: url(/images/home/flecha-slider.svg);
  right: 10px;
  left: auto;
}

</style>
