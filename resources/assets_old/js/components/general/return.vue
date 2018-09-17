<template>
    <div>
        <div class="container-fluid bg-red pt-1 pb-1 d-md-none" :class="margin" @click.prevent="gotTo()">
            <div class="row">
                <div class="col-12">
                    <span class="text-white lead">
                        <i class="fas fa-angle-left"></i>
                        Return
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
    .bg-red{
        background-color: #e11616;
    }
    .lead{
        font-size: 1.6rem;
    }
</style>
<script>
    export default {
        props: {
            url: {  },
            margin: {}
        },
        methods:{
            gotTo(){
                this.$router.push(this.url);
            }
        }
    }
</script>