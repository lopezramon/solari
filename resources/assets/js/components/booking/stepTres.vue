<template>
    <div>
        <header_booking/>
        <nav_booking/>

        <div class="container my-4">
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
                            {{getCheckin}}
                        </div>
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Fecha de Salida</strong>
                            {{getCheckout}}
                        </div>
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Precio</strong> € {{orden.total.toFixed(2)}}
                        </div>
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
                        <template v-for="room in orden.reserva">
                        <div class="border-bottom p-2 d-flex justify-content-between">
                            <strong class="m-0 text-uppercase">{{room.room}}</strong> 
                            <span>€ {{room.price.toFixed(2)}}</span> 
                        </div>
                        </template>    
                    </div>

                    <div class="text-center mt-4">
                        <div>
                            <h2 class="text-uppercase">Gracias</h2>
                            <p>Tu reservacion esta archivada</p>
                        </div>
                    </div>
                </div>
            </div>
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
            orden:{
                orden:'XXXXXXX',
                name: 'Fulano de Tal',
                identidad:'13332323223',
                phone:'4334433443',
                reserva:[
                    {
                        name: 'Sherly Rubio',
                        email: 'sherly_lala',
                        numero: 2,
                        room:'XXXXXX',
                        room_id:2,
                        price: 22,
                    }
                ],
                cant_visitantes:2,
                total:80,
                comentario: 'es lo mas tripa del mundo'
            }
        }
    },
    computed:{
       getCheckin(){
            let data=this.$store.getters.getDataFilter;
            return Vue.moment(data.checkin).format('YYYY/MMM/DD').toUpperCase();
        },
        getCheckout(){
            let data=this.$store.getters.getDataFilter;
            return Vue.moment(data.checkout).format('YYYY/MMM/DD').toUpperCase();
        },
    }
}
</script>
