<template>
    <div>
        <div v-if="value.length > 0" v-for="(room, index) in value" class="card my-2">
            <div class="card-header lead text-white font-weight-bold">
                Responsabile della stanza #{{ index + 1 }}
            </div>
            <div class="card-body">
               <form>
                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="name">Nome y Cognome</label>
                            <input v-model="room.personResponsible.name" type="text" class="form-control" autocomplete="nope">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="phone">Telefono</label>
                            <input v-model="room.personResponsible.email" type="text" class="form-control" autocomplete="nope">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="email">E-mail</label>
                            <input v-model="room.personResponsible.phone" type="text" class="form-control" autocomplete="nope">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="dni">Ospiti:</label>
                            <select v-model="room.personsQuantity" class="form-control">
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
    props: ['value'],
    created(){
        for(let i in this.value){
            this.value[i].personResponsible = {
                name: '',
                email: '',
                phone: '',
                fiscalCode: null,
            }
            this.value[i].personsQuantity = 1
        }
    },
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
