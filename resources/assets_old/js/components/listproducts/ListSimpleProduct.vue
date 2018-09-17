<template>
    <div>
        <article class="box-product mb-1 bg-white" v-for="product in products" :key="product.id">
            <figure class="m-0">
                <img class="img-fluid" :src="product.image" :alt="product.name">
            </figure>
            <div class="info-product pt-2">
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
                        <div class="bg-red d-flex flex-column justify-content-center align-items-center w-100">
                            <span class="text-white d-block lead font-weight-bold">1</span>
                            <span class="text-white d-block lead font-weight-bold">Quantitá</span>
                        </div>
                        <div>
                            <button class="plus-menus btn btn-secondary rounded-0 m-0 btn-block">
                                <i class="fas fa-angle-up"></i>
                            </button>
                            <button class="plus-menus btn btn-secondary rounded-0 m-0 btn-block">
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

        <!--fixed menu-->
        <div class="fixed-bottom">
            <nav class="navbar bg-red d-flex">
                <a href="" class="w-20 text-white d-flex flex-column justify-content-center align-items-center">
                    <img width="42" src="/images/home/iconos-nav-footer/005-whatsapp-logo.svg" alt="">
                    <span>Whatsaap</span>
                </a>
                <a href="" class="w-20 text-white d-flex flex-column justify-content-center align-items-center">
                    <img width="42" src="/images/home/iconos-nav-footer/004-phone-call.svg" alt="">
                    <span>Ordina</span>
                </a>
                <a href="" class="w-20 text-white d-flex flex-column justify-content-center align-items-center">
                    <img width="42" src="/images/home/iconos-nav-footer/003-pizza.svg" alt="">
                    <span>Menu</span>
                </a>
                <a href="" class="w-20 text-white d-flex flex-column justify-content-center align-items-center">
                    <img width="42" src="/images/home/iconos-nav-footer/002-user.svg" alt="">
                    <span>Accedi</span>
                </a>
                <a href="" class="w-20 text-white d-flex flex-column justify-content-center align-items-center">
                    <img width="42" src="/images/home/iconos-nav-footer/002-placeholder.svg" alt="">
                    <span>Map</span>
                </a>
            </nav>
        </div>


        <newsletter></newsletter>
    <footer_index></footer_index>
    <menu_responsive/>

    </div>
</template>

<script>
    export default {

       data(){ 
            return{
                products: [
                    {
                        id: 1,
                        image: '../images/home/simple-product-1.jpg',
                        name: 'calzonie 1',
                        description: 'Pomodoro, Mozarella, Funghi Pomodoro.',
                        price: 600,
                        category:'calzoni'

                    },
                    {
                        id: 2,
                        image: '../images/home/simple-product-1.jpg',
                        name: 'ocacce 1',
                        description: 'Pomodoro, Mozarella, Salsiccia, Olive, Funghi Pomodoro.',
                        price: 600,
                        category:'ocacce'

                    },
                    {
                        id: 3,
                        image: '../images/home/simple-product-1.jpg',
                        name: 'fritture 1',
                        description: 'Pomodoro, Mozarella, Funghi Pomodoro.',
                        price: 600,
                        category:'fritture'

                    },
                                        {
                        id: 4,
                        image: '../images/home/simple-product-1.jpg',
                        name: 'le-insalate 1',
                        description: 'Pomodoro, Mozarella, Funghi Pomodoro.',
                        price: 600,
                        category:'le-insalate'

                    },
                                        {
                        id: 5,
                        image: '../images/home/simple-product-1.jpg',
                        name: 'piatti-composti 1',
                        description: 'Pomodoro, Mozarella, Funghi Pomodoro.',
                        price: 600,
                        category:'piatti-composti'

                    },
                                        {
                        id: 6,
                        image: '../images/home/simple-product-1.jpg',
                        name: 'dessert 1',
                        description: 'Pomodoro, Mozarella, Funghi Pomodoro.',
                        price: 600,
                        category:'dessert'

                    },
                                        {
                        id: 7,
                        image: '../images/home/simple-product-1.jpg',
                        name: 'bibite 1',
                        description: 'Pomodoro, Mozarella, Funghi Pomodoro.',
                        price: 600,
                        category:'bibite'

                    }
                ]
            }
        },
        methods: {
            addCart(){
                Vue.swal({
                    title: 'Aggiunto!!',
                    text: "continua ad aggiungereo",
                    type: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#216619',
                    confirmButtonText: 'Pagare',
                    cancelButtonText: 'Seguire'
                }).then((result) => {
                    if (result.value) {
                        console.log('confirm');
                    }
                })
                
            }
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
        background-color: #e33d2f;
        background-clip: border-box;
        border: 0px solid rgba(0, 0, 0, 0);
        border-radius: 0rem;
    }
    .card-header {
        padding: 0.3rem 1.25rem;
        margin-bottom: 0;
        background-color: rgba(0, 0, 0, 0.03);
        border-bottom: 0px solid rgba(0, 0, 0, 0);
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
</style>
