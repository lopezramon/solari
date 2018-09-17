<template>
    <div class="bg-green d-none d-sm-none d-sm-block py-2">
        <div class=" container  ">
            <div class="row justify-content-center text-center align-items-center ">
                <div class="col-12">
                    <div class="h-30p" >
                        <label class="text-white font-weight-bold">INSCRIVITI ALLA NOSTRA NEWSLETTER</label>
                    </div>
                </div>

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
                    <div class="col-12  col-md-5 justify-content-center text-center align-items-center">
                        <form>
                            <div class="input-group mb-3">
                                <input id="email" type="text" :maxlength="50" v-validate="'required|email|min:9|max:50'" name="email"
                                       data-vv-as="Email" :class="{'text-danger': errors.has('email') }"
                                       v-model="form.email" class="form-control" placeholder="Email">
                                <div class="input-group-append">
                                    <button type="button" :disabled="errors.any() || isDisabled" @click.prevent="sendnews()" class="btn btn-danger">
                                        Inviare
                                    </button>
                                </div>
                            </div>

                            <div class="form-check">
                                <input v-validate="'required'" name="terms" v-model="form.terms" type="checkbox" class="form-check-input" id="check">
                                <label class="label2 form-check-label text-white" for="check">
                                    <span v-show="errors.has('terms')" class="help text-danger">*</span>
                                    Sì, Tienimi Aggiornato Su Novità, Eventi E Offerte
                                </label>
                                <div>
                                    <span v-show="errors.has('email')" class="text-danger font-weight-bold">{{ errors.first('email') }}</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </template>
            </div>
        </div>

    </div>
</template>
<script>
    import { BounceLoader } from 'vue-spinner/dist/vue-spinner.min'
    export default {
        components: { BounceLoader },
        data() {
            return {
                form: { email: null, terms: null },
                error: null,
                success: false,
                color: '#e33d2f',
                size: '40px',
                loading: false
            }
        },
        computed: {
            isDisabled() { return !this.form.email || !this.form.terms }
        },
        methods: {
            sendnews() {
                this.loading = true;
                this.$validator.validateAll().then((result) => {
                    axios.post('/api/newsletter', this.form).then((res) => {
                        if (res.status == 200) {
                            this.loading = false;
                            this.showAlert('success', 'Operazione riuscita Un\'email è stata inviata al cliente');
                            this.cleanForm();
                        }
                    }).catch((error) => {
                        // let data = JSON.parse(error.request.response);
                        // this.msj.msj = (data.errors) ? data.errors.email[0] : data.message;

                        this.loading = false;
                        this.showAlert('error', 'Errore');
                        this.cleanForm();
                    })
                }).catch(() => {
                    this.loading = false;
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
                this.form = {name: '', terms: '',}
            }
        }
    };
</script>
<style scoped>
    label {
        font-size: 25px;
    }

    .label2 {
        font-size: 12px;
    }

    section {
        padding: 100px 0;
        text-align: center;
    }

    .input-group {
        margin: 20px auto;
        width: 100%;
        text-align: center;
    }

    .bg-green {
        background-color: green;
    }

    .form-control {
        border-radius: 1rem;
        padding: 1.2rem 0.75rem;
        font-weight: 800;
        text-transform: uppercase;
    }

    .form-control:focus {
        color: #000;
        background-color: #fff;
        border-color: #dc3545;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,0);
    }

    button.btn {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .btn {
        border-radius: 1rem;
        text-transform: uppercase;
        font-weight: 800;
    }

    .input-group > .input-group-append > .btn {
        border-top-left-radius: 1rem;
        border-bottom-left-radius: 1rem;
        margin-left: -20px;
    }
    .h-30p {
        height: 30px;
    }
    .btn-danger:disabled {
        color: #fff;
        background-color: #b45760;
        border-color: #cb3b49;
        opacity: 1;
    }
</style>