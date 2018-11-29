<template>
    <div>
        <div id="chisiamo"></div>
        <section class="py-3 bg-white">
            <div class="container">
                <form class="form-booking">
                    <div class="row">
                        <div class="col-12">
                                
                                <div class="form-group d-flex flex-column flex-md-row justify-content-center">
                                    <div class="col-12 col-md-2 mr-md-2 mb-2 mb-md-0">

                                        <select name="" id="" class="form-control arrow-select">
                                            <option value="tutte">Localidad (tutte)</option>
                                            <option value="budoni">Budoni</option>
                                            <option value="loddui">Lodduì</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-2 mr-md-2 mb-2 mb-md-0">
                                        <select name="" id="" class="form-control arrow-select">
                                            <option value="1">Ospite 1</option>
                                            <option value="2">Ospite 2</option>
                                            <option value="3">Ospite 3</option>
                                            <option value="3">Ospite 4</option>
                                            <option value="3">Ospite 5</option>
                                            <option value="3">Ospite 6</option>
                                            <option value="3">Ospite 7</option>
                                            <option value="3">Ospite 8</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-3 mb-2 mb-md-0">
                                        <vue-ctk-date-time-picker
                                                disable-time
                                                enable-button-validate
                                                locale="it"
                                                v-model="checkin"
                                                formated="DD/MM/YYYY"
                                                format="YYYY-MM-DD"
                                                label="Check-in"
                                                v-validate="'required'"
                                                name="checkin"
                                                data-vv-as="Data"
                                                color="gray"
                                                :class="{'is-danger': errors.has('checkin')}"
                                                :min-date="minDate"
                                        />
                                        <span v-show="errors.has('checkin')" class="help text-danger">{{ errors.first('checkin') }}</span>
                                    </div>
                                    <div class="col-12 col-md-3 mb-2 mb-md-0">
                                    <vue-ctk-date-time-picker
                                                disable-time
                                                enable-button-validate
                                                locale="it"
                                                v-model="checkout"
                                                formated="DD/MM/YYYY"
                                                format="YYYY-MM-DD"
                                                label="Check-out"
                                                v-validate="'required'"
                                                name="checkout"
                                                data-vv-as="Data"
                                                color="gray"
                                                :class="{'is-danger': errors.has('checkout')}"
                                                :min-date="minCheckout"
                                        />
                                        <span v-show="errors.has('checkout')" class="help text-danger">{{ errors.first('checkout') }}</span>
                                    </div>
                                    <div class="col-12 col-md-2 mb-2 mb-md-0">
                                    <!-- <button type="button" @click.prevent="filterData()" class="btn btn-primary btn-lg btn-block text-uppercase">
                                        Cerca
                                    </button> -->
                                    <a href="/booking" class="btn btn-primary btn-lg btn-block text-uppercase">
                                        Cerca
                                    </a>
                                    </div>
                                </div>

                        </div>
                    </div>
                </form>
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
    cursor: pointer;
    background-color: #fff;
    transition-duration: .3s;
    position: relative;
    width: 100%;
    height: 42px;
    min-height: 42px;
    padding: 0 12px;
    font-weight: 300;
    outline: none;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 4px;
    font-size: 14px;
    z-index: 0;
    -webkit-appearance: listbox;
}
.form-booking .form-control.arrow-select {
    background-image: url('/images/iconos/arrow-select.png');
    background-repeat: no-repeat;
    background-size: 1rem;
    background-origin: content-box;
    background-position: center right;
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
	text-align-last:left;
}

@media screen and (min-width: 992px){
	.form-booking .form-group, .form-control{
		
		display: block;
		margin: 0;
	}
}

</style>
