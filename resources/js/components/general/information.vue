<template>
    <div>
        
        <section class="">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-3 my-3">
                        <div class="rounded text-center flex-fill mb-1 mb-md-3">
                            <img width="105" src="/images/iconos/team.svg" alt="team"  class="rounded icon-contact">    
                        </div>
                        <div class="text-center flex-fill">
                            <h5 class="text-separation">INCONTRIAMOCI</h5>
                            <div><a href="#">SOLARIA VACANZE S.r.l.<br>Via Giovanni XXIII</a></div>
                        </div>

                    </div>

                    <div class="col-md-3 my-3">
                        <div class="text-center rounded flex-fill mb-1 mb-md-3">
                            <img width="105" src="/images/iconos/smartphone.svg" alt="phone"  class="rounded icon-contact">
                            
                        </div>
                        <div class="text-center flex-fill">
                            <h5 class="text-separation">PHONE</h5>
                            <div><a href="tel:+393408831917">+39 3408831917</a></div>

                        </div>
                    </div>

                    <div class="col-md-3 my-3">
                        <div class="rounded text-center flex-fill mb-1 mb-md-3" >
                            <img width="105" src="/images/iconos/email.svg" alt="email" class="rounded icon-contact">
                            
                        </div>
                        <div class="text-center">
                            <h5 class="text-separation">EMAIL</h5>
                            <div>
                                <a href="mailto:booking@solariavacanze.com">booking@solariavacanze.com</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 my-3">
                        <div class="text-center flex-fill mb-1 mb-md-3">
                            <img width="105" src="/images/iconos/follow.svg" alt="follow" class="rounded icon-contact">
                            
                        </div>
                        <div class="text-center flex-fill">
                            <h5 class="text-separation">FOLLOW US</h5>
                            <div><a href="https://www.facebook.com/SolariaVacanze/" target="_blank">SolariaVacanze</a>
                            <br>
                            <a href="https://www.instagram.com/solaria_vacanze" target="_blank">solaria_vacanze</a>
                            </div>
                        </div>
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
        background-image: url("/images/solaria-vacanze-affitto-ville-appartamenti-sardegna-budoni-san-teodoro.jpg");
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
        padding: 20px 20px 20px 20px
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
