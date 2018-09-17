<template>
    <div class="fondo">
		<returnback url="/" margin="mb-0" />

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
                <div class="row pt-md-5">
                <div class="col-12 col-md-6 pb-5">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <h2 class="mt-3 text-white">Hai un account? Accedi ora</h2>
                            </div>
                            <div class="col-12">
                                <label for="email" class="mb-0 white font-weight-bold">Email</label>
                                <span v-show="errors.has('email')" class="help text-danger">*</span>
                                <input id="email" type="email" :maxlength="50" v-validate="'required|email|min:9|max:50'" name="email"
                                       data-vv-as="Email" :class="{'text-danger': errors.has('email') }" v-model="form.email"
                                       class="form-control form-material" placeholder="Email">
                                <span v-show="errors.has('email')" class="help text-danger">{{ errors.first('email') }}</span>
                            </div>

                            <div class="col-12">
                                <label for="password" class="mb-0 white font-weight-bold pt-3">Password</label>
                                <span v-show="errors.has('password')" class="help text-danger">*</span>
                                <input id="password" type="password" :maxlength="16" v-model="form.password" v-validate="'required|min:8|max:16'"
                                       name="password" :class="{'text-danger': errors.has('password') }"
                                       class="form-control form-material" placeholder="Password">
                                <span v-show="errors.has('password')" class="help text-danger">{{ errors.first('password') }}</span>
                            </div>

                            <div class="col-6 mt-2">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="size-recor form-check-label color-check" for="exampleCheck1">Ricordami</label>
                                </div>
                            </div>
                            <div class="col-6 text-right mt-2">
                                <a @click.prevent="forgotPassword" class="p-0 link">Hai dimenticato la password?</a>
                            </div>
                        </div>

                        <button :disabled="errors.any() || isDisabled" @click="login" type="button" class="btn btn-success btn-lg my-2">
                            <span class="font-weight-bold">ACCEDI</span>
                        </button>
                    </form>
                </div>

                    <div class="col-12 col-md-6 col-linea mb-3 align-items-center">
                        <h2 class="lead mt-3 text-white py-1 py-md-4">Crea il tuo account</h2>
                        <h5 class="text-white mb-3 mt-3 text-justify">
                            Con il tuo account pizzeria di
                            Adrianopuoi facilmente salvarei tuoi indirriz, i tuoi ordini, e
                            persino controllarli. Anche puoi effectuarei tuoi ordini rapidamente e facilmente
                        </h5>
                        <div class="form-group text-center">
                            <button @click="createAccount" type="button" class="btn btn-success btn-lg my-2">
                                <span class="font-weight-bold m-3">REGISTRAZIONE</span>
                            </button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <menu_responsive/>
    </div>
</template>
<script>
    import { BounceLoader } from 'vue-spinner/dist/vue-spinner.min'
    export default {
        components: { BounceLoader },
        data(){
            return {
                form: {
                    email: null,
                    password: null
                },
                color: '#e33d2f',
                size: '40px',
                loading: false
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
                        axios.post('api/login', this.form).then((res) => {
                            if (res.status == 200) {

                                var admin = res.data.admin;
                                this.$store.dispatch('setSession', res.data).then((r) => {
                                    this.loading = false;
                                    this.showAlert('success', 'Riuscito utente autenticato');
                                    let slf = this;
                                    setTimeout(function () {
                                        console.log(admin);
                                        slf.msj.show = false;
                                        if (admin == true) {
                                            location.href = 'home';
                                        } else {
                                            slf.$router.push('/');
                                        }

                                    }, 1800);
                                }).catch(() => {
                                    console.log('error store')
                                });
                            }
                        })
                            .catch((error) => {
                                if (error.response.status = 401) {
                                    this.loading = false;
                                    this.showAlert('error', 'L\'utente registrato non viene trovato');
                                }
                                switch (error.response.status) {
                                    case 401:
                                        this.loading = false;
                                        this.showAlert('error', 'L\'utente registrato non viene trovato');
                                        break;
                                    case 500:
                                        this.loading = false;
                                        this.showAlert('error', 'Errore di connessione');
                                        break;
                                }
                                let slf = this;
                                setTimeout(function () {
                                    slf.form.show = false;
                                }, 1800);
                            })
                    }
                }).catch(() => {
                    console.log('error form')
                });
            },
            createAccount() { this.$router.push('/registeruser'); },
            validarIntLogin() {
                let authenticated = this.$store.getters.getauthenticated;
                if (authenticated) {
                    this.$router.push('/');
                }
            },
            forgotPassword() { this.$router.push('/setpassword'); },
            showAlert(type, title) {
                this.$swal({
                    position: 'center',
                    type: type,
                    title: title,
                    showConfirmButton: false,
                    showCloseButton: true,
                }).then((value) => {
                    var cant=this.$store.getters.getCant;
                    if(cant>0){
                        this.$router.push('/myorder');
                    }else{
                        this.$router.push('/');
                    }
                });
            }
        }
    }
</script>
<style scoped>
    .col-linea{
        border-left:2px solid white;
    }
    .color-check{
        color:#118211!important;
        font-weight: bold;
    }
    .size-recor{
        font-size: 17px;
    }
     .link {
         color: #FFF !important;
         cursor: pointer;
     }
    .link:hover {
        color: #e33d2f !important;
        text-decoration: underline !important;
    }
    .btn-success {
        color: #fff;
        background-color: #216619;
        border-color: #216619;
    }
</style>