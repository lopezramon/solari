<template>
    <div>
        <div class="card my-2">
            <div class="card-header lead text-white font-weight-bold">
                Responsabile della stanza
            </div>
            <div class="card-body">
               <form>
                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="name">Nome y Cognome</label>
                            <input type="text" class="form-control" id="name" value="">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="phone">Telefono</label>
                            <input type="text" class="form-control" id="phone" value="">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" id="email" value="">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="dni">Ospiti:</label>
                            <select class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>
                    </div>
               </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {

        }
    }
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
