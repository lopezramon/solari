<template>
    <div class="container p-md-5">

        <div class="row justify-content-center text-center align-items-center back-image ">
            <div class="col-12">
                <div class="h-30p pad">
                        <h2 class="title-suscribe text-white font-weight-bold">
                            ISCRIVITI ALLA NOSTRA NEWSLETTER
                        </h2>
                </div>
            </div>

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
                <div class="col-12  col-md-5 justify-content-center text-center align-items-center">
                    <form>

                        <div class="input-group mb-3">
                            <input id="email" type="text" :maxlength="50" v-validate="'required|email|min:9|max:50'"
                                   name="email" data-vv-as="Mail" :class="{'text-danger': errors.has('email') }"
                                   v-model="form.email" class="form-control radius" placeholder="Mail">
                            <div class="input-group-append">
                                <button type="button" :disabled="errors.any() || isDisabled" @click.prevent="sendnews()" class="btn btn-danger radius-btn bold">
                                    ISCRIVITI
                                </button>
                            </div>
                        </div>

                        <small v-show="errors.has('email')" class="help text-danger">{{ errors.first('email') }}</small>

                        <div class="form-check pad2">
                            <input v-validate="'required'" name="terms" v-model="form.terms" type="checkbox" class="form-check-input" id="check">
                            <label for="check" class="label2 form-check-label text-white pad2">
                                <span v-show="errors.has('terms')" class="help text-danger">*</span>
                                Sì, Tienimi Aggiornato Su Novità, Eventi E Offerte
                            </label>
                            <div>
                            </div>
                        </div>
                    </form>
                </div>
            </template>
        </div>
    </div>
</template>
<script>
    import { PulseLoader } from 'vue-spinner/dist/vue-spinner.min'

    export default {
        components: { PulseLoader },
        data() {
            return {
                form: { email: null, terms: null },
                error: null,
                success: false,
                color: '#FFF',
                size: '15px',
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
                            this.showAlert('success', 'Operación exitosa, se te a enviado un email');
                            this.cleanForm();
                        }
                    }).catch((error) => {
                        this.loading = false;
                        this.showAlert('error', 'Error Email ya está registrado');
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
                this.form = { name: '', terms: '' }
            }
        }
    };
</script>
<style scoped>
    .back-image {

        background-position: 0 75%;

        background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("https://www.solariavacanze.com/wp-content/uploads/solaria-agenzia-vacanze-affitto-appartamenti-in-sardegna-1800x500.jpg");
    }
    
    .pad {
        padding-top: 5%;
        padding-bottom: 3%;
    }

    .pad2 {
        padding-bottom: 10%;
    }
    .title-suscribe{
        font-size: 1.4rem;
    }

    .radius {
        border-radius: 145px 0px 0px 145px !important;
        -moz-border-radius: 145px 0px 0px 145px !important;
        -webkit-border-radius: 145px 0px 0px 145px !important;
        border: 0px solid #000000 !important;
        height: 50px
    }

    .radius-btn {
        border-radius: 0px 145px 145px 0px !important;
        -moz-border-radius: 0px 145px 145px 0px !important;
        -webkit-border-radius: 0px 145px 145px 0px !important;
        border: 0px solid #000000 !important;
        z-index: 100;
    }

    .btn-danger {
        background-color: #6a6a6a !important;
        border-color: #000 !important;
    }

    .btn-danger:active {
        border-color: #000 !important;
        box-shadow: #000 !important;
    }

    .pad-top {
        padding-top: 3%;
    }

    .pad-top {
        padding-top: 3%;
    }

    .pad-bottom {
        padding-bottom: 3%;
    }

    .news-text {
        letter-spacing: 5px
    }
    .form-control:focus{
        background-color: #fff;
    }
</style>
