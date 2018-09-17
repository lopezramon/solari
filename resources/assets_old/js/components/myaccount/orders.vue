<template>
    <div class="fondo">
      <returnback url="/" />
    <div class="container">

      <navorder></navorder>

        <div class="row">
            <div class="col-12 col-lg-4">

              <navprincipal></navprincipal>

            </div>
            <div class="col-12 col-lg-8">
                 
                 <navphone></navphone>  

                 <div class="row">
                    <div class="col-12">
                        <h3 class="red text-capitalize mt-3">I mie ordini</h3>
                        <hr class="subray-title rounded mt-0">
                    </div>
                    <div class="col-12 justify-content-center">
                        <b-table class="mb-0" ref="table" striped hover show-empty
                                       stacked="md"
                                       :items="items"
                                       :fields="fields"
                                       :current-page="currentPage"
                                       :per-page="perPage"
                                       :filter="filter"
                                       :sort-by.sync="sortBy"
                                       :sort-desc.sync="sortDesc"
                                       empty-text="Cargando..."
                                       @filtered="onFiltered"             
                              >
                        <template slot="actions" slot-scope="row">
                            <b-button size="md" variant="danger" @click.prevent="repetir(row.item)" class="mr-1">
                              <i class="fas fa-sync"></i>
                            </b-button>
                            <b-button size="md" variant="danger" @click.prevent="eliminar(row.item)" class="mr-1">
                              <i class="fas fa-trash"></i>
                            </b-button>
                            <b-button size="md" variant="danger" @click.prevent="visualizar(row.item)" class="mr-1">
                              <i class="fas fa-eye"></i>
                            </b-button>
                        </template>
                        </b-table>
                    </b-table>

                    <b-row class="justify-content-center my-3">
                      <b-col md="6" class="my-1 text-center">
                        <b-pagination :total-rows="totalRows" size="md" align="center" :per-page="perPage" v-model="currentPage" class="my-0 text" />
                      </b-col>
                    </b-row>

                    </div>
                </div>
            </div>
        </div>
    </div>

      <menu_responsive/>
        <newsletter/>
        <!-- <footer_index/> -->
    </div>
</template>

<style>
  .pagination.b-pagination.pagination-md .page-item {
      background-color: transparent;
      color: none;
      border-color: transparent;
      border-radius: none;
      margin: 0px 1px;
  }
    .pagination.b-pagination.pagination-md .page-item.active .page-link {
      background-color: #2c8122;
      border-color: transparent;
      border-radius: 15%;
  }
  .btn-primary {
    padding: 0.5rem 0.75rem;;
  }
</style>

<script>
    const items = [
      {  id:'1', orden: '#125', data: 'April,202018',status:'CONSEGNATO', total:'12€'},
      {  id:'2', orden: '#126', data: 'April,202018',status:'CONSEGNATO', total:'12€'},
      {  id:'3', orden: '#127', data: 'April,202018',status:'CONSEGNATO', total:'12€'},
      {  id:'4', orden: '#128', data: 'April,202018',status:'CONSEGNATO', total:'12€'},
      {  id:'5', orden: '#144', data: 'April,202018',status:'CONSEGNATO', total:'12€'},
      {  id:'6', orden: '#133', data: 'April,202018',status:'CONSEGNATO', total:'12€'},
      {  id:'7', orden: '#144', data: 'April,202018',status:'CONSEGNATO', total:'12€'},
      {  id:'8', orden: '#177', data: 'April,202018',status:'CONSEGNATO', total:'12€'},
      {  id:'9', orden: '#188', data: 'April,202018',status:'CONSEGNATO', total:'12€'},
      {  id:'10', orden: '#199', data: 'April,202018',status:'CONSEGNATO', total:'12€'},
    ]
    export default {
        data(){
            return{
              items: items,
              fields: [
                { key: 'orden', label: 'ORDINE', sortable: true, sortDirection: 'desc', 'class': 'text-center' },
                { key: 'data', label: 'DATA', sortable: true, sortDirection: 'desc' , 'class': 'text-center' },
                { key: 'status', label: 'STATO', sortable: true, 'class': 'text-center' },
                { key: 'total', label: 'TOTALE', sortable: true, 'class': 'text-center' },
                { key: 'actions', label: 'ACTIONS' }
              ],
              currentPage: 1,
              perPage: 5,
              totalRows: items.length,
              pageOptions: [ 5, 10, 15 ],
              sortBy: null,
              sortDesc: false,
              sortDirection: 'asc',
              filter: null,
              modalInfo: { title: '', content: '' }
            }
        },
        methods: 
        {
            onFiltered (filteredItems) {
              // Trigger pagination to update the number of buttons/pages due to filtering
              this.totalRows = filteredItems.length
              this.currentPage = 1
            },
            detailOrder(item){
              this.$router.push('/detailorden/'+item.id);   
            }
        }

    }
</script>


