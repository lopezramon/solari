<template>
	<div>
	 <div class="row d-sm-block d-md-none py-2">
          <div class="col-12">
            <div class="row size-titlemovil">
              
              <div class="col-12 text-center">
                <span class="text-capitalize red p-0 mb-0">{{name_menu}}</span>
              </div>
            </div>
            
          </div>
      </div>
      <div class="row d-none d-md-block">
            <div class="col-12">
                <ul class="d-flex ul-item pl-0">
                    <li class=""><a href="#" class="nav-link color-link pl-0">
                        Pizzeria da Adriano / </a>
                    </li>
                    <li class=""><a href="#" class="nav-link color-link pl-0">
                        Il mio account / </a>
                    </li>
                    <li class="">
                        <a href="#" class="nav-link color-link pl-0">
                       {{name_menu}} 
                       </a>
                    </li>
                </ul>
            </div>
        </div>      
	</div>
</template>
<script>
    export default {
        data(){
            return{
              pathname:null,
              name_menu:null
            }
        },
        mounted(){
            this.pathname=window.location.pathname;
            this.setTitle();
        },
        methods: 
        {
          setTitle(){               
               switch(this.pathname){
                  case '/myaccount':
                    this.name_menu='I mie ordini';
                  break
                  case '/detail':
                   this.name_menu="Detaggli dell' account";
                  break;
                  case '/editpassword':
                    this.name_menu='Cambia password';
                  break;
                }
          } 
        },
         computed:
        {
          
          
        }

    }
</script>
<!-- Cambia password -->