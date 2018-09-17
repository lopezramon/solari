<template>
<div>
  <headerAccount/>
  <navaccount/>  
  <div class="container">  
    <div class="row mt-5" >
      <div class="col-12 mt-md-3 ">
        <div class="form-group">
          <label class="mb-0 white font-weight-bold">Nome</label>
          <span v-show="errors.has('name')" class="help text-danger">*</span>
          <input type="text" :maxlength="30" v-validate="'required|alpha|min:2|max:30'" name="name" data-vv-as="Nome" :class="{'text-danger': errors.has('name') }" v-model="form.name" class="form-control form-material" placeholder="Nome">
          <span v-show="errors.has('name')" class="help text-danger">{{ errors.first('name') }}</span>
        </div>
      </div>
      <div class="col-12 mt-md-3">
        <div class="form-group">
          <label class="mb-0 white font-weight-bold">Cognome</label>
          <span v-show="errors.has('lastname')" class="help text-danger">*</span>
          <input type="text" :maxlength="30" v-validate="'required|alpha|min:2|max:30'"
                 name="lastname" data-vv-as="Cognome" :class="{'text-danger': errors.has('lastname') }"
                 v-model="form.lastname" class="form-control form-material" placeholder="Cognome">
          <span v-show="errors.has('lastname')" class="help text-danger">{{ errors.first('lastname') }}</span>
        </div>
      </div>
      <div class="col-12 mt-md-3">
        <div class="form-group">
          <label class="mb-0 white font-weight-bold">Mail<span class="msj_intruccion ml-2">(Questo será il tu nome utente)</span></label>
          <span v-show="errors.has('email')" class="help text-danger">*</span>
          <input type="email" :maxlength="50" v-validate="'required|email|min:9|max:50'" name="email"
                 data-vv-as="Mail" :class="{'text-danger': errors.has('email') }"
                 v-model="form.email" class="form-control form-material" placeholder="Mail" >
          <span v-show="errors.has('email')" class="help text-danger">{{ errors.first('email') }}</span>
        </div>
      </div>
      <div class="col-12 mt-md-3">
        <div class="form-group">
          <label class="mb-0 white font-weight-bold">Telefono</label>
          <span v-show="errors.has('phone')" class="help text-danger">*</span>
          <input type="text" :maxlength="16" v-validate="'required|numeric|min:9|max:16'" name="phone"
                 data-vv-as="Telefono" :class="{'text-danger': errors.has('phone') }"
                 v-model="form.phone" class="form-control form-material" placeholder="Telefono">
          <span v-show="errors.has('phone')" class="help text-danger">{{ errors.first('phone') }}</span>
        </div>
      </div>
      <div class="col-12 mt-md-3">
        <div class="form-group"> 
          <label class="mb-0 white font-weight-bold">Password</label>
          <span v-show="errors.has('password')" class="help text-danger">*</span>
          <input type="password" :maxlength="16"  name="phone"
                 data-vv-as="Password" :class="{'text-danger': errors.has('Password') }"
                 v-model="form.Password" class="form-control form-material" placeholder="Password">
          <span v-show="errors.has('Password')" class="help text-danger">{{ errors.first('Password') }}</span>
        </div>
      </div>
    </div>
      <div class="form-group col-12 text-center mb-5">
          <button type="button" class="btn btn-primary text-uppercase">
              Cambiamento
          </button>
      </div>
  </div>
</div>

</template>

<script>
     export default {
        data() {
            return {
                token: null,
                form: {
                    id: null,
                    name: null,
                    lastname: null,
                    email: null,
                    phone: null,
                    password:null,
                },
                regex: /^[a-zA-ZàèéìíîòóùúÀÈÉÌÍÎÒÓÙÚáéíñóúüÁÉÍÑÓÚÜ\-'\s]+$/i,
                color: '#e33d2f',
                size: '40px',
                loading: false,
                captcha: false,
            }
        },
        computed: {
            isDisabled() {
                return !this.form.name || !this.form.lastname || !this.form.email || !this.form.phone || !this.form.azienda || !this.form.viaNum || !this.form.fiscalCode || !this.form.province || !this.form.city || !this.form.address || !this.form.terms || !this.captcha
            }
        },
        
    }
</script>