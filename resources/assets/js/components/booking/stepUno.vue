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

                    <div class="form-group">
                        <input id="terms" v-model="terms" type="checkbox" name="terms" required>
                        <label for="terms">Accetto termini e condizioni</label>
                    </div>

                    <div class="text-center">
                        <button type="button" @click.prevent="nextStep()" :disabled="!terms" class="btn btn-primary text-uppercase">Continuo</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    export default {
        data() {
            return {
                terms: false
            }
        },
        beforeMount() {
            let dataFilter = this.$store.getters.getDataFilter;
            if (dataFilter.checkin == null || dataFilter.checkout == null) {
                this.$router.push('/');
            }
        },
        methods: {
            nextStep() {
                let total = this.$store.getters.getTotal;

                (this.terms && total > 0) ? this.$router.push('/booking/step-2') : this.showAlert('info', 'Select a room first', 'Please select a room to booking to proceed');

             },
            showAlert(type, title, text) {
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
