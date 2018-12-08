<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <h1>ESTE ES EL BOOKING 2</h1>

                    <box_data_booking
                        v-model="personResponsible"
                    ></box_data_booking>

                    <box_data_booking_personal
                        v-model="rooms"
                    ></box_data_booking_personal>

                    <box_data_booking_comment v-model="comment"/>
                </div>
                <div class="col-12 col-md-4">
                    <box_data_booking_info v-model="booking"/>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
       created(){
            this.$store.dispatch('getLocations')
            this.$store.dispatch('getCategories')
       },
        computed:{
            booking(){
                return {
                    personResponsible: this.personResponsible,
                    rooms: this.rooms,
                    total: this.total,
                    comment: this.comment.text,
                }
            },
            total(){
                let total = 0
                for(let i in this.rooms){
                    total += this.rooms[i].price
                }
                return total
            },
        },
        data(){
            return {
                comment: {text: ''},
                personResponsible: {
                    register: false,
                    first_name: '',
                    last_name: '',
                    email: '',
                    phone: '',
                    fiscalCode: '',
                    password: '',
                },
                rooms: [
                    {
                        id: 1,
                        title: 'Solaria 1: Trilocale piano terra con giardino, aria condizionata e WiFi',
                        description: "4+1 posti letto, 2 camere da letto, 1 bagno con box doccia, soggiorno con angolo cucina, veranda e giardino attrezzati e abitabili per poter mangiare all'aperto. Dispone di WiFi, aria condizionata, Tv-Sat, lavatrice, lavastoviglie, barbecue, doccetta esterna, posto auto.",
                        Included: 'Consumi luce, acqua e gas inclusi.',
                        price: 71,
                        room_category_id: 1,
                        availability: 1,
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
                        title: 'Solaria 2: Trilocale piano terra con giardino, aria condizionata e WiFi',
                        description: `4+1 posti letto, 2 camere da letto, 1 bagno con box doccia, soggiorno con angolo cucina, veranda e giardino attrezzati e abitabili per poter mangiare all'aperto. Dispone di WiFi, aria condizionata,Tv-Sat, lavatrice, lavastoviglie, barbecue, doccetta esterna, posto auto.`,
                        Included: 'Consumi luce, acqua e gas inclusi.',
                        price: 47,
                        room_category_id: 1,
                        availability: 1,
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
                    }
                ],
            }
        }
    }
</script>
