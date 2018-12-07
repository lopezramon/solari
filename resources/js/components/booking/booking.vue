<template>
    <div>
        <header_booking/>
        <form_booking/>
        
        <div class="container my-4">
            <div class="row my-5 bg-white py-3 shadow" v-for="(item, clave) in vacanza" :key="clave">
                <div class="col-12 col-md-5">
                    <swiper :options="swiperOption">
                        <!-- slides -->
                        <swiper-slide v-for="(img, imgclave) in item.gallery" :key="imgclave">
                            <img class="img-fluid" :src="img.url">
                        </swiper-slide>
                        <div class="swiper-pagination" slot="pagination"></div>
                    </swiper>
                </div>
                <div class="col-12 col-md-7">
                    <h3 class="title">{{item.title}}</h3>
                    <p class="lead m-0">Budoni</p>
                    <p class="lead m-0">Case Vacanza: <span>Villeta Stella Maris</span></p>
                    <p>{{item.description}}</p>
                    <p><strong>{{item.include}}</strong></p>
                </div>
                <div class="col-12">
                    <div class="border-y-green my-2">
                        <span v-for="(service, index) in item.services" :key="index" class="tooltip py-3 px-3">
                            <img :src="service.ico" :alt="service.name" width="36">
                            {{service.info}}
                            <span class="tooltiptext">Tooltip text</span>
                        </span>
                    </div>
                    
                    <p class="lead text-right m-0">
                        <strong class="info-price">Prezzo giorno: {{item.priceDay}} €</strong>
                        <button class="btn btn-primary btn-lg mb-3 text-uppercase font-weight-bold">Prenota ora</button>
                    </p>
                </div>
            </div>


            <div class="row my-5 bg-white py-3 shadow" v-for="(item, clave) in vacanza" :key="clave">
                <div class="col-12 col-md-5">
                    <swiper :options="swiperOption">
                        <!-- slides -->
                        <swiper-slide v-for="(img, imgclave) in item.gallery" :key="imgclave">
                            <img class="img-fluid" :src="img.url">
                        </swiper-slide>
                        <div class="swiper-pagination" slot="pagination"></div>
                    </swiper>
                </div>
                <div class="col-12 col-md-7">
                    <h3 class="title">Solaria 1: Trilocale piano terra con giardino, aria condizionata e WiFi</h3>
                    <p class="lead m-0">Budoni</p>
                    <p class="lead m-0">Case Vacanza: <span>Villeta Stella Maris</span></p>
                    <p>{{item.description}}</p>
                    <p><strong>{{item.include}}</strong></p>
                </div>
                <div class="col-12">
                    <div class="border-y-green my-2">
                        <span v-for="(service, id) in item.services" :key="id" class="tooltip py-3 px-3">
                            <img :src="service.ico" :alt="service.name" width="36">
                            {{service.info}}
                            <span class="tooltiptext">Tooltip text</span>
                        </span>
                    </div>
                    
                    <p class="lead text-right m-0">
                        <strong class="info-price">Prezzo giorno: {{item.priceDay}} €</strong>
                        <button class="btn btn-primary btn-lg mb-3 text-uppercase font-weight-bold">Prenota ora</button>
                    </p>
                </div>
            </div>

        </div>

    </div>
