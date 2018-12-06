<template>
    <div>
        <section>
            <div id="servizi"></div>
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <img src="/images/logos/solaria-logo.png" width="120">
                        <h1 class="mt-1">SERVIZI</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <swiper :options="swiperOption">
                            <!-- slides -->
                            <swiper-slide>
                                <div class="rounded text-center flex-fill border">
                                        <img width="150" src="/images/iconos/004-bicycle.svg" alt="nolegio">
                                        <p>Alquiler de autos, motocicletas,<br> bicicletas, botes</p>
                                </div>
                            </swiper-slide>
                            <swiper-slide>
                                <div class="rounded text-center flex-fill border">
                                        <img width="150" src="/images/iconos/005-plane.svg" alt="neveta">
                                        <p>Alquiler de autos, motocicletas,<br> bicicletas, botes</p>
                                </div>
                            </swiper-slide>
                            <swiper-slide>
                                <div class="rounded text-center flex-fill border">
                                        <!--<img width="120" src="/images/home/services-slider/spa.png" alt="spa">-->
                                        <img width="150" src="/images/iconos/003-spa.svg" alt="spa">
                                        <p>Alquiler de autos, motocicletas,<br> bicicletas, botes</p>
                                </div>
                            </swiper-slide>
                            <swiper-slide>
                                <div class="rounded text-center flex-fill border">
                                        <img width="150" src="/images/iconos/006-map.svg" alt="scursioni">
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
            swiperOption: {
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                }
            },
            autoplay: {
                delay: 5000,
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
.swiper-pagination-fraction, .swiper-pagination-custom, .swiper-container-horizontal > .swiper-pagination-bullets {
    bottom: 0;
    left: 0;
    width: 100%;
}
.swiper-pagination {
    position: relative;
    text-align: center;
    -webkit-transition: 300ms opacity;
    -o-transition: 300ms opacity;
    transition: 300ms opacity;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    z-index: 10;
}
.swiper-pagination-bullet {
    width: 8px;
    height: 8px;
    display: inline-block;
    border-radius: 100%;
    background: #9E9E9E !important;
    opacity: 0.9 !important;
}
</style>
