export default {
    state: {
      booking:{
         checkin:'2018-09-18',
         checkout:'2018-09-25',
         adult:2,
      },
    },
    actions:{

    },
    getters:{
       getDataFilter: state => {
         var obj={};
         obj.checkin=state.booking.checkin;
         obj.checkout=state.booking.checkout;
         obj.adult=state.booking.adult;
         return obj;
       },  
    },
    mutations:{
      setFilter(state,{ list }){ 
        Vue.set(state.booking,'checkin',list.checkin);
        Vue.set(state.booking,'checkout',list.checkout); 
      },
    }
}