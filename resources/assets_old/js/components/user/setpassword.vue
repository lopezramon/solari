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
                        <h2 class="mt-3  text-white">Forgot password</h2>
                        <form action="">
                            <div class="form-group">
                                <label class="mb-0 white font-weight-bold">Email</label>
                                <span v-show="errors.has('email')" class="help text-danger">*</span>
                                <input type="email" :maxlength="50" v-validate="'required|email|min:9|max:50'" name="email"
                                       data-vv-as="Email" :class="{'text-danger': errors.has('email') }"
                                       v-model="form.email" class="form-control form-material" placeholder="Email">
                                <span v-show="errors.has('email')" class="help text-danger">{{ errors.first('email') }}</span>
                            </div>

                            <div class="form-group mt-3">
                                <button type="button" :disabled="errors.any() || isDisabled" @click="ValidEmail" class="btn btn-success btn-block btn-lg">
                                    Send
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
    import { BounceLoader } from 'vue-spinner/dist/vue-spinner.min.js'
    export default {
        components: { BounceLoader },
        data() {
            return {
                root: null,
                form: { email: null },
                color: '#e33d2f',
                size: '40px',
                loading: false,
            }
        },
        mounted() {
            this.root = window.location.origin;
        },
        computed: {
            isDisabled() { return !this.form.email }
        },
        methods: {
            ValidEmail() {
                this.loading = true;
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        let slf = this;
                        axios.post(this.root + '/api/validEmail', this.form).then((res) => {
                            if (res.status == 200) {
                                if (slf.$store.getters.getSession.name != undefined) {
                                    this.loading = false;
                                    this.showAlert('error', 'Errore! È necessario chiudere la sessione per continuare');
                                } else {
                                    if (res.data.oper == true) {
                                        this.loading = false;
                                        this.showAlert('success', res.data.msg);
                                        this.form.email = null;
                                    } else {
                                        this.loading = false;
                                        this.showAlert('error', res.data.msg);
                                    }
                                }
                            }
                        })
                            .catch((error) => {
                                this.loading = false;
                                this.showAlert('error', error.response.data.msg);
                            });
                    }
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
            }
        }
    }
</script>

<style scoped>
    .btn-success {
        color: #fff;
        background-color: #216619;
        border-color: #216619;
    }
</style>