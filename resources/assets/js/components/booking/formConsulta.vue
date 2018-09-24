<template>
    <div>
        <aside class="p-3 border mb-3">
            <form class="form-row">
                <div class="form-group col-12">
                    <label for="in">
                        <img src="/images/suites/icon/calendar.svg" alt="calendar">
                        Check-in
                    </label>
                    <!-- <input name="in" type="text" class="form-control" placeholder="19/08/2019"> -->
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
                <div class="form-group col-12">
                    <label for="out">
                        <img src="/images/suites/icon/calendar.svg" alt="calendar">
                        Check-out
                    </label>
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
                <!--
                <div class="form-group col-12 col-lg-6">
                    <label for="adulti">Adulti</label>
                    <select name="adulti" class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group col-12 col-lg-6">
                    <label for="bambino">Bambino</label>
                    <select name="bambino" class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>-->
                <div class="form-group col-12 text-center">
                    <button type="button" @click.prevent="filterData()" class="btn btn-primary text-uppercase">
                        Cerca
                    </button>
                </div>
            </form>
        </aside>
    </div>
</template>
<script>
import VueMoment from 'vue-moment'
import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.min.css';

export default {
   components: { VueCtkDateTimePicker },
    data(){
        return {
            botonActivo: false,
            checkin:null,
            checkout:null,
            adult:null,
            minCheckout: null,
        }
    },
    methods: {
        filtersData(){
            let data=this.$store.getters.getDataFilter;
            this.checkin=Vue.moment(data.checkin).format('YYYY/MM/DD');
            this.checkout=Vue.moment(data.checkout).format('YYYY/MM/DD');
            this.minCheckout=Vue.moment(this.checkin).add(1, 'day').format('YYYY/MM/DD');
            this.adult=data.adult;
        },
        filterData(){
            this.$validator.validateAll().then((result) => {
                if (result) {
                    let obj={};
                    obj.checkin=this.checkin;
                    obj.checkout=this.checkout;
                    this.$store.commit('setFilter',{list: obj});
                }
            }).catch(() => {
                console.log('error form')
            });  
        }
    },
    mounted(){
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

