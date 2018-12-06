<template>
    <div>
        <headerAccount/>
        <navaccount/>
        <div class="container text-center">
            <h1 class="font-weight-bold mt-5 text-uppercase">Alerta</h1>
            <p>¿Está seguro que desea borrar su cuenta?</p>
            <button @click.prevent="deleteAccount" type="button" class="btn btn-primary text-uppercase">
                Eliminar cuenta
            </button>
            <p class="mt-1 mb-5 text-danger">No podrás recuperar tu cuenta una vez que aceptes eliminarla</p>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                data: {
                    id: this.$store.getters.getSession[0].id,
                    api_token: this.$store.getters.getSession[0].api_token
                }
            }
        },
        methods: {
            deleteAccount() {
                const showAlert = this.$swal.mixin({
                    confirmButtonClass: 'btn btn-success mr-2',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false,
                });

                showAlert({
                    title: 'Eliminar cuenta',
                    text: "¿Estás seguro que deseas eliminar la cuenta?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'No, regresar',
                    showCloseButton: true,

                }).then((result) => {
                    if (result.value) {
                        this.confirmDelete();
                    }
                })
            },
            confirmDelete() {
                const showAlert = this.$swal.mixin({
                    confirmButtonClass: 'btn btn-success mr-2',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false,
                });

                axios.post('api/delete/user', this.data).then((res) => {
                    if (res.status === 200) {
                        showAlert('Cuenta eliminada', 'Tú cuenta a sido eliminada.', 'success');
                        this.$store.dispatch('deleteSession');
                        this.$router.push('/');
                    }
                }).catch((error) => {
                    showAlert('Ocurrió un error', 'Tú cuenta no a podido ser eliminada.', 'error');
                    console.error(error);
                })
            }
        }
    }
</script>
