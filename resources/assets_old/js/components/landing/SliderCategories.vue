<template>
    <div class="text-white text-center text-uppercase border-bottom-red py-4" style="background-image: url('images/home/slider_categories/bg_categories.jpg'); background-size:cover;">
        <h1  class="font-weight-bold">Le Nostre Specialità</h1>
        <Carousel :perPageCustom="[[1024, 4]]" paginationColor="#fff" paginationActiveColor="#FE0900" navigationPrevLabel="#FE0900">
            <Slide>
                <div class="container-img">
                    <img src="images/home/slider_categories/ct_slide_1.jpg" width="100%" alt="First slide">
                    <div class="content-img">
                        <div class="card-body">
                            <p class="border-ct card-text font-weight-bold">Pizze</p>
                        </div>
                    </div>
                </div>
            </Slide>
            <Slide>
                <div class="container-img">
                    <img src="images/home/slider_categories/ct_slide_2.jpg" width="100%" alt="First slide">
                    <div class="content-img">
                        <div class="card-body">
                            <p class="border-ct card-text font-weight-bold">Calzoni</p>
                        </div>
                    </div>
                </div>
            </Slide>
            <Slide>
                <div class="container-img">
                    <img src="images/home/slider_categories/ct_slide_3.jpg" width="100%" alt="First slide">
                    <div class="content-img">
                        <div class="card-body">
                            <p class="border-ct card-text font-weight-bold">Foccaze</p>
                        </div>
                    </div>
                </div>
            </Slide>
            <Slide>
                <div class="container-img">
                    <img src="images/home/slider_categories/ct_slide_4.jpg" width="100%" alt="First slide">
                    <div class="content-img">
                        <div class="card-body">
                            <p class="border-ct card-text font-weight-bold">Friture</p>
                        </div>
                    </div>
                </div>
            </Slide>
        </Carousel>
    </div>
</template>

<script>
    import { Carousel, Slide } from 'vue-carousel';
    export default {
        components: { Carousel, Slide },
        data() {
            return {
                //'section':{}
            }
        },
    };
</script>

<style scoped>
/* Container holding the image and the text */
.container-img {
    position: relative;
    text-align: center;
    max-width: 1440px; /* Maximum width */
    margin: 5%;
}
.container-img .content-img {
    background: #e20513; /* Red background */
}
.border-ct {
    border-style: solid;
    border-color: #FFF;
    padding-top: 3px;
    padding-bottom: 3px;
}

.border-bottom-red{
    border-bottom: 20px solid;
    border-color: #af0c16;
}
</style>