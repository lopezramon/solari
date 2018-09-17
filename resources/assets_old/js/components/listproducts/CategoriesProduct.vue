<template>
    <div>

        <div class="container mb-4">
            <div class="row">
                <a href="" class="d-block link-white">
                    <div class="col-12">
                            <h1 class="text-white mb-4 mt-4">
                                <i class="fas fa-angle-left"></i>
                                Menu
                            </h1>
                    </div>
                </a>
            </div>
            <div class="row">
                <div class="col-12">
                    <nav>
                        <router-link :to="{ name: 'listProduct'}" class="d-block link-white border-golden-bottom">
                            <h2 class="text-uppercase">
                                Pizze
                            </h2>
                        </router-link>
                        <router-link :to="{ name: 'ListSimpleProduct', params: { category: 'calzoni' }}" class="d-block link-white border-golden-bottom">
                            <h2 class="text-uppercase">
                                Calzoni
                            </h2>
                        </router-link>
                        <router-link :to="{ name: 'ListSimpleProduct', params: { category: 'ocacce' }}" class="d-block link-white border-golden-bottom">
                            <h2 class="text-uppercase">
                                Focacce
                            </h2>
                        </router-link>
                        <router-link :to="{ name: 'ListSimpleProduct', params: { category: 'fritture' }}" class="d-block link-white border-golden-bottom">
                            <h2 class="text-uppercase">
                                Fritture
                            </h2>
                        </router-link>
                        <router-link :to="{ name: 'ListSimpleProduct', params: { category: 'le-insalate' }}" class="d-block link-white border-golden-bottom">
                            <h2 class="text-uppercase">
                                Le insalate
                            </h2>
                        </router-link>
                        <router-link :to="{ name: 'ListSimpleProduct', params: { category: 'piatti-composti' }}" class="d-block link-white border-golden-bottom">
                            <h2 class="text-uppercase">
                                Piatti Composti
                            </h2>
                        </router-link>
                        <router-link :to="{ name: 'ListSimpleProduct', params: { category: 'dessert' }}" class="d-block link-white border-golden-bottom">
                            <h2 class="text-uppercase">
                                Dessert
                            </h2>
                        </router-link>
                        <router-link :to="{ name: 'ListSimpleProduct', params: { category: 'bibite' }}" class="d-block link-white border-golden-bottom">
                            <h2 class="text-uppercase">
                                Bibite
                            </h2>
                        </router-link>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</template>

<style scoped>
    .link-white, .link-white:hover{
        color: white;
        padding-top: .5rem;
        padding-bottom: .5rem;
    }
    .link-white > h2, h1{
        font-weight: 800;
    }
    .border-golden-bottom{
        border-bottom: 2px solid #d5a240;
    }
</style>
