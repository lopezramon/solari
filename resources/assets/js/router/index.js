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
 * Imports
 */

// Landing
import AppContent from '../components/landing/AppContent';
import headerLanding from '../components/landing/header';
import sliderOlbia from '../components/landing/sliderOlbia';
import services from '../components/landing/services';
import esperience from '../components/landing/esperience';
import galleryHorizontal from '../components/landing/galleryHorizontal';
import mapa from '../components/landing/mapa';
import newsletter from '../components/landing/newsletter';
import aboutUs from '../components/landing/aboutUs';
import homeCamere from '../components/landing/homeCamere';
import contactUs from '../components/landing/contactUs';
import formBooking from '../components/landing/form';

// general
import navbar from '../components/general/navbar';
import footer from '../components/general/footer';
import jumperr from '../components/general/jumperr';

// Suites
import suites from '../components/suites/suites';
import headerSuites from '../components/suites/headerSuites';
import navSuites from '../components/suites/navSuites';
import gallerySuites from '../components/suites/gallerySuites';
import infoSuites from '../components/suites/infoSuites';
import iconsServices from '../components/suites/iconsServices';
import generalServices from '../components/suites/generalServices';
import listServices from '../components/suites/listServices';

// user
import createAccount from '../components/user/createAccount';
import clientLogin from '../components/user/clientLogin';
import setPassword from '../components/user/setPassword';
import resetPassword from '../components/user/resetPassword';

//booking
import stepUno from '../components/booking/stepUno';
import stepDos from '../components/booking/stepDos';
import stepTres from '../components/booking/stepTres';
import headerBooking from '../components/booking/headerBooking';
import navBooking from '../components/booking/navBooking';
import formConsulta from '../components/booking/formConsulta';
import resumen from '../components/booking/resumen';
import rooms from '../components/booking/rooms';

// My account
import delate_account from '../components/myaccount/delate_account';
import user_detail from '../components/myaccount/user_detail';
import navaccount from '../components/myaccount/navaccount';
import headerAccount from '../components/myaccount/headerAccount';
import account_table from '../components/myaccount/account_table';
import myOrderDetail from '../components/myaccount/myOrderDetail.vue';
// Error pages
import Error404 from '../components/general/error404.vue';
import Error500 from '../components/general/error500.vue';

/*
 * Components
 */
Vue.component('navbar', navbar);
Vue.component('gfooter', footer);
Vue.component('jumperr', jumperr);
Vue.component('header_landing', headerLanding);
Vue.component('form_booking',formBooking);
Vue.component('slider_olbia', sliderOlbia);
Vue.component('services', services);
Vue.component('esperience', esperience);
Vue.component('gallery_horizontal', galleryHorizontal);
Vue.component('mapa', mapa);
Vue.component('newsletter', newsletter);
Vue.component('aboutus', aboutUs);
Vue.component('home_camere', homeCamere);
Vue.component('headerSuites', headerSuites);
Vue.component('navSuites', navSuites);
Vue.component('gallerySuites', gallerySuites);
Vue.component('infoSuites', infoSuites);
Vue.component('iconsServices', iconsServices);
Vue.component('generalServices', generalServices);
Vue.component('listServices', listServices);
Vue.component('rooms', rooms);
Vue.component('resumen', resumen);
Vue.component('form_consulta', formConsulta);
Vue.component('nav_booking', navBooking);
Vue.component('header_booking', headerBooking);
Vue.component('user_detail', user_detail);
Vue.component('navaccount', navaccount);
Vue.component('headerAccount', headerAccount);


// Routes
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
            path: '/my-order-detail',
            name: 'myOrderDetail',
            component: myOrderDetail
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
        {
            path: '/setPassword',
            name: 'setPassword',
            component: setPassword
        },
        {
            path: '/password/reseted/:hash',
            name: 'resetPassword',
            component: resetPassword
        },
        {
            path: '/error404',
            name: 'error404',
            component: Error404
        },
        {
            path: '/error500',
            name: 'error500',
            component: Error500
        },
    ],scrollBehavior (to, from, savedPosition) {
      return { x: 0, y: 0 }
    }
});
export default router
