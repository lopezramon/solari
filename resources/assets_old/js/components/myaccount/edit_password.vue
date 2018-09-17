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
                        <h3 class="red text-capitalize mt-3">Cambia Password</h3>
                        <hr class="subray-title rounded mt-0">
                    </div>
                    <div class="col-12 justify-content-center">
                        <form action="">
                          <div class="row">
                            <div class="col-10">
                                <div class="form-group">
                                    <label class="mb-0 white font-weight-bold">Password Esistente *:</label>
                                    <input @change="verifPass()" type="password" v-model="password_ant" v-show="status_password_ant" ref="password_ant" class="form-control form-material" placeholder="***************">
                                    <span v-show="!status_password_ant" class="gray-form">*********************</span>
                                </div>
                            </div>
                            <div class="col-2 text-right">
                              <i class="far fa-edit btn-edit" @click="editIntput('password_anterior')" ></i>
                            </div>
                          </div>

                          <div :class="{'hide':form_pass}">
                            <div class="row">
                              <div class="col-10">
                                  <div class="form-group">
                                      <label class="mb-0 white font-weight-bold">Nuova Password *:</label>
                                      <input type="password" v-model="password_nvo" v-show="status_password_nvo" ref="password_nvo" class="form-control form-material" :class="" placeholder="***************">
                                      <span v-show="!status_password_nvo" class="gray-form">*********************</span>
                                  </div>
                              </div>
                              <div class="col-2 text-right">
                                <i class="far fa-edit btn-edit" @click="editIntput('password_nuevo')" ></i>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-10">
                                  <div class="form-group">
                                      <label class="mb-0 white font-weight-bold">Conferma Password *:</label>
                                      <input type="password" v-model="password_conf" v-show="status_password_conf" ref="password_conf" class="form-control form-material" :class="" placeholder="***************">
                                      <span v-show="!status_password_conf" class="gray-form">*********************</span>
                                  </div>
                              </div>
                              <div class="col-2 text-right">
                                <i class="far fa-edit btn-edit" @click="editIntput('password_conf')" ></i>
                              </div>
                            </div>
                          </div>
                          <b-button size="sm" @click="back()" class="font-weight-bold mr-1 btn btn-success  my-2" title="">
                             CANCELLARE
                             <!--  <i class="far fa-edit"></i> -->
                          </b-button>
                        </form>
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
