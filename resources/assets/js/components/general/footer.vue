<template>
    <div>
        <footer class="bg-white">
	
                <div class="py-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img class="img-fluid" src="/images/logos/solaria-logo.png" alt="Solaria Vacanza">
                            </div>
                            <div class="hr my-3"></div>
                        </div>
                        <div class="row">                            
                            <div class="col-12 col-md-4 my-2">
                                <h4 class="text-uppercase font-weight-bold">Solaria Vacanza</h4>
                                <p class="lead">
                                    Via Giovanni XXIII, 7 – 08020 BUDONI (OT)
                                    <a class="d-block" href="tel:+393408831917">+39 3408831917</a>
                                    <a class="d-block" href="mailto:booking@solariavacanze.com">booking@solariavacanze.com</a>
                                </p>
                                <p class="">
                                    <a href="#" class="d-inline-block m-1">
                                        <img src="/images/iconos/instagram.svg" alt="instagram" width="28">
                                    </a>
                                    <a href="#" class="d-inline-block m-1">
                                        <img src="/images/iconos/whatsapp.svg" alt="whatsapp" width="28">
                                    </a>
                                    <a href="#" class="d-inline-block m-1">
                                        <img src="/images/iconos/tripadvisor.svg" alt="tripadvisor" width="28">
                                    </a>
                                    <a href="#" class="d-inline-block m-1">
                                        <img src="/images/iconos/youtube.svg" alt="youtube" width="28">
                                    </a>

                                </p>
                                
                            </div>
                            <div class="col-12 col-md-2 my-2">
                                <h4 class="text-uppercase font-weight-bold">LINKS</h4>
                                <router-link class="d-block" to="">CHI SIAMO</router-link>
                                <router-link class="d-block" to="">CASE VACANZA</router-link>
                                <router-link class="d-block" to="">SERVIZI</router-link>
                                <router-link class="d-block" to="">EXPERIENZE</router-link>
                                <router-link class="d-block" to="">CONTATTI</router-link>
                            </div>
                            
                            <div class="col-12 col-md-3 my-2">
                                <h4 class="text-uppercase font-weight-bold">CASE VACANZE</h4>
                                <router-link class="d-block" to="">VILLETA STELLA MARIS</router-link>
                                <router-link class="d-block" to="">RESIDENCE SOLARIA</router-link>
                                <router-link class="d-block" to="">VILLA LUDDUI</router-link>
                                <router-link class="d-block" to="">VILLETA BOUNGAVILLE</router-link>
                                <router-link class="d-block" to="">RESIDENCE BUDONI CENTRO</router-link>
                            </div>
                            <div class="col-12 col-md-3 my-2">
                                <h4 class="text-uppercase font-weight-bold">Tags</h4>
                                        <strong><a href="#" class="badge badge-dark tags badge-font">Budoni</a></strong>
                                        <strong><a href="#" class="badge badge-dark tags badge-font">Spiagge</a></strong>
                                        <strong><a href="#" class="badge badge-dark tags badge-font">Sport</a></strong>
                                        <strong><a href="#" class="badge badge-dark tags badge-font">Escursioni</a></strong>
                                        <strong><a href="#" class="badge badge-dark tags badge-font">Luddui</a></strong>
                                        <strong><a href="#" class="badge badge-dark tags badge-font">Archeologia</a></strong>
                                        <strong><a href="#" class="badge badge-dark tags badge-font">San Teodoro</a></strong>
                                        <strong><a href="#" class="badge badge-dark tags badge-font">Case Vacanza</a></strong>
                            </div>
                        </div>
                    </div>
                </div>
        </footer>
    
        <jumperr/>
    </div>
</template>
<style scoped>
.hr{
    height: 2px;
    width: 100%;
    background-color: rgba(226, 212, 23, 0.911);
}
a,a:hover,a:link,a:visited,a:focus{
    color: #212529;
    text-decoration: none;
    line-height: 1.8;
}

.title{
    font-weight: bold;
    color: #d7392c;
}
.badge-dark {
    color: #fff !important;
    background-color: #00000047 !important;
}
.size {
		width: 25%;
		height: auto;
}
.size-other {
		width: 10%;
		height: auto;
}
.size-other-2 {
    width: 7%;
    height: auto;
}
.badge {
    padding: 0.25em 0.4em;
    font-size: 1rem;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0rem;
    margin: 4px;
}
</style>
