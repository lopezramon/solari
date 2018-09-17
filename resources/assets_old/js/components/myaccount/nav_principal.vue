<template>
	<div>
		<div class="fondo-menu pb-3">
            <h3 class="text-uppercase red p-4 mb-0 d-none d-lg-block">{{name_menu}}</h3>
            <ul class="ul-item pl-3">
                <li class="">
                    <router-link tag="li" to="/myaccount">
                     <a class="nav-link white" :class="{'active-menu':url('/myaccount')}">
                         I mie ordini </a>
                    </router-link>   
                </li>
                <li class="">
                    <router-link tag="li" to="/detailuser">
                     <a class="nav-link white" :class="{'active-menu':url('/detailuser')}">
                        Detaggli dell' account </a>
                    </router-link>   
                </li>
                <li class="">
                    <router-link tag="li" to="/editpassword">
                     <a class="nav-link white" :class="{'active-menu':url('/editpassword')}">
                        Cambia password </a>
                    </router-link>   
                </li>
                <li class="">
                    <router-link tag="li" to="/foo">
                     <a class="nav-link red uderline">
                        Sign Out </a>
                    </router-link>   
                </li>
            </ul>
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
        },
        methods: 
        {
            url(urlactual){
                if(urlactual==this.pathname){                    
                     switch(urlactual){
                        case '/myaccount':
                          this.name_menu='I mie ordini';
                        break;
                        case '/detail':
                         this.name_menu="Detaggli dell' account";
                        break;
                        case '/editpassword':
                          this.name_menu='Cambia password';
                        break;
                      }
                    return true;
                }else{
                    return false;
                }
            } 
        },
         computed:
        {
          
          
        }

    }
</script>
<style>
    
    .fondo-menu{
        background-color: #1C1C1C;
    }
   
    .color-link{
        color:#7C7875 !important;
    }
    
    
    .active-menu{ /*gold*/
        color: #d5a240 !important;
    }
    .uderline{
        text-decoration: underline !important;
    }
    .text-contacto{
        font-weight: bold;
    }
    .subray-title{
        border-width: 2px;
        background-color: white;
    }

    /*estilos table bootstrap-vue*/
    .table td, .table th{
        border-top:none !important;
        border-bottom: 1px solid #e20513;
        color: #fff;
    }

    table.b-table > thead > tr > th, table.b-table > tfoot > tr > th{
        color:red;
        border-bottom: 1px solid #e20513;
        text-transform: uppercase;
    }

    .table td[aria-colindex="1"]{
        color: #d5a240 !important;
    }

    .page-item:hover,.page-link:hover{
       background-color: #F78181;
        border-color: #F78181; 
        color: #FFF;
    }

   .page-item,.page-link{
       background-color: #e20513;
       color: #fff;
       border-color:black;
       border-radius: 15%;
    }
    .page-item.active .page-link{
        background-color: #d5a240;
        border-color:#d5a240;
        border-radius: 15%;
    }
    .page-item.disabled .page-link{
        background-color: #e20513;
        color: #fff;
        border-color:black;
        border-radius: 15%;
    }
    .btn-vista:hover{
       background-color: #F78181;
        border-color: #F78181; 
    }
    .btn-vista {
        color: #fff;
        background-color: #e20513;
        border-color: #e20513;
        border-radius: 0px;
    }
    .btn-vista.focus, .btn-vista:focus {
        box-shadow: 0 0 0 0.2rem rgba(33, 102, 25, 0.5);
    }
    .btn-vista:not(:disabled):not(.disabled):active {
        color: #fff;
        background-color: #e20513;
        border-color: #e20513;
    }
    .btn-vista:not(:disabled):not(.disabled):active:focus{
        box-shadow: 0 0 0 0.2rem rgba(33, 102, 25, 0.5);
    }
    .size-titlemovil{
      font-size: 25px;
    }
    .texto_detail{
      padding: 0;
      font-weight: bold;
      margin: 0;
    }
</style>
