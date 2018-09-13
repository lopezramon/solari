<template>
    <div>
        <section id="swipper-esperience-slider">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <img src="/images/logos/logo_luxury_pequeño.png">
                        <h1 class="text-white text-uppercase">NELLE NOSTRE ESPERIENZE</h1>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="">
                    <swiper :options="swiperOption">
                        <!-- slides -->
                        <swiper-slide>
                                    <div class="imagen-slider">
                                        <img class="img-fluid" src="/images/home/esperience-slider/caprera.jpg">
                                        <div class="content-slider-image text-center">
                                            <div class="content-middle-slider">
                                                <div class="text-white"> 
                                                    Disfruta de nuestros barcos.<br> Ideal para parejas y pequeños grupos. <br> Ubicado en Cerdeña, un entorno excpecional <p></p>
                                                </div>
                                                <a href="#" class="myButton">Llamar</a> <a href="#" class="myButton">e-mail</a><p></p>
                                                <div class="text-white">
                                                    0789/1710013 <br> 3471757188
                                                </div>	
                                            </div>	
                                        </div>
                                    </div>
                                    <div class="text-white block-dark">
                                        CHARTER IN BARCA
                                    </div>
                        </swiper-slide>
                        <swiper-slide>
                                <div class="imagen-slider">
                                    <img class="img-fluid" src="/images/home/esperience-slider/carta-e-gommoni.jpg">
                                    <div class="content-slider-image text-center">
                                        <div class="content-middle-slider">
                                            <div class="text-white"> 
                                                Disfruta de nuestros barcos.<br> Ideal para parejas y pequeños grupos. <br> Ubicado en Cerdeña, un entorno excpecional <p></p>
                                            </div>
                                            <a href="#" class="myButton">Llamar</a> <a href="#" class="myButton">e-mail</a><p></p>
                                            <div class="text-white">
                                                0789/1710013 <br> 3471757188
                                            </div>	
                                        </div>	
                                    </div>
                                </div>
                                <div class="text-white block-ligth">CARTA E GOMMONI
                                </div>
                        </swiper-slide>
                        <swiper-slide>
                                    <div class="imagen-slider">
                                        <img class="img-fluid" src="/images/home/esperience-slider/charterinbarca.jpg">
                                        <div class="content-slider-image text-center">
                                            <div class="content-middle-slider">
                                                <div class="text-white"> 
                                                    Disfruta de nuestros barcos.<br> Ideal para parejas y pequeños grupos. <br> Ubicado en Cerdeña, un entorno excpecional <p></p>
                                                </div>
                                                <a href="#" class="myButton">Llamar</a> <a href="#" class="myButton">e-mail</a><p></p>
                                                <div class="text-white">
                                                    0789/1710013 <br> 3471757188
                                                </div>	
                                            </div>	
                                        </div>
                                    </div>
                                    <div class="text-white block-dark">TREKKING
                                    </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="imagen-slider">
                                <img class="img-fluid" src="/images/home/esperience-slider/magdalena.jpg">
                                <div class="content-slider-image text-center">
                                    <div class="content-middle-slider">
                                        <div class="text-white"> 
                                            Disfruta de nuestros barcos.<br> Ideal para parejas y pequeños grupos. <br> Ubicado en Cerdeña, un entorno excpecional <p></p>
                                        </div>
                                        <a href="#" class="myButton">Llamar</a> <a href="#" class="myButton">e-mail</a><p></p>
                                        <div class="text-white">
                                            0789/1710013 <br> 3471757188
                                        </div>	
                                    </div>	
                                </div>
                            </div>
                            <div class="text-white block-ligth">VISITE GUIDATE
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                                <div class="imagen-slider">
                                    <img class="img-fluid" src="/images/home/esperience-slider/trekking.jpg">
                                    <div class="content-slider-image text-center">
                                        <div class="content-middle-slider">
                                            <div class="text-white"> 
                                                Disfruta de nuestros barcos.<br> Ideal para parejas y pequeños grupos. <br> Ubicado en Cerdeña, un entorno excpecional <p></p>
                                            </div>
                                            <a href="#" class="myButton">Llamar</a> <a href="#" class="myButton">e-mail</a><p></p>
                                            <div class="text-white">
                                                0789/1710013 <br> 3471757188
                                            </div>	
                                        </div>	
                                    </div>
                                </div>
                                <div class="text-white block-dark">CAPRERA
                                </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="imagen-slider">
                                <img class="img-fluid" src="/images/home/esperience-slider/visite-guidate.jpg">
                                <div class="content-slider-image text-center">
                                    <div class="content-middle-slider">
                                        <div class="text-white"> 
                                            Disfruta de nuestros barcos.<br> Ideal para parejas y pequeños grupos. <br> Ubicado en Cerdeña, un entorno excpecional <p></p>
                                        </div>
                                        <a href="#" class="myButton">Llamar</a> <a href="#" class="myButton">e-mail</a><p></p>
                                        <div class="text-white">
                                            0789/1710013 <br> 3471757188
                                        </div>	
                                    </div>	
                                </div>
                            </div>
                            <div class="text-white block-ligth">MAGDALENA
                            </div>
                        </swiper-slide>
                        <!-- Optional controls -->
                        <div class="swiper-button-prev" slot="button-prev"></div>
                        <div class="swiper-button-next" slot="button-next"></div>
                    </swiper>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
