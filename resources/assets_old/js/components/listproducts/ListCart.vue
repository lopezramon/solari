<template>
    <div>
        <returnback url="/" margin="mb-3" />
        <section class="container-fluid">
    

                <div class=" sugestion">
                    <h1 class="padd mb-3 mt-3">Il mio ordine</h1> 
                </div>

        </section>


       <div class="container-fluid">
            <div class="row">
            <h4 class="mb-3 mt-3 text-red">Rimuovi tutti gli  articoli</h4>
            </div>    
       </div>
        

        <div class="container-fluid">
            
            <div class="row">
                
            <div style="padding-top:10px; padding-left:20px" class="col-12 col-md-4 col-lg-4  mb-1 ">  
                <div class="row item-product mt-2">
                                  <div class="col-2 align-self-center">
                    
                    <img src="images/home/menu_categorias_1.jpg" width="150" height="100">
                    
                    
                </div>  
                <div class="col-3 align-self-center">
                    <h4 class="m-0">Marghrita</h4>
                    <a class="d-block small text-red mt-2" 
                    data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fas fa-plus"></i>
                        Vedere i Dettagli
                    </a>
                    <div class="col-12 collapse" id="collapseExample">
                    <div class="card card-body">
                        <ul>
                            <li>item 01</li>
                            <li>item 02</li>
                            <li>item 03</li>
                        </ul>
                    </div>
                </div>
                    
                </div>
                <div class="col-4 align-self-center">
                    <span class="text-white">18,00 €</span>
                                    <div class="col-4 ml-auto">
                    <span class="d-block small text-red mt-2">
                        <i class="far fa-trash-alt"></i>
                        Rimuovere
                    </span>
                </div>
                </div>
                <div class="col-2 d-flex">
                    <div class="bg-red d-flex flex-column justify-content-center align-items-center w-100" style="height:50px">
                        <span class="text-white d-block small lead font-weight-bold p-1">100</span>
                    </div>
                    <div>
                        <button class="plus-menus btn btn-secondary rounded-0 border-0 m-0 btn-block" style="height:25px">
                            <i class="fas fa-angle-up"></i>
                        </button>
                        <button class="plus-menus btn btn-secondary rounded-0 border-0 m-0 btn-block" style="height:25px">
                            <i class="fas fa-angle-down"></i>
                        </button>
                    </div>
                </div>




                
                

            </div></div>
            <div class="col-12 col-md-4 col-lg-4 box-product mb-1">
                <totalpayment/>
            </div>
            
                
            </div>

       </div>



        <div class="container">
            <div class="row">
                <div class="col-12">

                    <h4 class="text-uppercase text-center mb-3 text-red">Inserisci Dettagli DEL TUO ORDINE</h4>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Esempio: Senza acciugche, metà della pizza con  funghi"></textarea>
                    </div>
                    <button  class="btn btn-danger btn-lg mt-4" type="submit" value="INVIARE">AGGIUNGERE PIÙ PRODOTTI ></button>

                </div>
            </div>
        </div>
<p></p>
      
<!--         <div class="container">
            <div class="row mb-4 mt-4">
                <div class="col-10 m-auto bg-gray pb-4 pt-4">
                    <button class="btn btn-secondary btn-block btn-lg mb-4">
                        Ordina subito
                    </button>

                    <div class="hr mt-2"></div>

                    <div class="row">
                        <div class="col-6">
                            <span class="lead text-white text-uppercase">
                                Subtotale:
                            </span>
                        </div>
                        <div class="col-6 text-right">
                            <span class="lead text-white text-uppercase">
                                36,00€
                            </span>
                        </div>
                    </div>

                    <div class="hr mt-2"></div>

                    <div class="row">
                        <div class="col-6">
                            <span class="lead text-white text-uppercase">
                                Totale:
                            </span>
                        </div>
                        <div class="col-6 text-right">
                            <span class="lead text-white text-uppercase">
                                38,50€
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div> -->

    
    <newsletter></newsletter>
    <footer_index></footer_index>
        <menu_responsive/>



    </div>
</template>




