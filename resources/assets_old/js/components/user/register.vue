<template>
    <div>
        <div class="fondo">
            <div class="container">
                <h4 class="py-2 text-uppercase white font-weight-bold">Registrati compilando i campi</h4>

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
                <form>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="mb-0 white font-weight-bold">Nome</label>
                                <span v-show="errors.has('name')" class="help text-danger">*</span>
                                <input type="text" :maxlength="30" v-validate="'required|alpha|min:2|max:30'" name="name"
                                       data-vv-as="Nome" :class="{'text-danger': errors.has('name') }"
                                       v-model="form.name" class="form-control form-material" placeholder="Nome">
                                <span v-show="errors.has('name')" class="help text-danger">{{ errors.first('name') }}</span>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="mb-0 white font-weight-bold">Cognome</label>
                                <span v-show="errors.has('lastname')" class="help text-danger">*</span>
                                <input type="text" :maxlength="30" v-validate="'required|alpha|min:2|max:30'"
                                       name="lastname" data-vv-as="Cognome" :class="{'text-danger': errors.has('lastname') }"
                                       v-model="form.lastname" class="form-control form-material" placeholder="Cognome">
                                <span v-show="errors.has('lastname')" class="help text-danger">{{ errors.first('lastname') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="mb-0 white font-weight-bold">Telefono</label>
                                <span v-show="errors.has('phone')" class="help text-danger">*</span>
                                <input type="text" :maxlength="16" v-validate="'required|numeric|min:9|max:16'" name="phone"
                                       data-vv-as="Telefono" :class="{'text-danger': errors.has('phone') }"
                                       v-model="form.phone" class="form-control form-material" placeholder="Telefono">
                                <span v-show="errors.has('phone')" class="help text-danger">{{ errors.first('phone') }}</span>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="mb-0 white font-weight-bold">Mail<span class="msj_intruccion ml-2">(Questo será il tu nome utente)</span></label>
                                <span v-show="errors.has('email')" class="help text-danger">*</span>
                                <input type="email" :maxlength="50" v-validate="'required|email|min:9|max:50'" name="email"
                                       data-vv-as="Mail" :class="{'text-danger': errors.has('email') || errorMail }"
                                       v-model="form.email" class="form-control form-material" placeholder="Mail">
                                <span v-show="errors.has('email')" class="help text-danger">{{ errors.first('email') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="mb-0 white font-weight-bold">Password</label>
                                <span v-show="errors.has('password')" class="help text-danger">*</span>
                                <input type="password" :maxlength="16" class="form-control form-material"
                                       placeholder="****" ref="password" v-validate="'required|min:8|max:16'" name="password"
                                       data-vv-as="Password" :class="{'text-danger': errors.has('password') }" v-model="form.password">
                                <span v-show="errors.has('password')" class="help text-danger">{{ errors.first('password') }}</span>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="mb-0 white font-weight-bold">Conferma Password</label>
                                <span v-show="errors.has('passwordConfirm')" class="help text-danger">*</span>
                                <input type="password" :maxlength="16" class="form-control form-material" placeholder="*****"
                                       v-validate="'required|min:8|max:16|confirmed:password'" name="passwordConfirm" v-model="form.passwordConfirm"
                                       data-vv-as="Password" :class="{'text-danger': (errors.has('passwordConfirm') || errorPassword) }">
                                <span v-show="errors.has('passwordConfirm')" class="help text-danger">{{ errors.first('passwordConfirm')}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h6 class="font-weight-bold text-capitalize red">Preferenze dell' utente</h6>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" v-model="form.viaEmail" type="checkbox" id="viaMailCheck">
                                <label class="form-check-label color-check" for="viaMailCheck">
                                    Nom voglio recevere promozioni via email
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" v-model="form.viaSms" type="checkbox" id="viaMsm">
                                <label class="form-check-label color-check" for="viaMsm">
                                    Nom voglio recevere promozioni via MSM
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h4 class="py-2 text-uppercase white font-weight-bold">Indirizzo di consegna</h4>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="mb-0 white font-weight-bold">Azienda</label>
                                <span v-show="errors.has('azienda')" class="help text-danger">*</span>
                                <input type="text" :maxlength="30" v-validate="'required|alpha_spaces|min:2|max:30'" name="azienda"
                                       data-vv-as="azienda" :class="{'text-danger': errors.has('azienda') }" v-model="form.azienda"
                                       class="form-control form-material" placeholder="Azienda">
                                <span v-show="errors.has('azienda')" class="help text-danger">{{ errors.first('azienda')}}</span>

                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="mb-0 white font-weight-bold">Via/Num.Civico</label>
                                <span v-show="errors.has('viaNum')" class="help text-danger">*</span>
                                <input type="text" :maxlength="30" v-validate="'required|min:2|max:30'" name="viaNum"
                                       data-vv-as="Via/Num.Civico" :class="{'text-danger': errors.has('viaNum') }" v-model="form.viaNum"
                                       class="form-control form-material" placeholder="Via/Num.Civico">
                                <span v-show="errors.has('viaNum')" class="help text-danger">{{ errors.first('viaNum')}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="mb-0 white font-weight-bold">Cod Fiscale/P.IVA</label>
                                <span v-show="errors.has('fiscalCode')" class="help text-danger">*</span>
                                <input type="text" :maxlength="16" v-validate="'required|alpha_num|min:16|max:16'" name="fiscalCode"
                                       data-vv-as="Cod Fiscale/P.IVA" :class="{'text-danger': errors.has('fiscalCode') }"
                                       v-model="form.fiscalCode" class="form-control form-material" placeholder="Cod Fiscale/P.IVA">
                                <span v-show="errors.has('fiscalCode')" class="help text-danger">{{ errors.first('fiscalCode') }}</span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="mb-0 white font-weight-bold">Provincia</label>
                                <span v-show="errors.has('province')" class="help text-danger">*</span>
                                <input type="text" :maxlength="30" v-validate="{ required: true, regex, min: 2, max: 30 }" name="province"
                                       data-vv-as="Provincia" :class="{'text-danger': errors.has('province') }"
                                       v-model="form.province" class="form-control form-material" placeholder="Provincia">
                                <span v-show="errors.has('province')" class="help text-danger">{{ errors.first('province') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="mb-0 white font-weight-bold">Città</label>
                                <span v-show="errors.has('city')" class="help text-danger">*</span>
                                <input type="text" :maxlength="30" v-validate="'required|alpha_spaces|min:2|max:30'"
                                       name="city" data-vv-as="Città" :class="{'text-danger': errors.has('city') }"
                                       v-model="form.city" class="form-control form-material" placeholder="Città">
                                <span v-show="errors.has('city')" class="help text-danger">{{ errors.first('city') }}</span>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="mb-0 white font-weight-bold">Indirizzo</label>
                                <span v-show="errors.has('address')" class="help text-danger">*</span>
                                <input type="text" :maxlength="100" v-validate="'required|min:2|max:100'" name="address"
                                       data-vv-as="Indirizzo" :class="{'text-danger': errors.has('address') }"
                                       v-model="form.address" class="form-control form-material" placeholder="Indirizzo">
                                <span v-show="errors.has('address')" class="help text-danger">{{ errors.first('address') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" v-validate="'required'" name="terms" v-model="form.terms" type="checkbox" value="" id="termsCheck">
                                <label class="form-check-label text-white" for="termsCheck">
                                    <span v-show="errors.has('terms')" class="help text-danger">*</span>
                                    He letto ed accetto i
                                    <router-link class="text-success link" to="/terms">Termini e le condizioni d'uso</router-link>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <my-captcha :callSuccess="captchaOk" color="green" resolve="text" class=" bg-white"></my-captcha>
                    </div>

                    <div class="form-group mt-3 text-center">
                        <button type="button" class="btn btn-success btn-lg" :disabled="errors.any() || isDisabled" @click="saveUser">
                            Salva
                        </button>
                    </div>
                </form>
            </template>
            </div>
        </div>
    </div>
</template>
<script>
    import { BounceLoader } from 'vue-spinner/dist/vue-spinner.min';
    import myCaptcha from 'vue-captcha';
    export default {
        components: { BounceLoader, myCaptcha },
        data() {
            return {
                form: {
                    name: null,
                    lastname: null,
                    email: null,
                    phone: null,
                    password: null,
                    passwordConfirm: null,
                    viaEmail: null,
                    viaSms: null,
                    azienda: null,
                    viaNum: null,
                    fiscalCode: null,
                    province: null,
                    city: null,
                    address: null,
                    terms: null
                },
                errorPassword: null,
                errorMail: null,
                regex: /^[a-zA-ZàèéìíîòóùúÀÈÉÌÍÎÒÓÙÚáéíñóúüÁÉÍÑÓÚÜ\-'\s]+$/i,
                color: '#e33d2f',
                size: '40px',
                loading: false,
                captcha:false,
            }
        },
        computed: {
            isDisabled() {
                return !this.form.name || !this.form.lastname || !this.form.email || !this.form.phone || !this.form.password || !this.form.passwordConfirm || !this.form.azienda || !this.form.viaNum || !this.form.fiscalCode || !this.form.province || !this.form.city || !this.form.address || !this.form.terms || !this.captcha
            }
        },
        methods: {
            saveUser() {
                if (this.form.password !== this.form.passwordConfirm) {
                    this.errorPassword = "text-danger";
                } else {
                    this.$validator.validateAll().then((result) => {
                        if (result) {
                            var slf = this;
                            slf.errorPassword = null;
                            slf.errorEmail = null;

                            axios.post('api/register', this.form).then((res) => {
                                if (res.status == 200) {
                                    var data = res.data;
                                    slf.$store.dispatch('setSession', data).then((r) => {
                                        let slf = this;
                                        this.showAlert('success', 'Account creato con successo');
                                        slf.$router.push('/');
                                    }).catch(() => {
                                        console.log('error store');
                                        this.showAlert('error', 'Dovresti controllare alcuni di questi campi qui sotto.');
                                    });
                                }
                            })
                                .catch((error) => {
                                    if (error.response.status = 422) {
                                        if (error.response.data.error != undefined) {
                                            let message = error.response.data.error.email[0];
                                            this.errorMail = 'text-danger';
                                            this.showAlert('error', message, 'Si prega di controllare l\'e-mail: ' + this.form.email);
                                        }
                                    }
                                })
                        }
                    }).catch(() => {
                        console.log('error form')
                    });
                }
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
            captchaOk () {
                this.captcha = true;
            },
        }
    }
</script>
<style>
    .msj_intruccion {
        color: white;
        font-size: 12px;
        font-weight: bold;
    }

    .color-check {
        color: #118211 !important;
        font-weight: bold;
    }

    .btn-success {
        color: #fff;
        background-color: #216619;
        border-color: #216619;
    }
</style>