export default {
    state: {
        user: [],
        authenticated: false,
        enviroment: {},
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
        },
        getEnviroment({commit}) {
            axios.post('/api/get_env').then((response) => {
                commit('getEnviroment', { list: response.data })
            }).catch((error) => {
                console.log(error.data);
            })
        }        
    },
    getters:{
        getSession: state => {
            return state.user;
        },
        getauthenticated: state => {
            return state.authenticated;
        },
        getEnviroment: state => {
            return state.enviroment;
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
            obj.phone = data.details.phone;
            obj.fiscalCode = data.details.fiscal_code;
            obj.roleUser = data.roles;
            state.user.push(obj);
        },
        deleteSession(state, {list}) {
            state.authenticated = false;
            state.user = [];
        },
        setEnviroment(state, {list}) {
            Vue.set(state, "enviroment", list)
        }
    }
}
