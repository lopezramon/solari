<template>
    <div>
        <div class="content-nav">
            <!-- <aside class="top-info d-none d-md-block bg-black">
                    <div class="container header-black">
                        <div class="row">
                            <div class="col-6 py-2"><a href="https://goo.gl/maps/V6ZaLt3XSM22" target="_black ">Via Giovanni XXIII, 7 – 08020 BUDONI (OT)</a></div>
                            <div class="col-6 text-right py-2">
                                <a href="tel:+393408831917">+39 3408831917</a> | <a href="mailto:booking@solariavacanze.com">booking@solariavacanze.com</a> <img src="/images/iconos/facebook-logo.svg" alt="facebook" width="27"> <img src="/images/iconos/instagram-logo.svg" alt="instagram" width="27"></div>
                        </div>
                    </div>
            </aside> -->

            <div class="container">
                <nav class="navbar navbar-expand-md py-md-2 text-uppercase sticky-top">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <a class="navbar-brand m-0" href="/">
                        <img src="/images/logos/solaria-logo.png" width="100">
                    </a>

                    <div class="action-menu ml-auto ml-md-0 order-md-12 d-inline-flex align-items-center">
                        <!-- <a href="#" class="font-1 pr-1 mr-1 d-inline-flex align-items-center">
                        <img src="/images/iconos/instagram-logo.svg" alt="instagram" width="28">
                        </a> -->
                        <a href="#" class="font-1 pr-1 mr-1 d-inline-flex align-items-center" data-toggle="modal" data-target="#exampleModal">
                            <img src="/images/iconos/shared.png" alt="facebook" width="22">
                        </a>
                        <a href="#" class="font-1 d-inline-flex align-items-center">
                            <img src="/images/iconos/earth-grid-symbol.png" alt="facebook" width="24"> 
                            &nbsp;<span class="text-uppercase">{{ lang }}</span>
                        </a>
                    </div>

                    <div class="navbar-collapse collapse justify-content-center" id="navbarNav">
                        <ul class="navbar-nav text-center">
                            <li class="nav-item py-md-2">
                            <router-link to="/#chisiamo" @click.native="scrollFix('#chisiamo')" class="nav-item nav-link" exact>
                                Chi Siamo
                            </router-link>
                            </li>
                            <li class="nav-item py-md-2">
                            <router-link to="/#camera" @click.native="scrollFix('#camera')" class="nav-item nav-link" exact>
                                CASE VACANZA
                            </router-link>
                            </li>
                            <li class="nav-item py-md-2">
                            <router-link to="/#servizi" @click.native="scrollFix('#servizi')" class="nav-item nav-link" exact>
                                Servizi
                            </router-link>
                            </li>
                            <li class="nav-item py-md-2">
                            <router-link to="/#esperienze" @click.native="scrollFix('#esperienze')" class="nav-item nav-link" exact>
                                Esperienze
                            </router-link>
                            </li>
                            <li class="nav-item py-md-2">
                            <router-link to="/contactUs" class="nav-item nav-link" exact>
                                contatti
                            </router-link>
                            </li>
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
        background-color: rgba(57, 115, 152, 0.58);
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
    .navbar-nav .nav-link {
        color: #ffd900;
    }
    .navbar-nav .nav-link:hover {
        color: #d7392c;
        font-weight: bold;
    }
    a.font-1,a.font-2{
        text-decoration: none;
        color: #000;
        font-family: 'Josefin Sans', sans-serif;
        line-height: 1.2;
    }
    a.font-1:hover,a.font-2:hover{
        color: #000;
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
