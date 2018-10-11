<template>
    <div>
        <div class="content-nav">
            <aside class="top-info d-none d-md-block bg-black">
                    <div class="container header-black">
                        <div class="row">
                            <div class="col-6 py-2"><a href="https://goo.gl/maps/V6ZaLt3XSM22" target="_black ">Via alessandro nanni 58, Italia, Olbia</a></div>
                            <div class="col-6 text-right py-2"><a href="tel:07891710013">0789-1710013</a> | <a href="tel3471757188">34-71757188</a> <img src="/images/iconos/facebook-logo.svg" alt="facebook" width="27"> <img src="/images/iconos/instagram-logo.svg" alt="instagram" width="27"></div>
                        </div>
                    </div>
            </aside>

            <div class="container">
                <nav class="navbar navbar-dark navbar-expand-md py-md-2 text-uppercase sticky-top">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <a class="navbar-brand m-0" href="/">
                        <img src="/images/logos/logo_luxury_pequeño.png">
                        <h1 class="d-none d-sm-inline-block">Luxury Room</h1>
                    </a>

                    <div class="action-menu ml-auto ml-md-0 order-md-12 d-inline-flex align-items-center">
                        <a href="#" class="font-2 d-md-none pr-1 mr-1">
                        <img src="/images/iconos/instagram-logo.svg" alt="instagram" width="27">
                        </a>
                        <a href="#" class="font-2 d-md-none pr-1 mr-1">
                            <img src="/images/iconos/facebook.png" alt="facebook" width="24"> |
                        </a>
                        <a href="#" class="text-white font-1 d-inline-flex align-items-center">
                            <img src="/images/iconos/world.svg" alt="facebook" width="24"> 
                            &nbsp;<span class="text-uppercase">{{ lang }}</span>
                        </a>
                    </div>

                    <div class="navbar-collapse collapse justify-content-center" id="navbarNav">
                        <ul class="navbar-nav text-center">
                            <router-link to="/#chisiamo" @click.native="scrollFix('#chisiamo')" class="nav-item py-md-2" exact>
                            <a class="nav-link">
                                Chi Siamo
                            </a>
                            </router-link>
                            <router-link to="/#camera" @click.native="scrollFix('#camera')" class="nav-item py-md-2" exact>
                            <a class="nav-link">
                                Suites
                            </a>
                            </router-link>
                            <router-link to="/#servizi" @click.native="scrollFix('#servizi')" class="nav-item py-md-2" exact>
                            <a class="nav-link">
                                Servizi
                            </a>
                            </router-link>
                            <router-link to="/#esperienze" @click.native="scrollFix('#esperienze')" class="nav-item py-md-2" exact>
                            <a class="nav-link">
                                Esperienze
                            </a>
                            </router-link>
                            <router-link to="/contactUs" class="nav-item py-md-2" exact>
                            <a class="nav-link">
                                contatti
                            </a>
                            </router-link>
                            <li class="nav-item py-md-2">
                                <a :href="GetRoute" class="nav-link">
                                    <span v-if="isAuth">Il mio account</span>
                                    <span v-else>Accedi al tuo account</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                lang: 'it',
                isAuth: null
            }
        },
        computed: {
            GetRoute() {
                this.isAuth = this.$store.getters.getauthenticated;
                if (this.isAuth) {
                    return '/myAccount';
                } else return '/clientLogin';
            }
        },

methods: {
            scrollFix(hash) {
              setTimeout(() => $('html, body').animate({
              scrollTop: $(hash).offset().top
              }, 3000), 1)
            },
            redirectToHome() { return this.$router.push('/'); },
            validateLogin() {
                let authenticated = this.$store.getters.getauthenticated;
                if (authenticated) {
                    this.isAuth = true;
                }
            },
            logout() {
                axios.post('/logout').then((res) => {
                    if (res.status === 200) {
                        this.$store.dispatch('deleteSession');
                        location.href = '/'
                    }
                }).catch((error) => {})
            }
        }
    }
</script>


<style scoped>
    .content-nav{
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1030;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }
    .top-info {
        font-family: 'Josefin Sans', sans-serif;
        color: #fff;
    }
    .top-info a, .top-info a:hover{
        color: #fff;
        text-decoration: none;
    }

    @media (max-width: 991.98px){
        .container {
            max-width: 100%;
            padding-right: 0px;
            padding-left: 0px;
        }
    }

    .navbar
    {
        justify-content: flex-start;
    }
    .navbar-toggler{
        font-size: 1.6rem;
    }
    .navbar-brand h1{
        font-size: 1.25rem;
        margin: 0;
        vertical-align: sub;
        vertical-align: -webkit-baseline-middle;
    }
    .navbar-dark .navbar-toggler {
        color: rgba(255, 255, 255, .7);
        border-color: rgba(255, 255, 255, 0);
    }
    .navbar-dark .navbar-nav .nav-link {
        color: rgba(255, 255, 255, 1);
    }
    a.font-1,a.font-2{
        text-decoration: none;
        color: #fff;
        font-family: 'Josefin Sans', sans-serif;
        line-height: 1.2;
    }
    a.font-1:hover,a.font-2:hover{
        color: #fff;
        text-decoration: none;
    }
    a.font-1{
        font-size: 1rem;
    }
    a.font-2{
        font-size: 1.6rem;
    }
    a:hover{
        text-decoration: none;
    }
</style>
