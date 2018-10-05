<template>
    <div>
        <section class="bg-contact">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="rounded bg-form-contact ">
                        <p class="text-center py-4">¿Tienes alguna pregunta?</p>
                        <h2 class="text-center text-separation text-uppercase">Contacto</h2>
                        <p class="text-center">
                            Ogni camera e climatizzata, dotata di tende oscuranti, frigo bar,
                            macchina del caffe, tv 40"4K dove e possible box doccia, asciugacapelli e kit
                        </p>
                        <template v-if="loading">
                            <div class="container d-flex justify-content-center">
                                <div class="row m-5 mb-4">
                                    <div class="col-12">
                                        <pulse-loader :loading="loading" :color="color" :size="size"/>
                                    </div>
                                </div>
                            </div>
                        </template>

                       <template v-else>
                           <form class="py-4">
                               <div class="form-group">
                                   <label for="fullname" class="text-uppercase">Nombre completo</label>
                                   <span v-show="errors.has('fullname')" class="help text-danger">*</span>
                                   <input id="fullname" type="text" :maxlength="30" v-validate="'required|alpha_spaces|min:2|max:30'" name="fullname" data-vv-as="Nombre completo"
                                          :class="{'text-danger': errors.has('fullname') }" v-model="form.name" class="form-control form-material" placeholder="Agrega tu nombre completo">
                                   <small v-show="errors.has('fullname')" class="help text-danger">{{ errors.first('fullname') }}</small>
                               </div>

                               <div class="form-group">
                                   <label for="email" class="text-uppercase">Email</label>
                                   <span v-show="errors.has('email')" class="help text-danger">*</span>
                                   <input id="email" type="text" :maxlength="50" v-validate="'required|email|min:9|max:50'" name="email"
                                          data-vv-as="Email" :class="{'text-danger': errors.has('email') }"
                                          v-model="form.email" class="form-control form-material" placeholder="Email">
                                   <small v-show="errors.has('email')" class="help text-danger">{{ errors.first('email') }}</small>
                               </div>

                               <div class="form-group">
                                   <label for="phone" class="text-uppercase">Telefono</label>
                                   <span v-show="errors.has('phone')" class="help text-danger">*</span>
                                   <input id="phone" type="text" :maxlength="16" v-validate="'required|numeric|min:9|max:16'" name="phone"
                                          data-vv-as="Telefono" :class="{'text-danger': errors.has('phone') }"
                                          v-model="form.phone" class="form-control form-material" placeholder="Telefono">
                                   <small v-show="errors.has('phone')" class="help text-danger">{{ errors.first('phone') }}</small>
                               </div>

                               <div class="form-group">
                                   <label for="subject" class="text-uppercase">Asunto</label>
                                   <span v-show="errors.has('subject')" class="help text-danger">*</span>
                                   <input id="subject" type="text" :maxlength="50" v-validate="'required|min:2|max:50'" name="subject"
                                          data-vv-as="Asunto" :class="{'text-danger': errors.has('subject') }"
                                          v-model="form.subject" class="form-control form-material" placeholder="Agrega un Asunto">
                                   <small v-show="errors.has('subject')" class="help text-danger">{{ errors.first('subject') }}</small>

                               </div>
                               <div class="form-group">
                                   <label for="message" class="text-uppercase">Tu mensaje</label>
                                   <span v-show="errors.has('message')" class="help text-danger">*</span>
                                   <textarea id="message" v-model="form.msg" :maxlength="150" v-validate="'required|min:2|max:150'"
                                             name="message" data-vv-as="Mensaje" :class="{'is-danger': errors.has('message') }"
                                             class="form-control form-material" placeholder="Escribe tu mensaje aquí..." rows="3"></textarea>
                                   <small v-show="errors.has('message')" class="help text-danger">{{ errors.first('message') }}</small>

                               </div>

                               <div class="form-row text-center py-4">
                                   <div class="col-12">
                                       <button :disabled="errors.any() || isDisabled" @click.prevent="sendMail()" type="button" class="btn btn-primary text-bold">
                                           <span class="text-btn-white">Enviar</span>
                                       </button>
                                   </div>
                               </div>
                           </form>
                       </template>
                    </div>
                </div>
            </div>

        </section>
        <section>
            <div class="container py-4 hide-movil">
                <div class="row">
                    <div class="col-lg-2 d-flex" ></div>
                    <div class="col-lg-2 d-flex" >
                        <div class="rounded text-center flex-fill">
                            <img width="105" src="/images/iconos/team.svg" alt="team"  class="rounded icon-contact">    
                        </div>
                    
                    </div>
                    
                    <div class="col-lg-2 d-flex">
                        <div class="text-center rounded flex-fill">
                            <img width="105" src="/images/iconos/smartphone.svg" alt="phone"  class="rounded icon-contact">
                            
                        </div>
                    </div>
                    
                    <div class="col-lg-2 d-flex">
                        <div class="rounded text-center flex-fill" >
                            <img width="105" src="/images/iconos/email.svg" alt="email" class="rounded icon-contact">
                            
                        </div>
                    </div>    

                    <div class="col-lg-2 d-flex">
                        <div class="text-center flex-fill" style="">
                            <img width="105" src="/images/iconos/follow.svg" alt="follow" class="rounded icon-contact">
                            
                        </div>
                        <div class="col-lg-2 d-flex"></div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container show-movil">
                <div class="row">
                    <div class="col-lg-2 d-flex"></div>
                    <div class="col-lg-2 d-flex">
                        <div class="text-center flex-fill">
                            <h5 class="text-separation">MEET US</h5>
                            <div>Double A Luxury Room<br>Olbia, Sardegna</div>
                        </div>

                    </div>

                    <div class="col-lg-2 d-flex">
                        <div class="text-center flex-fill">
                            <h5 class="text-separation">PHONE</h5>
                            <div>0789-1710013<br>0347-1757188</div>

                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="text-center">
                            <h5 class="text-separation">EMAIL</h5>
                            <div>luxuryroomolbia@gmail.com</div>
                        </div>
                    </div>

                    <div class="col-lg-2 d-flex">
                        <div class="text-center flex-fill">
                            <h5 class="text-separation">FOLLOW US</h5>
                            <div>aaluxuryroom<br>aaluxuryroom</div>
                        </div>
                    </div>
                    <div class="col-lg-2 d-flex"></div>
                </div>
            </div>

        </section>
        <section class="py-4"></section>
    </div>
