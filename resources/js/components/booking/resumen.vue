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
                        <span class="date">{{getCheckin}}0</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="tag font-weight-bold">Check-in</span>
                        <span class="date">{{getCheckout}}</span>
                    </div>
                </div>

                <!-- room select -->
                <div class="col-12 mt-2" v-if="getListCart && getListCart.length>0">
                    <div class="border-bottom">
                        <strong class="text-capitalize">Name room</strong>
                        <div class="d-flex justify-content-between" v-for="room in getListCart" >
                            <span>&nbsp;<input type="checkbox" :value="room.id" v-model="eliminar_all" title="eliminar"></span>
                            <span class="title">{{room.name}}</span>
                            <span class="price">€ {{room.price}}</span>
                           <!--  <div>
                               <button type="button" class="btn btn-primary btn-sm" @click.prevent="remover(room)">remover</button>
                            </div> -->
                        </div>
                        <div class="border-bottom">
                            <button type="button" class="btn btn-primary btn-sm" @click.prevent="deleteAll()">Eliminar seleccionados</button>
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
            eliminar_all:[]
        }
    },
    methods: {
        remover(item){
            this.$store.commit('removerItem',{list: item});
        },deleteAll(){
           if(this.eliminar_all.length>0){
             var arr=[];
             let data=this.$store.getters.getCart;

             for (var i in data){
                var element=data[i].id;
                for (var a in this.eliminar_all){
                    if(this.eliminar_all[a]==element){
                       arr.push(data[i]);
                    }

                }
             }
             if(arr.length>0){
               this.$store.commit('deleteAll',{list:arr});
             }
           }else{
             this.showAlert('error', 'Errore!!', 'Debe seleccionar un producto')
           }
        },showAlert(type, title, text) {
            this.$swal({
                position: 'center',
                type: type,
                title: title,
                text: text,
                showConfirmButton: false,
                showCloseButton: true,
            })
            .then((value) => {
              this.$router.push('/');
            });
        }
    },
    computed:{
        getCheckin(){
            let data = this.$store.state.Booking.filter;
            if (! data) {
                return
            }
            return Vue.moment(data.checkin).format('YYYY/MMM/DD').toUpperCase();
        },
        getCheckout(){
            let data=this.$store.getters.getDataFilter;
            if (! data) {
                return
            }
            return Vue.moment(data.checkout).format('YYYY/MMM/DD').toUpperCase();
        },
        getListCart(){
            let data=this.$store.getters.getCart;
            if (! data) {
                return
            }
            this.rooms_cart=data;
            return this.rooms_cart;
        },
        getTotal(){
            return  this.$store.getters.getTotal.toFixed(2);
        }
    }
}
</script>