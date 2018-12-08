<template>
    <div>
        <div class="card my-2">
            <div class="card-header lead text-white font-weight-bold">
                Commenti
            </div>
            <div class="card-body">
               <form>
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <textarea v-model="value.text" class="form-control" name="message" id="" rows="3"></textarea>
                        </div>
                    </div>
               </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['value']
}
</script>

<style scoped>
.card{
    border-radius: 0rem;
}
.card-header{
    background-color: #21b186;
    border-radius: 0rem;
}
</style>
