<template>
    <div id="contact" class="bg-contact hr-bottom">

        <div class="py-2 p-lg-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-5 text-white text-center bg-dark-translucent">
                        <template v-if="loading">
                            <div class="container d-flex justify-content-center">
                                <div class="row m-5 mb-4">
                                    <div class="col-12">
                                        <bounce-loader :loading="loading" :color="color" :size="size"/>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <template v-else>
                            <h2 class="mt-3">INFORMAZIONI <br>SUL CONTATTO</h2>
                            <p class="contact-address">Via Roma 156 (8114,99km)/07026 Olbia</p>
                            <form class="form-contact">

                                <div class="form-group">
                                    <input type="text" :maxlength="30" v-validate="'required|alpha_spaces|min:2|max:30'" name="fullname" data-vv-as="Nome"
                                           :class="{'text-danger': errors.has('fullname') }" v-model="form.fullname" class="form-control form-material" placeholder="Nome & Cognome">
                                    <small v-show="errors.has('fullname')" class="help text-danger">{{ errors.first('fullname') }}</small>
                                </div>

                                <div class="form-group">
                                    <input type="text" :maxlength="50" v-validate="'required|email|min:9|max:50'" name="email"
                                           data-vv-as="Mail" :class="{'text-danger': errors.has('email') }"
                                           v-model="form.email" class="form-control form-material" placeholder="Mail">
                                    <small v-show="errors.has('email')" class="help text-danger">{{ errors.first('email') }}</small>
                                </div>

                                <div class="form-group">
                                    <input type="text" :maxlength="16" v-validate="'required|numeric|min:9|max:16'" name="phone"
                                           data-vv-as="Telefono" :class="{'text-danger': errors.has('phone') }"
                                           v-model="form.phone" class="form-control form-material" placeholder="Telefono">
                                    <small v-show="errors.has('phone')" class="help text-danger">{{ errors.first('phone') }}</small>
                                </div>

                                <div class="form-group">
                                    <input type="text" :maxlength="50" v-validate="'required|min:2|max:50'" name="subject"
                                           data-vv-as="Soggetto" :class="{'text-danger': errors.has('subject') }"
                                           v-model="form.subject" class="form-control form-material" placeholder="Inserisci un Soggetto">
                                    <small v-show="errors.has('subject')" class="help text-danger">{{ errors.first('subject') }}</small>
                                </div>

                                <div class="form-group">
                                <textarea v-model="form.message" :maxlength="150" v-validate="'required|min:2|max:150'"
                                          name="message" data-vv-as="messaggio" :class="{'is-danger': errors.has('message') }"
                                          class="form-control form-material" placeholder="Inserisci un messaggio" rows="3"></textarea>
                                    <small v-show="errors.has('message')" class="help text-danger">{{ errors.first('message') }}</small>
                                </div>

                                <div class="form-group">
                                    <button :disabled="errors.any() || isDisabled" @click.prevent="sendMail()" type="button" class="btn btn-success">
                                        INVIARE
                                    </button>
                                </div>

                            </form>
                            <p class="contact-advise">Invia un'email, Tutti i campi contrassegnati da * sono obbligatori.<br>Invia una copia alla tua email.</p>
                        </template>
                    </div>
                </div>

            </div>
        </div>


    </div>
</template>
<script>
    import { BounceLoader } from 'vue-spinner/dist/vue-spinner.min.js'
    export default {
        components: { BounceLoader },
        data() {
            return {
                form: {
                    fullname: null,
                    email: null,
                    subject: null,
                    phone: null,
                    message: null,
                },
                color: '#e33d2f',
                size: '40px',
                loading: false
            }
        },
        computed: {
            isDisabled() {
                return !this.form.fullname || !this.form.email || !this.form.subject || !this.form.phone || !this.form.message
            }
        },
        methods: {
            sendMail() {
                this.loading = true;
                this.$validator.validateAll().then((result) => {
                    axios.post('/api/contactus', this.form).then((res) => {
                        if (res) {
                            this.loading = false;
                            this.showAlert('success', 'La tua email è stata inviata');
                            this.cleanForm();
                        }
                    }).catch((error) => {
                        this.loading = false;
                        this.showAlert('error', 'Dovresti controllare alcuni di questi campi qui sotto.');
                    })
                }).catch(() => {
                    console.log('error form')
                });
            },
            showAlert(type, title) {
                this.$swal({
                    position: 'center',
                    type: type,
                    title: title,
                    showConfirmButton: false,
                    showCloseButton: true,
                })
            },
            cleanForm() {
                this.form = {
                    name: null,
                    email: null,
                    subject: null,
                    phone: null,
                    message: null,
                }
            }
        }
    }
</script>
<style scoped>

.bg-contact{
    background-image:url(/images/home/fondocontacto.jpg); 
    background-repeat: no-repeat;  
    background-size:cover;
}

.form-control.form-material {
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem 0rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #fff;
    background-color: transparent;
    background-clip: padding-box;
    border: 0px solid #ced4da;
    border-bottom: 1px solid #ced4da;
    border-radius: 0rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
    .form-control.form-material::-webkit-input-placeholder {
    color: #fff;
    }
.form-control:focus {
    background-color: transparent;
    border-color: #dc3545;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,0);
    margin-left: 10px;
    margin-right: 10px;
}
.form-control.v2:focus {
    background-color: #fff;
    border-color: #dc3545;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,0);
}
.contact-wrapper{
    background-image:url(/images/home/fondocontacto.jpg); 
    background-repeat: no-repeat;
    background-position:center;
    font-size: 16px;
    color: #fff;
    padding:10%;

}
h2{
    text-align: center;
    font-weight: bold;
    font-size: 28px;
}
.contact-address, .contact-advise, .contact-link{
    text-align: center;
    font-size: 1rem;
}
.contact-advise{
    margin-top: 20px;
}

label{
    margin: 0 auto;
    display: block;
    text-align: center;
    margin-bottom: -15px;
}
button {
    background-color: #28a745;
    border: none;
    color: white;
    padding: 5px 50px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 4px 2px;
    cursor: pointer;
}
.contact-wrapper .send{
    margin: 0 auto;
    display: block;
    color: #fff;
    font-weight: bold;
    border: 0px;
    font-size: 12px;
    padding: 4px 30px;
    margin-top: -10px; 

    background: #f90105;
    background: -moz-linear-gradient(top, #f90105 0%, #9b0516 100%);
    background: -webkit-linear-gradient(top, #f90105 0%,#9b0516 100%);
    background: linear-gradient(to bottom, #f90105 0%,#9b0516 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f90105', endColorstr='#9b0516',GradientType=0 );
}
.contact-wrapper .send:hover{
    background: #fd383d;
    background: -moz-linear-gradient(top, #fd383d 1%, #ba182b 100%);
    background: -webkit-linear-gradient(top, #fd383d 1%,#ba182b 100%);
    background: linear-gradient(to bottom, #fd383d 1%,#ba182b 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fd383d', endColorstr='#ba182b',GradientType=0 );
}

  .hr-bottom{
    border-bottom: 20px solid;
    border-color: #af0c16;
}
.btn-success {
        color: #fff;
        background-color: #216619;
        border-color: #216619;
}

</style>