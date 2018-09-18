<template>
    <div>
        <section class="bg-contact">
            <div class="container-fluid">
                <div class="row justify-content-center">
                  <div class="rounded bg-form-contact ">
                      <div class="py-2"></div>
                     <h2 class="text-center text-separation py-4">ASSITENZA PASSWORD</h2>
                        <form>
                            <div class="text-pwd text-center">find you<img src="/images/logos/logo_luxury_pequeño_black.png" alt="logo luxury" width="30">LUXURY ROOM account</div>
                            <div class="py-2"></div>
                            <div class="form-group">
                                    <label for="email">ENTER YOUR EMAIL ADDRESS</label>
                                    <input type="email" class="form-control" id="email">
                            </div>
                                <div class="row text-center py-4">
                                    <div class="col-12 py-2">
                                        <button type="submit" class="btn btn-primary text-bold"><span class="text-btn-white">CONTINUA</span></button>
                                    </div>
                                </div>
                        </form>  
                    </div>
                </div>
            </div> 
                        <div class="container-fluid response">
                <div class="row justify-content-center">
                  <div class="rounded bg-form-contact ">
                                       
                               
                               <div class="text-center text-separation"><h2>ASSITENZA PASSWORD</h2></div>
                               <div class="text-center py-4"><img class="img-fluid m-auto" src="/images/iconos/check-circle.svg" alt=""></div>
                               <div class="text-center">We sent you recovery link to <br> <strong>andrea.ramos@gmail.com</strong> successfully</div>
                               <div class="py-4"></div>
                            
                    </div>
                </div>
            </div> 

        </section>
        <section>
            <div class="container py-4 hide-movil">
                <div class="row">
                <div class="col-lg-2 d-flex" ></div>
                <div class="col-lg-2 d-flex" >
                    <div class="rounded text-center flex-fill">
                        <img width="100" src="/images/home/services-slider/neveta.png" alt="neveta"  class="rounded icon-contact">    
                    </div>
                   
                </div>
                
                <div class="col-lg-2 d-flex">
                    <div class="text-center rounded flex-fill">
                        <img width="100" src="/images/home/services-slider/neveta.png" alt="neveta"  class="rounded icon-contact">
                        
                    </div>
                </div>
                
                <div class="col-lg-2 d-flex">
                    <div class="rounded text-center flex-fill" >
                        <img width="100" src="/images/home/services-slider/neveta.png" alt="neveta" class="rounded icon-contact">
                        
                    </div>
                </div>

                <div class="col-lg-2 d-flex">
                    <div class="text-center flex-fill" style="">
                        <img width="100" src="/images/home/services-slider/nolegio.png" alt="nolegio" class="rounded icon-contact">
                        
                    </div>
                </div>
                <div class="col-lg-2 d-flex" ></div>
                </div>
            </div> 
        </section>
                <section>
            <div class="container show-movil">
                <div class="row">
                <div class="col-lg-2 d-flex" ></div>
                <div class="col-lg-2 d-flex" >
                    <div class="text-center flex-fill">
                     <h5 class="text-separation">MEET US</h5>
                     <div>Double A Luxury Room<br>Olbia, Sardegna</div>   
                    </div>
                   
                </div>
                
                <div class="col-lg-2 d-flex">
                    <div class="text-center flex-fill">
                        <h5 class="text-separation">PHONE</h5>
                        <div>0789-1710013<br>0347-1757188 </div>   
                        
                    </div>
                </div>
                
                <div class="col-lg-2">
                    <div class="text-center">
                        <h5 class="text-separation">EMAIL</h5>
                        <div>luxuryroomolbia@gmail.com</div> 
                    </div>
                </div>

                <div class="col-lg-2 d-flex">
                    <div class="text-center flex-fill">
                        <h5 class="text-separation">FOLLOW US</h5>
                        <div><!--<img src="/images/iconos/facebook-01.svg" alt="logo luxury" width="30" >-->aaluxuryroom<br>aaluxuryroom</div>
                    </div>
                </div>
                <div class="col-lg-2 d-flex"></div>
                </div>
            </div> 
            
        </section>
        <section class="py-4"></section>
    </div>
</template>

<style scoped>

.bg-contact {
    widows: 100%;
    min-height: 620px;
    padding-top: 200px;
    padding-bottom: 100px;
    background-image: url("/images/home/gallery-slider-map/23.jpeg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
.bg-form-contact {
background-color: white;
width: 50%;
height: auto;
padding: 0% 5%;


}
.text-separation {
    letter-spacing: 0.2rem
}
.icon-contact {
border: 1px solid #8a8a8a;
padding:20px 20px 20px 20px
}
.text-btn-white {
    font-size: 0.8rem;
    font-weight: bold;

}
.btn-primary-new {
    background-color: #373737;
    border-color: #373737;
    color: #FFF;
}

@media (max-width: 600px) {
  .bg-form-contact {
    width: 90%;
    height: auto;
    padding: 0% 5%;
  }
    .hide-movil {
   display: none;
  }
    .show-movil {
      padding: 5%;
  }
  .text-separation {
    letter-spacing: 0.2rem;
    padding-top: 10%;
  }
}

@media (max-width: 800px) {
    .hide-movil {
   display: none;
  }
  .show-movil {
      padding: 10%;
     
  }
    .text-separation {
    letter-spacing: 0.2rem;
    padding-top: 10%;
    
  }
}

.form-control {
     outline: none;
     border-bottom: 1px solid #373737;
     border-top: 0;
     border-left: 0;
     border-right: 0;
     border-radius: 0;
    
}
.form-control:focus {
    box-shadow:none;
    border-bottom: 1px solid #373737;
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-radius: 0;
}

.text-pwd {
    font-size:0.8rem;
}
.response {
    display: none;
}

</style>
