/* Dependecies */
import Vue from 'vue'

import Router from 'vue-router'
Vue.use(Router);

import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);

import VueCarousel from 'vue-carousel';
Vue.use(VueCarousel);

import * as VueGoogleMaps from "vue2-google-maps";
Vue.use(VueGoogleMaps, {
    load: {key: 'AIzaSyAlu17PuCOggAb8q65PiJ2RhOkIwEzUxto'}
});

import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

/*
 Components
 */
// Landing
import appContent from '../components/landing/AppContent';
import navheader from '../components/landing/header';
import type_dough from '../components/landing/type_dough';
import slider_header from '../components/landing/slider_header';
import footer_index from '../components/landing/footer';
import step_order from '../components/landing/step_order';
import AboutUs from '../components/landing/AboutUs';
import SliderCategories from '../components/landing/SliderCategories';
import grazie from '../components/landing/graziecontacthome';
import denied from '../components/landing/errorgraziecontacth';
import contact from '../components/landing/contactform';
import Certificate from '../components/landing/Certificate';
import newsletter from '../components/landing/newsletter';
import menu_responsive from '../components/landing/menu_responsive';
import maps from '../components/landing/maps';
import searchbar from '../components/landing/searchbar';

// List Product
import listProduct from '../components/listproducts/ListProduct';
import navcategory from '../components/listproducts/navcategory';
import listProductOther from '../components/listproducts/ListProductOther';
import categoriesProduct from '../components/listproducts/CategoriesProduct';
import listCart from '../components/listproducts/ListCart';
import methodPayment from '../components/listproducts/MethodPayment';
import ListSimpleProduct from '../components/listproducts/ListSimpleProduct';
import PersonalRetreat from '../components/listproducts/PersonalRetreat'
import Delivery from '../components/listproducts/Delivery';
import Suggestion from '../components/listproducts/Suggestion';
import totalpayment from '../components/listproducts/totalpayment';

// Error Exeptions
import error400 from '../components/errortest/Error400';
import error500 from '../components/errortest/Error500';

// Chisiamo
import chisiamo from '../components/chisiamo/chisiamo'

// Booking
import booking from '../components/booking/event';

// My Account
import myaccount from '../components/myaccount/orders.vue';
import navorder from '../components/myaccount/nav_order.vue';
import navprincipal from '../components/myaccount/nav_principal.vue';
import navphone from '../components/myaccount/nav_phone.vue';
import detailorden from '../components/myaccount/detail_order.vue';
import editpassword from '../components/myaccount/edit_password.vue';
import detailuser from '../components/myaccount/detailuser.vue';

// User
import registeruser from '../components/user/register';
import loginuser from '../components/user/login';
import setpassword from '../components/user/setpassword';
import resetpassword from '../components/user/resetpassword';
import edituser from '../components/user/edituser';

// Services
import servizi from '../components/servizi/Servizicontent.vue';
import header_servizi from '../components/servizi/header_servizi.vue';
import bodyservizi from '../components/servizi/bodyservizi';

// Slider
import VueAwesomeSwiper from 'vue-awesome-swiper'
import 'swiper/dist/css/swiper.css'

//general
import returnback from '../components/general/return.vue';

Vue.component('navorder', navorder);
Vue.component('returnback', returnback);
Vue.component('navprincipal', navprincipal);
Vue.component('navphone', navphone);
Vue.component('editpassword', editpassword);
Vue.component('detailuser', detailuser);
Vue.component('appContent', appContent);
Vue.component('navheader', navheader);
Vue.component('navcategory', navcategory);
Vue.component('slider_header', slider_header);
Vue.component('footer_index', footer_index);
Vue.component('step_order', step_order);
Vue.component('about-us', AboutUs);
Vue.component('slider-categories', SliderCategories);
Vue.component('error400', error400);
Vue.component('error500', error500);
Vue.component('grazie', grazie);
Vue.component('denied', denied);
Vue.component('certificate', Certificate);
Vue.component('contact', contact);
Vue.component('personal-retreat', PersonalRetreat);
Vue.component('type_dough', type_dough);
Vue.component('delivery', Delivery);
Vue.component('menu_responsive', menu_responsive);
Vue.component('booking', booking);
Vue.component('newsletter', newsletter);
Vue.component('totalpayment', totalpayment);
Vue.component('maps', maps);
Vue.component('searchbar', searchbar);
Vue.component('Suggestion', Suggestion);
Vue.component('bodyservizi', bodyservizi);
Vue.component('header_servizi', header_servizi);
Vue.component('edituser', edituser);
Vue.use(VueAwesomeSwiper,{ 

 })

