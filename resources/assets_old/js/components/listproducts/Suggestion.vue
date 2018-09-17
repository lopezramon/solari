<template>

<div> 
<returnback url="/" />

<div class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                    <h1 class="text-center">Vuoi dare un suggerimento?</h1> 
            </div>
            <div class="col-12 col-md-4 text-center text-md-rigth mt-2 mt-md-0">
                <button  class="btn btn-danger " type="submit" value="INVIARE">ORDINA ORA</button> 
            </div>
        </div>
    </div>
</div>

<section class="container mt-3">
     
            <div class="row">
                    <article class="col-12 col-md-6 col-lg-4 box-product mb-1 " v-for="product in products" :key="product.id">
                        
                        <figure class="m-0">
                            <img class="img-fluid" :src="product.image" :alt="product.name">
                        </figure>

                        <div class="info-product pt-2 bg-white">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-8">
                                        <h3 class="font-weight-bold text-uppercase text-rojo">{{product.name}}</h3>
                                        <p class="description">{{product.description}}</p>
                                    </div>
                                    <div class="col-4 align-self-end">
                                        <span class="openbold price mb-3 d-inline-block">
                                            <i class="fas fa-euro-sign"></i>
                                            {{product.price}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6 d-flex p-0">
                                    <div class="bg-red-dark d-flex flex-column justify-content-center align-items-center w-100">
                                        <span class="text-white d-block lead font-weight-bold">1</span>
                                        <span class="text-white d-block lead font-weight-bold">Quantitá</span>
                                    </div>
                                    <div>
                                        <button class="plus-menus btn btn-secondary-two rounded-0 m-0 btn-block ">
                                            <i class="fas fa-angle-up"></i>
                                        </button>
                                        <button class="plus-menus btn btn-secondary-two rounded-0 m-0 btn-block">
                                            <i class="fas fa-angle-down"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-6 p-0 d-flex">
                                    <button @click="addCart()" class="btn btn-primary btn-block rounded-0 btn-lg align-self-stretch">
                                        Inserisci
                                    </button>
                                </div>
                            </div>
                        </div>
                    </article>        
            </div>
</section>
      
<section class="container my-3">
    <div class="row">
        <div class="col-12 text-center">
            <button  class=" btn btn-danger" type="submit" value="INVIARE">ORDINA ORA</button> 
        </div>
    </div>
</section>

<newsletter></newsletter>
<footer_index></footer_index>
        <menu_responsive/>


</div>

        



    
</template>

<script>
    export default {
        data(){
            return{

                 titlemenu: [
                    {
                        name:'DESSERT'
                    }
                ],
                products: [
                    {
                        id: 1,
                        image: 'images/home/menu_categorias_2.jpg',
                        name: 'Seadas',
                        description: 'Dolce tipico sardo servito con miele e zucchero',
                        price: 1400,

                    },
                    {
                        id: 2,
                        image: 'images/home/menu_categorias_2.jpg',
                        name: 'Tiramisú',
                        description: 'Dolce tipico sardo servito con miele e zucchero',
                        price: 1400,

                    },
                    {
                        id: 3,
                        image: 'images/home/menu_categorias_2.jpg',
                        name: 'Dolce',
                        description: 'Dolce tipico sardo servito con miele e zucchero',
                        price: 1400,

                    },
                    {
                        id: 4,
                        image: 'images/home/menu_categorias_2.jpg',
                        name: 'Morena',
                        description: 'Dolce tipico sardo servito con miele e zucchero',
                        price: 1400,

                    },
                                        {
                        id: 5,
                        image: 'images/home/menu_categorias_2.jpg',
                        name: 'Boscaiola',
                        description: 'Pomodoro, Mozarella, Salsiccia, Olive, Funghi Pomodoro.',
                        price: 1400,

                    },
                                        {
                        id: 6,
                        image: 'images/home/menu_categorias_2.jpg',
                        name: 'Boscaiola',
                        description: 'Pomodoro, Mozarella, Salsiccia, Olive, Funghi Pomodoro.',
                        price: 1400,

                    }
                ],
                addizionale: [
                    {id: 1,  name: 'pomodoro', price: 1.00},
                    {id: 2,  name: 'mozzarella', price: 1.00},
                    {id: 3,  name: 'capperi', price: 1.00},
                    {id: 4,  name: 'alici', price: 1.00},
                    {id: 5,  name: 'cotto', price: 1.00},
                    {id: 6,  name: 'origano', price: 1.00},
                ],
                sizes: [
                    {id: 1, title: 'Normale', price: 2.00},
                    {id: 3, title: 'gigante', price: 2.00},
                ],
                type_dough: [
                    {id: 1, title: 'Scrocchiarella', price: 3.00},
                    {id: 2, title: 'Integrale al 10 Cereali', price: 3.00},
                    {id: 3, title: 'Senza Glutine E Sensa Lattosio', price: 3.00},
                    {id: 4, title: 'Tradizionale con farina di tipo 1', price: 3.00},
                ]
            }
        },
        methods: {
          getProducts(){
               axios.get("api/admin/suggestions").then((res)=>{
                  if (res.status == 200)  {
                    console.log(res.data.data.suggestions);
                   // console.log(res.data.data.catalog.additional_categories);
                   // slf.product_features=res.data.data.catalog.product_feature_categories;
                   // slf.additional_categories=res.data.data.catalog.additional_categories; 
                   // slf.products=res.data.data.catalog.products;
                   // slf.loading = false; 
                  }
              })
              .catch((error)=>{
                  
              })    
          },
          nextorder(){
            this.$router.push('/list-cart');
          },
          AddCant(oper,product) {
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
            addCart(product){
                var obj={};
                obj.adicionales=[];
                obj.cant=document.getElementById('quantity_'+product.id).innerHTML;
                obj.dimensiones=[];
                obj.id=product.id;
                obj.image=product.image;
                obj.masas=[];
                obj.name=product.name;
                obj.total_item=product.price;
                obj.total=obj.cant*obj.total_item;
                obj.type_cart="suggestion";
                this.$store.commit('setStore',{list: obj});
            }
        },computed:{
            listProduct(){
                return this.products;
                // return this.$store.getters.getCart;
            },
        },mounted(){
            this.getProducts();
            // addCart(){
            //     Vue.swal({
            //         title: 'Aggiunto!!',
            //         text: "continua ad aggiungereo",
            //         type: 'success',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#216619',
            //         confirmButtonText: 'Pagare',
            //         cancelButtonText: 'Seguire'
            //     }).then((result) => {
            //         if (result.value) {
            //             console.log('confirm');
            //         }
            //     })
                
            // }
        }

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
            font-size: 2rem;
            line-height: 1;
        }
    @media screen and (min-width: 992px){
        h1 {
            color:#970000;
            font-weight:bold;
            font-style:bolder;
            font-size: 3rem;
        }
    }
    .mb-1, .my-1 {
    margin-bottom: 1.05rem !important;
}
.col-lg-3 {
    padding-right:10px;
    padding-left:10px;
}

.btn {
  display: inline-block;
  font-weight: 800;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  border: 1px solid transparent;
  padding: 0.375rem 0.75rem;
  font-size: 1.5em;
  line-height: 1.6;
  border-radius: 0.25rem;
  -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
}


</style>
