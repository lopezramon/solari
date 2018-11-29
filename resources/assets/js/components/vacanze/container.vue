<template>
    <div id="rooms-suites">
        <headerSuites :name="caseVacanza[0].title"/>
        <div>
            <button class="btn btn-block btn-lg rounded-0" @click="changeOption()">{{ option ? 'Vedi posto' : 'Vedere le informazioni'}} </button>
        </div>
        <template v-if="option">
            <div class="container">
                <div class="row mt-3">
                    <div class="col-lg-12">
                    
                    <!-- <gallerySuites :gallery="room.galery"/> -->
                        
                    </div>
                    <div class="col-lg-12">
                        <infoSuites 
                        :subtitle1="caseVacanza[0].place" 
                        :description="caseVacanza[0].description"
                        :center="caseVacanza[0].centerDistance"
                        :ocean="caseVacanza[0].OceanDistance"
                        :garden="caseVacanza[0].garden"
                        />        
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <photo_gallery :gallery="caseVacanza[0].gallery" />
                    </div>
                </div>
            </div>
            <iconsServices/>
            <listServices :services="caseVacanza[0].services" subtitle2="Servizi" />
        </template>
        <template v-else>
            <div class="container my-5">
                <div class="row my-5 shadow" v-for="(item, clave) in vacanza" :key="clave">
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
                        <h3>{{item.title}}</h3>
                        <p>{{item.description}}</p>
                        <p><strong>{{item.include}}</strong></p>
                        <p>
                            <span v-for="service in item.services" class="d-inline-block py-3 px-2">
                                <img :src="service.ico" :alt="service.name" :title="service.name">
                                {{service.info}}
                            </span>
                        </p>
                        <p class="info-price lead">
                            <strong>Prezzo giorno: {{item.priceDay}} €</strong>
                            <strong>Prezzo settimana: {{item.priceWeek}} €</strong>
                        </p>
                        <button class="btn btn-block btn-lg mb-3">VERIFICA DISPONIBILITÀ</button>
                    </div>
                </div>
            </div>
        </template>
        
    </div>
