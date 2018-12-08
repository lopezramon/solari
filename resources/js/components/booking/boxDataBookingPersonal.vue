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
                            <span class="text-success" :class="{'text-danger': errors.has('name-'+index)}">*</span>
                            <label for="name">Nome y Cognome</label>
                            <input v-model="room.personResponsible.name" type="text" class="form-control" autocomplete="nope" :name="'name-'+index" v-validate.initial="'required|alpha_spaces|min:2|max:30'" data-vv-delay="1500" data-vv-as="Name" :class="{'text-danger': errors.has('name-'+index)}">
                            <small v-show="errors.has('name-'+index)" class="help text-danger">{{ errors.first('name-'+index) }}</small>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <span class="text-success" :class="{'text-danger': errors.has('phone-'+index)}">*</span>
                            <label for="phone">Telefono</label>
                            <input v-model="room.personResponsible.phone" type="text" class="form-control" autocomplete="nope" :name="'phone-'+index" v-validate.initial="'required|numeric|min:9|max:16'" data-vv-delay="1500" data-vv-as="Phone Number" :class="{'text-danger': errors.has('phone-'+index)}">
                            <small v-show="errors.has('phone-'+index)" class="help text-danger">{{ errors.first('phone-'+index) }}</small>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <span class="text-success" :class="{'text-danger': errors.has('email-'+index)}">*</span>
                            <label for="email">E-mail</label>
                            <input v-model="room.personResponsible.email" type="text" class="form-control" autocomplete="nope" :name="'email-'+index" v-validate.initial="'required|email'" data-vv-delay="1500" data-vv-as="E-mail" :class="{'text-danger': errors.has('email-'+index)}">
                            <small v-show="errors.has('email-'+index)" class="help text-danger">{{ errors.first('email-'+index) }}</small>
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
