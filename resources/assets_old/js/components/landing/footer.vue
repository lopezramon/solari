<template>
<div>
    <footer>
        <div class="bg-dark py-4">
            <div class="container">
                <div class="row flex-column flex-md-row align-items-center ">
                    <div class="col-md-3 text-center mt-lg-5 mt-sm-5 mb-sm-5">
                        <a href="/">
                        <img class="img-fluid " src="images/home/logo_footer.svg" alt="">
                        </a>
                    </div>
                    <div class="col-md-3 d-none d-sm-none d-md-block ">
                        <h5 class="text-white font-weight-bold">MENU</h5>
                        <ul class="" style="-webkit-padding-start:2px !important; ">
                            <li class="text-white "><a class="nav-link" href="/chisiamo">Chi siamo</a></li>
                            <li class="text-white "><a class="nav-link" href="/servizi">Servizi</a></li>
                            <li class="text-white "><a class="nav-link" href="/list-product">Menu</a></li>
                            <li class="text-white "><a class="nav-link" href="/list-product">Ordini</a></li>
                            <li class="text-white "><a class="nav-link" href="/#contact">Contatti</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3  d-none d-sm-none d-md-block">
                        <h5 class="text-white font-weight-bold">LE NOSTRE SPECIALITÀ</h5>
                        <ul class="" style="-webkit-padding-start:2px !important;">
                            <li class="text-white">Pizze</li>
                            <li class="text-white">Speciali</li>
                            <li class="text-white">Calzoni</li>
                            <li class="text-white">focacce</li>
                            <li class="text-white">fritture</li>

                        </ul>
                    </div>
                    <div class="politicas col-12 col-md-3 text-center text-md-left mt-3 mb-3 mt-lg-0 mb-lg-0">
                        <h5 class="text-white font-weight-bold">PIZZERIE DA ADRIANO DI FERRAI MASSIMO LUKE</h5>
                        <div class="text-white font-weight-bold">
                            <a href="https://goo.gl/maps/nBvzJpMHCd32" class="text-white"> 
                                <img src="images/home/placeholder-white.svg" width="30" alt="">
                                Via Roma 156 Olbia 07026 339-7299634
                            </a>
                        </div>
                        
                        <div><a href="mailto:info@pizzeriaadriano.it" class="text-email">info@pizzeriaadriano.it</a></div>
                        <div>
                            <a href="" class="fab fa-tripadvisor text-white"></a>
                            <a href="" class="fab fa-facebook-f text-white"></a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-primary politicas">
                <div class="container">
                  <div class="row text-center pt-4  align-items-center">
                    <div class="col-12 col-md-9 text-md-left font-weight-light text-white">
                      <span class="d-block d-sm-inline">Tutti i diritti riservati Pizzeria Da Adriano 2018. </span><span class="d-sm-none d-none d-lg-inline-block">|</span>
                      <span class="d-block d-sm-inline"> <a href="" class="text-white" data-toggle="modal" data-target="#modalPolitica">Informativa sulla Privacy</a> </span><span class="d-sm-none d-none d-lg-inline-block"> |</span>
                      <span class="d-block d-sm-inline"> <a href="" class="text-white" data-toggle="modal" data-target="#modalTerminos">Termini e Condizioni </a> </span>
                    </div>
                    <div class="col-12 col-md-3 text-md-right align-self-end">
                    <a href=""><img class="img-fluid" src="images/home/jumperr-logo-fondo-negro.png" alt="jumpper"></a>
                    </div>

                  </div>
                </div>  
        </div>
    </footer>
    <div class="height d-md-none"></div>
</div>
</template>

<style scope>
.text-email{
    color: #e20513;
    font-size: 1.2rem;
    line-height: 1.2rem;
    padding: 2rem 0rem;
}
.nav-link{
    text-decoration: none;
    padding: 0px !important;
    font-weight: 400;
    color: #fff;
}
a.fab{
    font-size: 2.4rem;
    margin-left: 15px;
    margin-right: 15px; 
}
.bg-primary{
  background-color:  #e20513 !important;
}
ul {
  list-style-image: url('/images/home/flahca_derecha.svg');
}
.height{
    height: 66px;
}
.politicas{
    font-size: 1rem;
    font-weight: 700;
    word-wrap: break-word;
}
@media screen and (min-width: 968px){
    .politicas{
        font-size: 1rem;
        font-weight: 700;
    }   
}
</style>