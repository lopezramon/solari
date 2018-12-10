<template>
    <div>
        <section>
            <div id="servizi"></div>
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="mb-3">SERVIZI</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <swiper :options="swiperOption">
                            <!-- slides -->
                            <swiper-slide>
                                <div class="rounded text-center flex-fill border py-3">
                                        <img width="100" src="/images/iconos/services/043-wifi.svg" alt="nolegio">
                                </div>
                                        <p class="text-center">Wifi</p>
                            </swiper-slide>
                            <swiper-slide>
                                <div class="rounded text-center flex-fill border py-3">
                                        <img width="100" src="/images/iconos/services/044-swimming-pool.svg" alt="neveta">
                                </div>
                                        <p class="text-center">Minipiscina</p>
                            </swiper-slide>
                            <swiper-slide>
                                <div class="rounded text-center flex-fill border py-3">
                                        <img width="100" src="/images/iconos/services/monitor.svg" alt="spa">
                                </div>
                                        <p class="text-center">Tv Satelital</p>
                            </swiper-slide>
                            <swiper-slide>
                                <div class="rounded text-center flex-fill border py-3">
                                        <img width="100" src="/images/iconos/services/019-deck.svg" alt="scursioni">
                                </div>
                                        <p class="text-center">Solarium</p>
                            </swiper-slide>
                            <swiper-slide>
                                <div class="rounded text-center flex-fill border py-3">
                                        <img width="100" src="/images/iconos/services/120-washing-machine.svg" alt="scursioni">
                                </div>
                                        <p class="text-center">Lavatrice</p>
                            </swiper-slide>
                            <swiper-slide>
                                <div class="rounded text-center flex-fill border py-3">
                                        <img width="100" src="/images/iconos/services/045-air-conditioner.svg" alt="scursioni">
                                </div>
                                        <p class="text-center">Aria condizionata</p>
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
            slidesPerView: 6,
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
                slidesPerView: 4,
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
    border: 3px solid #21b186 !important;
    border-radius: 20px !important;
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
