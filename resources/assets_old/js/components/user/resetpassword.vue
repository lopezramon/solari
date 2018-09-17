<template>
    <div>
        <div class="container">
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
                <div class="row">
                    <div class="col-12 col-md-6 offset-md-3">
                        <h2 class="mt-3 text-white">Reset your password</h2>
                        <form>
                        <div class="form-group">
                            <label class="mb-0 white font-weight-bold">Inserisci l'mail</label>
                            <span v-show="errors.has('email')" class="help text-danger">*</span>
                            <input type="email" :maxlength="50" v-validate="'required|email|min:9|max:50'" name="email"
                                   :class="{'text-danger': errors.has('email') }" v-model="form.email" class="form-control form-material" placeholder="Mail">
                            <span v-show="errors.has('email')" class="help text-danger">{{ errors.first('email') }}</span>
                        </div>

                        <div class="form-group">
                            <label class="mb-0 white font-weight-bold">Nuova password</label>
                            <span v-show="errors.has('password')" class="help text-danger">*</span>
                            <input @click.prevent="clickPass()" type="password" :maxlength="16" v-model.trim="form.password" v-validate="'required|min:8|max:16'"
                                   name="password" :class="{'text-danger': errors.has('password') || validpass }" class="form-control form-material" placeholder="*******">
                            <span v-show="errors.has('password')" class="help text-danger">{{ errors.first('password') }}</span>
                        </div>

                        <div class="form-group">
                            <label class="mb-0 white font-weight-bold">Ripeti la password</label>
                            <span v-show="errors.has('password_confirmation')" class="help text-danger">*</span>
                            <input @click.prevent="clickPass()" type="password" :maxlength="16" v-model.trim="form.password_confirmation"
                                   v-validate="'required|min:8|max:16'" name="password_confirmation"
                                   :class="{'text-danger': errors.has('password_confirmation') || validpass }" class="form-control form-material" placeholder="*******">
                            <span v-show="errors.has('password_confirmation')" class="help text-danger"></span>
                        </div>

                        <div class="form-group mt-3">
                            <button :disabled="errors.any() || isDisabled" @click.prevent="setPass" class="btn btn-success btn-block btn-lg">
                                Reset
                            </button>
                        </div>
                    </form>
                    </div>
                </div>
            </template>
        </div>
    </div>
</template>
<script>
    import { BounceLoader } from 'vue-spinner/dist/vue-spinner.min'
    export default {
        components: { BounceLoader },
        data() {
            return {
                root: null,
                csrf_token: axios.defaults.headers.common['X-CSRF-TOKEN'],
                validpass: false,
                form: {
                    email: '',
                    password: '',
                    password_confirmation: '',
                    token: this.$route.params.hash,
                },
                color: '#e33d2f',
                size: '40px',
                loading: false
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
            clickPass() { this.validpass = false; },
            setPass() {
                if (this.form.password_confirmation != this.form.password) {
                    this.validpass = true;
                    this.showAlert('warning', 'Verificare che le password Coinidan');
                } else {
                    this.$validator.validateAll().then((result) => {
                        if (result) {
                            this.sendForm();
                        }
                    }).catch(() => {
                        console.log('error form')
                    });
                }
            },
            sendForm() {
                this.loading = true;
                var slf = this;
                axios.post(this.root + '/api/password/reset', this.form).then((res) => {
                    console.log(res);
                    if (res.status == 200) {
                        this.loading = false;
                        this.showAlert('success', 'Password cambiata con successo');
                        axios.post(this.root + '/api/logout').then((res) => {
                            if (res.status == 200) {
                                this.loading = false;
                                slf.$store.dispatch('deleteSession');
                                location.href = '/login';
                            }
                        })
                    } else if (res.status == 302) {
                        this.loading = false;
                        console.log(res);
                    }
                })
                    .catch((error) => {
                        if (error.response.data.errors) {
                            this.loading = false;
                            this.showAlert('error', error.response.data.errors);
                        }
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
        },
    }
</script>
<style scoped>
    .form-control.form-material::-webkit-input-placeholder {
    color: #fff;
    }
    .btn-success {
        color: #fff;
        background-color: #216619;
        border-color: #216619;
    }
</style>