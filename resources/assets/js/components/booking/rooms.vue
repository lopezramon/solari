<template>
    <div>
        <article v-for="room in rooms">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h2 v-text="room.title"></h2>
                        <h3 v-text="room.subtitle"></h3>
                        <p v-text="room.description"></p>
                    </div>
                    <!-- slider -->
                    <div class="col-12 col-lg-8">
                        <swiper :options="swiperOption">
                            <swiper-slide v-for="(slide, index) in room.gallery" :key="index">
                                <img class="img-fluid" :src="slide.image" alt="">
                            </swiper-slide>
                            <div class="swiper-pagination" slot="pagination"></div>
                        </swiper>
                    </div>
                    <!-- info room-->
                    <div class="col-12 col-lg-4">
                        <h4 v-text="room.catacteristica"></h4>
                        <p>
                            <span class="d-block" v-for="service in room.services">
                                <img src="/images/suites/icon/baseline-done-24px.svg" alt="check-list">
                                {{service.name}}
                            </span>
                        </p>
                        <p>
                            From:<br>
                            <strong v-text="room.price"></strong>
                        </p>
                    </div>
                </div>
            </div>
        </article>
    </div>
</template>
<script>
export default {
    data(){
        return {
            swiperOption: {
                pagination: {
                    el: '.swiper-pagination'
                }
            },
            rooms: [
                {
                    title: 'ROOM 101',
                    subtitle: 'Camera Matrimoniale con Balance',
                    description: 'Camera Matrimoniale climatizzata con minibar e pavimento piastrellato/in marmo.',
                    gallery: [
                        {image: '/images/home/gallery-slider-map/21.jpg'},
                        {image: '/images/home/gallery-slider-map/18.jpg'},
                        {image: '/images/home/gallery-slider-map/22.jpeg'},
                        {image: '/images/home/gallery-slider-map/23.jpeg'},
                    ],
                    catacteristica: 'Camera Doppia Di 13 M2',
                    services: [
                        {name: 'terrazzo'},
                        {name: 'Canali pay per view'},
                        {name: 'Armadio / guardaroba'},
                        {name: 'Vassoio di cortesia'},
                        {name: 'Radio'},
                        {name: 'Carta igienica'},
                    ],
                    price: 200,
                },
                {
                    title: 'ROOM 102',
                    subtitle: 'Camera King',
                    description: 'Camera Matrimoniale climatizzata con minibar e pavimento piastrellato/in marmo.',
                    gallery: [
                        {image: '/images/home/gallery-slider-map/21.jpg'},
                        {image: '/images/home/gallery-slider-map/18.jpg'},
                        {image: '/images/home/gallery-slider-map/22.jpeg'},
                        {image: '/images/home/gallery-slider-map/23.jpeg'},
                    ],
                    catacteristica: 'Camera Doppia Di 13 M2',
                    services: [
                        {name: 'terrazzo'},
                        {name: 'Canali pay per view'},
                        {name: 'Armadio / guardaroba'},
                        {name: 'Vassoio di cortesia'},
                        {name: 'Radio'},
                        {name: 'Carta igienica'},
                    ],
                    price: 200,
                }
            ]
        }
    }
}
</script>
