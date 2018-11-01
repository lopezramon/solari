<template>
    <div>
        <section class="bg-contact">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="rounded bg-form-contact ">
                        <h2 class="text-center text-separation py-4 text-uppercase">Sign up</h2>

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
                            <div class="container">
                                <form>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <span class="text-success" :class="{'text-danger': errors.has('name')}">*</span>
                                                <input id="name" type="text" :maxlength="30" v-validate="'required|alpha|min:2|max:30'" data-vv-delay="1500"
                                                       name="name" data-vv-as="Name" :class="{'text-danger': errors.has('name')}"
                                                       v-model="form.name" class="form-control form-material" placeholder="Name">
                                                <small v-show="errors.has('name')" class="help text-danger">{{ errors.first('name') }}</small>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="lastname" >Lastname</label>
                                                <span class="text-success" :class="{'text-danger': errors.has('lastname')}">*</span>
                                                <input id="lastname" type="text" :maxlength="30" v-validate="'required|alpha|min:2|max:30'" data-vv-delay="1500"
                                                       name="lastname" data-vv-as="Lastname" :class="{'text-danger': errors.has('lastname')}"
                                                       v-model="form.lastname" class="form-control form-material" placeholder="Lastname">
                                                <small v-show="errors.has('lastname')" class="help text-danger">{{ errors.first('lastname') }}</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="phone">Phone Number</label>
                                                <span class="text-success" :class="{'text-danger': errors.has('phone')}">*</span>
                                                <input id="phone" type="text" :maxlength="16" v-validate="'required|numeric|min:9|max:16'" data-vv-delay="1500"
                                                       name="phone" data-vv-as="Phone number" :class="{'text-danger': errors.has('phone')}"
                                                       v-model="form.phone" class="form-control form-material" placeholder="Phone number">
                                                <small v-show="errors.has('phone')" class="help text-danger">{{ errors.first('phone') }}</small>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="optionalPhone">Optional phone number</label>
                                                <span class="text-success" :class="{'text-danger': errors.has('optionalPhone')}">*</span>
                                                <input id="optinalPhone" type="text" :maxlength="16" v-validate="'numeric|min:9|max:16'" data-vv-delay="1500"
                                                       name="optionalPhone" data-vv-as="Optional phone number" :class="{'text-danger': errors.has('optionalPhone')}"
                                                       v-model="form.optionalPhone" class="form-control form-material" placeholder="Optional phone number">
                                                <small v-show="errors.has('optionalPhone')" class="help text-danger">{{ errors.first('optionalPhone') }}</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <span class="text-success" :class="{'text-danger': errors.has('email')}">*</span>
                                                <input type="email" :maxlength="50" v-validate="'required|email|min:9|max:50'" data-vv-delay="1500"
                                                       name="email" data-vv-as="Email" :class="{ 'text-danger': errors.has('email') || errorMail }"
                                                       v-model="form.email" class="form-control form-material" placeholder="Email">
                                                <small v-show="errors.has('email')" class="help text-danger">{{ errors.first('email') }}</small>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="fiscalCode">Fiscal Code</label>
                                                <span class="text-success" :class="{'text-danger': errors.has('fiscalCode')}">*</span>
                                                <input id="fiscalCode" type="text" :maxlength="16" v-validate="'required|alpha_num|min:16|max:16'" data-vv-delay="1500"
                                                       name="fiscalCode" data-vv-as="Fiscal Code" :class="{'text-danger': errors.has('fiscalCode')}"
                                                       v-model="form.fiscalCode" class="form-control form-material" placeholder="Fiscal Code">
                                                <small v-show="errors.has('fiscalCode')" class="help text-danger">{{  errors.first('fiscalCode') }}</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <span class="text-success" :class="{'text-danger': errors.has('password')}">*</span>
                                                <input type="password" :maxlength="16" class="form-control form-material" placeholder="********" ref="password"
                                                       v-validate="'required|min:8|max:16'" name="password" data-vv-as="Password"
                                                       :class="{'text-danger': errors.has('password')}" v-model="form.password">
                                                <span v-show="errors.has('password')" class="help text-danger">{{ errors.first('password') }}</span>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Password confirm</label>
                                                <span class="text-success" :class="{'text-danger': errors.has('passwordConfirm')}">*</span>
                                                <input type="password" :maxlength="16" class="form-control form-material" placeholder="********"
                                                       v-validate="'required|min:8|max:16|confirmed:password'" name="passwordConfirm" v-model="form.passwordConfirm"
                                                       data-vv-as="Password confirm" :class="{ 'text-danger': (errors.has('passwordConfirm') || errorPassword) }">
                                                <span v-show="errors.has('passwordConfirm')" class="help text-danger">{{ errors.first('passwordConfirm')}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" v-validate="'required'" name="terms" v-model="form.terms" type="checkbox" value="" id="termsCheck">
                                        <label class="form-check-label" for="termsCheck">
                                            <span v-show="errors.has('terms')" class="help text-danger">*</span>
                                            I have read and accept
                                            <router-link class="text-success link" to="/termini">The terms and conditions of use</router-link>
                                        </label>
                                    </div>
                                </form>
                            </div>

                            <div class="row text-center py-4">
                                <div class=" col-lg-2 col-sm-4 py-2">
                                    <button type="button" class="btn btn-primary text-bold" :disabled="errors.any() || isDisabled" @click="saveUser">
                                        <span class="text-btn-white">Sign up</span>
                                    </button>
                                </div>

                                <div class="col-lg-4 col-sm-8 py-2">
                                    <router-link to="/clientLogin">
                                        <button type="submit" class="btn btn-primary-new text-bold" @click="RedirectToLogin">
                                            <span class="text-btn-white">Do you have an account? Sign in</span>
                                        </button>
                                    </router-link>
                                </div>
                                <captcha/>                               
                            </div>
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
    import { PulseLoader } from 'vue-spinner/dist/vue-spinner.min';
    export default {
        components: { PulseLoader },
        data() {
            return {
                form: {
                    name: null,
                    lastname: null,
                    email: null,
                    phone: null,
                    optionalPhone: null,
                    fiscalCode: null,
                    password: null,
                    passwordConfirm: null,
                    terms: null
                },
                /*production: null,*/
                errorPassword: null,
                errorMail: null,
                regex: /^[a-zA-ZàèéìíîòóùúÀÈÉÌÍÎÒÓÙÚáéíñóúüÁÉÍÑÓÚÜ\-'\s]+$/i,
                color: '#1b1b1b',
                size: '15px',
                loading: false,
            }
        },/*mounted() {
            const enviroment = this.$store.getters.getEnviroment;
            if (enviroment.env === 'production') {
                return this.production = true
            } else  return this.production = false
        },*/
        computed: {
            isDisabled() {
                return !this.form.name || !this.form.lastname || !this.form.email || !this.form.phone || !this.form.password || !this.form.passwordConfirm || !this.form.fiscalCode || !this.form.terms
            }            
        },
        methods: {
            saveUser() {
                this.loading = true;
                if (this.form.password !== this.form.passwordConfirm) {
                    this.loading = false;
                    this.errorPassword = "text-danger";
                } else {
                    this.$validator.validateAll().then((result) => {
                        if (result) {
                            var slf = this;
                            slf.errorPassword = null;
                            slf.errorEmail = null;

                            axios.post('/register', this.form).then((res) => {
                                if (res.status === 200) {
                                    var data = res.data;
                                    console.log('resp: ' + res.data);
                                    slf.$store.dispatch('setSession', data).then(() => {
                                        let slf = this;
                                        this.loading = false;
                                        this.showAlert('success', '\' Account created with success!');
                                        slf.$router.push('/');
                                    }).catch(() => {
                                        this.loading = false;
                                        console.log('error store');
                                        this.showAlert('error', 'Please check the data sent');
                                    });
                                }
                            })
                                .catch((error) => {
                                    if (error.response.status === 422) {
                                        if (error.response.data.error !== undefined) {
                                            let message = error.response.data.error.email[0];
                                            this.errorMail = 'text-danger';
                                            this.loading = false;
                                            this.showAlert('error', message, 'Check the email: ' + this.form.email);
                                        }
                                    }
                                })
                        }
                    }).catch(() => { this.loading = false; console.log('error form') });
                }
            },
            RedirectToLogin() { this.$router.push('/clientLogin'); },
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
        width: 70%;
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

        .note {
            font-size: 0.7rem;
            margin-top: -4%;
            padding-bottom: 1%;
        }

    }

    .note {
        font-size: 0.7rem;
        margin-top: -4%;
        padding-bottom: 5%;
    }
</style>
