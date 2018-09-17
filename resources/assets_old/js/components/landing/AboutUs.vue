<template>

<div>
  <div style="background-image:url(/images/home/pizeria_da_adriano.png); background-repeat: no-repeat;  background-size:cover;" class="d-sm-block d-md-none d-lg-none">

  <div class="bg-dark-translucent p-4 p-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="text-white text-center">
                <h1 class="text-uppercase font-weight-bold">La Pizzeria da Adriano</h1>
                <p class="lead font-playfair">
                  Nasce nel 1995 come pizzeria d’asporto, in via Roma 156. Adriano, l’allora titolare, dopo anni
                  di esperienza maturata nel settore della ristorazione decide di aprire un attività in proprio.
                </p>
            </div>
            <router-link to="/chisiamo">
                <button class="btn btn-success text-uppercase">CHI SIAMO</button>
            </router-link>
          </div>
      </div>
    </div>
  </div>

  <div class="container-fluid d-none d-sm-none d-md-block d-lg-block" style="background-image:url(/images/home/pizeria_da_adriano.png); background-repeat: no-repeat;  background-size:cover; width:100%; height:550px;">
    <div class="row">
      <div class="col-6 offset-md-6">
          <div class="wrapper bg-dark-translucent">
            <div class="text-white text-center">
                <h1 class="text-uppercase font-weight-bold text-right font-size-3" >La Pizzeria <br> da Adriano</h1>
                <p class="font-playfair">
                  Nasce nel 1995 come pizzeria d’asporto, in via Roma 156. Adriano, l’allora titolare, dopo anni
                  di esperienza maturata nel settore della ristorazione decide di aprire un attività in proprio.
                </p>
                <p class="font-playfair">
                  A seguire l´esempio di mio padre, dal primo giorno, sono stato io. Motivato dalla sua grinta e dalla sua passione, ho cercato di apprendere quanto più possibile dando il meglio di me per contribuire alla crescita dell’azienda.
                </p>
            </div>
                <div class="text-right">
                    <router-link to="/chisiamo">
                        <button class="btn btn-success btn-lg text-uppercase mt-2 mr-3">CHI SIAMO</button>
                    </router-link>
                </div>
          </div>
      </div>
    </div>
    
  </div>

</div>  
</template>


<style scoped>
  .wrapper{
    min-height: 445px;
    margin-top: 50px;
  }
  .wrapper p{
    font-size: 20px;
    margin: 10px;
    margin-right: 20px;
    text-align: right;
    line-height: initial;
  }
  .wrapper h1 {
    padding-top:20px; 
    padding-right:20px; 
    font-size:50px; 
  }
  .btn-success {
    color: #fff;
    background-color: #216619;
    border-color: #216619;
  }
@media (min-width: 768px) {
  .wrapper{
    min-height: 465px;
    margin-top: 24px;
  }
  .wrapper h1 {
    padding-top: 20px;
    padding-right: 20px;
    font-size: 38px;
  }
  .font-size-3{
    font-size: 3rem;  
  }

}
</style>
<script>
    export default {
        mounted() {
            
        }
    }
</script>



