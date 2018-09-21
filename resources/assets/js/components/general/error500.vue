<template>
    <div>
        <section class="bg-contact">
           
            <div class="container-fluid">
                <div class="row justify-content-center">
                  <div class="rounded bg-form-contact ">
                                       
                               <div class="py-4"></div>
                               <div class="text-center "><h1 class="grazie">ERROR</h1></div>
                               <div class="text-center "><h1 class="error">500</h1></div>
                               <div class="text-center "><img class="img-fluid m-auto" src="/images/iconos/senal.svg" alt="" width="200"></div>
                               <div class="text-center py-4"><h1>ERROR INTERNO</h1></div>
                               <div class="py-4"></div>
                            
                    </div>
                </div>
            </div> 
        </section>
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

.grazie {
    font-size: 4rem;
    letter-spacing: 0.4rem;
}
.error {
    font-size: 9rem;
    letter-spacing: 0.4rem;
}

</style>
