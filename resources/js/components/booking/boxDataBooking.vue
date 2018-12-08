<template>
    <div>
        <div class="card my-2">
            <div class="card-header lead text-white font-weight-bold">
                Inserisci i tuoi dati
            </div>
            <div class="card-body">
               <form>
                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <span class="text-success" :class="{'text-danger': errors.has('first_name')}">*</span>
                            <label for="first_name">Nome</label>
                            <input v-model="value.first_name" type="text" class="form-control" name="first_name" v-validate.initial="'required|alpha_spaces|min:2|max:30'" data-vv-delay="1500" data-vv-as="First Name" :class="{'text-danger': errors.has('first_name')}">
                            <small v-show="errors.has('first_name')" class="help text-danger">{{ errors.first('first_name') }}</small>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <span class="text-success" :class="{'text-danger': errors.has('last_name')}">*</span>
                            <label for="last_name">Cognome</label>
                            <input v-model="value.last_name" type="text" class="form-control" name="last_name" v-validate.initial="'required|alpha_spaces|min:2|max:30'" data-vv-delay="1500" data-vv-as="Last Name" :class="{'text-danger': errors.has('last_name')}">
                            <small v-show="errors.has('last_name')" class="help text-danger">{{ errors.first('last_name') }}</small>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <span class="text-success" :class="{'text-danger': errors.has('email')}">*</span>
                            <label for="email">E-mail</label>
                            <input v-model="value.email" type="text" class="form-control" name="email" v-validate.initial="'required|email'" data-vv-delay="1500" data-vv-as="E-mail" :class="{'text-danger': errors.has('email')}">
                            <small v-show="errors.has('email')" class="help text-danger">{{ errors.first('email') }}</small>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                          <span class="text-success" :class="{'text-danger': errors.has('phone')}">*</span>
                            <label for="phone">Telefono</label>
                            <input v-model="value.phone" type="text" class="form-control" name="phone" v-validate.initial="'required|numeric|min:9|max:16'" data-vv-delay="1500" data-vv-as="Phone Number" :class="{'text-danger': errors.has('phone')}">
                            <small v-show="errors.has('phone')" class="help text-danger">{{ errors.first('phone') }}</small>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="dni">Codice fiscale</label>
                            <input v-model="value.fiscalCode" type="text" class="form-control" id="dni" value="">
                        </div>
                        <div class="col-12 col-md-6 mb-3 text-right">
                            <label class="d-block" for="dni">Vuoi registrarti</label>
                            <label class="switch m-0">
                                <input v-model="value.register" type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div v-if="value.register" class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <span class="text-success" :class="{'text-danger': errors.has('password')}">*</span>
                            <label for="password">Password</label>
                            <input v-model="value.password" type="password" class="form-control" v-validate.initial="'required|alpha_dash|min:6'" name="password" data-vv-delay="1500" data-vv-as="Password" ref="password">
                            <small v-show="errors.has('password')" class="help text-danger">{{ errors.first('password') }}</small>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <span class="text-success" :class="{'text-danger': errors.has('confpassword')}">*</span>
                            <label for="confpassword">Conferma la password</label>
                            <input type="password" class="form-control" v-validate.initial="'required|confirmed:password'" name="confpassword" data-vv-delay="1500" data-vv-as="Confirm Password">
                            <small v-show="errors.has('confpassword')" class="help text-danger">{{ errors.first('confpassword') }}</small>
                        </div>
                    </div>
               </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['value'],
}
</script>

<style scoped>
.card{
    border-radius: 0rem;
}
.card-header{
    background-color: #21b186;
    border-radius: 0rem;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}
.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}
input:checked + .slider {
  background-color: #21b186;
}
input:focus + .slider {
  box-shadow: 0 0 1px #21b186;
}
input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}
/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}
.slider.round:before {
  border-radius: 50%;
}
</style>
