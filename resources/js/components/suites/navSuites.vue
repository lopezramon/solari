<template>
    <div>
        <nav class="d-none d-md-flex">
            <router-link  to="/suites/room/1" :class="{'active-menu': url('/suites/room/1')}">ROOM 101</router-link>
            <router-link  to="/suites/room/2" >ROOM 102</router-link>
            <router-link  to="/suites/room/3" >ROOM 103</router-link>
            <router-link  to="/suites/room/4" >ROOM 104</router-link>
        </nav>
    <!-- Dropdown Para Moviles -->
        <div class="container mb-3 mt-5 d-sm-block d-md-none">
            <div>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    MENU CATEGORY
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <router-link  to="/suites/room/1" :class="{'active-menu':url('/suites/room/1')} " class="dropdown-item"> ROOM 101</router-link>    
                        <router-link to="/suites/room/2" class="dropdown-item">ROOM 102</router-link>
                        <router-link to="/suites/room/3" class="dropdown-item">ROOM 103</router-link>
                        <router-link to="/suites/room/4" class="dropdown-item">ROOM 104</router-link>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</template>
<script>
    export default {
        data() {
            return {
                pathname: null,
                name_menu: null,
            }
        },
        mounted() {
            this.pathname = window.location.pathname;
        },
        methods: {
            url(urlactual) {
                if (urlactual == this.pathname) {
                    console.log(`activa ${urlactual}`)
                    return true;
                } else {
                    return false;
                }
            },
          }
    }
</script>
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
}
nav a.active{
    background-color: #4fcaa5;
}
a.router-link-exact-active.router-link-active{
    color: #fff !important;
    background-color: #4fcaa5;
}
a:hover{
    text-decoration: none;
    background-color: #4fcaa5;
}
.dropdown-toggle{
    width: 100%;
    font-size: 18px;
    font-weight: bold;
}
.dropdown-menu.show {
    display: block;
    color: #fff;
    width: 100%;
    text-align: center;
    font-size: 18px;
    font-weight: bold;
}
.dropdown-item {
    font-weight: bold;

}
</style>
