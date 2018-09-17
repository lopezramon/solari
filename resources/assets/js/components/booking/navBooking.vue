<template>
    <div>
        <nav class="d-none d-md-flex">
            <a href="#" class="active">
                <span>1</span>
                <span>AVAILABILITY</span>
            </a>
            <a href="#">
                <span>2</span>
                <span>PAYMENT</span>
            </a>
            <a href="#">
                <span>3</span>
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
}
nav a.active{
    background-color: #4fcaa5;
}
a:hover{
    text-decoration: none;
    background-color: #4fcaa5;
}
</style>
