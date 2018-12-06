<template>
    <div>
        <swiper :options="swiperOption">
            <!-- slides -->
            <swiper-slide v-for="(image, i) in gallery" :key="i">
                <img class="img-fluid" :src="image" @click="index = i">
            </swiper-slide>
            <!-- Optional controls -->
            <div class="swiper-pagination"  slot="pagination"></div>
        </swiper>
        <vue-gallery-slideshow :images="gallery" :index="index" @close="index = null"></vue-gallery-slideshow>
    </div>
</template>

<script>
//galeria
import VueGallerySlideshow from 'vue-gallery-slideshow';
export default {
    components: {
        VueGallerySlideshow
    },
    props: ['gallery'],
    data(){
        return {
            swiperOption: {
                slidesPerView: 4,
                spaceBetween: 30,
                swiperOption: {
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    }
                },
                autoplay: {
                    delay: 3000,
                },
                breakpoints: {
                    // when window width is <= 320px
                    480: {
                    slidesPerView: 2,
                    spaceBetween: 20
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

            },
            index: null,
        }
    },
}
</script>