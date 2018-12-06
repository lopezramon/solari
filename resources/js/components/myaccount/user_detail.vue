<template>
    <div>
        <headerAccount/>
        <navaccount/>
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
                <div class="row mt-5">
                    <div class="col-12 mt-md-3 ">
                        <div class="form-group">
                            <label class="mb-0 white font-weight-bold">Nombre</label>
                            <span v-show="errors.has('name')" class="help text-danger">*</span>
                            <input type="text" :maxlength="30" v-validate="'required|alpha|min:2|max:30'" name="name"
                                   data-vv-as="Nombre" :class="{'text-danger': errors.has('name') }" v-model="form.name"
                                   class="form-control form-material" placeholder="Nombre">
                            <small v-show="errors.has('name')" class="help text-danger">{{ errors.first('name') }}</small>
                        </div>
                    </div>

                    <div class="col-12 mt-md-3">
                        <div class="form-group">
                            <label class="mb-0 white font-weight-bold">Apellido</label>
                            <span v-show="errors.has('lastname')" class="help text-danger">*</span>
                            <input type="text" :maxlength="30" v-validate="'required|alpha|min:2|max:30'"
                                   name="lastname" data-vv-as="Apellido" :class="{'text-danger': errors.has('lastname') }"
                                   v-model="form.lastname" class="form-control form-material" placeholder="Apellido">
                            <small v-show="errors.has('lastname')" class="help text-danger">{{ errors.first('lastname') }}</small>
                        </div>
                    </div>

                    <div class="col-12 mt-md-3">
                        <div class="form-group">
                            <label class="mb-0 white font-weight-bold">Telefono</label>
                            <span v-show="errors.has('phone')" class="help text-danger">*</span>
                            <input type="text" :maxlength="16" v-validate="'required|numeric|min:9|max:16'" name="phone"
                                   data-vv-as="Telefono" :class="{'text-danger': errors.has('phone')}"
                                   v-model="form.phone" class="form-control form-material" placeholder="Telefono">
                            <small v-show="errors.has('phone')" class="help text-danger">{{ errors.first('phone') }}</small>
                        </div>
                    </div>

                    <div class="col-12 mt-md-3">
                        <div class="form-group">
                            <label class="mb-0 white font-weight-bold">Telefono Opcional</label>
                            <span v-show="errors.has('optionalPhone')" class="help text-danger">*</span>
                            <input type="text" :maxlength="16" v-validate="'numeric|min:9|max:16'" name="optionalPhone"
                                   data-vv-as="Telefono" :class="{'text-danger': errors.has('optionalPhone')}"
                                   v-model="form.optionalPhone" class="form-control form-material" placeholder="Telefono">
                            <small v-show="errors.has('optionalPhone')" class="help text-danger">{{ errors.first('optionalPhone') }}</small>
                        </div>
                    </div>

                    <div class="col-12 mt-md-3">
                        <div class="form-group">
                            <label class="mb-0 white font-weight-bold">Email</label>
                            <span v-show="errors.has('email')" class="help text-danger">*</span>
                            <input type="email" :maxlength="50" v-validate="'required|email|min:9|max:50'" name="email"
                                   data-vv-as="Email" :class="{'text-danger': errors.has('email') }" disabled
                                   v-model="form.email" class="form-control form-material" placeholder="Email">
                            <small v-show="errors.has('email')" class="help text-danger">{{ errors.first('email') }}</small>
                        </div>
                    </div>

                    <div class="col-12 mt-md-3">
                        <div class="form-group">
                            <label class="mb-0 white font-weight-bold">Cod Fiscale/P.IVA</label>
                            <span v-show="errors.has('fiscalCode')" class="help text-danger">*</span>
                            <input type="text" :maxlength="16" v-validate="'required|alpha_num|min:16|max:16'" name="fiscalCode"
                                   data-vv-as="Cod Fiscale/P.IVA" :class="{'text-danger': errors.has('fiscalCode')}"
                                   v-model="form.fiscalCode" class="form-control form-material" placeholder="Cod Fiscale/P.IVA">
                            <small v-show="errors.has('fiscalCode')" class="help text-danger">{{  errors.first('fiscalCode') }}</small>
                        </div>
                    </div>

                </div>
                <div class="form-group col-12 text-center mb-5">
                    <button type="button" :disabled="errors.any() || isDisabled" @click="editUser" class="btn btn-primary text-uppercase">
                        Actualizar
                    </button>
                </div>
            </div>
        </template>
    </div>
</template>
<script>
    import { PulseLoader } from 'vue-spinner/dist/vue-spinner.min'

    export default {
        components: { PulseLoader },
        data() {
            return {
                token: null,
                form: {
                    id: null,
                    name: null,
                    lastname: null,
                    email: null,
                    phone: null,
                    optionalPhone: null,
                    fiscalCode: null,
                    password: null,
                },
                regex: /^[a-zA-ZàèéìíîòóùúÀÈÉÌÍÎÒÓÙÚáéíñóúüÁÉÍÑÓÚÜ\-'\s]+$/i,
                color: '#1b1b1b',
                size: '15px',
                loading: false
            }
        },
        mounted() {
            this.getStorage();
        },
        computed: {
            isDisabled() { return !this.form.name || !this.form.lastname || !this.form.email || !this.form.phone || !this.form.fiscalCode }
        },
        methods: {
            getStorage() {
                let isLogged = this.$store.getters.getSession;
                this.token = {'api_token': isLogged[0].api_token};
                this.form.id = isLogged[0].id;
                this.form.name = isLogged[0].name;
                this.form.lastname = isLogged[0].lastname;
                this.form.email = isLogged[0].email;
                this.form.phone = isLogged[0].phone;
                // this.form.optionalPhone = isLogged[0].optional_phone;
                this.form.fiscalCode = isLogged[0].fiscalCode;
            },
            editUser() {
                this.loading = true;
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        var slf = this;
                        axios.post('/api/update/user', this.form).then((res) => {
                            if (res.status === 200) {
                                this.$store.dispatch('setSession', res.data.data).then(() => {
                                    this.loading = false;
                                    this.showAlert('success', 'actualizó con exito');
                                    slf.$router.push('/myaccount');
                                }).catch(() => {
                                    this.loading = false;
                                    console.log('error store')
                                });
                            }
                        }).catch((error) => {
                            console.error(error);
                            if (error.response.status = 422) {
                                this.loading = false;
                                this.showAlert('error', 'error al actualizar');
                            }
                        })
                    }
                }).catch(() => {
                    this.loading = false;
                    console.log('error form')
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
        }
    }
</script>
