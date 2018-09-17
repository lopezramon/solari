
<template>
  <div class="wrapper">
    <returnback url="/" margin="mb-0" />
    
    <div class="first-image d-flex justify-content-center align-items-center ">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-8">
            <h2 class="text-white font-weight-bold text-center">
              Pizzeria da Adriano
              in via Roma 156,
              nasce nel 1995 come
              pizzeria d'asporto.
            </h2>
          </div>
        </div>
      </div>
    </div>

<!-- Barra de Busqueda -->
    <searchbar/>
<!-- Final Barra de Busqueda -->

  <div class="img-back d-sm-block d-md-none d-lg-none"></div>
    <div class="text d-sm-block d-md-none d-lg-none">
      <h2>Storia dell' azienda</h2>
      <p>Adriano, l´allora titolare, dopo anni di
      esperienza maturata nel settore della
      ristorazione decide di aprire un attività in
      proprio.</p>
      <p>
      Lo staff era all´epoca composto dai suoi
      figli: Adriano e Luke che fin da subito,
      ispirati dalla passione e dallo esempio
      del padre, fanno del loro meglio per
      contribuire alla crescita dell´azienda</p>
    </div>
  <div class="container-fluid d-none d-sm-none d-md-block d-lg-block" style="background-image:url('/images/chisiamo/2.jpg'); background-repeat: no-repeat;  background-size:cover; width:100%; height:550px;">
    <div class="row">
      <div class="col-6 p-0">
          <div class="bg-dark-translucent box d-flex align-items-center">
            <div class="container-fluid">
              <div class="row justify-content-end">
                <div class="col-8">
                  <div class="lead text-white">
                      <h1 class="font-weight-bold" >Storia dell' azienda</h1>
                      <p>
                        Adriano, l´allora titolare, dopo anni di
                        esperienza maturata nel settore della
                        ristorazione decide di aprire un attività in
                        proprio.
                      </p>
                      <p>
                        Lo staff era all´epoca composto dai suoi
                        figli: Adriano e Luke che fin da subito,
                        ispirati dalla passione e dallo esempio
                        del padre, fanno del loro meglio per
                        contribuire alla crescita dell´azienda
                      </p>
                  </div>
                </div>
                <div class="col-1"></div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>    
      <div class="quote">
        <p>
          "Sin dai primi anni la pizzeria da Adriano si distingue per la qualità dei prodotti scelti, 
          la professionalità, la cortesia e la vasta scelta delle pizze sul proprio menù."
        </p>
      </div>
    <div class="img-fluid image">

    </div>


      <div class="text d-sm-block d-md-none d-lg-none ">
        <h2>Servizio a tavolino</h2>
        <p>A partire dal 2008 ho rilevato l´azienda di
        mio padre  ed inaugurato la nuova area
        dedicata al servizio a tavolino.</p>
        
        <p>
        Nonostante i tantissimi anni in cui faccio
        questo lavoro, mia sete di conoscenza non
        si è mai placata.</p>
      </div>

