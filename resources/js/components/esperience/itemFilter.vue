<template>
    <div class="col-12 col-md-4 filterDiv" :class="category">
        <div class="card shadow my-2">
            <img class="card-img-top" v-for="(image, i) in gallery" :key="i" :src="image" @click="index = i" v-if="image === gallery[0]">
            <vue-gallery-slideshow :images="gallery" :index="index" @close="index = null"></vue-gallery-slideshow>                        
            <div class="card-body">
                <h3 class="card-title" v-html="title">

                </h3>
                <div class="card-text">
                    <p>
                        {{cortarTexto}}...
                    </p>
                </div>
                <p class="mt-4 text-right">
                    <!-- <a href="#" class="card-link">leggi di più</a> -->
                    <a href="#" class="card-link" data-toggle="modal" data-target=".bd-example-modal-lg">Consultare</a>
                </p>
            </div>
        </div>
    </div>
</template>
<script>
//galeria
import VueGallerySlideshow from 'vue-gallery-slideshow';
export default {
    components: {
        VueGallerySlideshow
    },
    props: ['category','title','shortDescription','descriptionHTML','gallery'],
    data(){
        return {
            index: null,
        }
    },
    computed: {
        cortarTexto(){
            let texto = this.shortDescription;
            return texto.split(" ", 21).join(' ')
        }
    },
    methods: {
        onClick(i) {
            this.index = i; //galleria imagen clickeada
        },
    }
}
</script>