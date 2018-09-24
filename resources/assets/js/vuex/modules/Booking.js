export default {
    state: {
      booking:{
         checkin:'2018-09-18',
         checkout:'2018-09-25',
         adult:2,
         cart:[],
         total:0,
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
      setFilter(state,{ list }){ 
        Vue.set(state.booking,'checkin',list.checkin);
        Vue.set(state.booking,'checkout',list.checkout); 
      },
      addCart(state,{ list }){
        var total=state.booking.total;
        total=+parseFloat(list.price);
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