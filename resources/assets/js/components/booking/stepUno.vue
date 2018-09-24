<template>
    <div>
        <header_booking/>
        <nav_booking/>

        <div class="container my-4">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <rooms/>
                </div>
                <div class="col-12 col-lg-3">
                    <form_consulta/>
                    <resumen/>

                    <div>
                        <!-- habilatar el link solo cuando se acepten los terminos -->
                            <div class="form-group">
                                <input v-model="terminos" type="checkbox" name="terminos" id="" required >
                                <label for="terminos">Accetto termini e condizioni</label>
                            </div>
                            <div class="text-center">
                               <!--  <a  :class="botonActivo ? '' : 'disabled'" class="btn btn-primary text-uppercase">Continuo</a> -->
                               <button type="button" @click.prevent="nextStep()" :disabled="!terminos" class="btn btn-primary text-uppercase">Continuo</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
export default {
    data(){
        return {
            disabledActivo: false,
            terminos:false
        }
    },methods:{
        nextStep(){
            let total=this.$store.getters.getTotal;
            if(this.terminos && total>0){
                this.$router.push('/booking/step-2');
            }else{
                this.showAlert('error', 'Errore!!', 'carrello vuoto')
            }
        },showAlert(type, title, text) {
            this.$swal({
                position: 'center',
                type: type,
                title: title,
                text: text,
                showConfirmButton: false,
                showCloseButton: true,
            })
        }
    }
}
</script>

