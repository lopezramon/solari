<template>
    <div>
        <div class="info">
            <h3 class="text-uppercase" v-text="subtitle1"></h3>
            <div class="btn-group">
                <button>
                    <img src="https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-center.png" alt="">
                    {{center}}
                </button>
                <button>
                    <img src="https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-sea.png" alt="">
                    {{ocean}}
                </button>
                <button>
                    <img src="https://www.solariavacanze.com/wp-content/themes/my-dms-hotel/sections/my-vendor-detail/img//icon-garden.png" alt="">
                    {{ garden ? 'Si' : 'No'}}
                </button>
            </div>
            <p class="my-3" v-text="description">
                
            </p>
        </div>
    </div>
</template>

<script>
    import VueMoment from 'vue-moment'
    import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
    import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.min.css';

    export default {
        components: { VueCtkDateTimePicker },
        props: ['subtitle1','price','description','ocean','center','garden'],
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

  .btn-group button {
    background-color: #fbe45d; /* Green background */
    border: 1px solid #fbe45d; /* Green border */
    color: #000; /* White text */
    padding: 4px 8px; /* Some padding */
    cursor: pointer; /* Pointer/hand icon */
    float: left; /* Float the buttons side by side */
}

.btn-group button:not(:last-child) {
    border-right: none; /* Prevent double borders */
}

/* Clear floats (clearfix hack) */
.btn-group:after {
    content: "";
    clear: both;
    display: table;
}

/* Add a background color on hover */
.btn-group button:hover {
    background-color: #fbe45d;
}
</style>
