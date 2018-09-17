<template>
    <div class="fondo">
      <returnback url="/" />
    <div class="container">
      <navorder></navorder>
        <div class="row">
            <div class="col-12 col-md-4">
               <navprincipal></navprincipal>
            </div>
            <div class="col-12 col-sm-8">
                 <navphone></navphone>  
                 <div class="row">
                    <div class="col-12">
                        <h3 class="red text-capitalize mt-3">Detaggli dell' ordine</h3>
                        <hr class="subray-title rounded mt-0">
                    </div>
                    <div class="col-12 justify-content-center">
                        <div class="col-12 white">
                          <p class="texto_detail">Ordine Effectuatto: {{data_order.date}} </p>
                          <p class="texto_detail">Pizzeria Da Adriano di Ferrai Massimo Luke</p>
                          <p class="texto_detail">Order Total: {{data_order.total}} € </p>
                        </div>
                        <div class="mt-2">
                          <table class="table table-detail">
                              <thead class="">
                                <tr>
                                  <td class="text-left">Consegnato il 20 Aprile 2018</td>
                                  <td class="text-right">Numero d'ordine: 
                                    <span class="active-menu">#{{data_order.number}}</span>
                                  </td>
                                </tr>
                              </thead>
                          </table>
                          <div class="border-table table-responsive">
                              <table class="table table-order">
                                 <thead class="">
                                   <tr class="">
                                     <td>Articoli Ordinati</td>
                                     <td>Prezzo</td>
                                     <td>Quantitá</td>
                                     <td>Totale</td>
                                   </tr>
                                 </thead>
                                 <tbody class="text-detail-order">
                                   <tr>
                                        <td class="text-detail-order">XXXXXXX</td>
                                        <td class="text-detail-order">XXXXXXX</td>
                                        <td class="text-detail-order">XXXXXXX</td>
                                        <td class="text-detail-order">XXXXXXX</td>
                                   </tr>
                                 </tbody>
                              </table>
                          </div>
                          <div class="border-table border-top table-responsive">
                              <table class="table table-order">
                                 <thead class="">
                                   <tr class="">
                                     <td>Indirrizo Di Fatturazione</td>
                                     <td>Articoli SubTotale</td>
                                   </tr>
                                 </thead>
                                 <tbody >
                                   <tr>
                                        <td class="text-detail-order">{{data_order.person_name}}</td>
                                        <td>{{data_order.subtotal}} €</td>
                                   </tr>
                                   <tr>
                                        <td class="text-detail-order">{{data_order.person_phone}}</td>
                                        <td class="font-weight-bold">Spedizione</td>
                                   </tr>
                                   <tr>
                                        <td class="text-detail-order">{{data_order.person_email}}</td>
                                        <td class="font-weight-bold">{{data_order.exped}} €</td>
                                   </tr>
                                   <tr>
                                        <td class="text-detail-order">
                                          &nbsp;
                                        </td>
                                        <td class="font-weight-bold">Tassazione</td>
                                   </tr>
                                   <tr>
                                        <td class="text-detail-order">
                                          &nbsp;
                                        </td>
                                        <td class="font-weight-bold">{{data_order.impuestos}} €</td>
                                   </tr>
                                   <tr class="">
                                     <td>Metodo di spedizione</td>
                                     <td>----------</td>
                                   </tr>
                                   <tr>
                                        <td class="text-detail-order">Spedizione diretta</td>
                                        <td>&nbsp;</td>
                                   </tr>
                                   <tr class="">
                                        <td>Metodo di pagamento</td>
                                        <td>Totale per questa pedizione</td>
                                   </tr>
                                   <tr>
                                        <td class="">Efficace</td>
                                        <td class="">{{data_order.total}} €</td>
                                   </tr>
        
                                 </tbody>
                              </table>
                              <p class="white">
                                <span class="d-block">Pizzeria da Adriano di Ferrai Massimo Luke</span>
                                <span class="d-block">Via Roma 156 Olbia 07026 (OT)</span>
                                <span class="d-block text-detail-order">P.IVA 02563760905 CF:FRRMSM80H27F979B</span>
                                <span class="d-block text-detail-order">Numero 339-7299634</span>
                              </p>
                          </div>
                        </div>
                        <b-button size="sm" @click="backOrder()" class="font-weight-bold mr-1 btn btn-vista float-right my-2" title="">
                         RITORNE
                         <!--  <i class="far fa-edit"></i> -->
                        </b-button>
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
            return{
              id: this.$route.params.id,
              data_order:{
                'date': 'Aprile20,2018',
                'total': '12',
                'number':'125',
                'person_name':'Jhon Doe',
                'person_email':'example@gmail.com',
                'person_phone':'55555-5555-555',
                'subtotal':'8',
                'exped':'2',
                'impuestos':'2',
              }
            }
        },
        methods: 
        {
           backOrder(){
            this.$router.push('/myaccount/');   
           }
        }

    }
</script>
<style>
  .table-detail thead{
    border: 2px solid #e20513;
  }
  .table-into td, .table-into th{
      border-color: transparent !important;
  }
  .table-order th, .table-order td{
    padding: 0 !important;
    border-bottom: transparent !important;
    font-size: 18px;
  }
  .text-detail-order{
    font-weight: normal;
    font-size: 14px!important;
  }
  .border-table{
    border: 2px solid #e20513;
    padding: 10px 10px 0px 10px;
  }
  .border-top{
    border-top: transparent !important;
  }

</style>