</template>
<script>
export default {
    data(){
        return {
            disabledActivo: false,
            terminos:false,
            vacanza: [
                {
                        id: 1,
                        idCaseVacanza: 1,
                        title: 'Bilocale con giardino vista mare, WiFi, aria condizionata',
                        description: `2+2 posti letto, 1 camera da letto, 1 bagno con box doccia, soggiorno con angolo cucina, giardino attrezzato per poter mangiare all'aperto. Dispone di WiFi, aria condizionata, Tv-Sat, lavatrice, barbecue, doccetta esterna, posto auto.`,
                        include: 'Consumi luce, acqua e gas inclusi.',
                        priceDay: 54,
                        services:[
                            {
                                name: 'camere',
                                ico: '/images/iconos/services/010-single-bed.svg',
                                info: '1',
                            },
                            {
                                name: 'bagno',
                                ico: '/images/iconos/services/019-deck.svg',
                                info: '1',
                            },
                            {
                                name: 'posti',
                                ico: '/images/iconos/services/036-washing-machine.svg',
                                info: '2+1',
                            },
                            {
                                name: 'Lavatrice',
                                ico: '/images/iconos/services/040-parking.svg',
                                info: '2+1',
                            },
                            {
                                name: 'Climatizzata',
                                ico: '/images/iconos/services/043-wifi.svg',
                                info: 'Si',
                            },
                            {
                                name: 'Tv-Sat',
                                ico: '/images/iconos/services/044-swimming-pool.svg',
                                info: 'Si',
                            },
                            {
                                name: 'Posto auto',
                                ico: '/images/iconos/services/045-air-conditioner.svg',
                                info: 'Si',
                            },
                            {
                                name: 'Posto auto',
                                ico: '/images/iconos/services/050-bed.svg',
                                info: 'Si',
                            },
                            {
                                name: 'Posto auto',
                                ico: '/images/iconos/services/046-single-bed.svg',
                                info: 'Si',
                            },
                            {
                                name: 'Posto auto',
                                ico: '/images/iconos/services/091-beach-umbrella.svg',
                                info: 'Si',
                            },
                            {
                                name: 'Posto auto',
                                ico: '/images/iconos/services/097-single-bed-1.svg',
                                info: 'Si',
                            },
                            {
                                name: 'Posto auto',
                                ico: '/images/iconos/services/monitor.svg',
                                info: 'Si',
                            },
                            {
                                name: 'Posto auto',
                                ico: '/images/iconos/services/120-washing-machine.svg',
                                info: 'Si',
                            },
                        ],
                        gallery: [
                            { url: 'https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/9-bilocale-con-giardino-vista-mare-wifi-aria-condizionata-16_thumb-list.jpg' },
                            { url: 'https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/9-bilocale-7_thumb-list.jpg' },
                            { url: 'https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/9-bilocale-8_thumb-list.jpg' },
                            { url: 'https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/9-bilocale-5_thumb-list.jpg' },
                        ]
                },
                {
                    id: 2,
                    caseVacanza: 1,
                    title: 'Trilocale con terrazza vista mare , WiFi e aria condizionata',
                    description: `4+1 posti letto, 2 camere da letto, 1 bagno con box doccia, soggiorno con angolo cucina, terrazza attrezzata e abitabile per poter mangiare all'aperto.
                    Dispone di WiFi, aria condizionata, Tv-Sat, lavatrice, doccetta esterna, posto auto.`,
                    include: 'Consumi luce, acqua e gas inclusi.',
                    priceDay: 54,
                    priceWeek: 377,
                    services:[
                        {
                            name: 'camere',
                            ico: '/images/iconos/services/010-single-bed.svg',
                            info: '1',
                        },
                        {
                            name: 'bagno',
                            ico: '/images/iconos/services/019-deck.svg',
                            info: '1',
                        },
                        {
                            name: 'posti',
                            ico: '/images/iconos/services/036-washing-machine.svg',
                            info: '2+1',
                        },
                        {
                            name: 'Lavatrice',
                            ico: '/images/iconos/services/040-parking.svg',
                            info: '2+1',
                        },
                        {
                            name: 'Climatizzata',
                            ico: '/images/iconos/services/043-wifi.svg',
                            info: 'Si',
                        },
                        {
                            name: 'Tv-Sat',
                            ico: '/images/iconos/services/044-swimming-pool.svg',
                            info: 'Si',
                        },
                        {
                            name: 'Posto auto',
                            ico: '/images/iconos/services/045-air-conditioner.svg',
                            info: 'Si',
                        },
                        {
                            name: 'Posto auto',
                            ico: '/images/iconos/services/050-bed.svg',
                            info: 'Si',
                        },
                        {
                            name: 'Posto auto',
                            ico: '/images/iconos/services/046-single-bed.svg',
                            info: 'Si',
                        },
                        {
                            name: 'Posto auto',
                            ico: '/images/iconos/services/091-beach-umbrella.svg',
                            info: 'Si',
                        },
                        {
                            name: 'Posto auto',
                            ico: '/images/iconos/services/097-single-bed-1.svg',
                            info: 'Si',
                        },
                        {
                            name: 'Posto auto',
                            ico: '/images/iconos/services/monitor.svg',
                            info: 'Si',
                        },
                        {
                            name: 'Posto auto',
                            ico: '/images/iconos/services/120-washing-machine.svg',
                            info: 'Si',
                        },
                    ],
                    gallery: [
                        { url: 'https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/10-trilocale-9_thumb-list.jpg' },
                        { url: 'https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/10-trilocale-con-terrazza-vista-mare-wifi-e-aria-condizionata-14_thumb-list.jpg' },
                        { url: 'https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/10-trilocale-1_thumb-list.jpg' },
                        { url: 'https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/10-trilocale-4_thumb-list.jpg' },
                    ]
                },
               
            ],
            swiperOption: {},
        }
    },mounted(){

    },
    methods:{

    }
}
</script>
<style scoped>
 .border-y-green{
     border-top: 1px solid #21b186;
     border-bottom: 1px solid #21b186;
 }
 .info-price{
     vertical-align: top;
     font-size: 1.6rem;
     font-weight: bold;
 }
 h3.title{
     color: #21b186;
 }


.tooltip {
    position: relative;
    display: inline-block;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: #21b186;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 90%;
    left: 50%;
    margin-left: -60px;
    opacity: 1;
    transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #21b186 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}

.tooltip {
    opacity: 1;
}

</style>

