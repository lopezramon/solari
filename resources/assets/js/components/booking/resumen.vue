<template>
    <div>
        <aside class="border p-3 mb-3">
            <div class="row">
                <div class="col-12 mb-3">
                    <h3 class="text-center">Booking Summary</h3>
                </div>

                <!-- fecha -->
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <span class="tag font-weight-bold">Check-in</span>
                        <span class="date">{{getCheckin}}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="tag font-weight-bold">Check-in</span>
                        <span class="date">{{getCheckout}}</span>
                    </div>
                </div>

                <!-- room select -->
                <div class="col-12 mt-2" v-if="getListCart.length>0">
                    <div class="border-bottom">
                        <strong class="text-capitalize">Name room</strong>
                        <div class="d-flex justify-content-between" v-for="room in getListCart" >
                            <span class="title">{{room.name}}</span>
                            <span class="price">€ {{room.price}}</span>
                            <div>
                               <button type="button" class="btn btn-primary btn-sm" @click.prevent="remover(room)">remover</button> 
                            </div>
                        </div>
                        
                    </div>
                </div>

                <!-- informacion -->
                <div class="col-12 mt-3">
                    <div class="d-flex flex-column">
                        <b>Total €</b> <span>{{getTotal}}</span>
                      <!--   <span>14% Sales</span>
                        <span>Per room per night</span>
                        <span>39.90 per night</span>
                        <span>Resort Free</span>
                        <strong>(Payable at Hotel)</strong> -->
                    </div>
                </div>
            </div>
        </aside>
    </div>
</template>
<script>
import VueMoment from 'vue-moment'
export default {
    data(){
        return {
            botonActivo: false,
            rooms_cart:[],
        }
    },
    methods: {
        remover(item){
            this.$store.commit('removerItem',{list: item});
        }
    },
    mounted(){
       
    },computed:{
        getCheckin(){
            let data=this.$store.getters.getDataFilter;
            return Vue.moment(data.checkin).format('YYYY/MMM/DD').toUpperCase();
        },
        getCheckout(){
            let data=this.$store.getters.getDataFilter;
            return Vue.moment(data.checkout).format('YYYY/MMM/DD').toUpperCase();
        },
        getListCart(){
            let data=this.$store.getters.getCart;
            this.rooms_cart=data;
            console.log(this.rooms_cart.length);
            return this.rooms_cart;
        },getTotal(){
            return  this.$store.getters.getTotal.toFixed(2);
        }
    }
}
</script>


