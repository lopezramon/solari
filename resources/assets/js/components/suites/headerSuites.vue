<template>
    <div>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-uppercase m-0 mb-md-5 text-white" v-text="name"></h1>
                    </div>
                </div>
            </div>
        </header>
    </div>
</template>
<script>
export default {
    props: ['name'],
    data(){
        return {
            title: null,
        }
    }
}
</script>

<style scoped>
header{
    background-color: #fff;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    width: 100%;
    height: 130px;
    display: flex;
    justify-content: center;
    align-items: flex-end;
    text-align: center;
    background-image: url('/images/home/gallery-slider-map/7.jpeg');
}
@media (min-width: 768px) {
    header{
        height: 280px;
    }
}
</style>
