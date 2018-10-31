<template>
    <div>
        <article v-for="room in rooms" class="mb-5 border-bottom">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-12">
                        <h2 v-text="room.name"></h2>
                        <h3 v-text="room.subtitle1"></h3>
                        <p v-text="room.description"></p>
                    </div>

                    <!-- slider -->
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

                    <!-- info room-->
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

                        <!--<calendar-disabled-days v-if="room.id === 2" :disabledDates="disabledDates"/>-->

                        <button type="button" :disabled="checkDisabled(room)" @click.prevent="addRoom(room)" class="btn btn-primary btn-block m-2">
                            <span class="text-uppercase">Add</span>
                        </button>
                    </div>
                </div>
            </div>
        </article>
    </div>
</template>
<script>
    import CalendarDisabledDays from './CalendarDisabledDays'

    export default {
        components: { CalendarDisabledDays },
        data() {
            return {
                root: null,
                swiperOption: {
                    pagination: { el: '.swiper-pagination' }
                },
                rooms: [],
                bookingDate: {},
                disabledDates: ['2018-10-30', '2018-10-27', '2018-11-24', '2018-11-13', '2018-11-07', '2018-11-20', '2018-11-11', '2018-11-01']
            }
        },
        beforeMount() {
            this.root = window.location.origin;

            this.bookingDate = {
                checkin: Vue.moment(this.$store.getters.getDataFilter.checkin).format('YYYY-MM-DD'),
                checkout: Vue.moment(this.$store.getters.getDataFilter.checkout).format('YYYY-MM-DD')
            };
        },
        mounted() {
            this.getRooms();
        },
        methods: {
            getRooms() {
                let slf = this;

                axios.post(this.root + '/api/admin/rooms', this.bookingDate).then((res) => {
                    if (res.status === 200) {
                        slf.rooms = res.data.data.rooms;
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
                        fiscalCode: null
                    },
                    personsQuantity: null,
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
    @import url(https://fonts.googleapis.com/css?family=Lato:700);

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
