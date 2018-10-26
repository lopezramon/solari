<template>
    <div>
        <aside class="border p-3 mb-3">
            <div class="row">
                <div class="col-12 mb-3">
                    <h3 class="text-center">Booking Summary</h3>
                </div>

                <!-- fecha -->
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <span class="tag font-weight-bold">Check-in</span>
                        <span class="date">{{ getCheckin }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="tag font-weight-bold">Check-out</span>
                        <span class="date">{{ getCheckout }}</span>
                    </div>
                </div>

                <!-- room select -->
                <div class="col-12 mt-2" v-if="getListCart.length>0">
                    <div class="border-bottom">
                        <strong class="text-capitalize">Rooms:</strong>

                        <div class="d-flex justify-content-between" v-for="room in getListCart">
                            <span>&nbsp;<input type="checkbox" :value="room.id" v-model="roomsToDelete" title="select room to delete"></span>
                            <span class="title">{{ room.name }}</span>
                            <span class="price">{{ room.price }} €</span>
                        </div>

                        <div class="border-bottom text-center">
                            <button type="button" class="btn btn-primary btn-xs mb-1" @click.prevent="deleteAll">Delete selected</button>
                        </div>
                    </div>
                </div>

                <!-- informacion -->
                <div class="col-12 mt-3">
                    <div class="d-flex justify-content-between mb-1">
                        <b>Amount total: </b> <span>{{ getTotal }} €</span>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                rooms_cart: [],
                roomsToDelete: []
            }
        },
        computed: {
            getCheckin() {
                let data = this.$store.getters.getDataFilter;
                return Vue.moment(data.checkin).format('YYYY/MMM/DD').toUpperCase();
            },
            getCheckout() {
                let data = this.$store.getters.getDataFilter;
                return Vue.moment(data.checkout).format('YYYY/MMM/DD').toUpperCase();
            },
            getListCart() {
                let data = this.$store.getters.getCart;
                this.rooms_cart = data;
                console.log(this.rooms_cart.length);
                return this.rooms_cart;
            },
            getTotal() {
                return this.$store.getters.getTotal.toFixed(2);
            }
        },
        methods: {
            deleteAll() {
                if (this.roomsToDelete.length > 0) {
                    let arr = [];
                    let data = this.$store.getters.getCart;

                    for (let i in data) {
                        let element = data[i].id;

                        for (let a in this.roomsToDelete) {
                            if (this.roomsToDelete[a] === element) {
                                arr.push(data[i]);
                            }

                        }
                    }
                    if (arr.length > 0) {
                        this.$store.commit('deleteAll', {list: arr});
                    }
                } else this.showAlert('warning', 'asd', 'Select a room for delete')

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
