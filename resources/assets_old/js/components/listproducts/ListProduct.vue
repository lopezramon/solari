<template>

<div> 

    
<!-- <slider_header></slider_header> -->
<returnback url="/"  margin="mb-3"/>

<section class="container-fluid">
    
    <navcategory/>

        <div class="d-none d-sm-none d-md-block d-lg-block text-center"><h1>PIZZE</h1></div>
            
            <template v-if="loading">
                <div class="container d-flex justify-content-center">
                    <div class="row m-5 mb-4">
                        <div class="col-12">
                            <bounce-loader :loading="loading" :color="color" :size="size"/>
                        </div>
                    </div>
                </div>
            </template>
            <template v-else>
            <div class="row">
                  <article class="col-12 col-md-4 col-lg-3 box-product mb-1 " v-for="product in listProduct" :key="product.id" >
                     <figure class="m-0">
                            <img class="img-fluid" :src="product.image" :alt="product.name">
                        </figure>
                        <div class="info-product pt-2 bg-white">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-8">
                                        <h3 class="font-weight-bold text-uppercase text-rojo">{{product.name}}</h3>
                                        <p class="description lead">{{product.description}}</p>
                                    </div>
                                </div>
                                <div class="col-4 align-self-end">
                                    <span class="openbold price mb-3 d-inline-block">
                                        <span class="p-0 m-0 price-gran">
                                          <i class="fas fa-euro-sign"></i>
                                          <span class="">{{product.presentations[1].price}}</span>  
                                        </span>
                                        /
                                        <span class="p-0 m-0 price-med">
                                          <i class="fas fa-euro-sign"></i>
                                          <span class="">{{product.presentations[0].price}}</span>  
                                        </span>                                        
                                    </span>
                                </div>
                            </div>
                          </div>
                          <div class="text-white font-weight-bold text-uppercase">
                          <b-btn class="openbold position-relative btn btn-link btn-block text-left text-uppercase" v-b-toggle="'dimensione'+product.id" variant="primary">Dimensione</b-btn>
                          <b-collapse :id="'dimensione'+product.id">
                            <b-card>
                              <div class="card-body">
                                    <div class="form-group row" v-for="(item,key) in product.presentations">
                                       <div class="col-8">
                                           <div class="form-check">
                                                <input class="form-check-input" :class="'dimensiones_'+product.id" type="radio" :checked="key==1?true:false" :name="'size_'+product.id" :id="'dimension_'+item.id" :value="item.id" :data-title="item.name" :data-price="item.price">
                                                <label class="form-check-label" :for="item.id">
                                                    {{item.name}}
                                                </label>
                                           </div>
                                       </div>
                                       <div class="col-4 text-right">
                                           {{item.price}} €
                                       </div>
                                    </div>
                                </div>
                            </b-card>
                          </b-collapse>
                        </div>  
                        <div class="text-white font-weight-bold text-uppercase">
                          <b-btn class="openbold position-relative btn btn-link btn-block text-left text-uppercase" v-b-toggle="'farina'+product.id" variant="primary">Farina</b-btn>
                          <b-collapse :id="'farina'+product.id">
                            <b-card>
                                <div class="card-body">
                                         <div class="form-group row" v-for="(item,key) in listTipoMasa(product.product_feature_category_id)">
                                       <div class="col-8">
                                           <div class="form-check">
                                                <input class="form-check-input" :class="'masas_'+product.id" type="radio" :checked="key==0?true:false" :name="'masa_'+product.id" :id="'masa_'+item.id" :value="item.id" :data-title="item.name" :data-price="item.price">
                                                <label class="form-check-label" :for="item.id">
                                                    {{item.name}}
                                                </label>
                                           </div>
                                       </div>
                                       <!-- <div class="col-4 text-right">
                                           {{item.price}} €
                                       </div> -->
                                    </div>
                                </div>
                            </b-card>
                          </b-collapse>
                        </div> 
                        <div class="text-white font-weight-bold text-uppercase">
                          <b-btn class="openbold position-relative btn btn-link btn-block text-left text-uppercase" v-b-toggle="'addizionale'+product.id" variant="primary">Addizionale</b-btn>
                          <b-collapse :id="'addizionale'+product.id">
                            <b-card>
                                <div class="card-body">
                                   <!--  {{listAditionals(product.additional_category_id)}} -->
                                       <div class="form-group row"  v-for="item in listAditionals(product.additional_category_id)">
                                            <div class="col-8">
                                                <div class="form-check">
                                                  <input :data-price="item.price" class="form-check-input" :data-title="item.name" :class="'adicionales_'+product.id" type="checkbox" :name="item.name" :id="'adicional_'+item.name" :value="item.id">
                                                    <label class="form-check-label" :for="item.name">
                                                        {{item.name}}
                                                    </label>
                                                </div>
                                            </div>
                                           <div class="col-4 text-right">
                                                {{item.price}} €
                                            </div> 
                                        </div>
                                    </div>
                            </b-card>
                          </b-collapse>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6 d-flex p-0">
                                    <div class="bg-red-dark d-flex flex-column justify-content-center align-items-center w-100">
                                        <span class="text-white d-block lead font-weight-bold" :id="'quantity_'+product.id">1</span>
                                        <span class="text-white d-block lead font-weight-bold">Quantitá</span>
                                    </div>
                                    <div>
                                        <button @click.prevent="AddCant('mas',product)" class="plus-menus btn btn-secondary-two rounded-0 m-0 btn-block ">
                                            <i class="fas fa-angle-up"></i>
                                        </button>
                                        <button @click.prevent="AddCant('menos',product)" class="plus-menus btn btn-secondary-two rounded-0 m-0 btn-block">
                                            <i class="fas fa-angle-down"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-6 p-0 d-flex">
                                    <button @click.prevent="addCart(product)" class="btn btn-primary btn-block rounded-0 btn-lg align-self-stretch">
                                        Inserisci
                                    </button>
                                </div>
                            </div>
                        </div>                 
                  </article>        
            </div>
          </template>
