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
import services from '../components/landing/services.vue';
import esperience from '../components/landing/esperience.vue';
import galleryHorizontal from '../components/landing/galleryHorizontal.vue';
import mapa from '../components/landing/mapa.vue';
import newsletter from '../components/landing/newsletter.vue';
import aboutUs from '../components/landing/aboutUs.vue';
import homeCamere from '../components/landing/homeCamere.vue';
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
Vue.component('services', services);
Vue.component('esperience', esperience);
Vue.component('gallery_horizontal', galleryHorizontal);
Vue.component('mapa', mapa);
Vue.component('newsletter', newsletter);
Vue.component('aboutus', aboutUs);
Vue.component('home_camere', homeCamere);


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