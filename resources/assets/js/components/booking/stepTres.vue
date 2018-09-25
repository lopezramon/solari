<template>
    <div>
        <header_booking/>
        <nav_booking/>

        <div class="container my-4">
            <template  v-if="loading">
                 <scale-loader  :loading="loading" :color="color" :size="size"></scale-loader>
            </template>
            <template v-else>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-5">
                    <!-- Datos del responsable -->
                    <div class="border">
                        <div class="bg-secondary border-bottom p-2">
                            <strong class="m-0 text-uppercase">Datos Comprador</strong>
                        </div>
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Numero de reserva:</strong> {{orden.orden}}
                        </div>
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Reservado por:</strong> {{orden.name}}
                        </div>
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Numero de identidad:</strong> {{orden.identidad}}
                        </div>
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Telefono:</strong> {{orden.phone}}
                        </div>
                    </div>

                    <!-- Datos del responsable -->
                    <div class="border">
                        <template v-for="room in orden.reserva" >
                            <div class="bg-secondary border-bottom p-2">
                                <strong class="m-0 text-uppercase">Datos del responsable {{room.room}}</strong>
                            </div>
                            <div class="border-bottom p-2">
                                <strong class="m-0 text-uppercase">Reservado Para:</strong> {{room.name}}
                            </div>
                            <div class="border-bottom p-2">
                                <strong class="m-0 text-uppercase">Email:</strong> {{room.email}}
                            </div>
                            <div class="border-bottom p-2">
                                <strong class="m-0 text-uppercase">Numero:</strong> {{room.numero}}
                            </div>
                        </template>
                    </div>

                    <!-- Datos de reserva -->
                    <div class="border">
                        <div class="bg-secondary border-bottom p-2">
                            <strong class="m-0 text-uppercase">Datos de la reserva</strong>
                        </div>
                        <template v-for="room in orden.reserva">
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">ROOM:</strong> {{room.room}}
                        </div>
                        </template>
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Cantidadde visitantes:</strong>
                            {{orden.cant_visitantes}}
                        </div>
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Fecha de entrada</strong>
                            {{orden.checking}}
                        </div>
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Fecha de Salida</strong>
                            {{orden.checkout}}
                        </div>
                        <!-- <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Precio</strong> € {{orden.total}}
                        </div> -->
                        <!-- textarea -->
                        <div class="border-bottom p-2">
                            <div class="form-group">
                              <strong class="m-0 text-uppercase">COMENTARIOS</strong>
                              {{orden.comentario}}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-5">
                    <!-- map -->
                    <div class="map mb-3">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48231.14914404061!2d9.457766413671393!3d40.92787347617706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12d94b04024bea79%3A0x7bfe3270a490c808!2s07026+Olbia%2C+Olbia-Tempio%2C+Italia!5e0!3m2!1ses!2sve!4v1537229576871" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    
                    <!-- datos rooms -->
                    <div class="border bg-secondary">
                        <div class="border-bottom p-2 d-flex justify-content-between">
                            <strong class="m-0 text-uppercase text-center">Detalle</strong> 
                        </div>
                    </div>
                    <div class="border">
                        <template v-for="room in orden.reserva">
                        <div class="border-bottom p-2 d-flex justify-content-between">
                            <strong class="m-0 text-uppercase">{{room.room}}</strong> 
                            <span>€ {{room.price}}</span> 
                        </div>
                        </template>
                    </div>
                    <div class="border">
                        <div class="border-bottom p-2 d-flex justify-content-between">
                            <strong class="m-0 text-uppercase">Subtotal</strong> 
                            <span>€ {{orden.subtotal}}</span> 
                        </div>
                        <div class="border-bottom p-2 d-flex justify-content-between">
                            <strong class="m-0 text-uppercase">Iva</strong> 
                            <span>€ {{orden.iva}}</span> 
                        </div>
                    </div>
                    <div class="border bg-secondary">
                        <div class="border-bottom p-2 d-flex justify-content-between">
                            <strong class="m-0 text-uppercase">Total</strong> 
                            <span>€ {{orden.total}}</span> 
                        </div>    
                    </div>

                    <div class="text-center mt-4">
                        <div>
                            <h2 class="text-uppercase">Gracias</h2>
                            <p>Tu reservacion esta archivada</p>
                        </div>
                        <div>
                             <button type="button" @click.prevent="aceptar()" class="btn btn-primary text-uppercase">
                                Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </template>
        </div>

    </div>
</template>
<style scoped>
.bg-secondary{
    background-color: #c7c7c7 !important;
}
h2{
    font-size: 3rem;
    line-height: 1;
    margin-bottom: 0rem;
}

.map{
    width: 100%;
    height: 260px;
}
.map iframe{
    width: 100%;
    height: 100%;
}
</style>
<script>
    export default {
    data(){
        return {
            color: '#4fcaa5',
            size: '200px',
            loading: true,
            id: this.$route.params.id,
            orden:{
                checking:null,
                checkout:null,
                orden:null,
                name: null,
                identidad:null,
                phone:null,
                reserva:[],
                cant_visitantes:null,
                total:null,
                subtotal:null,
                iva:null,
                comentario: null,
            }
        }
    },
    computed:{

    },mounted(){
        this.$store.commit('destroyState');
        this.getOrder();

    },methods:{
        showAlert(type, title, text) {
            this.$swal({
                position: 'center',
                type: type,
                title: title,
                text: text,
                showConfirmButton: false,
                showCloseButton: true,
            })
        },
        aceptar(){
            this.$router.push('/');
        },
        getOrder(){
            let slf=this;
            axios.get('/api/admin/bookings/'+this.id).then((res) => {
                if(res){
                   slf.orden.checking=Vue.moment(res.data.data.booking.checkin_date).format('YYYY/MMM/DD').toUpperCase();
                   slf.orden.checkout=Vue.moment(res.data.data.booking.checkout).format('YYYY/MMM/DD').toUpperCase();
                   slf.orden.orden=res.data.data.booking.code;
                   let orden=res.data.data.booking.rooms;
                   const arr=[];
                   let cant_visitantes=0;
                   for(let i in orden){                     
                     let obj={};
                     obj.name=orden[i].form_data.name;
                     if(orden[i].form_data.lastname!=null){
                        obj.name+=' '+orden[i].form_data.lastname;
                     }
                     obj.email=orden[i].form_data.email;
                     obj.numero=orden[i].adult_quantity;
                     cant_visitantes+=parseInt(orden[i].adult_quantity);
                     //console.log(orden[i].room.name)
                     obj.room=orden[i].room.name;
                     obj.price=parseFloat(orden[i].room.price).toFixed(2);
                     arr.push(obj);
                   }
                   slf.orden.cant_visitantes=cant_visitantes;
                   slf.orden.comentario=res.data.data.booking.comment;
                   slf.orden.total=parseFloat(res.data.data.booking.total);
                   slf.orden.subtotal=parseFloat(res.data.data.booking.subtotal);
                   slf.orden.iva=parseFloat(res.data.data.booking.iva);
                   slf.orden.reserva=arr;
                   slf.loading=false;  
                   
                }
            }).catch((error) => {
                this.showAlert('error', 'Errore!!', 'error en el servidor')
                this.loading=false;     
            });
        }
    }
}
</script>
