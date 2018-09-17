<template>
    <div>
        <div class="container">
            <section class="border p-3 mb-4">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-uppercase">Informazioni Generali del Bed and breakfast</h3>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3" v-for="item in informazioni" :key="item">
                        <p>
                            <img src="/images/suites/icon/baseline-done-24px.svg" alt="check-list">
                            {{item.title}}
                        </p>
                    </div>
                </div>
            </section>

            <section class="p-3 mb-4">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-uppercase">Suite Di 20 M<span class="elevado">2</span> </h3>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3" v-for="item in services" :key="item">
                        <p>
                            <img src="/images/suites/icon/baseline-done-24px.svg" alt="check-list">
                            {{item.title}}
                        </p>
                    </div>
                </div>
            </section>


            <section class="border p-3 mb-4">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-5 d-flex align-items-center">
                        <h5 class="text-uppercase m-0">Carte accettate per la prenotazione</h5>
                    </div>
                    <div class="col-12 col-md-6 col-lg-7 d-flex align-items-start justify-content-around">
                        <img class="cc-tarjetas" src="/images/iconos/030-visa.svg" alt="visa">
                        <img class="cc-tarjetas" src="/images/iconos/032-mastercard.svg" alt="mastercard">
                        <img class="cc-tarjetas" src="/images/iconos/031-american-express.svg" alt="american express">
                        <img class="cc-tarjetas" src="/images/iconos/015-dinners-club.svg" alt="dinners club">
                    </div>
                </div>
            </section>

        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            informazioni: [
                {title: 'Arrivo: 14:30 - 00:00'},
                {title: 'Partenza: 06:30 -12:00'},
                {title: 'Giardino'},
                {title: 'Televisione'},
                {title: 'Quatidiani'},
                {title: 'Camera no fumatore'},
                {title: 'Wifi gratuito'},
                {title: 'Lavanderia'},
                {title: 'Aria condizionata'},
                {title: 'Deposito bagagli'},
                {title: 'Terrazo'},
                {title: 'Fax alla reception'},
                {title: 'Parcheggio gratuito'},
                {title: 'Canoa'},
                {title: 'Escursionismo'},
                {title: 'Banco escursioni'},
            ],
            services: [
                {title: 'Terrazo'},
                {title: 'Canali pay  per view'},
                {title: 'Armadio / Guardaroba'},
                {title: 'Vassoio di cortesia'},
                {title: '1 trés grand lit  double'},
                {title: 'Prodotti da bagno in omaggio'},
                {title: 'Televisione'},
                {title: 'Camere in sonorizzate'},
                {title: 'Stendibiancheria'},
                {title: 'Scrivania'},
                {title: 'Doccia'},
                {title: 'Asciugacapelli'},
                {title: 'Machina da Caffè'},
                {title: 'Canali via cavo / satellite'},
                {title: 'Aria condizionata'},
                {title: 'Mini bar'},
                {title: 'Asciugamani'},
                {title: 'Radio'},
                {title: 'Carta igienica'},
                {title: 'Tolette'},
                {title: 'Biancheria per la casa'},
                {title: 'Vista città'},
            ]
        }
    }
}
</script>
<style scoped>
    .elevado{
        vertical-align: top;
        font-size: 12px;
        font-weight: bold;
    }
    .cc-tarjetas{
        width: 52px;
        height: auto;
    }
</style>

