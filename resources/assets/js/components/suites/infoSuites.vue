<template>
    <div>
        <div class="info">
            <h3 class="text-uppercase" v-text="subtitle1"></h3>
            <p class="m-0 lead font-weight-bold"><strong>€{{price}}</strong></p>
            <p class="" v-text="description">
                
            </p>
        </div>
        <div class="reserva py-3">
            <div class="container">
                    <form class="form-booking">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-center">Reservation</h3>
                            </div>
                            <div class="col-12 text-center">
                                    
                                <div class="form-group">
                                    <div class="mb-2">
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
                                        <span v-show="errors.has('checkin')" class="help text-danger">{{ errors.first('checkin') }}</span>
                                    </div>
                                    <div class="mb-2">
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
                                        <span v-show="errors.has('checkout')" class="help text-danger">{{ errors.first('checkout') }}</span>
                                    </div>
                                    <button type="button" @click.prevent="filterData()" class="btn btn-primary text-uppercase">
                                        Cerca
                                    </button>
                                </div>

                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</template>

<script>
    import VueMoment from 'vue-moment'
    import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
    import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.min.css';

    export default {
        components: { VueCtkDateTimePicker },
        props: ['subtitle1','price','description'],
       data(){
        return {
                checkin:null,
                checkout:null,
                minCheckout: null,
            }
        },
        methods: {
            filtersData(){
                let data=this.$store.getters.getDataFilter;
                if(data.checkin!=null){
                    this.checkin=Vue.moment(data.checkin).format('YYYY/MM/DD');
                    this.minCheckout=Vue.moment(this.checkin).add(1, 'day').format('YYYY/MM/DD');
                }
                if(data.checkout!=null){
                    this.checkout=Vue.moment(data.checkout).format('YYYY/MM/DD');
                }
            },
            filterData(){
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        let obj={};
                        obj.checkin=this.checkin;
                        obj.checkout=this.checkout;
                        this.$store.commit('setFilter',{list: obj});
                        this.$router.push('/booking/step-1');
                    }
                }).catch(() => {
                    console.log('error form')
                });  
            }
        },mounted(){
            this.filtersData();
        },computed:{
            minDate(){
                if(this.checkin!=null){
                    this.minCheckout=Vue.moment(this.checkin).add(1, 'day').format('YYYY/MM/DD');
                    if(Vue.moment(this.checkin)>=Vue.moment(this.checkout)){
                         this.checkout=null;
                    }
                    return this.checkin;
                }else{
                     return  Vue.moment().format('MM/DD/YYYY');
                }          
            }
        }

    }
</script>

<style scoped>
/*form*/
  .form-control {
    display: block;
    width: 100%;
    height: calc(2.19rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 0.9rem;
    line-height: 1.6;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0rem;
  }
  .reserva{
      border: 1px solid #ccc;
  }
  label{
      font-family: 'Josefin Sans', sans-serif;
  }
</style>