</section>

    <newsletter></newsletter>
    <footer_index></footer_index>
    <menu_responsive/>
</div>
    </template>

<script>
import { BounceLoader } from 'vue-spinner/dist/vue-spinner.min'
    export default {
       components: { BounceLoader },
        data(){
            return{

                titlemenu: [
                    {
                        name:'PIZZE'
                    }
                ],
                subcategory: this.$route.params.id,
                product_select:[],
                color: '#e33d2f',
                size: '40px',
                loading: false,
                "products": [],
                "additional_categories": [], 
                "product_features": [],           
              }
        },
        methods: {
            getProducts(){
              this.loading = true;
              var id=this.subcategory;
              var route="/api/admin/products_general";
              if(id!=undefined){
                 route+="/"+id;
              }
              var slf=this;
              axios.get(this.root+route).then((res)=>{
                  if (res.status == 200)  {
                   console.log(res.data.data.catalog.additional_categories);
                   slf.product_features=res.data.data.catalog.product_feature_categories;
                   slf.additional_categories=res.data.data.catalog.additional_categories; 
                   slf.products=res.data.data.catalog.products;
                   slf.loading = false; 
                  }
              })
              .catch((error)=>{
                  
              })    
            },
            addCart(product){

              var total=0;
              var obj_dime={};
              $(".dimensiones_"+product.id).each(function(){
                if($(this).prop("checked")) {
                      obj_dime.dimension_id=$(this).val();
                      obj_dime.price=$(this).attr("data-price");
                      total+=parseFloat(obj_dime.price);
                      obj_dime.title=$(this).attr("data-title");
                      return false;
                }
              });
              var obj_masas={};
              $(".masas_"+product.id).each(function(){
                if($(this).prop("checked")) {
                      obj_masas.masa_id=$(this).val();
                      obj_masas.title=$(this).attr("data-title");
                      return false;
                }
              });
              var obj_adicionales=[];
              $(".adicionales_"+product.id).each(function(){
                if($(this).prop("checked")) {
                      var obj={};
                      obj.adicional_id=$(this).val();
                      obj.title=$(this).attr("data-title");
                      obj.price=$(this).attr("data-price");
                      total+=parseFloat(obj.price);
                      obj_adicionales.push(obj);
                }
              });
              var cant=parseInt(document.getElementById('quantity_'+product.id).innerHTML);

              // console.log(cant);
              // console.log(obj_adicionales);
              // console.log(obj_dime);
              // console.log(obj_masas);
              // console.log(total*cant);

              var obj={};
              for (var i = 0; i < this.products.length; i++) {
                if(this.products[i].id==product.id){
                  obj.type_cart='productcart';
                  obj.id=product.id;
                  obj.name=product.name;
                  obj.adicionales=obj_adicionales;
                  obj.dimensiones=obj_dime;
                  obj.masas=obj_masas;
                  obj.total_item=total;
                  obj.image=this.products[i].image;
                  obj.total=total*cant;
                  obj.cant=cant;
                  this.products[i].value_addcart=null;
                  this.products[i].value_addcart=obj
                  break;
                }
              }

              this.$swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
              }).then((result) => {
                if (result.value) {
                  this.$store.commit('setStore',{list: obj});
                  this.$router.push('/Suggestion');
                }
              })
              
            },
            listAditionals(idCategory){
                for (var i = 0; i < this.additional_categories.length; i++) {
                    if(this.additional_categories[i].id==idCategory){
                        return this.additional_categories[i].the_additionals;
                    }
                }
            },listTipoMasa(idFeature){
                for (var i = 0; i < this.product_features.length; i++) {                    
                    if(this.product_features[i].id==idFeature){
                        return this.product_features[i].the_features;
                    }
                }
            },AddCant(oper,product) {
               var cant=document.getElementById('quantity_'+product.id).innerHTML;
               switch (oper) {
                    case 'mas':
                        cant = parseInt(cant) + 1;
                    break;
                     case 'menos':
                        cant = parseInt(cant) - 1;
                    break;
               }    
               if(cant>0){
                document.getElementById('quantity_'+product.id).innerHTML=cant;
               }       
            },
        },computed:{
              listProduct(){
                for (var i = 0; i < this.products.length; i++) {
                  this.products[i].value_addcart=null;
                }
                return this.products;
            }, 
        },mounted(){
            this.root=window.location.origin;
            this.getProducts();
        },



    }



