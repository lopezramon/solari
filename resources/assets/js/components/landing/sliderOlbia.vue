<template>
  <div>
      <section id="swipper-olbia-slider">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                    <swiper :options="swiperOption">
                        <!-- slides -->
                        <swiper-slide>
                            <img src="images/slider-olbia-one.jpg">
								<div class="content-text-slider">
									<div class="container">
										<div class="row align-content-center">
					      				<div class="col-12 mt-2">
											  <h2 class="text-center content-middle-3 text-uppercase">Tavolara con sus picinas naturales</h2>
								      			<p class="text-left content-middle-2 d-none d-lg-block">
												  La isla de Tavolara es uno de los mejores lugares para avistar delfines en Cerdeña. El área marina que protege fauna y flora permite que numerosas especies en vías de extinción tengan aquí un oasis de protección.
												  
												</p>
											</div>
										</div>
									</div>
								</div>
                        </swiper-slide>
                        <swiper-slide>I'm Slide 2</swiper-slide>
                        <swiper-slide>I'm Slide 3</swiper-slide>
                        <!-- Optional controls -->
                        <div class="swiper-pagination" slot="pagination"></div>
                        <div class="swiper-button-prev" slot="button-prev"></div>
                        <div class="swiper-button-next" slot="button-next"></div>
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
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
             navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
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

