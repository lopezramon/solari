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
                    <div class="info">
                        <h3 class="text-uppercase">Suite (2)</h3>
                        <p><strong>€200</strong></p>
                        <p>
                            Camera matrimoniale climatizzata
                            con minibar e pavimento piastrellato / in marmo.
                        </p>
                    </div>
                    <div class="reserva py-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="text-center">Reservation</h3>
                                </div>
                                <div class="col-12">
                                    <form>
                                        <div class="form-group">
                                            <label for="in">Check-in</label>
                                            <input name="in" type="text" class="form-control" placeholder="19/08/2019">
                                        </div>
                                        <div class="form-group">
                                            <label for="out">Check-out</label>
                                            <input name="out" type="text" class="form-control" placeholder="20/08/2019">
                                        </div>
                                        <div class="form-group">
                                            <label for="adulti">Adulti</label>
                                            <select name="adulti" class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="bambino">Bambino</label>
                                            <select name="bambino" class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="button" class="btn btn-primary text-uppercase">
                                                Cerca
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped>
  .swiper-container {
    background-color: #fff;
  }
  
  .gallery-top {
    height: 400px!important;
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
    opacity: 0.7;
  }
  .gallery-thumbs .swiper-slide-active {
    opacity: 1;
  }

  /*form*/
  .form-control {
    display: block;
    width: 100%;
    height: calc(2.19rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 0.9rem;
    line-height: 1.6;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0rem;
  }
  .reserva{
      border: 1px solid #ccc;
  }
</style>