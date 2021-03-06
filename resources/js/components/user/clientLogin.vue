<template>
    <div>
        <section class="bg-contact">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="rounded bg-form-contact ">
                        <h2 class="text-center text-separation py-4 text-uppercase">Sign in</h2>

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
                                    <input id="email" type="email" :maxlength="50" v-validate="'required|email|min:9|max:50'" data-vv-delay="1500"
                                           name="email" data-vv-as="Email" :class="{'text-danger': errors.has('email') }"
                                           v-model="form.email" class="form-control form-material" placeholder="Email">
                                    <small v-show="errors.has('email')" class="help text-danger">{{ errors.first('email') }}</small>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="text-uppercase">Password</label>
                                    <span v-show="errors.has('password')" class="help text-danger">*</span>
                                    <input id="password" type="password" :maxlength="16" v-model="form.password" v-validate="'required|min:8|max:16'" data-vv-delay="1500"
                                           name="password" :class="{'text-danger': errors.has('password') }" class="form-control form-material" placeholder="Password">
                                    <span v-show="errors.has('password')" class="help text-danger">{{ errors.first('password') }}</span>
                                </div>

                                <div class="col-12">
                                    <a href="#" @click.prevent="forgotPassword">Forgot password?</a>
                                </div>

                                <div class="row text-center py-4">
                                    <div class="col-lg-4 py-2">
                                        <button :disabled="errors.any() || isDisabled" @click="login" type="button" class="btn btn-primary text-bold">
                                            <span class="text-btn-white">Login</span>
                                        </button>
                                    </div>
                                    <div class="col-lg-8 py-2">
                                        <button @click="redirectToCreateAccount" type="button" class="btn btn-primary-new text-bold">
                                            <span class="text-btn-white">Don't you have an account yet? Create it!</span>
                                        </button>
                                    </div>
                                </div>
                                <captcha/>
                            </form>
                        </template>
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
                                    this.showAlert('success', 'Successful authenticated user');
                                    setTimeout(() => {
                                        (admin === true) ? location.href = '/home' : slf.$router.push('/')
                                    }, 1800);

                                }).catch(() => console.log('error store'));
                            }
                        })
                            .catch((error) => {
                                switch (error.response.status) {
                                    case 401:
                                        this.loading = false;
                                        this.showAlert('error', 'The user is not registered');
                                        break;
                                    case 500:
                                        this.loading = false;
                                        this.showAlert('error', 'Connection Error');
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
                this.$router.push('/setPassword');
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
</style>
