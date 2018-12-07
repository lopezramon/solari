<template>
    <div>
        <div class="card my-2">
            <div class="card-header lead text-white font-weight-bold">
                I dati della tua prenotazione
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="info">
                            <strong class="d-block">Arrivo:</strong>
                            <span class="d-block">martedi 4 dicembre 2018 dalle 14:00</span>
                            <strong class="d-block">Partenza:</strong>
                            <span class="d-block">venerdi 14 dicembre 2018 fino alle 12:00</span>
                            <strong class="d-block">Durata totale del soggiorno:</strong>
                            <span class="d-block">10 notti</span> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header lead text-white font-weight-bold">
                Hai selezionato:
            </div>
            <div class="card-body">
                <div class="row border-bottom">
                    <div class="col-12 mb-3">
                        <div>
                            <strong class="d-block">Stanza riservata:</strong>
                            <div>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</div>
                            <div>
                                <strong>Case Vacanza:</strong> Villeta Bouganville
                            </div>
                            <div>
                                <strong>Destinazione:</strong> Budoni
                            </div>
                        </div>
                        <div class="d-flex justify-content-between lead">
                            <a href="#" class="remove text-red">
                                <img src="/images/iconos/delete.svg" alt="" width="18">
                                Rimuovere
                            </a>
                            <span class="price">75,00€</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body border-top border-success mt-4">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div>
                            <div>
                                <strong>Importo:</strong> 400,00€
                            </div>
                            <div>
                                <strong>Iva:</strong> 45,00€
                            </div>
                        </div>
                        <div class="d-flex justify-content-between lead">
                            <a href="#" class="remove text-red">
                                <img src="/images/iconos/delete.svg" alt="" width="18">
                                Rimuovere
                            </a>
                            <span class="price">75,00€</span>
                        </div>
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
.text-red{
    color: red;
    text-decoration: none;
}
</style>

