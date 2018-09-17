<template>
    <div>
        <div class="container text-center">
            <div class="p-2">
                <h5 class="text-danger font-weight-bold">Seliziona il metodo di consegna</h5>
                <template v-if="domicilo||tienda">
                    <hr class="mr-0 ml-0 " style="background-color:#7c7875; width:100%; height:2px;">
                </template>
                <div class="row">
                    <div class="col-5 text-right">
                        <img :src="img1" alt="" style="width:100px;" @click="cambiarDomicilio" class="hover" >
                        <h5 class="mt-2 font-weight-bold" :style="{color: color}">A Domicilio</h5>
                    </div>
                    <div class="col-1 d-inline-block">
                        <div class="hr-right ml-md-4"></div>
                    </div>
                    <div class="col-5 text-left">
                        <img :src="img2" alt="" @click="cambiarTienda">
                        <h5 class="mt-2 font-weight-bold" :style="{color:color1, width:'100px', margin: '9px' }">Da asporto</h5>
                    </div>
                </div>
            </div>
        </div>
<!--                                                                
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Open modal
</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
  Open modal
</button>
 -->
          <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
                <router-link tag="a" to="/" exact type="button" class="close"  data-dismiss="modal">
                     &times;
                </router-link>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              <div class="container text-white  ">
                  <div class="row flex-column text-center">
                    <div class="col-12">
                        <img :src="accept" alt="" class="border-bottom">
                    </div>
                    <div class="col-12">
                        <h2 class="font-weight-bold mt-3" style="color:#e20513;">GRAZIE!</h2>
                        <h3 class="mt-0 mb-3">per avere fiducia in noi</h3>
                    </div>
                    <div class="col-12">
                        <h5 class="mb-3">Stiamo preparando i tuo ordine</h5>
                    </div> 
                    <div class="col-12">
                        <h5>Se avete qualche domanda potete contattarci al numero</h5>
                        <h2 class="mt-0">339-7299634</h2>
                    </div>                               
                      
                  </div>
              </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer border-0">
              <img src="images/home/logo_footer.svg" alt="" class="img-fluid">
            </div>
            
          </div>
        </div>
    </div>

    <div class="modal" id="myModal1">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
                <router-link tag="a" to="/" exact type="button" class="close"  data-dismiss="modal">
                     &times;
                </router-link>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              <div class="container text-white  ">
                  <div class="row flex-column text-center">
                    <div class="col-12">
                        <img :src="accept" alt="" class="border-bottom">
                    </div>
                    <div class="col-12">
                        <h2 class="font-weight-bold mt-3" style="color:#e20513;">Siamo spiacenti!</h2>

                    </div>
                    <div class="col-12">
                        <h5 class="mb-3 text-uppercase">
                        Il tuo messaggio non può essere inviato riprova</h5>
                    </div> 
                    <div class="col-12">
                        <h5>Se avete qualche domanda potete contattarci al numero</h5>
                        <h2 class="mt-0">339-7299634</h2>
                    </div>                               
                      
                  </div>
              </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer border-0">
              <img src="images/home/logo_footer.svg" alt="" class="img-fluid">
            </div>
            
          </div>
        </div>
    </div>
        <template class="" v-if="domicilo">
        <delivery/>
        </template>

        <template class="" v-if="tienda">
        <personal-retreat/>
        </template>
        <footer_index/>
    </div>

</template>

<style scoped>
.hr-right{
    border: none;
    border-right: 3px solid hsl(0, 0%, 100%);
    height: 100px;
    width: 1px;
}
.modal-content{
    background-color: #232323;

}
.modal-content h5{
    font-size: 1.0rem;
}
.modal-header .close {
    padding: 0rem;
    margin: -1rem -1rem -1rem auto;
    color: white;
    font-size: 38px;
    background-color: #232323;
}
.border-bottom {
    border-bottom: 11px solid #e20513 !important;
}
</style>

<script>
    export default {
        data() {
            return {
                domicilo: false,
                tienda: false,
                img1: '/images/payment/002-motorcycle.svg',
                img2: '/images/payment/casa.png',
                accept: '/images/payment/2.jpg',
                color : '#7c7875',
                color1 : '#7c7875',
            }
        },
        methods: {
            cambiarDomicilio: function() {
                if (this.domicilo===false) {
                    this.domicilo = true;
                    this.img1 = '/images/payment/moto_roja.svg';
                    this.color = '#e20513';
                    this.color1 = '#7c7875';
                    this.img2 = '/images/payment/casa.png';
                    this.tienda = false;
                }
            },
            cambiarTienda: function(){
                if (this.tienda===false) {
                    this.tienda = true;
                    this.img2 = '/images/payment/casa_roja.png';
                    this.color1 = '#e20513';
                    this.color ='#7c7875';
                    this.img1 = '/images/payment/002-motorcycle.svg';
                    this.domicilo = false;
                }
            }
        }
    }
</script>

