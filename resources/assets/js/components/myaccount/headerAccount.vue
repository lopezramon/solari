<template>
    <div>
        <header>
            <div class="container">
                <div class="row mb-0 mb-md-5">
                    <div class="col-12 col-md-6 text-left align-items-center d-flex">
                        <img src="/images/logos/user.svg" alt="" class="alto">
                        <div class="d-inline-block align-self-center">
                            <h2 class="text-uppercase m-0 d-inline-block text-center ml-3">Jhon Roe</h2>
                            <a href="#" @click.prevent="logout" class="text-danger lead d-block text-center">Desconectar</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
</template>
<script>
    export default {
        methods: {
            logout() {
                let slf = this;
                axios.post('/logout').then((res) => {
                    if (res.status === 200) {
                        slf.$store.dispatch('deleteSession');
                        slf.$router.push('/');
                    }
                }).catch((error) => {})
            },
        }
    }
</script>
<style scoped>
header{
    background-color: #fff;
    width: 100%;
    height: 130px;
    display: flex;
    justify-content: center;
    align-items: flex-end;
    text-align: center;
}
@media (max-width: 768px) {
    .alto{
        width: 50px;
    }
}
@media (min-width: 768px) {
    header{
        height: 280px;
    }
    .alto{
        width: 100px;
    }
}


</style>
