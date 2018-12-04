<template>
    <div>
        <header_booking/>
        <nav_booking/>
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-5">
                    <div class="border">
                        <div class="bg-secondary border-bottom p-2">
                            <h2 class="m-0 text-uppercase">Booking data</h2>
                        </div>

                        <!-- Show the form if the user has no account -->
                        <template v-if="!getAuthenticated">
                            <div class="border-bottom p-2">
                                <div class="form-group">
                                    <span class="text-success" :class="{'text-danger': errors.has('name')}">*</span>
                                    <label for="name" class="font-weight-bold">Booked by:</label>
                                    <input id="name" type="text" :maxlength="30" v-validate="'required|alpha_spaces|min:2|max:30'" data-vv-delay="1500" name="name"
                                           data-vv-as="Full Name" :class="{'text-danger': errors.has('name')}"
                                           v-model="personResponsible.name" class="form-control" placeholder="Full Name">
                                    <small v-show="errors.has('name')" class="help text-danger">{{ errors.first('name') }}</small>
                                </div>
                            </div>

                            <div class="border-bottom p-2">
                                <div class="form-group">
                                    <span class="text-success" :class="{'text-danger': errors.has('fiscalCode')}">*</span>
                                    <label for="fiscalCode" class="font-weight-bold">Fiscal Code:</label>
                                    <input id="fiscalCode" type="text" :maxlength="16" v-validate="'required|alpha_num|min:16|max:16'" data-vv-delay="1500"  name="fiscalCode"
                                           data-vv-as="Fiscal Code" :class="{'text-danger': errors.has('fiscalCode')}"
                                           v-model="personResponsible.fiscalCode" class="form-control" placeholder="Fiscal Code">
                                    <small v-show="errors.has('fiscalCode')" class="help text-danger">{{  errors.first('fiscalCode') }}</small>
                                </div>
                            </div>

                            <div class="border-bottom p-2">
                                <div class="form-group">
                                    <span class="text-success" :class="{'text-danger': errors.has('phone')}">*</span>
                                    <label for="phone" class="font-weight-bold">Phone Number:</label>
                                    <input id="phone" type="number" :maxlength="16" v-validate="'required|numeric|min:9|max:16'" data-vv-delay="1500"  name="phone"
                                           data-vv-as="Phone Number" :class="{'text-danger': errors.has('phone')}"
                                           v-model="personResponsible.phone" class="form-control" placeholder="Phone Number">
                                    <small v-show="errors.has('phone')" class="help text-danger">{{  errors.first('phone') }}</small>
                                </div>
                            </div>

                            <div class="border-bottom p-2">
                                <div class="form-group">
                                    <span class="text-success" :class="{'text-danger': errors.has('email')}">*</span>
                                    <label for="email" class="font-weight-bold">Email:</label>
                                    <input id="email" type="text" :maxlength="50" v-validate="'required|email|min:9|max:50'" data-vv-delay="1500"  name="email"
                                           data-vv-as="Email" :class="{'text-danger': errors.has('email')}"
                                           v-model="personResponsible.email" class="form-control" placeholder="Email">
                                    <small v-show="errors.has('email')" class="help text-danger">{{  errors.first('email') }}</small>
                                </div>
                            </div>
                        </template>

                        <template v-else>
                            <div class="border-bottom p-2">
                                <span class="font-weight-bold">Booked by:</span>
                                <span>{{ personResponsible.name }}</span>
                            </div>

                            <div class="border-bottom p-2">
                                <span class="font-weight-bold">Fiscal Code:</span>
                                <span>{{ personResponsible.fiscalCode }}</span>
                            </div>

                            <div class="border-bottom p-2">
                                <span class="font-weight-bold">Phone Number:</span>
                                <span>{{ personResponsible.phone }}</span>
                            </div>

                            <div class="border-bottom p-2">
                                <span class="font-weight-bold">Email:</span>
                                <span >{{ personResponsible.email }}</span>
                            </div>
                        </template>
                    </div>

                    <!-- Datos del responsable -->
                    <div class="border">
                        <template v-for="room in roomsSelected">
                            <div class="bg-secondary border-bottom p-2">
                                <label class="m-0 text-uppercase font-weight-bold">Responsible for the room: {{ room.name }}</label>
                            </div>

                            <div class="border-bottom p-2">
                                <div class="form-group">
                                    <span class="text-success" :class="{'text-danger': errors.has('responsibleRoomName' + room.roomId)}">*</span>
                                    <label :for="'responsibleRoomName' + room.roomId" class="font-weight-bold">Booked by:</label>
                                    <input :id="'responsibleRoomName' + room.roomId" type="text" :maxlength="30" v-validate="'required|alpha_spaces|min:2|max:30'" data-vv-delay="1500"
                                           :name="'responsibleRoomName' + room.roomId" data-vv-as="Full Name" :class="{'text-danger': errors.has('responsibleRoomName' + room.roomId)}"
                                           class="form-control" placeholder="Full Name">
                                    <small v-show="errors.has('responsibleRoomName' + room.roomId)" class="help text-danger">{{ errors.first('responsibleRoomName' + room.roomId) }}</small>
                                </div>
                            </div>

                            <div class="border-bottom p-2">
                                <div class="form-group">
                                    <span class="text-success" :class="{'text-danger': errors.has('responsibleRoomPhone' + room.roomId)}">*</span>
                                    <label :for="'responsibleRoomPhone' + room.roomId" class="font-weight-bold">Phone Number:</label>
                                    <input :id="'responsibleRoomPhone' + room.roomId" type="number" :maxlength="16" v-validate="'required|numeric|min:9|max:16'" data-vv-delay="1500"
                                           :name="'responsibleRoomPhone' + room.roomId" data-vv-as="Phone Number" :class="{'text-danger': errors.has('responsibleRoomPhone' + room.roomId)}"
                                           class="form-control" placeholder="Phone Number">
                                    <small v-show="errors.has('responsibleRoomPhone' + room.roomId)" class="help text-danger">{{ errors.first('responsibleRoomPhone' + room.roomId) }}</small>
                                </div>
                            </div>

                            <div class="border-bottom p-2">
                                <div class="form-group">
                                    <span class="text-success" :class="{'text-danger': errors.has('responsibleQuantity' + room.roomId)}">*</span>
                                    <label :for="'responsibleQuantity' + room.roomId" class="font-weight-bold">Persons quantity:</label>
                                    <input :id="'responsibleQuantity' + room.roomId" type="number" v-validate="{ required: true, numeric: true, min_value: quantities.min, max_value: quantities.max }" data-vv-delay="1500"
                                           :name="'responsibleQuantity' + room.roomId" data-vv-as="Persons quantity" :class="{'text-danger': errors.has('responsibleQuantity' + room.roomId)}" class="form-control" placeholder="Persons quantity">
                                    <small v-show="errors.has('responsibleQuantity' + room.roomId)" class="help text-danger">{{ errors.first('responsibleQuantity' + room.roomId) }}</small>
                                </div>
                            </div>

                            <div class="border-bottom p-2">
                                <div class="form-group">
                                    <span class="text-success" :class="{'text-danger': errors.has('responsibleRoomEmail' + room.roomId)}">*</span>
                                    <label :for="'responsibleRoomEmail' + room.roomId" class="font-weight-bold">Email:</label>
                                    <input :id="'responsibleRoomEmail' + room.roomId" type="text" :maxlength="50" v-validate="'required|email|min:2|max:50'" data-vv-delay="1500"
                                           :name="'responsibleRoomEmail' + room.roomId" data-vv-as="Email" :class="{'text-danger': errors.has('responsibleRoomEmail' + room.roomId)}" class="form-control" placeholder="Email">
                                    <small v-show="errors.has('responsibleRoomEmail' + room.roomId)" class="help text-danger">{{ errors.first('responsibleRoomEmail' + room.roomId) }}</small>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Booking Details -->
                    <div class="border">
                        <div class="bg-secondary border-bottom p-2">
                            <span class="m-0 text-uppercase font-weight-bold">Booking Details:</span>
                        </div>

                        <template v-for="room in roomsSelected">
                            <div class="border-bottom p-2">
                                <span class="m-0 text-uppercase" v-text="room.name"></span>
                            </div>
                        </template>

                        <div class="border-bottom p-2">
                            <span class="m-0 text-uppercase font-weight-bold">Check-out:</span>
                            {{ getCheckin }}
                        </div>
                        <div class="border-bottom p-2">
                            <span class="m-0 text-uppercase font-weight-bold">Check-in:</span>
                            {{ getCheckout }}
                        </div>
                        <div class="border-bottom p-2">
                            <span class="m-0 text-uppercase font-weight-bold">Total Amount:</span>
                             {{ getTotal }}
                        </div>
                        <!-- textarea -->
                        <div class="border-bottom p-2">
                            <div class="form-group">
                                <label for="comment">
                                    <textarea id="comment" v-model="comment" :maxlength="150" v-validate="'min:2|max:150'" data-vv-delay="1500" name="comment"
                                              data-vv-as="Comment" class="form-control" placeholder="Write something here..." rows="3"></textarea>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-5">
                    <!-- map -->
                    <div class="map mb-3">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48231.14914404061!2d9.457766413671393!3d40.92787347617706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12d94b04024bea79%3A0x7bfe3270a490c808!2s07026+Olbia%2C+Olbia-Tempio%2C+Italia!5e0!3m2!1ses!2sve!4v1537229576871" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>

                    <!-- Selected Rooms -->
                    <template v-if="getRoomsSelected.length>0">
                        <div class="border bg-secondary">
                            <template v-for="room in roomsSelected">
                                <div class="border-bottom p-2 d-flex justify-content-between">
                                    <span>&nbsp;<input type="checkbox" :value="room.roomId" v-model="roomsToDelete" title="select room to delete"></span>
                                    <strong class="m-0 text-uppercase">{{ room.name }}</strong>
                                    <span>{{ room.totalItem }} €</span>
                                </div>
                            </template>

                            <div class="border-bottom p-2 text-center">
                                <button type="button" class="btn btn-primary btn-xs mb-1" @click.prevent="deleteRoom">Delete selected</button>
                            </div>
                        </div>
                    </template>

                    <div class="text-center mt-4">
                        <template v-if="loading">
                            <scale-loader :loading="loading" :color="color" :size="size"/>
                        </template>


                        <template v-else>
                            <a @click="addResponsibleByRoom" class="pointer">
                                <img width="100px" src="/images/iconos/paypal_logo.png" alt="paypal">
                                <p class="mt-2">Click on the image to proceed to pay.</p>
                            </a>
                        </template>
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
                booking: {},
                personResponsible: {
                    name: null,
                    email: null,
                    phone: null,
                    fiscalCode: null,
                    userId: null,
                },
                comment: null,
                roomsSelected: [],
                roomsToDelete: [],
                quantities: { min: 1, max: 2 },
                color: '#4fcaa5',
                size: '20px',
                loading: false,
                deleteAll: []
            }
        },
        mounted() {
            this.getDataUser();
            // this.validUrlError();

            if (this.$store.getters.getTotal === 0) {

                this.showAlert('warning', 'Select a room first', 'Do not make selected rooms to book yet');

                (this.$store.getters.getFilter.length > 0) ? this.$router.push('/booking/step-1') : setTimeout(() => this.$router.push('/'), 1800);

            }
        },
        computed: {
            getAuthenticated() {
                return this.$store.getters.getauthenticated;
            },
            getRoomsSelected() {
                this.roomsSelected = this.$store.getters.getRooms;
                return this.roomsSelected;
            },
            getCheckin() {
                let data = this.$store.getters.getFilter;
                return Vue.moment(data.checkin).format('YYYY/MMM/DD').toUpperCase();
            },
            getCheckout() {
                let data = this.$store.getters.getFilter;
                return Vue.moment(data.checkout).format('YYYY/MMM/DD').toUpperCase();
            },
            getTotal() {
                return this.$store.getters.getTotal.toFixed(2);
            }
        },
        methods: {
            getDataUser() {
                let data = this.$store.getters.getSession;

                if (data[0] !== undefined) {
                    this.personResponsible = {
                        name: data[0].name + ' ' + data[0].lastname,
                        email: data[0].email,
                        phone: data[0].phone,
                        fiscalCode: data[0].fiscalCode,
                        userId: data[0].id
                    };
                }
            },
            deleteRoom() {
                if (this.roomsToDelete.length > 0) {
                    let arr = [];
                    let data = this.$store.getters.getRooms;

                    for (let i in data) {
                        let element = data[i].roomId;

                        for (let a in this.roomsToDelete) {
                            if (this.roomsToDelete[a] === element) {
                                arr.push(data[i]);
                            }

                        }
                    }
                    if (arr.length > 0) {
                        this.$store.dispatch('deleteRoom', arr);

                        if (this.$store.getters.getRooms.length === 0) this.$router.push('/booking/step-1');
                    }
                } else this.showAlert('warning', 'Select a room first for delete it')
            },
            addResponsibleByRoom() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        let rooms = this.roomsSelected; // rooms without obj of personResponsible

                        for (let i in rooms) {
                            rooms[i].personResponsible = {
                                name: document.getElementById('responsibleRoomName' + rooms[i].roomId).value,
                                email: document.getElementById('responsibleRoomEmail' + rooms[i].roomId).value,
                                phone: document.getElementById('responsibleRoomPhone' + rooms[i].roomId).value,

                            };
                            rooms[i].personsQuantity = document.getElementById('responsibleQuantity' + rooms[i].roomId).value;
                        }

                        // console.log(this.roomsSelected); // returned obj with personResponsible

                        this.booking.personResponsible = this.personResponsible;
                        this.booking.rooms = this.roomsSelected;
                        this.booking.comment = this.comment;

                        this.$store.dispatch('setRoomsWithResponsible', this.booking);

                        this.validateToPay();
                    }
                }).catch(() => console.log('error form'));
            },
            validateToPay() {
                const showAlert = this.$swal.mixin({
                    confirmButtonClass: 'btn btn-success mr-2',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false,
                });

                showAlert({
                    type: 'info',
                    title: 'Proceed to pay',
                    text: 'You will be redirected to PayPal',
                    showCancelButton: true,
                    confirmButtonText: 'Continue',
                    cancelButtonText: 'Back',
                    showCloseButton: true,

                }).then((result) => {
                    if (result.value) {
                        this.proceedToPay();
                    }
                })
            },
            proceedToPay() {
                const showAlert = this.$swal.mixin({
                    confirmButtonClass: 'btn btn-success mr-2',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false,
                });

                axios.post('/paypal', this.orden).then((res) => {
                    if (res) {
                        let url = res.data.url;
                        this.loading = false;

                        (url !== undefined) ? window.location.href = url : this.showAlert('error', 'Error', 'Operation invalidated by PayPal');
                    }
                }).catch(() => {
                    this.showAlert('error', 'Error', 'Operation invalidated by PayPal');
                    this.loading = false;
                });
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
<style scoped>
    .bg-secondary {
        background-color: #c7c7c7 !important;
    }

    .form-control {
        background-color: transparent;
        border-radius: 0px;
    }

    .form-control:focus {
        border-color: #ced4da;
    }

    .map {
        width: 100%;
        height: 260px;
    }

    .map iframe {
        width: 100%;
        height: 100%;
    }

    .text-success {
        font-size: 1.5rem;
    }

    .pointer {
        cursor: pointer !important;
    }
</style>
