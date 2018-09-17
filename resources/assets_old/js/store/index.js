import Vue from 'vue'
import Vuex from 'vuex'
/*directorio*/
import Store from './modules/Store'
import Session from './modules/Session'
import Language from './modules/Language'


Vue.use(Vuex)
import createPersistedState from 'vuex-persistedstate'
import * as Cookie from 'js-cookie'

let store = new Vuex.Store({
    modules:{
        Store,Language,Session
    },plugins: [
         createPersistedState({
             paths: ['Store.store','Language.Language'],
             getState: (key) => Cookie.getJSON(key),
             setState: (key, state) => Cookie.set(key, state, { expires: 1, secure: false })
         })
      ]
})



export default store;