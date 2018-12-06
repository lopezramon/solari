<template>
<div> 
  <headerAccount/>
  <navaccount/>
  <div class="container mt-5 mb-5 ">
     <b-table class="mb-0" ref="table" striped hover show-empty
                     stacked="md"
                     :items="items"
                     :fields="fields"
                     :current-page="currentPage"
                     :per-page="perPage"
                     :filter="filter"
                     :sort-by.sync="sortBy"
                     :sort-desc.sync="sortDesc"                                    
                     @filtered="onFiltered"             
            >
      <template slot="actions" slot-scope="row">
         <!--  <b-button size="md" variant="danger" @click.prevent="repetir(row.item)" class="mr-1">
            <i class="fas fa-sync"></i>
          </b-button> -->
          <b-button size="md" @click.prevent="visualizar(row.item)" class="mr-1 btn-detail">
            <i class="fas fa-eye"></i>
          </b-button>
          <b-button size="md"  @click.prevent="eliminar(row.item)" class="mr-1 btn-detail">
            <i class="fas fa-trash"></i>
          </b-button>          
      </template>
      </b-table>
       <b-row class="justify-content-center my-3">
          <b-col md="6" class="my-1 text-center">
            <b-pagination :total-rows="totalRows" size="md" align="center" :per-page="perPage" v-model="currentPage" class="my-0 text" />
          </b-col>
        </b-row>
  </div>
  <div class="d-none d-md-block alto" ></div>
</div>

</template>


<style scoped>
  .alto{
    height: 100px;
  }
  .btn-detail{
    background-color: #4fcaa5 !important;
  }
  .pagination.b-pagination.pagination-md .page-item {
      background-color: transparent;
      color: none;
      border-color: transparent;
      border-radius: none;
      margin: 0px 1px;
  }
    .pagination.b-pagination.pagination-md .page-item.active .page-link {
      background-color: #4fcaa5;
      border-color: transparent;
      border-radius: 15%;
  }
</style>

<script>
  import Vue from 'vue'
  import BootstrapVue from 'bootstrap-vue'
  Vue.use(BootstrapVue);
    const items = [
      // {  id:'1', code: '#125',name:'ROOM 1',checkin_date: 'April,202018', checkout_date: 'April,202018', total:'12€'},
      
    ]
    export default {
        data(){
            return{
              items: items,
              fields: [
                { key: 'orden', label: 'ORDINE', sortable: true, sortDirection: 'desc', 'class': 'text-center font-weight-bold' },
                { key: 'checkin_date', label: 'CHEKING', sortable: true, sortDirection: 'desc' , 'class': 'text-center' },
                { key: 'checkout_date', label: 'CHECKOUT', sortable: true, sortDirection: 'desc' , 'class': 'text-center' },
                { key: 'total', label: 'TOTALE', sortable: true, 'class': 'text-center font-weight-bold' },
                { key: 'actions', label: 'ACTIONS' }
              ],
              currentPage: 1,
              perPage: 5,
              totalRows: 0,
              pageOptions: [ 5, 10, 15 ],
              sortBy: null,
              sortDesc: false,
              sortDirection: 'asc',
              filter: null,
              modalInfo: { title: '', content: '' },
              user:null,
              root:null,
            }
        },methods: 
        {
            onFiltered (filteredItems) {
              // Trigger pagination to update the number of buttons/pages due to filtering
              this.totalRows = filteredItems.length
              this.currentPage = 1
            },
            listRooms(){
              var data_user=this.$store.getters.getSession;
              console.log(data_user);
              if(data_user.length>0){
                 this.user=data_user[0].id;
                  let slf=this;
                  axios.get(this.root+'/api/admin/bookings/user/'+this.user).then((res)=>{
                        if (res.status == 200)  {                           
                           var arr=[];
                           for(var i in res.data.data.bookings){
                            var obj={};
                            obj.code=res.data.data.bookings[i].code;
                            obj.orden='# '+res.data.data.bookings[i].code;
                            obj.total='€ '+parseFloat(res.data.data.bookings[i].total).toFixed(2);
                            obj.checkin_date=Vue.moment(res.data.data.bookings[i].checkin_date).format('YYYY/MMM/DD').toUpperCase();
                            obj.checkout_date=Vue.moment(res.data.data.bookings[i].checkout_date).format('YYYY/MMM/DD').toUpperCase();
                            arr.push(obj);
                           }
                           slf.items=arr;
                           slf.totalRows= arr.length;
                        }
                    })
                    .catch((error)=>{

                    })
                }
            },visualizar(row){
              this.$router.push('/my-order-detail/'+row.code);
            },eliminar(row){
             this.$swal({
                    title: '',
                    text: "Esta seguro que desea eliminar la orden?",
                    type: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#FE2E2E',
                    cancelButtonColor: '#4fcaa5',
                    confirmButtonText: 'Cancelar',
                    cancelButtonText: 'Continuar'
                  }).then((result) => {
                    if (!result.value) {
                      axios.post(this.root+'/api/admin/bookings/hide/'+row.code,{'_method':'PUT'}).then((res)=>{
                        if (res.status == 200)  {                           
                            this.listRooms();
                        }
                      })
                      .catch((error)=>{
                        slf.showAlert('error', 'Errore!!', '')
                      })
                    }else{
                        console.log("cancelar")
                    }
                  })
              // this.$router.push('/my-order-detail/'+row.code);
            }
        },mounted(){
          this.root=window.location.origin;
          this.listRooms();
        }
      }
</script>