<!--     <div class="image slider" style="background-image: url('/images/chisiamo/4.jpg')"></div> -->
  <div class="container-fluid d-none d-sm-none d-md-block d-lg-block" style="background-image:url('/images/chisiamo/fondo2.jpg'); background-repeat: no-repeat;  background-size:cover; width:100%; height:550px;">
    <div class="row flex-row-reverse">
      <div class="col-6 p-0">
          <div class="bg-dark-translucent box d-flex align-items-center">
            <div class="container-fluid">
              <div class="row justify-content-end">
                <div class="col-8">
                  <div class="text-white">
                      <h1 class="font-weight-bold" >Servizio a tavolino</h1>
                      <p>
                        A partire dal 2008 ho rilevato l´azienda di
                        mio padre  ed inaugurato la nuova area
                        dedicata al servizio a tavolino.
                      </p>
                      <p>
                        Nonostante i tantissimi anni in cui faccio
                        questo lavoro, mia sete di conoscenza non
                        si è mai placata.
                      </p>
                  </div>
                </div>
                <div class="col-1"></div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div> 


    <div class="bg-tittle d-flex align-items-center justify-content-center" style="">
      <h2>Prenotazione di eventi</h2>
    </div>
    <div class="container mt-3"> 
      <md-card>
        <md-card-media>
          <!-- swiper -->
          <swiper :options="swiperOption">
            <swiper-slide><img class="d-block w-100" src="/images/chisiamo/4.jpg" alt="First slide"></swiper-slide>
            <swiper-slide><img class="d-block w-100" src="/images/chisiamo/4.jpg" alt="Second slide"></swiper-slide>
            <swiper-slide><img class="d-block w-100" src="/images/chisiamo/4.jpg" alt="Third slide"></swiper-slide>
            <div class="swiper-button-prev" slot="button-prev"></div>
            <div class="swiper-button-next" slot="button-next"></div>
          </swiper>
        </md-card-media>
      </md-card>
    </div>

    <div class="text">
      <p class="message">Pizzeria da Adriano organizza anche eventi per
      trascorrere piacevolissimi momenti isieme ai
      nostri cari e amichi. Se stai carcandoi un ristorante
      adatto per il tuo evento o per una cerimonia
      particolare, allora sei nel posto giusto!. hai la
      posibilità di reservare la nuova sala al piano
      inferiori per feste e eventi privati!</p>

      <div class="text-center">
        <router-link to="/booking">
          <button class="btn btn-success btn-lg text-uppercase">
            <span class="font-weight-bold">RISERVA</span>
          </button>
        </router-link>
      </div>
    </div>

        <newsletter></newsletter>
        <footer_index></footer_index>
        <menu_responsive/>
  </div>
</template>


<style scoped>
.wrapper{
    background-color: #000;
}
.wrapper .first-image{
    background-image:linear-gradient(rgba(0, 0, 0, 0.80),rgba(0, 0, 0, 0.65)), url("/images/chisiamo/1.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: bottom center;
    border-bottom: 2px solid #1a6401;
    height: 300px;
    background-repeat: no-repeat;
}
  .img-back{
    background-image: url(/images/chisiamo/2.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: bottom center;
    height: 220px;
  }
.wrapper .first-image p{
    text-align: left;
    font-size: 24px;
    line-height: 20px;
    font-weight: bolder;
    color: #fff;
}   
.wrapper .text{
    color: #fff;
    padding: 50px;
}
.wrapper .text h2{
    font-weight: bold;
    font-size: 24px;
    margin-bottom: 30px;
}
.wrapper .text p{
    font-size: 1.4rem;
    line-height: 1.1;
}
.wrapper .text p.message{
    text-align: center;
}
.wrapper .image{
    background-image: url('/images/chisiamo/3.jpeg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center bottom;
    background-attachment: fixed;
    height: 240px;
}

@media screen and (min-width: 768px){
  .wrapper .image{
    background-position: right bottom;
    height: 400px;
}
}

.wrapper .quote{
    background-color:#e20516;
    padding: 40px 30px 40px 30px; 
}
.wrapper .quote p{
    text-align: center;
    font-size: 1.2rem;
    line-height: 1.2;
    font-weight: bolder;
    color: #fff;
}
.wrapper .bg-tittle{
  background-color:#e20516; 
  height:50px;
  color:#fff;
  font-weight: bold;
}

.btn-success{
    margin: 0 auto;
    display: block;
    font-size: 20px;
    border-radius: 0px;
    font-weight: bolder;
    background-color: #044200;
    border: 0px;
    padding: 5px 50px;
}

.box{
    height: 550px;
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

<script>
  export default {
    data() {
      return {
        swiperOption: {
          slidesPerView: 2,
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
            768: {
              slidesPerView: 1,
              spaceBetween: 10
            },
            360: {
              slidesPerView: 1,
              spaceBetween: 10
            }
          }
        }
      }
    }
  }
</script>