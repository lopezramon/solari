<template>
    
<div>
    <!-- movil -->
    <div id="carouselExampleIndicators" class="carousel slide d-lg-none" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container-img">
                    <img src="images/home/home_slide1.jpg" alt="First slide" width="140%">
                    <div class="content-img">
                            <div class="row justify-content-center">
                                <div class="col">
                                    <img src="images/home/006-pizza.svg" alt="shipped" width="32">
                                    <br>
                                    <span class="text-white"> 1. Scegli il tuo cibo</span>
                                </div>
                                <div class="col">
                                    <img src="images/home/005-card.svg" alt="shipped" width="32">
                                    <br>
                                    <span class="text-white">2. Paga il tuo ordine</span>
                                </div>
                                <div class="col">
                                    <img src="images/home/004-shipped.svg" alt="shipped" width="32">
                                    <br>
                                    <span class="text-white">3. Prendi il tuo cibo</span>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="carousel-caption bg-dark">
                    <h3 class="text-uppercase mb-0 font-weight-bold">Più Di 80</h3>
                    <h4 class="text-uppercase font-weight-bold">Pizze Da Scegliere</h4>
                    <p class="text-capitalize">Scegli tra Impasti Tradizionali e senza glutime</p>
                    <a href="/list-product" class="btn btn-primary text-uppercase">Le Nostre Specialità</a>
                </div>
            </div>

            <div class="carousel-item">
                <div class="container-img">
                    <img src="images/home/home_slide2.jpg" alt="First slide" width="140%">
                    <div class="content-img py-2">
                        <div class="row justify-content-center">
                                <div class="col">
                                    <img src="images/home/006-pizza.svg" alt="shipped" width="32">
                                    <br>
                                    <span class="text-white"> 1. Scegli il tuo cibo</span>
                                </div>
                                <div class="col">
                                    <img src="images/home/005-card.svg" alt="shipped" width="32">
                                    <br>
                                    <span class="text-white">2. Paga il tuo ordine</span>
                                </div>
                                <div class="col">
                                    <img src="images/home/004-shipped.svg" alt="shipped" width="32">
                                    <br>
                                    <span class="text-white">3. Prendi il tuo cibo</span>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="carousel-caption bg-dark">
                    <h3 class="text-uppercase mb-0 font-weight-bold">Più Di 80</h3>
                    <h4 class="text-uppercase font-weight-bold">Pizze Da Scegliere</h4>
                    <p class="text-capitalize">Scegli tra Impasti Tradizionali e senza glutime</p>
                    <a href="/list-product" class="btn btn-primary text-uppercase">Le Nostre Specialità</a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <!-- Desktop -->
    

     <div id="carouselheader" class="carousel slide d-none d-sm-none d-md-none d-lg-block" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="/images/home/imagen_header1.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="mb-0">PIÙ DI 80 </h2>
                        <h3 class="mb-0">PIZZE DA SCEGLIERE</h3>
                        <p class="font-playfair">Seegli tra Impasti tradizionali e senza glutine</p>
                        <a href="/list-product" class="btn btn-success m-auto">ORDINA</a>

                    </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="/images/home/imagen_header1.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="mb-0">PIÙ DI 80 </h2>
                        <h3 class="mb-0">PIZZE DA SCEGLIERE</h3>
                        <p class="font-playfair">Seegli tra Impasti tradizionali e senza glutine</p>
                        <a href="/list-product" class="btn btn-success m-auto">ORDINA</a>

                    </div>                  
                </div>
                <div class="content-img d-flex align-items-center justify-content-center">
                        <div class="row justify-content-center">
                            <div class="col-4 d-inline-block text-right">
                                <img src="images/home/006-pizza.svg" alt="shipped" width="10%">
                                
                                <span class="text-white"> 1. Scegli il tuo cibo</span>
                            </div>
                            <div class="col-4 d-inline-block text-center">
                                <img src="images/home/005-card.svg" alt="shipped" width="10%">
                                
                                <span class="text-white">2. Paga il tuo ordine</span>
                            </div>
                            <div class="col-4 d-inline-block text-left
                            ">
                                <img src="images/home/004-shipped.svg" alt="shipped" width="10%">
                               
                                <span class="text-white">3. Ricevi il tuo cibo</span>
                            </div>
                        </div>
                </div>                    
              </div>
              <a class="carousel-control-prev" href="#carouselheader" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselheader" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
    </div>               
</div>
        
</template>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
<style scoped>
    /* Container holding the image and the text */
    #carouselExampleIndicators .container-img {
        position: relative;
        text-align: center;
        width: 100%;
        max-width: 1440px; /* Maximum width */
        margin: 0 auto; /* Center it */
    }

    .container-img .content-img {
        position: absolute; /* Position the background text */
        bottom: 0; /* At the bottom. Use top:0 to append it to the top */
        background: rgba(0, 0, 0, 0.8); /* Black background with 0.5 opacity */
        color: #f1f1f1; /* Grey text */
        width: 100%; /* Full width */
        padding: 2%; /* Some padding */
    }

    .content-img {
        position: absolute; /* Position the background text */
        bottom: 0; /* At the bottom. Use top:0 to append it to the top */
        background: rgba(0, 0, 0, 0.8); /* Black background with 0.5 opacity */
        color: #f1f1f1; /* Grey text */
        width: 100%; /* Full width */
        padding-top: 10px;
        height: 90px;
    }
    .input-group{
        width: 33%;
        text-align: center;
    }

    /* Carousel arrows */
    #carouselExampleIndicators .carousel-control-prev, #carouselExampleIndicators .carousel-control-next {
        position: absolute;
        bottom: 40%;
        top: 0;
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        width: 15%;
        color: #fff;
        text-align: center;
    }
    .hr-right{
        border: none;
        border-right: 3px solid hsl(0, 0%, 100%);
        height: 100px;
        width: 1px;
    }

    .search-title {
        float:left; 
        margin-left:25%; 
        margin-right:1%;
        font-size:23px;
        margin-top: -5px;
        color:#FFF;
         font-weight: bold;
    }

    .form-control:focus {
    color: #495057;
    background-color: #FFF;
    border-color: #dc3545;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,0); 
    }

    .p-2 {
    padding: 1rem !important;
    }

    #carouselheader .carousel-caption {
        position: absolute;
        bottom: auto;
        right: auto;
        left: 50%;
        top: 50%;
        z-index: 10;
        padding-top: 20px;
        padding-bottom: 50px;
        color: #fff;
        text-align: center;
        transform: translate(-50%,-50%);
        width: 40%;
        text-align: left;
    }
    #carouselheader h2 {
        font-size: 79px;
        font-weight: bold;
        line-height: 1;
    }
    #carouselheader h3 {
        font-size: 42px;
        font-weight: bold;
        line-height: 1;
    }
    #carouselheader .font-playfair{
        font-size: 16px;
    }
    #carouselheader .btn-success {
        color: #fff;
        background-color: #216619;
        border-color: #216619;
        font-size: 20px;
    }




@media (min-width: 768px) {
  .wrapper{
    height: 465px;
    margin-top: 24px;
    width: 481px;
  }
  .wrapper h1 {
    padding-top: 20px;
    padding-right: 20px;
    font-size: 38px;
  }
  .topnav a {
    padding: 10px 34px 9px 0px !important;
    font-size: 22px;
    color: #fff;
    font-weight: bold;

    }

}

</style>