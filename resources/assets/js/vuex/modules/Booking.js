export default {
    state: {
      booking:{
         checkin:null,
         checkout:null,
         cart:[],
         total:0,
         responsable:{
          name:null,
          phone:null,
          identidad:null,
          email:null,
         }
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
       getCart: state => {
        return state.booking.cart;
       },
       getTotal: state => {
        return state.booking.total;
       },
       getBooking: state => {
        return state.booking;
       },
    },
    mutations:{
      deleteAll(state,{ list }){ 
        for(var a in list){
          var list_cart=state.booking.cart;
          for(var i in list_cart){
            if(list_cart[i].id==list[a].id){
               Vue.delete(state.booking.cart,i);
               Vue.set(state.booking, 'total',Math.abs(state.booking.total-list[a].price));
            }
          }
        }
      },
      destroyState (state){ 
        Vue.set(state.booking,'checkin',null);
        Vue.set(state.booking,'checkout',null);
        Vue.set(state.booking,'cart',[]); 
        Vue.set(state.booking,'total',0); 
        Vue.set(state.booking.responsable,'name',null); 
        Vue.set(state.booking.responsable,'phone',null); 
        Vue.set(state.booking.responsable,'identidad',null); 
        Vue.set(state.booking.responsable,'email',null); 
      },
      setResponReser(state,{ list }){ 
        Vue.set(state.booking.responsable,'name',list.name_reserva); 
        Vue.set(state.booking.responsable,'phone',list.telef_reserva); 
        Vue.set(state.booking.responsable,'identidad',list.identidad_reserva);
        Vue.set(state.booking.responsable,'email',list.email);
      },
      setFilter(state,{ list }){ 
        Vue.set(state.booking,'checkin',list.checkin);
        Vue.set(state.booking,'checkout',list.checkout); 
      },
      addCart(state,{ list }){
        var total=state.booking.total;
        total+=parseFloat(list.price);
        state.booking.cart.push(list);
        Vue.set(state.booking,'total',total); 
      },
      removerItem(state,{ list }){
        var list_cart=state.booking.cart;
        for(var i in list_cart){
          if(list_cart[i].id==list.id){
             Vue.delete(state.booking.cart,i);
             Vue.set(state.booking, 'total',state.booking.total-list.price);
             break;
          }
        }
      }
      
    }
}