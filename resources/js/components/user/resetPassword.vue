<template>
    <div>
        <section class="bg-contact">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="rounded bg-form-contact">
                        <div class="py-2"></div>
                        <h2 class="text-center text-separation py-4 text-uppercase">Change Password</h2>

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
                            <form>
                                <div class="text-pwd text-center">Find you
                                    <img src="/images/logos/logo_luxury_pequeño_black.png" alt="logo luxury" width="30">
                                    LUXURY ROOM
                                </div>
                                <div class="py-2"></div>
                                <div class="form-group">
                                    <label for="email" class="text-uppercase">Email</label>
                                    <span class="text-success" :class="{'text-danger': errors.has('email') }">*</span>
                                    <input id="email" type="email" :maxlength="50" v-validate="'required|email|min:9|max:50'" data-vv-delay="1500"
                                           name="email" data-vv-as="Email" :class="{'text-danger': errors.has('email') }"
                                           v-model="form.email" class="form-control" placeholder="Email">
                                    <small v-show="errors.has('email')" class="help text-danger">{{ errors.first('email') }}</small>
                                </div>


                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <span class="text-success" :class="{'text-danger': errors.has('password')}">*</span>
                                    <input id="password" type="password" :maxlength="16" class="form-control" placeholder="********" ref="password"
                                           @click.prevent="clickPass" v-validate="'required|min:8|max:16'" name="password" data-vv-as="Password"
                                           :class="{'text-danger': errors.has('password')}" v-model="form.password">
                                    <span v-show="errors.has('password')" class="help text-danger">{{ errors.first('password') }}</span>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Password confirm</label>
                                    <span class="text-success" :class="{'text-danger': errors.has('password_confirmation')}">*</span>
                                    <input id="password_confirmation" type="password" :maxlength="16" class="form-control" placeholder="********" @click.prevent="clickPass"
                                           v-validate="'required|min:8|max:16|confirmed:password'" name="password_confirmation" v-model="form.password_confirmation"
                                           data-vv-as="Password confirm" :class="{ 'text-danger': (errors.has('password_confirmation') || validpass) }">
                                    <span v-show="errors.has('password_confirmation')" class="help text-danger">{{ errors.first('password_confirmation')}}</span>
                                </div>

                                <div class="row text-center py-4">
                                    <div class="col-12 py-2">
                                        <button type="button" :disabled="errors.any() || isDisabled" @click="validationPassword" class="btn btn-primary text-bold">
                                            <span class="text-btn-white">Change Password</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </template>
                    </div>
                </div>
            </div>
            <div class="container-fluid response">
                <div class="row justify-content-center">
                    <div class="rounded bg-form-contact">
                        <div class="text-center text-separation"><h2>ASSITENZA PASSWORD</h2></div>
                        <div class="text-center py-4">
                            <img class="img-fluid m-auto" src="/images/iconos/check-circle.svg" alt=""></div>
                        <div class="text-center">We sent you recovery link to <br>
                            <strong>andrea.ramos@gmail.com</strong> successfully
                        </div>
                        <div class="py-4"></div>

                    </div>
                </div>
            </div>
        </section>
        <information />
        <section class="py-3"></section>
    </div>
</template>
<script>
    import { PulseLoader } from 'vue-spinner/dist/vue-spinner.min'

    export default {
        components: { PulseLoader },
        data() {
            return {
                root: null,
                validpass: false,
                form: {
                    email: null,
                    password: null,
                    password_confirmation: null,
                    token: this.$route.params.hash,
                },
                color: '#1b1b1b',
                size: '15px',
                loading: false,
            }
        },
        mounted() {
            this.root = window.location.origin;
        },
        computed: {
            isDisabled() {
                return !this.form.email || !this.form.password || !this.form.password_confirmation
            }
        },
        methods: {
            validationPassword() {
                this.loading = true;
                if (this.form.password_confirmation !== this.form.password) {
                    this.validpass = true;
                    this.showAlert('warning', 'las claves deben coincidir');
                    this.loading = false;

                } else {
                    this.$validator.validateAll().then((result) => {
                        if (result) {
                            this.ChangePassword();
                        }
                    }).catch(() => {
                        console.log('error form')
                    });
                }
            },
            ChangePassword() {
                var slf = this;
                axios.post(this.root + '/api/password/reset', this.form).then((res) => {
                    // console.log(res);
                    if (res.status === 200) {
                        this.loading = false;
                        this.showAlert('success', 'La clave a sido cambiada con exito');
                        slf.$router.push('/clientLogin');
                    } else if (res.status === 302) {
                        this.loading = false;
                        console.log(res);
                    }
                })
                    .catch((error) => {
                        this.loading = false;
                        console.error(error);
                        if (error.response.data.errors) {
                            this.showAlert('error', 'Error al cambiar la clave', error.response.data.errors);
                        }
                    });
            },
            showAlert(type, title, text) {
                this.$swal({
                    position: 'center',
                    type: type,
                    title: title,
                    text: text,
                    showConfirmButton: false,
                    showCloseButton: true,
                })
            },
            clickPass() { this.validpass = false; }
        }
    }
</script>
<style scoped>
    .bg-contact {
        widows: 100%;
        min-height: 620px;
        padding-top: 200px;
        padding-bottom: 100px;
        background-image: url("/images/solaria-vacanze-affitto-ville-appartamenti-sardegna-budoni-san-teodoro.jpg");
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

    .form-control {
        outline: none;
        border-bottom: 1px solid #373737;
        border-top: 0;
        border-left: 0;
        border-right: 0;
        border-radius: 0;

    }

    .form-control:focus {
        box-shadow: none;
        border-bottom: 1px solid #373737;
        border-top: 0;
        border-left: 0;
        border-right: 0;
        border-radius: 0;
    }

    .text-pwd {
        font-size: 0.8rem;
    }

    .response {
        display: none;
    }

</style>
