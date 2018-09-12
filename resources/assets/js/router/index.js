import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router);

//                swiper slider
// -------------------------------------------------
import VueAwesomeSwiper from 'vue-awesome-swiper'
import 'swiper/dist/css/swiper.css'
Vue.use(VueAwesomeSwiper, {});
// -------------------------------------------------


//Registro de componentes

// Landing
import AppContent from '../components/landing/AppContent.vue';
import headerLanding from '../components/landing/header.vue';
import sliderOlbia from '../components/landing/sliderOlbia.vue';
// generale
import navbar from '../components/general/navbar.vue';
import footer from '../components/general/footer.vue';
import jumperr from '../components/general/jumperr.vue';


//componentes generales
Vue.component('navbar', navbar);
Vue.component('gfooter', footer);
Vue.component('jumperr', jumperr);
Vue.component('header_landing', headerLanding);
Vue.component('slider_olbia', sliderOlbia);


//rutas

let router = new Router({
    mode:'history',
    routes: [
        {
            path: '/',
            name: 'AppContent',
            component: AppContent
        },
         
    ],scrollBehavior (to, from, savedPosition) {
      return { x: 0, y: 0 }
    }
})

export default router