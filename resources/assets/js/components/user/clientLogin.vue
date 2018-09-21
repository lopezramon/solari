<template>
    <div>
        <section class="bg-contact">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="rounded bg-form-contact ">
                        <h2 class="text-center text-separation py-4 text-uppercase">Inicio de sesion</h2>

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
                                    <label for="email" class="text-uppercase">Email</label>
                                    <span v-show="errors.has('email')" :class="{'text-danger': errors.has('email') }">*</span>
                                    <input id="email" type="email" :maxlength="50" v-validate="'required|email|min:9|max:50'" name="email"
                                           data-vv-as="Email" :class="{'text-danger': errors.has('email') }"
                                           v-model="form.email" class="form-control" placeholder="Email">
                                    <small v-show="errors.has('email')" class="help text-danger">{{ errors.first('email') }}</small>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="text-uppercase">Password</label>
                                    <span v-show="errors.has('password')" class="help text-danger">*</span>
                                    <input id="password" type="password" :maxlength="16" v-model="form.password" v-validate="'required|min:8|max:16'"
                                           name="password" :class="{'text-danger': errors.has('password') }"
                                           class="form-control" placeholder="Password">
                                    <span v-show="errors.has('password')" class="help text-danger">{{ errors.first('password') }}</span>
                                </div>

                                <div class="col-12">
                                    <a href="#" @click.prevent="forgotPassword">¿Ha olvidado la contraseña?</a>
                                </div>

                                <div class="row text-center py-4">
                                    <div class="col-lg-4 py-2">
                                        <button :disabled="errors.any() || isDisabled" @click="login" type="button" class="btn btn-primary text-bold">
                                            <span class="text-btn-white">Login</span>
                                        </button>
                                    </div>
                                    <div class="col-lg-8 py-2">
                                        <button @click="redirectToCreateAccount" type="button" class="btn btn-primary-new text-bold">
                                            <span class="text-btn-white">¿No tienes cuenta aún? Creala!</span>
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
                form: { email: null, password: null },
                color: '#1b1b1b',
                size: '15px',
                loading: false,
            }
        },
        mounted() {
            this.validarIntLogin();
        },
        computed: {
            isDisabled() { return !this.form.email || !this.form.password }
        },
        methods: {
            login() {
                this.loading = true;
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        axios.post('/login', this.form).then((res) => {
                            if (res.status === 200) {

                                var admin = res.data.admin;
                                this.$store.dispatch('setSession', res.data).then(() => {
                                    this.loading = false;
                                    let slf = this;
                                    this.showAlert('success', 'Usuario autenticado con exito');
                                    setTimeout(() => {
                                        (admin === true) ? location.href = '/home' : slf.$router.push('/')
                                    }, 1800);

                                }).catch(() => {console.log('error store')});
                            }
                        })
                            .catch((error) => {
                                switch (error.response.status) {
                                    case 401:
                                        this.loading = false;
                                        this.showAlert('error', 'El usuario no esta registrado');
                                        break;
                                    case 500:
                                        this.loading = false;
                                        this.showAlert('error', 'Error de conexión');
                                        break;
                                }
                            })
                    }
                }).catch(() => { console.log('error form') });
            },
            redirectToCreateAccount() {
                this.$router.push('/createAccount');
            },
            validarIntLogin() {
                let authenticated = this.$store.getters.getauthenticated;
                if (authenticated) {
                    this.$router.push('/');
                }
            },
            forgotPassword() {
                this.$router.push('/resetpassword');
            },
            showAlert(type, title) {
                this.$swal({
                    position: 'center',
                    type: type,
                    title: title,
                    showConfirmButton: false,
                    showCloseButton: true,
                });
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
        background-image: url("/images/home/gallery-slider-map/23.jpeg");
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
        font-size: 0.8rem;
        font-weight: bold;

    }

    .btn-primary-new {
        background-color: #373737;
        border-color: #373737;
        color: #FFF;
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
