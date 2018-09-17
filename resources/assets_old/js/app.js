// Se comenta porque creo que tenemos conflictos por el jquery de bootstrap Vue
require('./bootstrap');

window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue);

/*vuex*/
import store from './store'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));

import router from './router';

const app = new Vue({
    el: '#app',
    router,
    store
});
