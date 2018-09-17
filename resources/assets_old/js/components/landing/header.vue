<template>
    <header>  
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-md-none d-lg-none">

                <button class="navbar-toggler border-0 p-1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!--  <select name="" id="" v-model="idiom" @change="selectIdiom()">
                    <option value="en">en</option>
                    <option value="it">it</option>
                </select> -->

                <a class="navbar-brand m-0" href="/">
                    <h1 class="text-hide m-0">
                        Pizzeria Da Adriano
                    </h1>
                </a>

                <div class="d-inline-block pr-2">
                        <a href="#" @click.prevent="redirectCart()" class="text-white d-inline-block position-relative">
                            <i class="fas fa-shopping-cart"></i>
                            <span v-show="cant!=0" class="badge badge-danger count-cart">{{cant}}</span>
                        </a>
                        <!--<span class="text-white price-cart-small">0.00 <i class="fas fa-euro-sign"></i></span> -->
                </div>
            


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/list-product">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/chisiamo">Chi Siamo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/servizi">Servizi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#contact">Contatti</a>
                        </li>
                       <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Ordina</a>
                        </li>
                        -->

                    </ul>

                </div>              
        </nav>
    <div class="container-fluid mb-3 mt-3  d-none d-md-block">
            <div class="row justify-content-center align-items-center" >
                <div class="col-3 d-inline-block">
                    <a tag="a" to="/" exact >
                        <img src="images/home/logo_footer.svg" alt="">
                    </a>
                </div>
                <div class="col-2 d-inline-block">
                    <span style="color:#e20513;">APERTI TUTTI I GIORNI</span><br>
                    <span class="text-white font-weight-bold"> Dalle 18.00 Alle  24:00</span><br>
                    <a href="tel:3397299634">
                    <span class="text-white font-weight-bold">339-7299634</span> 
                    </a>
                </div>
                <div class="hr-right"></div>
                <div class="col-2 text-white font-weight-bold text-center d-inline-flex">
                    <span>ACCEDI AL TUO ACCOUNT</span>
                    <center>
                    <a href="/loginuser">
                    <img src="images/home/flecha.png" alt="" width="30px;" class="d-inline-flex" style="height:30px;"></a></center></div>
                <div class="hr-right"></div>
                <div class="col-2">
                    <div class="d-inline-block">
                            <a href="#" class="text-white d-inline-block position-relative " style="">
                                <i class="fas fa-shopping-cart" style="font-size: 53px;"></i>
                                <span class="badge badge-danger count-cart" style="font-size: 15px;">9</span>
                            </a>
                            <span class="text-white price-cart-small" style="font-size: 20px;">0.00 <i class="fas fa-euro-sign" style="font-size: 20px;"></i></span>
                    </div>                    
                </div>
            </div>
    </div>

    <div class="topnav text-center d-none d-md-block py-2">
        <a href="/">HOME</a>
        <a href="/list-product">MENU</a>
        <a href="/chisiamo">CHI SIAMO</a>
        <a href="/servizi">SERVIZI</a>
        <a href="/#contact">CONTATTI</a>
        <a class="btn btn-success" href="/list-product">ORDINA</a>
    </div>
	</header>
</template>


<style scoped>
.fas.fa-shopping-cart{
    font-size: 1.4rem;
}

.nav-link{
    font-size: 1.2rem;
    line-height: 1.8;
}
.btn-success {
    color: #fff;
    background-color: #216619;
    border-color: #216619;
}

.navbar-brand{
    background-image: url('/images/home/logo_footer.svg'); 
    width: 172px; 
    height: 60px; 
    background-repeat: no-repeat; 
    background-position: center;
}

.hr-right{
    border: none;
    border-right: 1px solid hsl(0, 0%, 100%);
    height: 100px;
    width: 1px;
}
    .topnav{
        z-index: 2;
        font-size: 17px;
        background-color: #e33d2f;
        color: #f1f1f1;
        width: 100%;
        padding: 0;
        letter-spacing: 1px;
        border-top: 1px solid;
        border-bottom: 1px solid;
        border-color: #fff;
    }
    .topnav a {
        padding: 10px 74px 9px 15px;
        font-size: 20px;
        color: #fff;
        font-weight: bold;
    }
@media (min-width: 768px) {
    .topnav a {
    padding: 10px 34px 9px 0px;
    font-size: 22px;
    color: #fff;
    font-weight: bold;

    }
    .topnav a.btn {
    display: inline-block;
    font-weight: 800;
    text-align: center;
    white-space: nowrap;
    vertical-align: bottom;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.375rem 1.375rem;
    font-size: 0.9rem;
    line-height: 1.6;
    border-radius: 0.25rem;
    }

}
</style>
<script>
    export default {
        data(){
            return{
                idiom:'it',
            }
        },
        computed:{
            cant(){
                return this.$store.getters.getCant;
            },
            total(){
                return this.$store.getters.getTotal;
            }
        }, methods: {
            redirectCart(){
                if (this.$store.getters.getCant > 0) {
                     this.$router.push('/list-cart');
                }
                
            },
            selectIdiom(){
                console.log("lala");
                this.$store.dispatch('setLanguage',this.idiom);
            },
            getTags(key){
                return this.$store.getters.getvaluebyTag(key);
             }
        },mounted(){
              //this.idiom=this.$store.getters.getLangVal();
              this.$store.dispatch('setLanguage',this.idiom);
        }
    }
</script>