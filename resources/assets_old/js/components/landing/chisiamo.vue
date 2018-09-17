<template>
  <div>
      <div class="wrapper">
        <div class="first-image">
          <p>Pizzeria da Adriano<br>
          in via Roma 156,<br>
          nasce nel 1995 come<br>
          pizzeria d'asporto.</p>
        </div>
        <div class="text">
          <h2>Storia dell' azienda</h2>
          <p>Adriano, l´allora titolare, dopo anni di<br>
          esperienza maturata nel settore della<br>
          ristorazione decide di aprire un attività in<br>
          proprio.
          <br>
          <br>
          Lo staff era all´epoca composto dai suoi<br>
          figli: Adriano e Luke che fin da subito,<br>
          ispirati dalla passione e dallo esempio<br>
          del padre, fanno del loro meglio per<br>
          contribuire alla crescita dell´azienda</p>
        </div>
    <div class="image" style="background-image: url('2.jpg')"></div>
    <div class="quote">
      <p>"Sin dai primi anni la pizzeria da Adriano si distingue per la qualità dei prodotti scelti, la professionalità, la cortesia e la vasta scelta delle pizze sul proprio menù."</p>
    </div>
    <div class="image" style="background-image: url('3.jpeg')"></div>
    <div class="text">
      <h2>Servizio a tavolino</h2>
      <p>A partire dal 2008 ho rilevato l´azienda di<br>
      mio padre  ed inaugurato la nuova area<br>
      dedicata al servizio a tavolino.
      <br>
      <br>
      Nonostante i tantissimi anni in cui faccio<br>
      questo lavoro, mia sete di conoscenza non<br>
      si è mai placata.</p>
    </div>
    <div class="title"></div>
    <div class="image slider" style="background-image: url('4.jpg')"></div>
    <div class="text">
      <p class="message">Pizzeria da Adriano organizza anche eventi per
      trascorrere piacevolissimi momenti isieme ai
      nostri cari e amichi. Se stai carcandoi un ristorante
      adatto per il tuo evento o per una cerimonia
      particolare, allora sei nel posto giusto!. hai la
      posibilità di reservare la nuova sala al piano
      inferiori per feste e eventi privati!</p>
      <router-link tag="a" to="/booking" exact type="button" class="btn btn-success"  data-dismiss="modal">RISERVA</router-link>
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
  .hr-white{
    background-color: white;
    height: 3px;
    width: 100%;
  }
  .bg-imagen{
    background-image: url('/images/home/slider_step/imagen4.jpg');
    width: 100%; 
    height: 800px; 
    background-repeat: no-repeat; 
    background-position: center;
  }
  #conta {
    padding: 0px !important;
  }
  .carousel-indicators-numbers {
      li {
        text-indent: 0;
        margin: 0 13px;
        width: 40px;
        height: 40px;
        font-size: 20px;
        border: none;
        border-radius: 100%;
        line-height: 40px;
        color: #e20513;
        background-color: #fff;
        transition: all 0.25s ease;
        &.active, &:hover {
          margin: 0 13px;
          width: 40px;
          height: 40px;
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
</style>