</template>
<script>
export default {
    data()
    {
        return {
            option: true,
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
                    delay: 3000,
                },
            },
            caseVacanza: [
                {
                    id: 1, 
                    title: 'Villa Ludduì',
                    place: 'Budoni - Ludduì',
                    description: `
                    All'ombra di ulivi centenari, ampi spazi e natura incontaminata di macchia mediterranea, profumo di mirto e malva, gerani e gelsomino,
                    negli occhi la pienezza della costa est e l'orizzonte blu del cielo, la Villa Ludduì sovrasta con la sua grazia e il suo stile tutta la collina del borgo tradizionale di Ludduì.
                    
                    Una splendida villa di recente ristrutturazione che ha voluto tenere le bellezze e le forme di un tempo,
                    tra viti rigogliose che incorniciano le verande spaziose e magnifici angoli di silenzio che rigenerano anima e corpo.

                    E' composta da tre graziosi appartamenti indipendenti e distinti, dotati di tutti i comfort e arredati avendo cura di rispettare e mantenere la bellezza di un tempo.
                    `,
                    centerDistance: '1000m',
                    OceanDistance: '2500m',
                    garden: true,
                    googleMap: '',
                    gallery: [
                        "https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/1-villetta-stella-maris-1.jpg",
                        "https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/5-trilocale-piano-terra-con-ampio-giardino-minipiscina-idromassaggio-esterna-aria-condizionata-e-wifi--22.jpg",
                        "https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/5-trilocale-piano-terra-con-ampio-giardino-minipiscina-idromassaggio-esterna-aria-condizionata-e-wifi--24.jpg",
                        "https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/5-trilocale-piano-terra-con-ampio-giardino-minipiscina-idromassaggio-esterna-aria-condizionata-e-wifi--28.jpg",
                        "https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/5-trilocale-piano-terra-con-ampio-giardino-minipiscina-idromassaggio-esterna-aria-condizionata-e-wifi--21.jpg",
                        "https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/5-trilocale-piano-terra-con-ampio-giardino-minipiscina-idromassaggio-esterna-aria-condizionata-e-wifi--25.jpg",
                        "https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/5-trilocale-piano-terra-con-ampio-giardino-minipiscina-idromassaggio-esterna-aria-condizionata-e-wifi--26.jpg",
                        "https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/5-trilocale-piano-terra-con-ampio-giardino-minipiscina-idromassaggio-esterna-aria-condizionata-e-wifi--23.jpg",
                        "https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/5-trilocale-piano-terra-con-ampio-giardino-minipiscina-idromassaggio-esterna-aria-condizionata-e-wifi--27.jpg",
                        "https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/5-trilocale-piano-terra-con-ampio-giardino-minipiscina-idromassaggio-esterna-aria-condizionata-e-wifi--18.jpg",
                        "https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/5-trilocale-piano-terra-con-ampio-giardino-minipiscina-idromassaggio-esterna-aria-condizionata-e-wifi--20.jpg",
                        "https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/5-trilocale-piano-terra-con-ampio-giardino-minipiscina-idromassaggio-esterna-aria-condizionata-e-wifi--16.jpg",
                        "https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/5-trilocale-piano-terra-con-ampio-giardino-minipiscina-idromassaggio-esterna-aria-condizionata-e-wifi--17.jpg",
                        "https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/5-villetta-stella-maris-6.jpg",
                        "https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/5-villetta-stella-maris-7.jpg",
                        "https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/5-trilocale-piano-terra-con-ampio-giardino-minipiscina-idromassaggio-esterna-aria-condizionata-e-wifi--15.jpg",
                        "https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/5-trilocale-piano-terra-con-ampio-giardino-minipiscina-idromassaggio-esterna-aria-condizionata-e-wifi--19.jpg",
                        "https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/5-villetta-stella-maris-11.jpg",
                        "https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/5-villetta-stella-maris-3.jpg",
                        "https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/5-villetta-stella-maris-4.jpg",
                    ],
                    services: [
                        {title: 'Biancheria letto (optional/extra)'},
                        {title: 'Bagno con doccia'},
                        {title: 'Giardino'},
                        {title: 'Lavatrice'},
                        {title: 'Frigo'},
                        {title: 'Forno'},
                        {title: 'Stendibiancheria'},
                        {title: 'Arredamento da esterno'},
                        {title: 'Wi-fi gratuito'},
                        {title: 'Asciugamani (optional/extra)'},
                        {title: 'Aria condizionata'},
                        {title: 'Barbecue'},
                        {title: 'Aria condizionata'},
                        {title: 'Freezer'},
                        {title: 'Cucina elettrica/gas'},
                        {title: 'Asse da stiro'},
                        {title: 'Tv LCD 32 pollici'},
                        {title: 'Animali ammessi ( optional extra)'},
                        {title: 'TV sat'},
                        {title: 'Ferro da stiro'},
                        {title: 'Lavastoviglie'},
                        {title: 'Seggiolone (su richiesta)'},
                        {title: 'Stoviglie'},
                        {title: 'Doccia esterna'},
                        {title: 'Satellite'},
                    ],
                }
            ],

            vacanza: [
                {
                    id: 1,
                    idCaseVacanza: 1,
                    title: 'Bilocale con giardino vista mare, WiFi, aria condizionata',
                    description: `2+2 posti letto, 1 camera da letto, 1 bagno con box doccia, soggiorno con angolo cucina, giardino attrezzato per poter mangiare all'aperto. Dispone di WiFi, aria condizionata, Tv-Sat, lavatrice, barbecue, doccetta esterna, posto auto.`,
                    include: 'Consumi luce, acqua e gas inclusi.',
                    priceDay: 54,
                    priceWeek: 377,
                    services:[
                        {
                            name: 'camere',
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img/icon-bed.png',
                            info: '1',
                        },
                        {
                            name: 'bagno',
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-bathroom.png',
                            info: '1',
                        },
                        {
                            name: 'posti',
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-person.png',
                            info: '2+1',
                        },
                        {
                            name: 'Lavatrice',
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-dry.png',
                            info: '2+1',
                        },
                        {
                            name: 'Climatizzata',
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-air.png',
                            info: 'Si',
                        },
                        {
                            name: 'Tv-Sat',
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-tv.png',
                            info: 'Si',
                        },
                        {
                            name: 'Posto auto',
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-car.png',
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
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img/icon-bed.png',
                            info: '1',
                        },
                        {
                            name: 'bagno',
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-bathroom.png',
                            info: '1',
                        },
                        {
                            name: 'posti',
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-person.png',
                            info: '2+1',
                        },
                        {
                            name: 'Lavatrice',
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-dry.png',
                            info: '2+1',
                        },
                        {
                            name: 'Climatizzata',
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-air.png',
                            info: 'Si',
                        },
                        {
                            name: 'Tv-Sat',
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-tv.png',
                            info: 'Si',
                        },
                        {
                            name: 'Posto auto',
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-car.png',
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
                {
                    id: 2,
                    caseVacanza: 1,
                    title: 'Quadrilocale con ampia veranda vista mare e Minipiscina Idromassaggio, WiFi e aria condizionata',
                    description: `6+2 posti letto, 3 camere da letto + soppalco, 2 bagni con box doccia, ampio soggiorno, cucina e spaziose verande attrezzate e abitabili per poter mangiare all'aperto, Minipiscina Idromassaggio esterna, Solarium, giardino posteriore. Dispone di WiFi, aria condizionata, Tv-Sat, lavatrice, lavastoviglie, barbecue, doccetta esterna, posti auto.`,
                    include: 'Consumi luce, acqua e gas inclusi.',
                    priceDay: 85,
                    priceWeek: 597,
                    services:[
                        {
                            name: 'camere',
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img/icon-bed.png',
                            info: '1',
                        },
                        {
                            name: 'bagno',
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-bathroom.png',
                            info: '1',
                        },
                        {
                            name: 'posti',
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-person.png',
                            info: '2+1',
                        },
                        {
                            name: 'Lavatrice',
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-dry.png',
                            info: '2+1',
                        },
                        {
                            name: 'Climatizzata',
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-air.png',
                            info: 'Si',
                        },
                        {
                            name: 'Tv-Sat',
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-tv.png',
                            info: 'Si',
                        },
                        {
                            name: 'Posto auto',
                            ico: 'https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-car.png',
                            info: 'Si',
                        },
                    ],
                    gallery: [
                        { url: 'https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/11-quadrilocale-con-ampia-veranda-vista-mare-wifi-e-aria-condizionata--64_thumb-list.jpg' },
                        { url: 'https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/11-quadrilocale-con-giardino-e-veranda-vista-mare-rif--l--6_thumb-list.jpg' },
                        { url: 'https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/11-quadrilocale-con-ampia-veranda-vista-mare-e-minipiscina-idromassaggio-wifi-e-aria-condizionata--60_thumb-list.jpg' },
                        { url: 'https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/11-quadrilocale-con-giardino-e-veranda-vista-mare-rif--l--17_thumb-list.jpg' },
                    ]
                }
            ]
        }
    },
    methods: {
        changeOption(){
            this.option = !this.option;
        }
    }
}
</script>

<style scoped>
#rooms-suites{
    background-color: #fff;
}
.info-price{
    color: #d7392c;
}
</style>