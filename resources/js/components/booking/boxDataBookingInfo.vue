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
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="item">
                            <strong class="d-block">Stanza riservata:</strong>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                            <strong>Case Vacanza:</strong> Villeta Bouganville
                            <strong>Destinazione:</strong> Budoni
                            <div class="d-flex justify-content-between">
                                <a href="#" class="remove">
                                    remuovere
                                </a>
                                <span class="price">75,00€</span>
                            </div>
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
</style>

