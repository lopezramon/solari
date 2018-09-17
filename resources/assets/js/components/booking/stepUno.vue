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
                                <input type="checkbox" name="terminos" id="" required v-model="botonActivo">
                                <label for="terminos">Accetto termini e condizioni</label>
                            </div>
                            <div class="text-center">
                                <a href="/booking/step-2" :class="botonActivo ? '' : 'disabled'" class="btn btn-primary text-uppercase">Continuo</a>
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
            botonActivo: false,
        }
    }
}
</script>

