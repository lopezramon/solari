<template>
    <div>
        <div id="chisiamo"></div>
        <section class="py-3 bg-white">
            <div class="container">
                <form class="form-booking">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group d-flex flex-column flex-md-row justify-content-center">

                                <div class="mr-md-2 mb-2 mb-md-0">
                                    <vue-ctk-date-time-picker
                                        disable-time
                                        enable-button-validate
                                        locale="it"
                                        v-model="checkin"
                                        formated="DD/MM/YYYY"
                                        format="YYYY-MM-DD"
                                        label="Data di prenotazione"
                                        v-validate="'required'"
                                        name="checkin"
                                        data-vv-as="Data"
                                        color="gray"
                                        :class="{'is-danger': errors.has('checkin')}"
                                        :min-date="minDate"
                                    />
                                    <small v-show="errors.has('checkin')" class="help text-danger">{{ errors.first('checkin') }}</small>
                                </div>

                                <div class="ml-md-2 mb-2 mb-md-0">
                                    <vue-ctk-date-time-picker
                                        disable-time
                                        enable-button-validate
                                        locale="it"
                                        v-model="checkout"
                                        formated="DD/MM/YYYY"
                                        format="YYYY-MM-DD"
                                        label="Data di prenotazione"
                                        v-validate="'required'"
                                        name="checkout"
                                        data-vv-as="Data"
                                        color="gray"
                                        :class="{'is-danger': errors.has('checkout')}"
                                        :min-date="minCheckout"
                                    />
                                    <small v-show="errors.has('checkout')" class="help text-danger">{{ errors.first('checkout') }}</small>
                                </div>

                                <button type="button" @click.prevent="searchRooms()" class="btn btn-primary mx-2">
                                    <span class="text-uppercase font-weight-bold">Search</span>
                                </button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</template>
<script>
    import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
    import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.min.css';

    export default {
        name: 'search-rooms',
        components: { VueCtkDateTimePicker },
        data() {
            return {
                checkin: null,
                checkout: null,
                minCheckout: null,
            }
        },
        computed: {
            minDate() {
                if (this.checkin != null) {
                    this.minCheckout = Vue.moment(this.checkin).add(1, 'day').format('YYYY/MM/DD');

                    if (Vue.moment(this.checkin) >= Vue.moment(this.checkout)) {
                        this.checkout = null;
                    }
                    return this.checkin;
                } else return Vue.moment().format('MM/DD/YYYY');
            }
        },
        methods: {
            searchRooms() {
                this.$store.dispatch('deleteRooms');
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        let obj = { checkin: this.checkin, checkout: this.checkout };

                        this.$store.dispatch('setFilterDates', obj).then(() => this.$router.push('/booking/step-1'));
                    }
                }).catch(() => console.log('error form'));
            }
        }
    }
</script>
<style scoped>
    /* formulario booking */
    .form-booking .form-group, .form-control {
        min-width: 100%;
        display: block;
        margin: 0;
    }

    .form-booking .form-control {
        border: 0px solid transparent;
    }

    .form-booking .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: transparent;
        outline: 0;
        box-shadow: 0 0 0 0.2rem transparent;
    }

    .hr {
        width: 100%;
        height: 1px;
        background-color: transparent;
        border: 0.5px solid #555;
    }

    .form-booking .btn-primary {
        background-color: #2ac093;
        border-color: #2ac093;

    }

    .form-booking .btn-primary:hover {
        color: #fff;
        background-color: #2ac093;
        border-color: #2ac093;
    }

    .form-booking .btn-primary.focus, .form-booking .btn-primary:focus {
        box-shadow: 0 0 0 0.2rem #2ac0938a;
    }

    .form-booking .btn-primary:not(:disabled):not(.disabled):active {
        color: #fff;
        background-color: #2ac093;
        border-color: #2ac093;
    }

    .form-booking .btn-lg {
        padding: .3rem 1rem;
        font-size: 1.25rem;
        line-height: 1.2;
        border-radius: 1rem;
    }

    .form-booking select.form-control {
        text-align-last: center;
    }

    @media screen and (min-width: 992px) {
        .form-booking .form-group, .form-control {

            display: block;
            margin: 0;
        }
    }
</style>
