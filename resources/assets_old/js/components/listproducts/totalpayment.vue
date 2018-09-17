<template>
    <div>
            <div class="container d-inline-block">
            <div class="row mb-4 mt-sm-4">
                <div class="col-10 m-auto bg-gray pb-4 pt-4 text-center">
                    <button  class="btn btn-success btn-lg mb-4" type="submit" value="INVIARE">Ordina subito ></button>

                    <div class="row mb-4">
                        <div class="col-6">
                            <span class="lead text-white text-uppercase">
                                Marghrita
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
        </div>

    </div>
</template>


<style scoped>
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
    .btn-success {
        color: #fff;
        background-color: #216619;
        border-color: #216619;
    }
</style>
