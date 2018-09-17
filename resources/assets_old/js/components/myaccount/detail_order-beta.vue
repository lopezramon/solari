<template>
    <div class="fondo">
        <returnback url="/" />
    <div class="container">
      <navorder></navorder>
        <div class="row">
            <div class="col-12 col-md-4">
               <navprincipal></navprincipal>
            </div>
            <div class="col-12 col-md-8">
                 <navphone></navphone>  



    	<div class="container">
			<h4 class="py-2 text-uppercase red font-weight-bold">Modifica L'Indirizzo di fatturazione</h4>
		    <hr class="subray-title rounded mt-0">
			<p class="text-justify white">
				Compila il modulo seguente ed entro pochi secondi ricevarai nella tua casella e-mail il nome utente e la password da utilizzare sul nostro sito per confermare i tuoi ordini.  
			</p>

			<div class="row">
				<div class="col-12">
                        <label class="mb-0 white font-weight-bold">Azienda*</label>
                        <input type="text" v-model="section.azienda" ref="azienda" class="form-control form-material" placeholder="">

                        <label class="mb-0 white font-weight-bold">Nome*</label>
                        <input type="text" :class="{'is-danger': errors.has('nombre') }" name="nombre" v-validate="'required'" v-model="section.nombre" ref="nombre" class="form-control form-material" placeholder="Jhon">

                        <label class="mb-0 white font-weight-bold">Cognome*</label>
                        <input type="text" v-model="section.apellido" ref="apellido" class="form-control form-material" placeholder="Doe">

                        <label class="mb-0 white font-weight-bold">Email* <span class="msj_intruccion ml-2">(Questo será il tu nome utente)</span></label>
                        <input type="email" v-model="section.email" ref="email" class="form-control form-material" placeholder="">

                        <label class="mb-0 white font-weight-bold">Telefono*</label>
                        <input type="text" v-model="section.telefono" ref="telefono" class="form-control form-material" placeholder="">

                        <label class="mb-0 white font-weight-bold">Cod Fiscale/P.IVA*</label>
                        <input type="text" v-model="section.cod_fiscale" ref="cod_fiscale" class="form-control form-material" placeholder="">

                        <label class="mb-0 white font-weight-bold">Indirizzo*</label>
                        <input type="text" v-model="section.indirizzo" ref="indirizzo" class="form-control form-material" placeholder="">

                        <label class="mb-0 white font-weight-bold">Via/Num.Civico* </label>
                        <input type="text" v-model="section.via_num" ref="via_num" class="form-control form-material" placeholder="">

                        <label class="mb-0 white font-weight-bold">Citta * </label>
                        <input type="text" v-model="section.citta" ref="citta" class="form-control form-material" placeholder="">

                        <label class="mb-0 white font-weight-bold">Provincia</label>
                        <input type="text" v-model="section.provincia" ref="provincia" class="form-control form-material" placeholder="">
                    <div class="">
                      <b-button @click="" class="font-weight-bold mr-1 btn btn-success my-2" title="">
		                 SALVA LE MODIFICHE
		                 <!--  <i class="far fa-edit"></i> -->
		              </b-button>
                      <b-button class="font-weight-bold mr-1 btn btn-edit  my-2" title="">
		                 CANCELLARE
		                 <!--  <i class="far fa-edit"></i> -->
		              </b-button>
                    </div>



                    </div>


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
            return{
                'section':{
                    nombre:null,
                    apellido:null,
                    telefono:null,
                    email:null,
                    password:null,
                    conf_pass:null,
                    via_email:null,
                    via_sms:null,
                    azienda:null,
                    via_num:null,
                    citta:null,
                    indirizzo:null,
                    provincia:null,
                    terminos:null,
                }
            }
        },
    }
</script>
<style>
	.msj_intruccion{
		color:white;
		font-size: 12px;
		font-weight: bold;
	}
	.color-check{
		color:#fff!important;
		font-weight: bold;
	}
  .gray-form{
    display: block;
    font-size: 23px;
    color: #777676;
  }
  .btn-edit{
    color:#fff;
  }
  .btn-edit:hover{
    color:#777676;
    cursor: pointer;
  }
  .hide{
    display: none;
  }

</style>
