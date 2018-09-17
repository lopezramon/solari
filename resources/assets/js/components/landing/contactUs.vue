<template>
    <div>
        <section class="bg-contact">
            <div class="container-fluid">
                <div class="row justify-content-center">
                  <div class="rounded bg-form-contact ">
                     

                               <div class="text-center py-4"> got a question?</div>
                               <h2 class="text-center text-separation">CONTATTI</h2>
                               <div class="text-center">Ogni camera e climatizzata, dotata di tende oscuranti, frigo bar, macchina del caffe, tv 40"4K dove e possible box doccia, asciugacapelli e kit</div>
                            <form class="py-4" >
                                <div class="form-group">
                                    <label for="email">YOUR NAME HERE</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="email">EMAIL</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">SUBJECT</label>
                                    <input type="password" class="form-control" id="pwd">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">YOUR MESSAGE</label>
                                    <input type="password" class="form-control" id="pwd">
                                </div>
                                
                                <div class="form-row text-center py-4">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary text-bold"><span class="text-btn-white">INVIARE</span></button>
                                    </div>
                                </div>
                                </form>  
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
                        <div>aaluxuryroom<br>aaluxuryroom</div>
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
    background-image: url("/images/home/header-slider/header-image-1.jpg");
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
    font-size: 1.3rem;
    letter-spacing: 0.2rem;
    font-weight: bold;

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
</style>
