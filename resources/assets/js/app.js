require('./bootstrap');

window.Vue = require('vue');

Vue.use(require('vue-moment'));
Vue.component('scale-loader', require('vue-spinner/src/ScaleLoader.vue'));

/*vuex*/
import store from './vuex'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import router from './router';

const app = new Vue({
    el: '#app',
    router,
    store
});

