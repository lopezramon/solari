<template>
    <div>
        <div class="container my-4">
            <div class="row my-5 bg-white py-3 shadow" v-for="(item, clave) in rooms" :key="clave">
                <div class="col-12 col-md-5">
                    <swiper :options="swiperOption">
                        &lt;!&ndash; slides &ndash;&gt;
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
                        <button v-if="activo"class="btn btn-primary btn-lg mb-3 text-uppercase font-weight-bold">Prenota ora</button>
                        <button v-if="!activo"class="btn btn-secondary btn-lg mb-3 text-uppercase font-weight-bold">Prenota ora</button>
                    </p>
                </div>
            </div>
        </div>

        <!--<article v-for="room in rooms" class="mb-5 border-bottom">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-12">
                        <h2 v-text="room.name"></h2>
                        <h3 v-text="room.subtitle1"></h3>
                        <p v-text="room.description"></p>
                    </div>

                    &lt;!&ndash; slider &ndash;&gt;
                    <div class="col-12 col-lg-8 mb-3 ">
                        <swiper :options="swiperOption">
                            <swiper-slide v-for="(slide, index) in room.galery" :key="index" class="position-relative">
                                <div class="ribbon ribbon-top-right">
                                    <span>Disponible</span>
                                </div>
                                <img class="img-fluid" :src="slide.image" alt="rooms">
                            </swiper-slide>
                            <div class="swiper-pagination" slot="pagination"></div>
                        </swiper>
                    </div>

                    &lt;!&ndash; info room&ndash;&gt;
                    <div class="col-12 col-lg-4">
                        <h4 v-text="room.subtitle2"></h4>
                        <p>
                            <span class="d-block" v-for="service in room.services">
                                <img src="/images/suites/icon/baseline-done-24px.svg" alt="check-list">
                                {{ service.name }}
                            </span>
                        </p>

                        <div class="d-flex justify-content-between">
                            <span>From:</span>
                            <span class="font-weight-bold">{{ room.price }} €</span>
                        </div>

                        <button type="button" :disabled="checkDisabled(room)" @click.prevent="addRoom(room)" class="btn btn-primary btn-block m-2">
                            <span class="text-uppercase">Add</span>
                        </button>
                    </div>
                </div>
            </div>
        </article>-->
        <div class="text-right">
            <button class="btn btn-secondary btn-lg mb-3 text-uppercase font-weight-bold">Continuare</button>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                root: null,
                activo: false;
                swiperOption: {
                    pagination: { el: '.swiper-pagination' }
                },
                rooms: [
                    {

                    }
                ],
                roomsPrueba: [
                    {
                        id: 1,
                        title: 'Bilocale con giardino vista mare, WiFi, aria condizionata',
                        description: `2+2 posti letto, 1 camera da letto, 1 bagno con box doccia, soggiorno con angolo cucina, giardino attrezzato per poter mangiare all'aperto. Dispone di WiFi, aria condizionata, Tv-Sat, lavatrice, barbecue, doccetta esterna, posto auto.`,
                        include: 'Consumi luce, acqua e gas inclusi.',
                        price: 40,
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
                bookingDate: {},
            }
        },
        beforeMount() {
            this.root = window.location.origin;

            this.bookingDate = {
                checkin: Vue.moment(this.$store.getters.getFilter.checkin).format('YYYY-MM-DD'),
                checkout: Vue.moment(this.$store.getters.getFilter.checkout).format('YYYY-MM-DD')
            };

            this.getRooms();
        },
        mounted() {
            window.Echo.channel('room')
                .listen('.roomAvailability', (e) => {
                    console.log(e),
                    this.locked_room = e.room.id
                });
        },
        methods: {
            getRooms() {
                axios.post(this.root + '/api/admin/rooms', this.bookingDate).then((res) => {
                    if (res.status === 200) {
                        let obj = res.data.data.rooms;

                        this.rooms = obj;
                    }
                }).catch(() => this.showAlert('error', 'Errore!!', 'refrescar la pagina'))
            },
            checkDisabled(item) {
                let data = this.$store.getters.getRooms;

                for (let i in data) {
                    if (data[i].roomId === item.id) {
                        return true;
                        break;
                    }
                }
                return false;
            },
            addRoom(item) {
                let data = {
                    name: item.name,
                    roomId: item.id,
                    personResponsible: {
                        name: null,
                        email: null,
                        phone: null,
                    },
                    personsQuantity: 0,
                    totalItem: item.price
                };

                data.bookingDate = this.bookingDate;

                this.$store.dispatch('setRoom', data).then(() => this.showAlert('success', 'Room added with success'));
            },
            showAlert(type, title, text) {
                this.$swal({
                    position: 'center',
                    type: type,
                    title: title,
                    text: text,
                    showConfirmButton: false,
                    showCloseButton: true,
                })
            }
        }
    }
</script>
<style scoped>
    .border-y-green {
        border-top: 1px solid #21b186;
        border-bottom: 1px solid #21b186;
    }

    .info-price {
        vertical-align: top;
        font-size: 1.6rem;
        font-weight: bold;
    }

    h3.title {
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

    /* common */
    .ribbon {
        width: 132px;
        height: 138px;
        overflow: hidden;
        position: absolute;
    }

    .ribbon span {
        position: absolute;
        display: block;
        width: 225px;
        padding: 15px 0;
        background-color: #3498db;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        color: #fff;
        font: 700 18px/1;
        text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
        text-transform: uppercase;
        text-align: center;
    }
    .btn-secondary{
       background-color: #f1832b; 
    }
    /* top right*/
    .ribbon-top-right {
        top: -10px;
        right: 1px;
    }

    .ribbon-top-right span {
        left: -25px;
        top: 30px;
        transform: rotate(45deg);
    }
</style>
