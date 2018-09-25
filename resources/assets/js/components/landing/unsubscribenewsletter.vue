<script>
    export default {
        data() {
            return { email: this.$route.params.email }
        },
        beforeMount() {
            axios.get('/api/unsubscribe/newsletter/' + this.email).then((res) => {
                if (res.status === 200) {
                    console.log(res);
                    this.$router.push('/');
                    this.showAlert('success', 'Se ha cancelado tu subscripcion');
                }
            }).catch((error) => {
                let data = JSON.parse(error.request.response);
                console.log(data);
                this.$router.push('/');
                this.showAlert('error', 'El correo no se encuentra registrado');
            })
        },
        methods: {
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
