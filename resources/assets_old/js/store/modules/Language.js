export default {
  state: {
    resources: {
    	tags:[],
    	resources:[],
    	lang:'it',
    },
  },actions:{
  		 setLanguage({ commit },lang){
  		 	commit('setLang',{lang});
  		 	axios.post('api/getLanguage',{lang:lang})
           .then(function (response) {
            if(response.status==200){
							let data=response.data.tags;
            	commit('saveLang',{ list: data});
            }
          })
          .catch(function (error) {
           console.log(error);
          });
        },
    },getters:{
    	 getvaluebyTag: (state) => (filter) => {
    	 	  var test="";
    	 	  let arr=state.resources.tags;
    	 	  arr.forEach(function(element) {
    	 	  	if(element!="" || element!=null ){
	    	 	  	if(filter==element.tag){
	    	 	  		 test=element.value;
	    	 	  	}
	    	 	  }
    	 	  });
    	 	  return test;
        },
        getLangVal: (state) => () => {
        	let val_lang=state.resources.lang;
        	if(localStorage.getItem("lang")!=null){
        	  val_lang=localStorage.getItem("lang");
        	  //commit('setLang',{val_lang});
        	}
        	return val_lang;

        }
    },mutations:{
    	saveLang(state,{list}){
        state.resources.resources=list.validate;
        state.resources.tags=list.tags;
      },
      setLang(state,{lang}){
      	localStorage.setItem("lang",lang);
      	state.resources.lang=lang;
      }
    }
}