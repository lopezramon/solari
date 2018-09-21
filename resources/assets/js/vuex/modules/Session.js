export default {
    state: {
        user: [],
        authenticated: false,
    },

    actions: {
        setSession({commit}, item) {
            commit('setSession', {list: item});
        },
        deleteSession({commit}, item) {
            commit('deleteSession', {list: item});
        },
        testSession({commit}, item) {
            console.log(item);
        }
    },
    getters:{
        getSession: state => {
            return state.user;
        },
        getauthenticated: state => {
            return state.authenticated;
        }
    },
    mutations:{
        setSession(state, {list}) {
            state.user.length = 0;
            state.authenticated = true;
            var data = list.data;
            let obj = {};
            obj.id = data.id;
            obj.api_token = data.api_token;
            obj.name = data.name;
            obj.lastname = data.lastname;
            obj.email = data.email;
            // obj.phone = data.details.phone;
            // obj.fiscalCode = data.details.fiscal_code;
            obj.roleUser = data.roles;
            state.user.push(obj);
        },
        deleteSession(state, {list}) {
            state.authenticated = false;
            state.user = [];
        }
    }
}
