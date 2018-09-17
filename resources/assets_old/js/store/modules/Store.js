export default {
  state: {
    store:{
        products_cart:[],
        cantidad:0,
        total:0,
        //detalle del producto
        comentario_orden:null,
        formulario:null,
    }
  },actions:{
        // setStore({ commit },item){
        //   commit('setStore',{ list: item});
        // },
        // setStoreDetail({ commit },item){
        //   commit('setStoreDetail',{ list: item});
        // },
        // deleteItem({ commit },item){
        //   commit('deleteItem',{ list: item});
        // },
  },getters:{
       getComentario: state => {
         return state.store.comentario_orden;
       },
       getCant: state => {
         return state.store.cantidad;
       },
       getTotal: state => {
         return state.store.total.toFixed(2);
       },
       getCart:state => {
          return state.store.products_cart;
       },   
  },mutations:{
    setFormulario(state,{ list }){  
      Vue.set(store, 'formulario',list);
    },
     setStore(state,{ list }){  
        console.log(list);
        function diffArray(arr1,arr2){
          var arr_1=[];
          var arr_2=[];
          for(var a in arr1){
            arr_1.push(arr1[a]);
          }
          for(var b in arr2){
            arr_2.push(arr2[b]);
          }
          Array.prototype.diff = function (arr) {
                var mergedArr = this.concat(arr);
                return mergedArr.filter(function (e) {
                    return mergedArr.indexOf(e) === mergedArr.lastIndexOf(e);
                });
          };  
          var diff = arr_1.diff(arr_2);
          if(diff.length==0){
            return true; //no hay diferencia
          }else{
            return false; //hay diferencia
          }
        } 

        var insertar=true;
        var list_cart=state.store.products_cart; 
        for(var i in list_cart){
          if(parseInt(list_cart[i].id)===parseInt(list.id)){
            //verificar similitud dimension
            var dimension_cart=[];
            if(list_cart[i].dimensiones.length>0){
               dimension_cart.push(list_cart[i].dimensiones.dimension_id);
             }           
            var dimension_list=[];
            if(list.dimensiones.length>0){
               dimension_cart.push(list.dimensiones.dimension_id);
            }
            var diff_dimension=diffArray(dimension_cart,dimension_list);
            if(diff_dimension==true){ //no hay diferencia
              //verificar tipo de masa
              var masas_cart=[];
              if(list_cart[i].masas.length>0){
                masas_cart.push(list_cart[i].masas.masa_id);
              }
              var masas_list=[];
              if(list.masas.length>0){
                masas_list.push(list.masas.masa_id);
              }              
              var diff_masas=diffArray(masas_cart,masas_list);
              if(diff_masas==true){ //no hay diferencia
                //verificar adicionales
                var dimensiones_cart=[];
                if(list_cart[i].adicionales.length>0){
                  for(var a in list_cart[i].adicionales){
                    if(list_cart[i].adicionales[a].adicional_id!=undefined){
                      dimensiones_cart.push(list_cart[i].adicionales[a].adicional_id);
                    }     
                  }
                }
                var dimensiones_list=[];
                if(list.adicionales.length>0){
                  for(var a in list.adicionales){
                    if(list.adicionales[a].adicional_id!=undefined){
                      dimensiones_list.push(list.adicionales[a].adicional_id);
                    }
                  }
                }
                var diff_dimensiones=diffArray(dimensiones_list,dimensiones_cart);
                if(diff_dimensiones==true){ //no hay diferencia
                  let mascant=parseInt(list_cart[i].cant)+parseInt(list.cant);
                  let mastotal=parseFloat(list_cart[i].total)+parseFloat(list.total);
                  Vue.set(list_cart[i], 'cant',mascant);
                  Vue.set(list_cart[i], 'total',mastotal);
                  insertar=false;
                  break;
                }
              }
            }
          }
        }
        if(insertar==true){
          Vue.set(state.store, 'cantidad',state.store.cantidad+1);
          state.store.products_cart.push(list); 
          Vue.set(state.store, 'total',parseFloat(state.store.total)+parseFloat(list.total));
        }
       
    },setStoreDetail(state,{ list,key,oper }){ 
       var list_cart=state.store.products_cart;
       for(var i in list_cart){
          if(parseInt(list_cart[i].id)===parseInt(list.id) && i==key){
            Vue.set(list_cart[i], 'cant', list.cant);
            Vue.set(list_cart[i], 'total',list.cant*list.total_item); 
          }
        }
        var total=0
        for(var i in list_cart){
            total+=parseFloat(list_cart[i].total);
        }
        Vue.set(state.store, 'total',total);
    },deleteItem(state,{ list, key }){ 
       var list_cart=state.store.products_cart;
       for(var i in list_cart){
          if(parseInt(list_cart[i].id)===parseInt(list.id) && i==key){
            Vue.delete(state.store.products_cart,i);
            Vue.set(state.store, 'total',state.store.total-list.total);
            Vue.set(state.store, 'cantidad',state.store.cantidad-1);     
          }
        }
    },setComentario(state,{ list }){ 
      Vue.set(state.store, 'comentario_orden',list.comentario);
    }
    // ,addSugerencias(state,{ list }){ 
    //   var list_sug=state.store.sugerencias;
    //   for(var i in list_sug){
    //     if(list_sug[i].id==list.id){
    //        var cant_total=parseInt(list.cant)+parseInt(list_sug[i].cant);
    //        var total=cant_total*parseFloat(list.total_item);
    //        Vue.delete(state.store.sugerencias,i);
    //        list.cant=cant_total;
    //        list.total_item=total;
    //        break;
    //     }
    //   }
    //   state.store.products_cart.push(list);
    // }
  }

}