let router = new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'appContent',
            component: appContent
        },
        {
            path: '/myaccount',
            name: 'myaccount',
            component: myaccount
        },
        {
            path: '/detailorden/:id',
            name: 'detailorden',
            component: detailorden
        },
        {
            path: '/editpassword',
            name: 'editpassword',
            component: editpassword
        },
        {
            path: '/registeruser',
            name: 'registeruser',
            component: registeruser
        },
        {
            path: '/loginuser',
            name: 'loginuser',
            component: loginuser
        },
        {
            path: '/detailuser',
            name: 'detailuser',
            component: detailuser
        },
        {
            path: '/list-product/:id',
            name: 'listProduct',
            component: listProduct
        },
        {
            path: '/list-product',
            name: 'listProduct',
            component: listProduct
        },
        {
            path: '/categories-product',
            name: 'categoriesProduct',
            component: categoriesProduct
        },
        {
            path: '/list-cart',
            name: 'listCart',
            component: listCart
        },
        {
            path: '/method-payment',
            name: 'methodPayment',
            component: methodPayment
        },
        {
            path: '/error400',
            name: 'error400',
            component: error400
        },
        {
            path: '/error500',
            name: 'error500',
            component: error500
        },
        {
            path: '/list-simple-product/:category',
            name: 'ListSimpleProduct',
            component: ListSimpleProduct
        },
        {
            path: '/chisiamo',
            name: 'chisiamo',
            component: chisiamo
        },
        {
            path: '/booking',
            name: 'booking',
            component: booking
        },
        {
            path: '/list-product-other',
            name: 'ListProductOther',
            component: listProductOther
        },
        {
            path: '/Suggestion',
            name: 'Suggestion',
            component: Suggestion
        },
        {
            path: '/servizi',
            name: 'servizi',
            component: servizi
        },
        { 
             path: '/password/reseted/',
             name: 'resetpassword',
             component: resetpassword
         },
         {
             path: '/setpassword',
             name: 'setpassword',
             component: setpassword
         }

    ]
});
export default router

document.addEventListener('DOMContentLoaded', function () {
    Vue.component('gmap-autocomplete', VueGoogleMaps.Autocomplete);
    Vue.component('google-map', VueGoogleMaps.Map);
    Vue.component('ground-overlay', Vue.extend({
        render() {
            return '';
        },
        mixins: [VueGoogleMaps.MapElementMixin],
        props: ['source', 'bounds', 'opacity'],
        created() {
        },
        deferredReady: function () {
            this.$overlay = new google.maps.GroundOverlay(
                this.source,
                this.bounds
            );
            this.$overlay.setOpacity(this.opacity);
            this.$overlay.setMap(this.$map);
        },
        destroyed: function () {
            this.$overlay.setMap(null);
        },
    }));

    new Vue({
        el: '#root',
        data: {
            place: '',
            mapCenter: {
                lat: -8.504455,
                lng: 115.262349,
            },

        },
        methods: {

            updateCenter(location) {
                this.mapCenter = {
                    lat: location.lat(),
                    lng: location.lng(),
                }
            },

            updatePlace(place) {
                console.log(place);
                this.updateCenter(place.geometry.location);
            },

        },
    });
});
