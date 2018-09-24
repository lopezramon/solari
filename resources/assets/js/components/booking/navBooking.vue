<template>
    <div>
        <nav class="d-none d-md-flex">
            <a href="#" class="d-flex flex-column justify-content-center" :class="{'active':Class('/booking/step-1')}">
                <span class="text-small">1</span>
                <span>AVAILABILITY</span>
            </a>
            <a href="#" class="d-flex flex-column justify-content-center" :class="{'active':Class('/booking/step-2')}">
                <span class="text-small">2</span>
                <span>PAYMENT</span>
            </a>
            <a href="#" class="d-flex flex-column justify-content-center" :class="{'active':Class('/booking/step-3')}">
                <span class="text-small">3</span>
                <span>FINISH</span>
            </a>
        </nav>
    </div>
</template>
<style scoped>
nav{
    display: flex;
    flex-wrap: nowrap;
    justify-content: flex-start;
    align-items: center;
    flex-wrap: wrap;
}
@media screen and (min-width: 768px){
    nav{
        flex-wrap: nowrap;
    }
}
nav a{
    background-color: #555;
    color: #fff;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 70px;
    font-family: 'Josefin Sans', sans-serif;
    font-size: 1.6rem;
    line-height: 1.1;
}
nav a.active{
    background-color: #4fcaa5;
}
a:hover{
    text-decoration: none;
    background-color: #4fcaa5;
}

span.text-small {
    font-size: 1.2rem;
    line-height: 1;
}
</style>
<script>
export default {
    data(){
        return {
          
        }
    },
    methods:{
       Class(ruta){
         if(ruta==window.location.pathname){
            return true;
         }
         return false;
        }
    }
}
</script>