<template>
    <div class="">
			<h4 class="py-2 text-uppercase white font-weight-bold">Modificare compilando i campi</h4>
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="form-group">
                        <label class="mb-0 white font-weight-bold">Nome*</label>
                        <input type="text" :class="{'is-danger': errors.has('nombre') }" name="nombre" v-validate="'required'" v-model="section.nombre" ref="nombre" class="form-control form-material" placeholder="Jhon">
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="form-group">
                        <label class="mb-0 white font-weight-bold">Cognome*</label>
                        <input type="text" v-model="section.apellido" ref="apellido" class="form-control form-material" placeholder="Doe">
                    </div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="form-group">
                        <label class="mb-0 white font-weight-bold">Telefono*</label>
                        <input type="text" v-model="section.telefono" ref="telefono" class="form-control form-material" placeholder="">
                    </div>
				</div>
				<div class="col-12 col-md-6">
					<div class="form-group">
                        <label class="mb-0 white font-weight-bold">Email* <span class="msj_intruccion ml-2">(Questo será il tu nome utente)</span></label>
                        <input type="email" v-model="section.email" ref="email" class="form-control form-material" placeholder="">
                    </div>
				</div>
			</div>
			<div class="row">
                <div class="col-12">
				    <h6 class="font-weight-bold text-capitalize red">Preferenze dell' utente</h6>
				</div>
                <div class="col-12">
					<div class="form-check">
				      <input class="form-check-input" v-model="section.via_email" type="checkbox" id="" >
				      <label class="form-check-label color-check" for="disabledFieldsetCheck">
				        Nom voglio recevere promozioni via email
				      </label>
				    </div>
				</div>
				<div class="col-12">
					<div class="form-check">
				      <input class="form-check-input" v-model="section.via_sms"  type="checkbox" id="" >
				      <label class="form-check-label color-check" for="disabledFieldsetCheck">
				        Nom voglio recevere promozioni via MSM
				      </label>
				    </div>
				</div>
			</div>
			<div class="row">
                <div class="col-12">
                    <h4 class="py-2 text-uppercase white font-weight-bold">Indirizzo di consegna</h4>  
                </div>
				<div class="col-12 col-md-6">
					<div class="form-group">
                        <label class="mb-0 white font-weight-bold">Azienda*</label>
                        <input type="text" v-model="section.azienda" ref="azienda" class="form-control form-material" placeholder="">
                    </div>
				</div>
				<div class="col-12 col-md-6">
					<div class="form-group">
                        <label class="mb-0 white font-weight-bold">Via/Num.Civico* </label>
                        <input type="text" v-model="section.via_num" ref="via_num" class="form-control form-material" placeholder="">
                    </div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="form-group">
                        <label class="mb-0 white font-weight-bold">Cod Fiscale/P.IVA*</label>
                        <input type="text" v-model="section.cod_fiscale" ref="cod_fiscale" class="form-control form-material" placeholder="">
                    </div>
				</div>
				<div class="col-12 col-md-6">
					<div class="form-group">
                        <label class="mb-0 white font-weight-bold">Citta * </label>
                        <input type="text" v-model="section.citta" ref="citta" class="form-control form-material" placeholder="">
                    </div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="form-group">
                        <label class="mb-0 white font-weight-bold">Indirizzo*</label>
                        <input type="text" v-model="section.indirizzo" ref="indirizzo" class="form-control form-material" placeholder="">
                    </div>
				</div>
				<div class="col-12 col-md-6">
					<div class="form-group">
                        <label class="mb-0 white font-weight-bold">Provincia</label>
                        <input type="text" v-model="section.provincia" ref="provincia" class="form-control form-material" placeholder="">
                    </div>
				</div>
			</div>
            <div class="row">
                <div class="col-12">
                    <h6 class="font-weight-bold text-capitalize red">Termini e uso</h6>
                </div>
            </div>			
			<div class="row">
				<div class="col-12">
                    <h6 class="font-weight-bold text-capitalize red">Preferenze dell' utente</h6>
                </div>       
				<div class="col-12">
					<div class="form-check">
				      <input class="form-check-input" v-model="section.terminos" type="checkbox" id="" >
				      <label class="form-check-label white" for="disabledFieldsetCheck">
				        Ho letto e acetto i termini <span class="color-check">le condizioni di uso</span>
				      </label>
				    </div>
				</div>
			</div>
             <div class="text-center">
				 <b-button @click="" class="font-weight-bold mr-1 btn btn-success  my-2" title="">
                 INVIARE
                 <!--  <i class="far fa-edit"></i> -->
              </b-button>
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
		color:#118211!important;
		font-weight: bold;
	}
  .btn-success {
        color: #fff;
        background-color: #216619;
        border-color: #216619;
    }
</style>
