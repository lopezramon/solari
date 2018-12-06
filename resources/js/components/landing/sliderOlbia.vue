<template>
  <div>
      <section id="swipper-olbia-slider" class="py-md-5">
          <div class="container">
              <div class="row">
                  <div class="col-12 p-0">
                    <swiper :options="swiperOption">
                        <!-- slides -->
                        <swiper-slide>
								<div class="content-text-slider">
									<div class="container">
										<div class="row h-100 justify-content-center align-items-end align-items-lg-center">
					      				<div class="col-12 col-lg-10 mt-2">
											  <h2 class="caption-title content-middle-3 text-uppercase mb-3">Spiagge</h2>
								      			<p class="caption-description text-left content-middle-2 d-none d-lg-block">
												  Budoni e San Teodoro sono certamente un punto di arrivo per il viaggiatore, ma 
                                                  rappresentano anche un ottimo punto di partenza per la scoperta degli angoli nascosti e 
                                                  delle spiagge tra le più suggestive della Sardegna.
												  
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
											  <h2 class="caption-title content-middle-3 text-uppercase mb-3">Escursioni</h2>
								      			<p class="caption-description text-left content-middle-2 d-none d-lg-block">
													Avrai a disposizione tantissime escursioni con i migliori professionisti del settore: 
                                                    dalle gite in barca ai tour archeologici, dai percorsi in quad, bici e fuoristrada 
                                                    ai trekking, dalle attività più rilassanti a quelle più adrenaliniche, troverai quello 
                                                    che desideri. Prenotare è semplice ed immediato e puoi fare tutto online attraverso il 
                                                    calendario delle escursioni dove troverai sempre le disponibilità aggiornate.
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
											  <h2 class="caption-title content-middle-3 text-uppercase mb-3">Sport</h2>
								      			<p class="caption-description text-left content-middle-2 d-none d-lg-block">
												  I due paesi di Budoni e San Teodoro offrono molte possibilità di praticare sport come immersioni, 
                                                  windsurf, Trekking.equitazione, golf e tennis.

                                                A breve distanza da San Teodoro, circa 10 km a nord,
                                                 sono presenti i campi da golf del Puntaldia golf club che 
                                                 fanno da location a tornei e competizioni amichevoli ma sono anche disponibili, 
                                                 su prenotazione, per allenamenti o partite private.
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
											  <h2 class="caption-title content-middle-3 text-uppercase mb-3">Nightlife</h2>
								      			<p class="caption-description text-left content-middle-2 d-none d-lg-block">
												  Le serate dell’estate Sarda offrono la risposta a tutte le esigenze. Se dopo una lunga giornata di mare vuoi mangiar fuori, 
                                                  prendere un aperitivo o passeggiare tra locali e bancarelle sia il centro di Budoni che quello di San Teodoro possono fare al caso tuo.
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
											  <h2 class="caption-title content-middle-3 text-uppercase mb-3">Enogastronomia</h2>
								      			<p class="caption-description text-left content-middle-2 d-none d-lg-block">
												  Come in molte parti della Sardegna, Budoni e San Teodoro offrono la possibilità di un viaggio tra i sapori antichi e moderni della regione. 
                                                  Si spazia dai piatti tipici di una cucina di mare a base di pescato fresco servito alla griglia o in piatti elaborati (vedi la zuppa gallurese).
												</p>
											</div>
										</div>
									</div>
								</div>
                        </swiper-slide>
                        <!-- Optional controls -->
                        <!-- <div class="swiper-pagination" slot="pagination"></div> -->
                        <div class="swiper-navigation">
                            <div class="swiper-button-prev" slot="button-prev"></div>
                            <div class="swiper-button-next" slot="button-next"></div>
                        </div>
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
             navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 5000,
            },

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