<style scoped>
    h1 {
        color:#970000;
        font-weight:bold;
        font-style:bolder;
        font-size: 3rem;

    }
 .hr{
     width: 100%;
     height: 1px;
     background-color: #fff;
 }
    .bg-gray{
        background-color: #333;
    }
    .text-red{
        color: #dc3b2d;
    }
    h2{
        font-size: 1.6rem;
        font-weight: 800;
        color: #dc3b2d;
    }
    h4{
        font-size: 1.1rem;
        font-weight: 800;
        color: #fff;
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
        padding-left: 15px;
        padding-right: 15px;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color:transparent;
        background-clip: border-box;
        color: #fff;
        border: none;
        border-radius: 0;
    }
    .sugestion {
    
    border-bottom: 2px solid #d5a240; 
    width:100%; 
    height:100px;
    font-weight:bold; 
    padding-top:20px
}
</style>

<script>




    export default {
        data(){
            return{

                titlemenu: [
                    {
                        name:'PIZZE'
                    }
                ],
                products: [
                    {
                        id: 1,
                        image: 'images/home/menu_categorias_1.jpg',
                        name: 'Boscaiola',
                        description: 'Pomodoro, Mozarella, Salsiccia, Olive, Funghi Pomodoro.',
                        price: 1400,

                    },
                    {
                        id: 2,
                        image: 'images/home/menu_categorias_1.jpg',
                        name: 'Boscaiola',
                        description: 'Pomodoro, Mozarella, Salsiccia, Olive, Funghi Pomodoro.',
                        price: 1400,

                    },
                    {
                        id: 3,
                        image: 'images/home/menu_categorias_1.jpg',
                        name: 'Boscaiola',
                        description: 'Pomodoro, Mozarella, Salsiccia, Olive, Funghi Pomodoro.',
                        price: 1400,

                    },
                    {
                        id: 4,
                        image: 'images/home/menu_categorias_1.jpg',
                        name: 'Boscaiola',
                        description: 'Pomodoro, Mozarella, Salsiccia, Olive, Funghi Pomodoro.',
                        price: 1400,

                    },
                                        {
                        id: 5,
                        image: 'images/home/menu_categorias_1.jpg',
                        name: 'Boscaiola',
                        description: 'Pomodoro, Mozarella, Salsiccia, Olive, Funghi Pomodoro.',
                        price: 1400,

                    },
                                        {
                        id: 6,
                        image: 'images/home/menu_categorias_1.jpg',
                        name: 'Boscaiola',
                        description: 'Pomodoro, Mozarella, Salsiccia, Olive, Funghi Pomodoro.',
                        price: 1400,

                    },
                                        {
                        id: 7,
                        image: 'images/home/menu_categorias_1.jpg',
                        name: 'Boscaiola',
                        description: 'Pomodoro, Mozarella, Salsiccia, Olive, Funghi Pomodoro.',
                        price: 1400,

                    },
                                        {
                        id: 8,
                        image: 'images/home/menu_categorias_1.jpg',
                        name: 'Boscaiola',
                        description: 'Pomodoro, Mozarella, Salsiccia, Olive, Funghi Pomodoro.',
                        price: 1400,

                    },                                       {
                        id: 9,
                        image: 'images/home/menu_categorias_1.jpg',
                        name: 'Boscaiola',
                        description: 'Pomodoro, Mozarella, Salsiccia, Olive, Funghi Pomodoro.',
                        price: 1400,

                    },
                                        {
                        id: 10,
                        image: 'images/home/menu_categorias_1.jpg',
                        name: 'Boscaiola',
                        description: 'Pomodoro, Mozarella, Salsiccia, Olive, Funghi Pomodoro.',
                        price: 1400,

                    },
                                        {
                        id: 11,
                        image: 'images/home/menu_categorias_1.jpg',
                        name: 'Boscaiola',
                        description: 'Pomodoro, Mozarella, Salsiccia, Olive, Funghi Pomodoro.',
                        price: 1400,

                    },
                                        {
                        id: 12,
                        image: 'images/home/menu_categorias_1.jpg',
                        name: 'Boscaiola',
                        description: 'Pomodoro, Mozarella, Salsiccia, Olive, Funghi Pomodoro.',
                        price: 1400,

                    }
                ]



