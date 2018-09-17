<script>
export default {
    data() {
      return {
        swiperOptionTop: {
          spaceBetween: 10,
          loop: true,
          loopedSlides: 5, //looped slides should be the same
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
          }
        },
        swiperOptionThumbs: {
          spaceBetween: 10,
          slidesPerView: 4,
          touchRatio: 0.2,
          loop: true,
          loopedSlides: 5, //looped slides should be the same
          slideToClickedSlide: true,
        }
      }
    },
    mounted() {
      this.$nextTick(() => {
        const swiperTop = this.$refs.swiperTop.swiper
        const swiperThumbs = this.$refs.swiperThumbs.swiper
        swiperTop.controller.control = swiperThumbs
        swiperThumbs.controller.control = swiperTop
      })
    }
}
</script>

<template>
    <div>
        <div class="container">
            <div class="row py-3">
                <div class="col-lg-9">
                    <div>
                        <!-- swiper1 -->
                        <swiper :options="swiperOptionTop" class="gallery-top" ref="swiperTop">
                            <swiper-slide class="slide-1">
                                <img class="img-fluid" src="/images/home/gallery-slider-map/21.jpg" alt="">
                            </swiper-slide>
                            <swiper-slide class="slide-2">
                                <img class="img-fluid" src="/images/home/gallery-slider-map/18.jpg" alt="">
                            </swiper-slide>
                            <swiper-slide class="slide-3">
                                <img class="img-fluid" src="/images/home/gallery-slider-map/22.jpeg" alt="">
                            </swiper-slide>
                            <swiper-slide class="slide-4">
                                <img class="img-fluid" src="/images/home/gallery-slider-map/23.jpeg" alt="">
                            </swiper-slide>
                            <div class="swiper-button-next swiper-button-white" slot="button-next"></div>
                            <div class="swiper-button-prev swiper-button-white" slot="button-prev"></div>
                        </swiper>
                        <!-- swiper2 Thumbs -->
                        <swiper :options="swiperOptionThumbs" class="gallery-thumbs" ref="swiperThumbs">
                            <swiper-slide class="slide-1">
                                <img class="img-fluid" src="/images/home/gallery-slider-map/21.jpg" alt="">
                            </swiper-slide>
                            <swiper-slide class="slide-2">
                                <img class="img-fluid" src="/images/home/gallery-slider-map/18.jpg" alt="">
                            </swiper-slide>
                            <swiper-slide class="slide-3">
                                <img class="img-fluid" src="/images/home/gallery-slider-map/22.jpeg" alt="">
                            </swiper-slide>
                            <swiper-slide class="slide-3">
                                <img class="img-fluid" src="/images/home/gallery-slider-map/23.jpeg" alt="">
                            </swiper-slide>
                        </swiper>
                    </div>
                </div>
                <div class="col-lg-3">
                    <infoSuites/>        
                </div>
            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped>
  .swiper-container {
    background-color: transparent;
  }
  
  .gallery-top {
    height: auto;
    width: 100%;
  }
  .gallery-thumbs {
    height: 20%!important;
    box-sizing: border-box;
    padding: 10px 0;
  }
  .gallery-thumbs .swiper-slide {
    width: 25%;
    height: 100px;
    -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
    filter: grayscale(100%);
  }
  .gallery-thumbs .swiper-slide-active {
    -webkit-filter: grayscale(0%); /* Safari 6.0 - 9.0 */
    filter: grayscale(0%);
  }

  
</style>