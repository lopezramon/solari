<template>
    <div class="topnav text-center d-none d-sm-none d-md-block d-lg-block underline">
        <router-link tag="a" to="/list-product" exact >Pizze</router-link>
        <router-link tag="a" to="/Suggestion" exact >Pizee Speciali</router-link>
        <router-link tag="a" to="/list-product-other" exact >Dessert</router-link>
    </div>
</template>
<style scoped>
    .topnav{
        z-index: 2;
        font-size: 35px;
       
        color: #f1f1f1;
        width: 100%;
        padding: 0;
        letter-spacing: 1px;
        
        border-bottom: 1px solid;
        border-color: #d5a240;
    }
    .topnav a {
        padding: 10px 10px 5px 15px !important;
        font-size: 25px;
        color: #fff;
        font-weight: bold;
    }
    .topnav a:hover {
        padding: 10px 10px 9px 15px !important;
        font-size: 25px;
        color: #d5a240;
        font-weight: bold;
        text-decoration:none;
    }
</style>