export default {
    name: 'carrousel',
    data() {
      return {
        swiperOption: {
            slidesPerView: 3,
            spaceBetween: 0,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            breakpoints: {
                // when window width is <= 320px
                480: {
                slidesPerView: 1,
                spaceBetween: 10
                },
                // when window width is <= 480px
                768: {
                slidesPerView: 1,
                spaceBetween: 20
                },
                // when window width is <= 640px
                992: {
                slidesPerView: 2,
                spaceBetween: 30
                }
            }

        }
      }
    },
    computed: {
      
    },
    mounted() {
      
    }
  }
</script>
<style scoped>
#swipper-esperience-slider{
    background-color: #333;
}
.imagen-slider{
	position: relative;
	overflow: hidden;
	
}
.imagen-slider > img{
	width: 100%;
	height: auto;
}
.content-slider-image {
	position: absolute;
	top:-200%;
	left: 0;
	width: 100%;
	height: auto;
	background-color: rgba(0,0,0,0.7);
	transition:all 1s ease;
	-moz-transition: all 1s ease;
}
.imagen-slider:hover .content-slider-image{
	top:  0px;
	height: 100%;
}

.content-middle-slider {
  top: 100%;
  left: 15%;
  -webkit-transform: translate(0%, 50%);
  -ms-transform: translate(0%, 50%);
  transform: translate(0%, 50%);
  text-align: center;
}
.block-dark, .block-ligth{
    width: 100%;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.block-dark {
    background-color: #585858;
}
.block-ligth {
    background-color: #848484;
}
    .swiper-button-prev, 
    .swiper-container-rtl .swiper-button-next{
        background-image:url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M0%2C22L22%2C0l2.1%2C2.1L4.2%2C22l19.9%2C19.9L22%2C44L0%2C22L0%2C22L0%2C22z'%20fill%3D'%23fff'%2F%3E%3C%2Fsvg%3E");
        left: 30px;
    }
    .swiper-button-next, 
    .swiper-container-rtl .swiper-button-prev{
        background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M27%2C22L27%2C22L5%2C44l-2.1-2.1L22.8%2C22L2.9%2C2.1L5%2C0L27%2C22L27%2C22z'%20fill%3D'%23fff'%2F%3E%3C%2Fsvg%3E");
        right: 30px;
    }
@media screen and (min-width: 768px){
    .swiper-slide{
        margin: 0px !important;
    }
 
}   
</style>
