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
            <div class="card-header lead text-white font-weight-bold">
                <b>Totale:</b> 1.173.00€
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="item">
                            <label class="d-block" for="dni">Accetta termini e condizioni</label>
                            <label class="switch m-0">
                                <input v-model="terms" type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                            <br>
                            <br>
                            <paypal-checkout
                                v-if="terms"
                                env="sandbox"
                                :amount="75"
                                currency="USD"
                                :client="credentials"
                                @payment-authorized="authorized"
                                :button-style="buttonStyle"
                            ></paypal-checkout>
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
            terms: false,
                credentials: {
                    sandbox: 'AUkwPEHREgCVKE1VkhI5NTUevuEd7kjEmzDLA1xHWiWl2Vq_za0ASHWsUaj-LGHkf9nLkhoVQeW8AMPt',
                    production: 'Aac3ecuCh12HatIXoZ0FDZGjqrf9B0rEIHnyffygAwBse-eRxV3aLKSbl1Kv3cCowdF4IXdk6_CP_lfg'
                },
                buttonStyle: {
                    label: 'checkout',
                    size:  'medium',
                    shape: 'pill',
                    color: 'silver'
                },
        }
    },
    methods: {
        authorized(){
            alert('pago')
/*            this.$store.dispatch('storeOrder', params)
                .then(response => {
                    this.$route.push('paso3')
                })*/
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
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}
.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}
input:checked + .slider {
  background-color: #21b186;
}
input:focus + .slider {
  box-shadow: 0 0 1px #21b186;
}
input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}
/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}
.slider.round:before {
  border-radius: 50%;
}
</style>

