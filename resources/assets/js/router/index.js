import Vue from 'vue'

// Router Vue
import Router from 'vue-router'
Vue.use(Router);

// Swiper slider
import VueAwesomeSwiper from 'vue-awesome-swiper'
import 'swiper/dist/css/swiper.css'
Vue.use(VueAwesomeSwiper, {});


// Vee-Validate
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);

// Sweetalert2
import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

/*
 * Components
 */

// Landing
import AppContent from '../components/landing/AppContent.vue';
import headerLanding from '../components/landing/header.vue';
import sliderOlbia from '../components/landing/sliderOlbia.vue';
import services from '../components/landing/services.vue';
import esperience from '../components/landing/esperience.vue';
import galleryHorizontal from '../components/landing/galleryHorizontal.vue';
import mapa from '../components/landing/mapa.vue';
import newsletter from '../components/landing/newsletter.vue';
import aboutUs from '../components/landing/aboutUs.vue';
import homeCamere from '../components/landing/homeCamere.vue';
import contactUs from '../components/landing/contactUs.vue';
// generale
import navbar from '../components/general/navbar.vue';
import footer from '../components/general/footer.vue';
import jumperr from '../components/general/jumperr.vue';
// Suites
import suites from '../components/suites/suites.vue';
import headerSuites from '../components/suites/headerSuites.vue';
import navSuites from '../components/suites/navSuites.vue';
import gallerySuites from '../components/suites/gallerySuites.vue';
import infoSuites from '../components/suites/infoSuites.vue';
import iconsServices from '../components/suites/iconsServices.vue';
import generalServices from '../components/suites/generalServices.vue';
import listServices from '../components/suites/listServices.vue';
//booking
import stepUno from '../components/booking/stepUno.vue';
import stepDos from '../components/booking/stepDos.vue';
import stepTres from '../components/booking/stepTres.vue';
import headerBooking from '../components/booking/headerBooking.vue';
import navBooking from '../components/booking/navBooking.vue';
import formConsulta from '../components/booking/formConsulta.vue';
import resumen from '../components/booking/resumen.vue';
import rooms from '../components/booking/rooms.vue';
// My account
import delate_account from '../components/myaccount/delate_account.vue';
import user_detail from '../components/myaccount/user_detail.vue';
import navaccount from '../components/myaccount/navaccount.vue';
import createAccount from '../components/myaccount/createAccount.vue';
import clientLogin from '../components/myaccount/clientLogin.vue';
import headerAccount from '../components/myaccount/headerAccount.vue';
<<<<<<< HEAD
=======
import account_table from '../components/myaccount/account_table.vue';
>>>>>>> 7349836e4cc51abb3f7c9d2b24fa81a248136af2


//componentes generales
Vue.component('navbar', navbar);
Vue.component('gfooter', footer);
Vue.component('jumperr', jumperr);
Vue.component('header_landing', headerLanding);
Vue.component('slider_olbia', sliderOlbia);
Vue.component('services', services);
Vue.component('esperience', esperience);
Vue.component('gallery_horizontal', galleryHorizontal);
Vue.component('mapa', mapa);
Vue.component('newsletter', newsletter);
Vue.component('aboutus', aboutUs);
Vue.component('home_camere', homeCamere);
//
Vue.component('headerSuites', headerSuites);
Vue.component('navSuites', navSuites);
Vue.component('gallerySuites', gallerySuites);
Vue.component('infoSuites', infoSuites);
Vue.component('iconsServices', iconsServices);
Vue.component('generalServices', generalServices);
Vue.component('listServices', listServices);
//
Vue.component('rooms', rooms);
Vue.component('resumen', resumen);
Vue.component('form_consulta', formConsulta);
Vue.component('nav_booking', navBooking);
Vue.component('header_booking', headerBooking);
Vue.component('user_detail', user_detail);
Vue.component('navaccount', navaccount);
Vue.component('headerAccount', headerAccount);



//rutas

let router = new Router({
    mode:'history',
    routes: [
        {
            path: '/',
            name: 'AppContent',
            component: AppContent
        },
        {
            path: '/suites',
            name: 'suites',
            component: suites
        },
        {
            path: '/myaccount',
            name: 'user_detail',
            component: user_detail
        },
        {
            path: '/delate_account',
            name: 'delate_account',
            component: delate_account
        },
        {

            path: '/account_table',
            name: 'account_table',
            component: account_table
        },
        {

            path: '/contactUs',
            name: 'contactUs',
            component: contactUs
        },
        {
            path: '/booking/step-1',
            name: 'stepUno',
            component: stepUno
        },
        {
            path: '/booking/step-2',
            name: 'stepDos',
            component: stepDos
        },
        {
            path: '/booking/step-3',
            name: 'stepTres',
            component: stepTres
        },
        {
        
            path: '/clientLogin',
            name: 'clientLogin',
            component: clientLogin
        },
        {
            path: '/createAccount',
            name: 'createAccount',
            component: createAccount
        },
<<<<<<< HEAD

         
=======
        {
            path: '/resetPassword',
            name: 'resetPassword',
            component: resetPassword
        },


>>>>>>> 7349836e4cc51abb3f7c9d2b24fa81a248136af2
    ],scrollBehavior (to, from, savedPosition) {
      return { x: 0, y: 0 }
    }
})

export default router