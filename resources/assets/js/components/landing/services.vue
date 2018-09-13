<template>
    <div>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <img src="/images/logos/logo_luxury_pequeño_black.png">
                        <h1>SERVIZI</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <swiper :options="swiperOption">
                            <!-- slides -->
                            <swiper-slide>
                                <div class="rounded text-center flex-fill border">
                                        <img width="120" src="/images/home/services-slider/nolegio.png" alt="nolegio">
                                        <p>Alquiler de autos, motocicletas,<br> bicicletas, botes</p>
                                </div>
                            </swiper-slide>
                            <swiper-slide>
                                <div class="rounded text-center flex-fill border">
                                        <img width="120" src="/images/home/services-slider/neveta.png" alt="neveta">
                                        <p>Alquiler de autos, motocicletas,<br> bicicletas, botes</p>
                                </div>
                            </swiper-slide>
                            <swiper-slide>
                                <div class="rounded text-center flex-fill border">
                                        <img width="120" src="/images/home/services-slider/spa.png" alt="spa">
                                        <p>Alquiler de autos, motocicletas,<br> bicicletas, botes</p>
                                </div>
                            </swiper-slide>
                            <swiper-slide>
                                <div class="rounded text-center flex-fill border">
                                        <img width="120" src="/images/home/services-slider/scursioni.png" alt="scursioni">
                                        <p>Alquiler de autos, motocicletas,<br> bicicletas, botes</p>
                                </div>
                            </swiper-slide>
                            <!-- Optional controls -->
                            <div class="swiper-pagination"  slot="pagination"></div>
                        </swiper>
                    </div>
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
            slidesPerView: 4,
            spaceBetween: 40,
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
                slidesPerView: 2,
                spaceBetween: 20
                },
                // when window width is <= 640px
                992: {
                slidesPerView: 3,
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
.border{
    border: 1px solid #8a8a8a;
}
</style>
