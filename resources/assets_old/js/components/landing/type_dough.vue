<template>
    <div>
        <div class="container text-center d-none d-sm-none d-md-block d-lg-block">
            <h1 class="mt-5 text-white font-weight-bold mb-5">VARIETÀ DI IMPASTI</h1>
            <div class="row">
                <div class="col-3">
                    <div>
                        <img src="images/home/type_dough/tiposdemasa.png" alt="" class="img-fluid mb-lg-3 imgb">
                    </div>
                    <div class="mt1">
                        <h2 class="text-white font-weight-bold " >
                            SCROCCHIARELLA
                        </h2>
                        <p class="hr-red"></p>
                        <p class="text-center text-white font-weight-bold">
                            Fatta di Farina di grano tenero e tanto lievito naturale, è un prodotto 100% italiano, fonte naturale di fibre e ridotto contenuto di sale; ideale nelle diete per la prevenzione di disturbi legati alla tiroide.
                        </p>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <img src="images/home/type_dough/tiposdemasa2.png" alt="" class="img-fluid mb-lg-3 imgb">
                    </div>
                    <div >
                        <h3 class="text-white font-weight-bold">
                            INTEGRALE AI 10 CREALI
                        </h3>
                        <div class="hr-red"></div> 
                        <p class="text-center text-white font-weight-bold" style="margin-top: 15px">
                            Costituita da una miscela di farine, semi e fiocchi. Da utilizzare per qualsiasi ricetta dolce o salata: pasta, pane, biscotti e piadine. Ideale per prodotti da forno in genere.
                        </p>
                    </div>
                </div>                
                <div class="col-3">
                    <div>
                        <img src="images/home/type_dough/tiposdemasa3.png" alt="" class="img-fluid mb-lg-3 imgb">
                    </div>
                    <div class="mt3">
                        <h3 class="text-white font-weight-bold">
                            SENZA GLUTINE E SENZA LATTOSIO.
                        </h3>
                        <div class="hr-red"></div> 
                        <p class="text-center text-white font-weight-bold" style="margin-top: 15px">
                            I mix di impasti si stanno affinando sempre di più, per fare in modo che gli intolleranti sia al glutine che al lattosio possano gustare delle pietanze che una volta erano del tutto vietate, senza per questo rinunciare al gusto! 
                        </p>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <img src="images/home/type_dough/tiposdemasa.png" alt="" class="img-fluid mb-lg-3 imgb">
                    </div>
                    <div class="mt2">
                        <h3 class="text-white font-weight-bold" style="">
                            LA FARINA TIPO 1.
                        </h3>
                        <div class="hr-red"></div> 
                        <p class="text-center text-white font-weight-bold" style="margin-top: 15px">
                            La farina Tipo 1 rappresenta il giusto equilibrio tra l’attitudine panificatoria tipica delle farine raffinate e il maggiore apporto di nutrienti garantiti dalla farina integrale di frumento tenero. 
                        </p>
                    </div>
                </div>                
            </div>
            <router-link to="/">
                <button class="btn btn-success text-uppercase mb-5">CONTINUA</button>
            </router-link>
        </div>


<!--Slider -->
        <div class="container py-3 d-sm-block d-md-none d-lg-none">
            <div class="row ">
                <div class="col-12 p-0">
                    <h1 class="font-weight-bold text-center text-white mt-0 mb-3">  VARIETÀ DI IMPASTI</h1>
                            <div class="col-12 mb-3">
                                <div class="row text-white text-center m-auto">
                                    <div class="col-3 d-inline-block p-0 text-center">
                                        <img src="images/home/type_dough/circulo1.png" alt="type1" style="width:50%;">
                                    </div>
                                    <div class="col-9 d-inline-block p-0 text-center" style="left: -18px">
                                        <h3 class="text-left ml-2 mb-0">SCROCCHIARELLA</h3> 
                                    </div>
                                </div>                            
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row text-white text-center m-auto">
                                    <div class="col-3 d-inline-block p-0 text-center">
                                        <img src="images/home/type_dough/circulo2.png" alt="type2" style="width:50%;">
                                    </div>
                                    <div class="col-9 d-inline-block p-0 text-center" style="left: -18px">
                                        <h3 class="text-left ml-2 mb-0">INTEGRALE AI 10 CREALI</h3> 
                                    </div>
                                </div>                            
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row text-white text-center m-auto">
                                    <div class="col-3 d-inline-block p-0 text-center">
                                        <img src="images/home/type_dough/circulo3.png" alt="type3" style="width:50%;">
                                    </div>
                                    <div class="col-9 d-inline-block p-0 text-center p-0" style="left: -18px">
                                        <h3 class="text-left ml-2 mb-0">SENZA GLUTINE E SENZA LATTOSIO</h3> 
                                    </div>
                                </div>                            
                            </div>
                            <div class="col-12 mb-3 ">
                                <div class="row text-white text-center m-auto">
                                    <div class="col-3 d-inline-block p-0 text-center">
                                        <img src="images/home/type_dough/circulo4.png" alt="type4" style="width:50%;">
                                    </div>
                                    <div class="col-9 d-inline-block p-0 text-center p-0" style="left: -18px">
                                        <h3 class="text-left ml-2 mb-0">LA FARINA TIPO 1.</h3> 
                                    </div>
                                </div>                            
                            </div>
                </div>                
            </div>
        </div>
    </div>  
</template>

<style scoped>
 .hr-red{
    background-color: #e20513;
    height: 3px;
    width: 100%;
    line-height: 40px;
  }

  .mt1{
    margin-top: 26px;
  }
  .mt2{
    margin-top: 28.5px;
  }
.btn-success {
        color: #fff;
        background-color: #216619;
        border-color: #216619;
    }
 

@media (max-width: 768px) {
      h3{
        font-size: 1.0rem;
      }
      h2{
        font-size: 1.0rem;
      }
      .imgb{
        width: 100%;
      }
     .mt1{
        margin-top: 35px;
     }
     .mt2{
        margin-top: 17px;
     }      
     .mt3{
        margin-top: 16px;
     }      

}

</style>