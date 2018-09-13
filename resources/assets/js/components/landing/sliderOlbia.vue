<template>
  <div>
      <section id="swipper-olbia-slider" class="py-3 py-md-5">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                    <swiper :options="swiperOption">
                        <!-- slides -->
                        <swiper-slide>
								<div class="content-text-slider">
									<div class="container">
										<div class="row h-100 justify-content-center align-items-end align-items-lg-center">
					      				<div class="col-12 col-lg-10 mt-2">
											  <h2 class="caption-title content-middle-3 text-uppercase mb-3">Tavolara con sus picinas naturales</h2>
								      			<p class="caption-description text-left content-middle-2 d-none d-lg-block">
												  La isla de Tavolara es uno de los mejores lugares para avistar delfines en Cerdeña. 
                                                  El área marina que protege fauna y flora permite que numerosas especies en vías de extinción 
                                                  tengan aquí un oasis de protección.
												  
												</p>
											</div>
										</div>
									</div>
								</div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="content-text-slider">
									<div class="container">
										<div class="row h-100 justify-content-center align-items-end align-items-lg-center">
					      				<div class="col-12 col-lg-10 mt-2">
											  <h2 class="caption-title content-middle-3 text-uppercase mb-3">Caprera</h2>
								      			<p class="caption-description text-left content-middle-2 d-none d-lg-block">
													La isla de Caprera forma parte del archipiélago de la Maddalena, en la costa noroccidental de Cerdeña. 
                                                    Se trata de una porción de tierra con apenas altura, con 
                                                    vegetación de macchia mediterránea y con playas de arena blanca en sus 34 km de costa.											  
												</p>
											</div>
										</div>
									</div>
								</div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="content-text-slider">
									<div class="container">
										<div class="row h-100 justify-content-center align-items-end align-items-lg-center">
					      				<div class="col-12 col-lg-10 mt-2">
											  <h2 class="caption-title content-middle-3 text-uppercase mb-3">La Maddalena</h2>
								      			<p class="caption-description text-left content-middle-2 d-none d-lg-block">
												  La Maddalena, la ciudad más grande en la isla más grande del 
                                                  archipiélago de Maddalena, es reconocida por sus hermosas playas y 
                                                  parque nacional. Alquila un barco privado para explorar las islas 
                                                  aledañas deshabitadas o simplemente relájate en las arenas café au 
                                                  lait de la Playa Spalmatore.
												</p>
											</div>
										</div>
									</div>
								</div>
                        </swiper-slide>
                        <!-- Optional controls -->
                        <!-- <div class="swiper-pagination" slot="pagination"></div> -->
                    </swiper>
                        <div class="swiper-navigation">
                            <div class="swiper-button-prev" slot="button-prev"></div>
                            <div class="swiper-button-next" slot="button-next"></div>
                        </div>
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
    #swipper-olbia-slider{
        background-color: rgb(228, 228, 228);
    }
    .caption-title{
        font-size: 1.2rem;
    }
    .caption-title, .caption-description{
        color: #fff;
    }
    .caption-description{
        font-size: 1.1rem;
        font-weight: 300;
        letter-spacing: 1px;
        line-height: 1.3;
    }
    @media screen and (min-width: 768px){
        .caption-title{
            font-size: 2rem;
        }      
    }
</style>