</template>
<script>
    import { PulseLoader } from 'vue-spinner/dist/vue-spinner.min'

    export default {
        components: { PulseLoader },
        data() {
            return {
                form: {
                    name: null,
                    email: null,
                    subject: null,
                    phone: null,
                    msg: null,
                },
                color: '#1b1b1b',
                size: '15px',
                loading: false,
            }
        },
        computed: {
            isDisabled() {
                return !this.form.name || !this.form.email || !this.form.subject || !this.form.phone || !this.form.msg
            }
        },
        methods: {
            sendMail() {
                this.loading = true;
                this.$validator.validateAll().then((result) => {
                    axios.post('/api/contactus', this.form).then((res) => {
                        if (res) {
                            this.loading = false;
                            this.showAlert('success', 'Gracias por contactar  con nosotros, pronto te responderemos.');
                            this.cleanForm();
                            this.$router.push('/');
                        }
                    }).catch((error) => {
                        this.loading = false;
                        this.showAlert('error', 'Por favor verifica los datos enviados.');
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
                    msg: null,
                }
            }
        }
    }
</script>
<style scoped>

    .bg-contact {
        widows: 100%;
        min-height: 620px;
        padding-top: 200px;
        padding-bottom: 100px;
        background-image: url("/images/home/header-slider/header-image-1.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    .bg-form-contact {
        background-color: white;
        width: 50%;
        height: auto;
        padding: 0% 5%;

    }

    .text-separation {
        letter-spacing: 0.2rem
    }

    .icon-contact {
        border: 1px solid #8a8a8a;
        padding: 20px 20px 20px 20px
    }

    .text-btn-white {
        font-size: 1.3rem;
        letter-spacing: 0.2rem;
        font-weight: bold;

    }

    @media (max-width: 600px) {
        .bg-form-contact {
            width: 90%;
            height: auto;
            padding: 0% 5%;
        }

        .hide-movil {
            display: none;
        }

        .show-movil {
            padding: 5%;
        }

        .text-separation {
            letter-spacing: 0.2rem;
            padding-top: 10%;
        }
    }

    @media (max-width: 800px) {
        .hide-movil {
            display: none;
        }

        .show-movil {
            padding: 10%;
        }

        .text-separation {
            letter-spacing: 0.2rem;
            padding-top: 10%;
        }
    }
</style>
