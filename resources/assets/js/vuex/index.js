import Vue from 'vue'
import Vuex from 'vuex'
import Session from './modules/Session.js'
import createPersistedState from 'vuex-persistedstate'
import * as Cookie from 'js-cookie'
Vue.use(Vuex)

let store = new Vuex.Store({
    modules:{
        Session,
    },plugins: [
         createPersistedState({
             paths: ['Session.user'],
             getItem: key => Cookies.get(key),
             setItem: (key, value) => Cookies.set(key, value, { expires: 3, secure: true }),
             removeItem: key => Cookies.remove(key)
         })
      ]   
})

export default store;