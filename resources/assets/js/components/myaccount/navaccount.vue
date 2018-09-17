<template>
  <nav>
    <router-link  to="/myaccount" :class="{'active-menu':url('/myaccount')}">MY ACCOUNT</router-link>    
    <router-link to="/" >DETALLES FACTURA</router-link>
    <router-link to="/suite" >ELIMINAR CUENTA</router-link>
  </nav>
</template>

<style scoped>
nav{
    display: flex;
    flex-wrap: nowrap;
    justify-content: flex-start;
    align-items: center;
}
nav a{
    background-color: #555;
    color: #fff;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 70px;
    font-family: 'Josefin Sans', sans-serif;
    font-size: 1.6rem;
}
nav a.active{
    background-color: #4fcaa5;
}
    a.router-link-exact-active.router-link-active{
        color: #fff !important;
        background-color: #4fcaa5;
    }
a:hover{
    text-decoration: none;
    background-color: #4fcaa5;
}
</style>

<script>
    export default {
        data() {
            return {
                pathname: null,
                name_menu: null,
            }
        },
        mounted() {
            this.pathname = window.location.pathname;
        },
        methods: {
            url(urlactual) {
                if (urlactual == this.pathname) {
                    switch (urlactual) {
                        case '/user_detail':
                            this.name_menu = 'I mie ordini';
                            break;
                        case '/detailuser':
                            this.name_menu = "Detaggli dell' account";
                            break;
                        case '/editpassword':
                            this.name_menu = 'Cambia password';
                            break;
                    }
                    return true;
                } else {
                    return false;
                }
            },
          }
    }
</script>