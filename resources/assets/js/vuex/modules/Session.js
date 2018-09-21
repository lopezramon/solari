export default {
    state: {
      user:{
        data:{
            id:1,
            name:'Carla',
            lastname:'Ramirez',
            token: 'XXXXXXXX',
            phone:'233444334433',
            role: '1',
            email:'carla@gmail.com',
            identidad:'3232323223',
        },
        authenticated:true,
      },
    },
    actions:{
       
    },
    getters:{
       getUser: state => {
        return state.user.data;
       },
       getAuthenticated: state => {
        console.log(state.user.authenticated);
        return state.user.authenticated;
       },
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
        }
    }
}
