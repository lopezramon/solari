<template>
  <div>
      <section id="swipper-header-slider-principal">
        <swiper :options="swiperOption">
            <!-- slides -->
            <swiper-slide>
                <div class="caption">
                    <figure class="caption-image text-center">
                        <img src="/images/logos/logo2-medium.png" alt="Luxury">
                    </figure>
                    <div class="caption-title">
                        <h2 class="text-center">Luxury Room</h2>
                    </div>
                </div>
            </swiper-slide>
            <swiper-slide>I'm Slide 2</swiper-slide>
            <swiper-slide>I'm Slide 3</swiper-slide>
            <!-- Optional controls -->
            <div class="swiper-pagination"  slot="pagination"></div>
        </swiper>
      </section>
  </div>
</template>
<script>
export default {
    name: 'carrousel',
    data() {
      return {
        swiperOption: {
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
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
    .caption-title h2{
        font-size: 2.8rem;
        color: #fff;
    }
    @media screen and (min-width: 768px){
        .caption-title h2{
            font-size: 4.2rem;
            color: #fff;
        }   
    }
</style>

