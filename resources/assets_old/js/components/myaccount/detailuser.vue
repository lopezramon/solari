<template>
    <div class="fondo">
      <returnback url="/" />
    <div class="container">
      <navorder></navorder>
        <div class="row">
            <div class="col-12 col-lg-4">
               <navprincipal></navprincipal>
            </div>
            <div class="col-12 col-lg-8">
                 <navphone></navphone>  

                 <div class="row">
                    <div class="col-12">
                        <h3 class="red text-capitalize mt-3">Modificare le Informazioni Dell'utente</h3>
                        <hr class="subray-title rounded mt-0">
                        <p class="text-justify white">
                            Compila il modulo seguente ed entro pochi secondi ricevarai nella tua casella e-mail il nome utente e la password da utilizzare sul nostro sito per confermare i tuoi ordini.  
                        </p>
                        <hr class="subray-title rounded mt-0">
                    </div>
                    <div class="col-12 justify-content-center">
                        
                        <!-- FORMULARIO -->
                        <edituser></edituser>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <menu_responsive/>
    </div>
</template>
<script>
    export default {
        data(){
            return{
              status_password_ant:false,
              status_password_nvo:false,
              status_password_conf:false,
              password_nvo:null,
              password_conf:null,
              password_ant:null,
              form_pass:true,
            }
        },
        methods: 
        {
            editIntput(input){
              switch(input){
                case 'password_anterior':
                  this.status_password_ant=!this.status_password_ant;
                break;
                case 'password_nuevo':
                  this.status_password_nvo=!this.status_password_nvo;
                break;
                case 'password_conf':
                  this.status_password_conf=!this.status_password_conf;
                break;
              }
            },
            verifPass(){
              this.form_pass=false;
            },
            back(){
               window.history.back();
            }
        }

    }
</script>

<style>
  .gray-form{
    display: block;
    font-size: 23px;
    color: #777676;
  }
  .btn-edit{
    color:#118211;
  }
  .btn-edit:hover{
    color:#777676;
    cursor: pointer;
  }
  .hide{
    display: none;
  }
  .btn-success {
        color: #fff;
        background-color: #216619;
        border-color: #216619;
  }
</style>
