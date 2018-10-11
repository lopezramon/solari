<template>
    <div>
         <!-- swiper1 -->
          <swiper :options="swiperOptionTop" class="gallery-top" ref="swiperTop">
              <swiper-slide :class="'slide-'+clave+1" v-for="(item, clave) in gallery" :key="clave">
                  <img class="img-fluid" :src="item.image" alt="">
              </swiper-slide>
              <div class="swiper-button-next swiper-button-white" slot="button-next"></div>
              <div class="swiper-button-prev swiper-button-white" slot="button-prev"></div>
          </swiper>
          <!-- swiper2 Thumbs -->
          <swiper :options="swiperOptionThumbs" class="gallery-thumbs" ref="swiperThumbs">
              <swiper-slide :class="'slide-'+clave+1" v-for="(item, clave) in gallery" :key="clave">
                  <img class="img-fluid" :src="item.image" alt="">
              </swiper-slide>
          </swiper>
    </div>
</template>
<script>
export default {
    props: ['gallery'],
    data() {
      return {
        swiperOptionTop: {
          spaceBetween: 10,
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
          }
        },
        swiperOptionThumbs: {
          spaceBetween: 10,
          slidesPerView: 'auto',
          centeredSlides: true,
          touchRatio: 0.2,
          loop: true,
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
    -webkit-filter: sepia(1); /* Safari 6.0 - 9.0 */
    filter: sepia(1);
  }
  .gallery-thumbs .swiper-slide-active {
    -webkit-filter: sepia(0); /* Safari 6.0 - 9.0 */
    filter: sepia(0);
  }

  
</style>