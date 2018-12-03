<template>
    <div>
        <aside class="p-3 border mb-3">
            <form class="form-row">
                <div class="form-group col-12">
                    <span v-html="calendarIcon"></span>
                    <label for="in">Check-in</label>
                    <vue-ctk-date-time-picker
                        id="in"
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
                    <span v-show="errors.has('checkin')" class="help text-danger">{{ errors.first('checkin') }}</span>
                </div>

                <div class="form-group col-12">
                    <span v-html="calendarIcon"></span>
                    <label for="out">Check-out</label>
                    <vue-ctk-date-time-picker
                        id="out"
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
                    <span v-show="errors.has('checkout')" class="help text-danger">{{ errors.first('checkout') }}</span>
                </div>

                <div class="form-group col-12 text-center">
                    <button type="button" @click.prevent="filterData()" class="btn btn-primary">
                        <span class="text-uppercase font-weight-bold">Search</span>
                    </button>
                </div>
            </form>
        </aside>
    </div>
</template>
<script>
    import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
    import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.min.css';

    export default {
        components: { VueCtkDateTimePicker },
        data() {
            return {
                checkin: null,
                checkout: null,
                minCheckout: null,
                calendarIcon: '<img src="/images/suites/icon/calendar.svg" alt="calendar">'
            }
        },
        mounted() {
            this.getDates();
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
            getDates() {
                let data = this.$store.getters.getFilter;
                this.checkin = Vue.moment(data.checkin).format('YYYY/MM/DD');
                this.checkout = Vue.moment(data.checkout).format('YYYY/MM/DD');
                this.minCheckout = Vue.moment(this.checkin).add(1, 'day').format('YYYY/MM/DD');
            },
            filterData() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        let obj = { checkin: this.checkin, checkout: this.checkout };

                        let data = this.$store.getters.getDataFilter;

                        if (data.checkin !== obj.checkin || data.checkout !== obj.checkout) {
                            this.$store.dispatch('deleteBooking');
                            setTimeout(() => this.$store.dispatch('setFilterDates', obj), 3000);
                        }
                    }
                }).catch(() => console.log('error form'));
            }
        }
    }
</script>
<style scoped>
    label {
        font-family: 'Josefin Sans', sans-serif;
    }
</style>
