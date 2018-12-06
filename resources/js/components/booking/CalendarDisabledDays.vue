<template>
    <div>
        <h6 class="text-danger">Select another range available</h6>
        <form>
            <div class="form-group">
                <span v-html="calendarIcon"></span>
                <label for="in">Check-in</label>
                <vue-ctk-date-time-picker
                    id="in"
                    disable-time
                    enable-button-validate
                    locale="it"
                    v-model="checkinRoom"
                    formated="DD/MM/YYYY"
                    format="YYYY-MM-DD"
                    label="Data di prenotazione"
                    v-validate="'required'"
                    name="checkinRoom"
                    data-vv-as="Data"
                    color="gray"
                    :class="{'is-danger': errors.has('checkinRoom')}"
                    :min-date="minDate"
                    :disabled-dates="disabledDates"
                />
                <small v-show="errors.has('checkinRoom')" class="help text-danger">{{ errors.first('checkinRoom') }}</small>
            </div>

            <div class="form-group">
                <span v-html="calendarIcon"></span>
                <label for="out">Check-out</label>
                <vue-ctk-date-time-picker
                    id="out"
                    disable-time
                    enable-button-validate
                    locale="it"
                    v-model="checkoutRoom"
                    formated="DD/MM/YYYY"
                    format="YYYY-MM-DD"
                    label="Data di prenotazione"
                    v-validate="'required'"
                    name="checkoutRoom"
                    data-vv-as="Data"
                    color="gray"
                    :class="{'is-danger': errors.has('checkoutRoom')}"
                    :min-date="mincheckout"
                    :disabled-dates="disabledDates"
                />
                <small v-show="errors.has('checkoutRoom')" class="help text-danger">{{ errors.first('checkoutRoom') }}</small>
            </div>
        </form>
    </div>
</template>
<script>
    import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
    import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.min.css';

    export default {
        name: 'calendar-disabled-days',
        components: { VueCtkDateTimePicker },
        props: {
            disabledDates: { required: true, type: Array }
        },
        data() {
            return {
                checkinRoom: null,
                checkoutRoom: null,
                adult: null,
                mincheckout: null,
                calendarIcon: '<img src="/images/suites/icon/calendar.svg" alt="calendar">'
            }
        },
        computed: {
            minDate() {
                if (this.checkinRoom != null) {
                    this.mincheckout = Vue.moment(this.checkinRoom).add(1, 'day').format('YYYY/MM/DD');

                    if (Vue.moment(this.checkinRoom) >= Vue.moment(this.checkoutRoom)) {
                        this.checkoutRoom = null;
                    }
                    return this.checkinRoom;

                } else return Vue.moment().format('MM/DD/YYYY');
            }
        },
        methods: {
            filtersData() {
                let data = this.$store.getters.getDataFilter;
                this.checkinRoom = Vue.moment(data.checkinRoom).format('YYYY/MM/DD');
                this.checkoutRoom = Vue.moment(data.checkoutRoom).format('YYYY/MM/DD');
                this.mincheckout = Vue.moment(this.checkinRoom).add(1, 'day').format('YYYY/MM/DD');
                this.adult = data.adult;
            },
            filterData() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        let obj = {};
                        obj.checkinRoom = this.checkinRoom;
                        obj.checkoutRoom = this.checkoutRoom;
                        this.$store.commit('setFilter', {list: obj});
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
