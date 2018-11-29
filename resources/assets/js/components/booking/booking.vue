<template>
    <div>
        <header_booking/>
        <form_booking/>
        <div class="container my-4">
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

            <div class="row">
                <div class="col-12 col-lg-3">
                    <resumen/>

                    <div>   
                        <!-- habilatar el link solo cuando se acepten los terminos -->
                            <div class="form-group">
                                <input v-model="terminos" type="checkbox" name="terminos" id="" required >
                                <label for="terminos">Accetto termini e condizioni</label>
                            </div>
                            <div class="text-center">
                               <!--  <a  :class="botonActivo ? '' : 'disabled'" class="btn btn-primary text-uppercase">Continuo</a> -->
                               <button type="button" @click.prevent="nextStep()" :disabled="!terminos" class="btn btn-primary text-uppercase">Continuo</button>
                            </div>
                    </div>
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
    },mounted(){
         
    },
    methods:{
        
    }
}
</script>

