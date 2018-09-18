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
                            <strong class="m-0 text-uppercase">Datos reserva</strong>
                        </div>
                        <!-- <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Numero de reserva:</strong> {{}}
                        </div> -->
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Reservado por:</strong>
                            <input v-if="!getAuthenticated" type="text" v-model="user.name_reserva" class="form-control">
                            <span v-if="getAuthenticated" class="font-weight-bold">{{user.name_reserva}}</span>
                        </div>
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Numero de identidad:</strong>
                            <input v-if="!getAuthenticated" type="text" v-model="user.identidad_reserva" class="form-control">
                            <span v-if="getAuthenticated"class="font-weight-bold">{{user.identidad_reserva}}</span>
                        </div>
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Telefono:</strong>
                            <input v-if="!getAuthenticated" type="text" v-model="user.telef_reserva" class="form-control">
                            <span v-if="getAuthenticated" class="font-weight-bold">{{user.telef_reserva}}</span>
                        </div>
                    </div>

                    <!-- Datos del responsable -->
                    <div class="border">
                        <div class="bg-secondary border-bottom p-2">
                            <strong class="m-0 text-uppercase">Datos del responsable</strong>
                        </div>
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Reservado Para:</strong>
                        </div>
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Email:</strong>
                        </div>
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Numero:</strong>
                        </div>
                    </div>

                    <!-- Datos de reserva -->
                    <div class="border">
                        <div class="bg-secondary border-bottom p-2">
                            <strong class="m-0 text-uppercase">Datos de la reserva</strong>
                        </div>
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">ROOM:</strong> 101
                        </div>
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">ROOM:</strong> 102
                        </div>
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Cantidadde visitantes:</strong>
                        </div>
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Fecha de entrada</strong>
                        </div>
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Fecha de Salida</strong>
                        </div>
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Precio</strong> $80
                        </div>
                        <!-- textarea -->
                        <div class="border-bottom p-2">
                            <div class="form-group">
                                <textarea class="form-control">COMENTARIOS:</textarea>
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
                            <strong class="m-0 text-uppercase">ROOM 101</strong> 
                            <span>$1000</span> 
                            <span class="delete"><img width="22" src="/images/iconos/delete.svg" alt="delete"></span>
                        </div>
                        <div class="border-bottom p-2 d-flex justify-content-between">
                            <strong class="m-0 text-uppercase">ROOM 102</strong> 
                            <span>$1000</span> 
                            <span class="delete"><img width="22" src="/images/iconos/delete.svg" alt="delete"></span>
                        </div>
                        <div class="border-bottom p-2 d-flex justify-content-between">
                            <strong class="m-0 text-uppercase">ROOM 103</strong> 
                            <span>$1000</span> 
                            <span class="delete"><img width="22" src="/images/iconos/delete.svg" alt="delete"></span>
                        </div>
                        <div class="border-bottom p-2 d-flex justify-content-between">
                            <strong class="m-0 text-uppercase">ROOM 104</strong> 
                            <span>$1000</span> 
                            <span class="delete"><img width="22" src="/images/iconos/delete.svg" alt="delete"></span>
                        </div>
                        <div class="border-bottom p-2 d-flex justify-content-between">
                            <strong class="m-0 text-uppercase">Precio total:</strong> 
                            <strong>$1000</strong> 
                        </div>
                        
                    </div>

                    <div class="text-center mt-4">
                        <div>
                            <a href="#" class="">
                                <img width="100px" src="/images/iconos/paypal_logo.png" alt="paypal">
                            </a>
                            <p class="mt-2">
                                Haz click en la imagen para procesar el pago
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
export default {
    data(){
        return {
            user:{
                name_reserva:null,
                telef_reserva:null,
                identidad_reserva:null
            },
            // disabledActivo: false,
            // terminos:false
        }
    },methods:{
       getDataUser(){
        let data=this.$store.getters.getUser;
        this.user.name_reserva=data.name+' '+data.lastname;
        this.user.telef_reserva=data.phone;
        this.user.identidad_reserva=data.identidad;
       }
    },
    computed:{
        getAuthenticated(){
          return this.$store.getters.getAuthenticated;
        }
    },mounted(){
        this.getDataUser();
    }
}
</script>


<style scoped>
.bg-secondary{
    background-color: #c7c7c7 !important;
}
.form-control{
    background-color: transparent;
    border-radius: 0px;
}
.form-control:focus {
    border-color: #ced4da;
}
.delete{
    cursor: pointer;
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