</script>



<style scoped>

    .description{
        font-family: 'Playfair Display', serif;
    }
    .openbold{
        font-family: 'Open Sans', sans-serif;
        font-weight: 800;
    }

    .dropdown-toggle::after {
        display: inline-block;
        width: 0;
        height: 0;
        margin-left: 0.255em;
        vertical-align: 0.255em;
        content: "";
        border-top: 0.3em solid;
        border-right: 0.3em solid transparent;
        border-bottom: 0;
        border-left: 0.3em solid transparent;
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        font-size: 1.6rem;
    }
    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #e20513;
        background-clip: border-box;
        border: 0px solid rgba(0, 0, 0, 0);
        border-radius: 0rem;
    }
    .card-header {
        padding: 0.3rem 1.25rem;
        margin-bottom: 0;
        background-color: rgba(0, 0, 0, 0.03);
        border-bottom: 3px solid black;
    }
    .accordion .card:not(:first-of-type):not(:last-of-type) {
        border-bottom: 0;
        border-radius: 0;
    }
    .btn-link, .btn-link:hover{
        color: #fff;
        text-decoration: none;
    }
    .text-rojo{
        color:#e33d2f;
    }
    .price{
        font-size: 1.4rem;
        color: #dc3b2d;
        font-weight: 700;
    }
    p {
        margin-top: 0;
        margin-bottom: 1rem;
        line-height: 1.2;
    }
    h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
        margin-bottom: 0.2rem;
        font-family: inherit;
        font-weight: 500;
        line-height: 1.2;
        color: inherit;
    }
    .btn-link:focus, .btn-link.focus {
        text-decoration: none;
        border-color: transparent;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    .btn-secondary.focus, .btn-secondary:focus {
        background-color: #f14f40;
    }
    .plus-menus{
        padding-left: 20px;
        padding-right: 20px;
    }
    .underline a:hover
    {
        border-bottom: 5px solid #d5a240;
    }
    .underline a:active
    {
        border-bottom: 5px solid #d5a240;
        color: #d5a240;
    }
    
    
    h1 {
        color:#970000;
        font-weight:bold;
        font-style:bolder;
        font-size: 3rem;

    }
    .mb-1, .my-1 {
    margin-bottom: 1.05rem !important;
}
.col-lg-3 {
    padding-right:10px;
    padding-left:10px;
}

.price-med{
    font-size: 18px !important;
}

</style>
