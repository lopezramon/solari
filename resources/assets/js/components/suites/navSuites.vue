<template>
    <div>
        <nav class="d-none d-md-flex">
            <a href="/suites/room/1" :class="{'active': url('/suites/room/1')}">ROOM 101</a>
            <a href="/suites/room/2" :class="{'active': url('/suites/room/2')}">ROOM 102</a>
            <a href="/suites/room/3" :class="{'active': url('/suites/room/3')}">ROOM 103</a>
            <a href="/suites/room/4" :class="{'active': url('/suites/room/4')}">ROOM 104</a>
        </nav>
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
a:hover{
    text-decoration: none;
    background-color: #4fcaa5;
}
</style>
