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
                        <template v-for="room in listRooms" >
                            <div class="bg-secondary border-bottom p-2">
                                <strong class="m-0 text-uppercase">Responsable: {{room.name}}</strong>
                            </div>
                            <div class="border-bottom p-2">
                                <label :for="'name_reserva_'+room.id" class="font-weight-bold">  
                                    <span class="text-success" :class="{'text-danger': errors.has('name_reserva_'+room.id) }">*</span>
                                    Reservado Para
                                </label>                                
                                <input  type="text"  :name="'name_reserva_'+room.id" :id="'name_reserva_'+room.id" class="form-control input_name" v-validate="'required'">
                                 <small v-show="errors.has('name_reserva_'+room.id)" class="help text-danger">{{ errors.first('name_reserva_'+room.id) }}</small>
                            </div>
                            <div class="border-bottom p-2">
                                <label :for="'email_reserva_'+room.id" class="font-weight-bold">  
                                    <span class="text-success" :class="{'text-danger': errors.has('email_reserva_'+room.id) }">*</span>
                                    Email
                                </label>    
                                <input type="email" :id="'email_reserva_'+room.id" :name="'email_reserva_'+room.id" class="form-control input_email" v-validate="'required|email'">
                                <small v-show="errors.has('email_reserva_'+room.id)" class="help text-danger">{{ errors.first('email_reserva_'+room.id) }}</small>
                            </div>
                            <div class="border-bottom p-2">                               
                                <label :for="'num_reserva_'+room.id" class="font-weight-bold">  
                                    <span class="text-success" :class="{'text-danger': errors.has('num_reserva_'+room.id) }">*</span>
                                    Numero
                                </label> 
                                <strong class="m-0 text-uppercase">Numero:</strong>
                                <input :data-id="room.id" :id="'num_reserva_'+room.id"  v-on:keyup="cantVisitante" type="number" :name="'num_reserva_'+room.id" class="form-control input_num" v-validate="'required|min_value:1'">
                                <small v-show="errors.has('num_reserva_'+room.id)" class="help text-danger">{{ errors.first('num_reserva_'+room.id) }}</small>
                            </div>
                        </template>
                    </div>

                    <!-- Datos de reserva -->
                    <div class="border">
                        <div class="bg-secondary border-bottom p-2">
                            <strong class="m-0 text-uppercase">Datos de la reserva</strong>
                        </div>
                        <template v-for="room in listRooms">
                             <div class="border-bottom p-2">
                                <strong class="m-0 text-uppercase">{{room.name}}</strong>
                            </div>
                        </template>
                       
                        <div class="border-bottom p-2">
                            <strong class="m-0 text-uppercase">Cantidadde visitantes:</strong>
                            {{cant_visitantes}}
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
                            <strong class="m-0 text-uppercase">Precio</strong> 
                            € {{getTotal}}
                        </div>
                        <!-- textarea -->
                        <div class="border-bottom p-2">
                            <div class="form-group">
                                <textarea v-model="comentario" class="form-control">COMENTARIOS:</textarea>
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
                        <template v-for="room in listRooms">
                            <div class="border-bottom p-2 d-flex justify-content-between">
                                <strong class="m-0 text-uppercase">{{room.name}}</strong> 
                                <span>€ {{room.price}}</span> 
                                <a class="pointer" @click.prevent="deleteItem(room)" ><img width="22" src="/images/iconos/delete.svg" alt="delete" class="pointer"></a>
                            </div>
                        </template>
                    </div>

                    <div class="text-center mt-4">
                        <div>
                            <template  v-if="loading">
                                 <scale-loader  :loading="loading" :color="color" :size="size"></scale-loader>
                            </template>
                            <template v-else>
                                 <a @click.stop="paypal()" class="pointer">
                                    <img class="pointer" width="100px" src="/images/iconos/paypal_logo.png" alt="paypal">      
                                </a>
                                <p class="mt-2">
                                    Haz click en la imagen para procesar el pago
                                </p>
                            </template>
                           
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
                identidad_reserva:null,
                id:null,
            },
            cant_visitantes:0,
            comentario:null,
            rooms:[],
            orden:null,
            color: '#4fcaa5',
            size: '20px',
            loading: false,
            // disabledActivo: false,
            // terminos:false
        }
    },
    computed:{
        getAuthenticated(){
          return this.$store.getters.getAuthenticated;
        },
        listRooms(){
          this.rooms=this.$store.getters.getCart;
          return this.rooms;
        },
        getCheckin(){
            let data=this.$store.getters.getDataFilter;
            return Vue.moment(data.checkin).format('YYYY/MMM/DD').toUpperCase();
        },
        getCheckout(){
            let data=this.$store.getters.getDataFilter;
            return Vue.moment(data.checkout).format('YYYY/MMM/DD').toUpperCase();
        },
        getTotal(){
            return  this.$store.getters.getTotal.toFixed(2);
        }
    },mounted(){
        this.getDataUser();
       if(this.$store.getters.getTotal==0){
            this.showAlert('error', 'Errore!!', 'carrello vuoto')
       }   
    },methods:{
        getDataUser(){
            let data=this.$store.getters.getUser;
            if(data.id!=null){
                this.user.name_reserva=data.name+' '+data.lastname;
                this.user.telef_reserva=data.phone;
                this.user.identidad_reserva=data.identidad;
                this.user.id=data.id;
            }
            
        },
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
        deleteItem(item){
           this.$store.commit('removerItem',{list: item}); 
            var total_item=0;
            $( document ).ready(function() {
             $('.input_num').each(function(){
                var idroom=$(this).attr('data-id');
                if(idroom==item.id){
                    total_item=$(this).val();
                }
             });
           });
           this.cant_visitantes=parseInt(this.cant_visitantes)-parseInt(total_item);
           if(this.$store.getters.getTotal==0){
            this.$router.push('/booking/step-1');
           }          
        },
        cantVisitante(){
            var total=0;
            $( document ).ready(function() {
             $('.input_num').each(function(){
                total+=parseInt($(this).val());
             });
           });
           if(!isNaN(total)){
            this.cant_visitantes=total;
           }else{
             this.cant_visitantes=0;
           }    
        },
        paypal(){
            var slf=this;
            this.$validator.validateAll().then((result) => { 
             if(result){
                var rooms=this.$store.getters.getCart;
                var form=[];
                for(var i in rooms){
                   var obj={};
                   obj.idroom=rooms[i].id;
                   obj.name=document.getElementById("name_reserva_"+rooms[i].id).value;
                   obj.email=document.getElementById("email_reserva_"+rooms[i].id).value;
                   obj.numero=document.getElementById("num_reserva_"+rooms[i].id).value;
                   form.push(obj);
                }
                var objform={};
                objform.comentario=this.comentario;
                objform.datos_reserva=form;
                objform.cart=this.$store.getters.getBooking;
                objform.user_id=this.user.id;
                this.orden=objform; 
                this.loading=true;           
                axios.post('/paypal',this.orden).then((res) => {
                    if(res){
                        var url=res.data.url;
                        // this.loading=false;     
                        // window.location.href=url;
                    }
                }).catch((error) => {
                    this.loading=false;     
                });
             }            
            }).catch(() => {
                this.loading=false;
                console.log('error form')
            });
        }
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
.map{
    width: 100%;
    height: 260px;
}
.map iframe{
    width: 100%;
    height: 100%;
}
.text-success{
    font-size: 1.5rem;
}
.pointer{
    cursor:pointer!important;
}
</style>
