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
            <div class="items-selected">
                <div v-for="(room, index) in value.rooms" class="card-body">
                    <div class="row border-bottom">
                        <div class="col-12 mb-3">
                            <div>
                                <strong class="d-block">{{ room.title }}</strong>
                                <div>{{ room.description }}</div>
                                <template v-if="categories.length > 0">
                                <div>
                                    <strong>Case Vacanza:</strong> {{ getHouse(room.room_category_id).name }}
                                </div>
                                <div>
                                    <strong>Destinazione:</strong> {{ getLocation(getHouse(room.room_category_id).id).name }}
                                </div>
                                </template>
                            </div>
                            <div class="d-flex justify-content-between lead">
                                <a href="##" @click="deleteRoom(index)" class="remove text-red">
                                    <img src="/images/iconos/delete.svg" alt="" width="18">
                                    Rimuovere
                                </a>
                                <span class="price">{{ room.price }}€</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header lead text-white font-weight-bold">
                <b>Totale:</b> {{ value.total }}€
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <template v-if="! loading">
                          <div class="paypaypal">
                              <label class="d-block" for="dni">Accettare i termini e le condizioni per continuare</label>
                              <label class="switch my-2">
                                  <input v-model="terms" type="checkbox" checked>
                                  <span class="slider round"></span>
                              </label>

                              <paypal-checkout
                                  v-if="validForm"
                                  :env="environment"
                                  :amount="value.total.toString()"
                                  currency="EUR"
                                  :client="credentials"
                                  @payment-authorized="authorized"
                                  :button-style="buttonStyle"
                                  :items="paypalItems"
                                  locale="it_IT"
                              ></paypal-checkout>
                          </div>
                        </template>
                        <template v-else>
                            <div class="container d-flex justify-content-center">
                                <div class="row m-5 mb-4">
                                    <div class="col-12">
                                        <pulse-loader :color="color" :size="size"/>
                                        <label>Caricamento in corso...</label>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  import { PulseLoader } from 'vue-spinner/dist/vue-spinner.min'

  export default {
      components: { PulseLoader },
      props: ['value'],
      data() {
          return {
              terms: false,
              environment: process.env.MIX_PAYPAL_MODE,
              credentials: {
                  sandbox: process.env.MIX_PAYPAL_CLIENT_ID,
                  production: process.env.MIX_PAYPAL_CLIENT_ID,
              },
              buttonStyle: {
                  label: 'checkout',
                  size:  'responsive',
                  shape: 'pill',
                  color: 'silver'
              },
              color: '#1b1b1b',
              size: '16px',
          }
      },
      methods: {
          authorized(){
            this.terms = false
              this.$store.dispatch('storeBooking', this.value)
                  .then(response => {
                      this.$router.push('booking3')
                      console.log(response)
                  })
          },
          getHouse(id){
            return this.categories.find(category => category.id == id)
          },
          getLocation(id){
            return this.locations.find(location => location.id == id)
          },
          deleteRoom(index){
            this.value.rooms.splice(index, 1)
            //this.$store.dispatch('deleteRoom', index)
          }
      },
      computed: {
        categories(){
          return this.$store.state.Booking.room_categories
        },
        locations(){
          return this.$store.state.Booking.room_locations
        },
        paypalItems(){
          let items = []
          for(let i in this.value.rooms){
            items.push({
                  'name': this.value.rooms[i].title,
                  'description': this.value.rooms[i].description,
                  'quantity': '1',
                  'price': this.value.rooms[i].price,
                  'currency': 'EUR',
                  })
          }
          return items
        },
        validForm(){
            return   this.terms && this.errors.items.length == 0
        },
        loading(){
          return this.$store.getters.getBookingLoading
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
.text-red{
    color: red;
    text-decoration: none;
}
/**/
.items-selected{
    max-height: 360px;
    overflow-y: scroll;
}
.items-selected::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 0px;
	background-color: #F5F5F5;
}

.items-selected::-webkit-scrollbar
{
	width: 12px;
	background-color: #F5F5F5;
}

.items-selected::-webkit-scrollbar-thumb
{
	border-radius: 0px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0);
	background-color: #21b186;
}
/**/
</style>

