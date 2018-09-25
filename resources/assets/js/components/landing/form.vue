<template>
    <div>
        <section class="py-3 bg-white">
            <div class="container h-100 p-0">
                <div class="row justify-content-center align-items-center">	
                    <form class="col-md-12 form-inline form-booking flex-column flex-md-row justify-content-center">
                        <!-- <div class="form-group">
                            <label for="inputRoom" class="sr-only">Cameera</label>
                            <select name="room" class="form-control">
                                <option disabled selected>Cameera</option>
                                <option value="room101">Room 101</option>
                                <option value="room102">Room 102</option>
                                <option value="room103">Room 103</option>
                                <option value="room104">Room 104</option>
                            </select>
                        </div> -->

                        <!-- <div class="hr d-lg-none my-3"></div> -->
                        
                        <div class="form-group d-flex">
                            <div class="w-50">
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
                            <div class="w-50">
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
                        </div>
                        <div class="form-group text-center justify-content-center">
                            <button type="button" @click.prevent="filterData()" class="btn btn-primary text-uppercase">
                                Cerca
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </section>
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
/* formulario booking */
.form-booking .form-group, .form-control{
	min-width: 100%;
	display: block;
	margin: 0;
}
.form-booking .form-control{
	border: 0px solid transparent;
}
.form-booking .form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: transparent;
    outline: 0;
    box-shadow: 0 0 0 0.2rem transparent;
}
.hr{
	width: 100%;
    height: 1px;
    background-color: transparent;
    border: 0.5px solid #555;
}
.form-booking .btn-primary{
	background-color: #2ac093;
    border-color: #2ac093;

}
.form-booking .btn-primary:hover {
    color: #fff;
    background-color: #2ac093;
    border-color: #2ac093;
}
.form-booking .btn-primary.focus, .form-booking .btn-primary:focus{
	box-shadow: 0 0 0 0.2rem #2ac0938a;
}
.form-booking .btn-primary:not(:disabled):not(.disabled):active{
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
	text-align-last:center;
}

@media screen and (min-width: 992px){
	.form-booking .form-group, .form-control{
		min-width: 180px;
		width: auto;
		display: block;
		margin: 0;
	}
}
</style>
