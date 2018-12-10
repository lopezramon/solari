<template>
    <div>
        <section id="swipper-esperience-slider">
            <div class="">
                <swiper :options="swiperOption">
                    <!-- slides -->
                    <swiper-slide>
                        <img class="img-fluid" src="/images/home/gallery-slider-map/header-solaria.jpg">
                    </swiper-slide>
                    <swiper-slide>
                        <img class="img-fluid" src="/images/home/gallery-slider-map/header-solaria.jpg">
                    </swiper-slide>
                    <swiper-slide>
                        <img class="img-fluid" src="/images/home/gallery-slider-map/header-solaria.jpg">
                    </swiper-slide>
                    <swiper-slide>
                        <img class="img-fluid" src="/images/home/gallery-slider-map/header-solaria.jpg">
                    </swiper-slide>
                            <div class="swiper-pagination"  slot="pagination"></div>
                    
                    <!-- Optional controls -->
                    <div class="swiper-button-prev" slot="button-prev"></div>
                    <div class="swiper-button-next" slot="button-next"></div>
                </swiper>
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
            slidesPerView: 1,
            spaceBetween: 0,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            autoplay: {
                delay: 5000,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                480: {
                slidesPerView: 1,
                spaceBetween: 0
                },
                768: {
                slidesPerView: 2,
                spaceBetween: 0
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
.swiper-slide{
    margin: 0px !important;
}
    
</style>
