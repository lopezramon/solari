export default {
    state: {
      user:{
        data:{
            name:'Carla',
            lastname:'Ramirez',
            token: 'XXXXXXXX',
            phone:'233444334433',
            role: '1',
            email:'carla@gmail.com',
            identidad:'3232323223'
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
        
    }
}