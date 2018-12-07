<template>
    <div>
        <div class="card">
            <div class="card-header">
                Inserisci i tuoi dati
            </div>
            <div class="card-body">
               <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" value="">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="lastname">Cognome</label>
                            <input type="text" class="form-control" id="lastname" value="">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" id="email" value="">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="phone">Telefono</label>
                            <input type="text" class="form-control" id="phone" value="">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="dni">Codice fiscale</label>
                            <input type="text" class="form-control" id="dni" value="">
                        </div>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" value="">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="confpassword">Conferma la password</label>
                            <input type="password" class="form-control" id="confpassword" value="">
                        </div>
                    </div>
               </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['mensaje'],
    data() {
        return {

        }
    }
}
</script>

<style scoped>
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
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
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
