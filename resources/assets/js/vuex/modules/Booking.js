export default {
    state: {
/*{
    "booking": {
    "personResponsible": {
        "name": "Steven Sucre",
            "email": "steven.sucre@jumperr.com",
            "phone": "+584269292922",
            "fiscalCode": "12345678901234567890"
    },
    "rooms": [
        {
            "roomId": 1,
            "personResponsible": {
                "name": "Steven Sucre",
                "email": "steven.sucre@jumperr.com",
                "phone": "+584269292922",
                "fiscalCode": "12345678901234567890"
            },
            "personsQuantity": 2,
            "bookingDate": {
                "checkin": "2018-11-24",
                "checkout": "2018-11-27"
            },
            "totalItem": 100.25
        },
        {
            "roomId": 4,
            "personResponsible": {
                "name": "John Doe",
                "email": "john.doe@jumperr.com",
                "phone": "+584262325566",
                "fiscalCode": "98765432310981231232"
            },
            "personsQuantity": 2,
            "bookingDate": {
                "checkin": "2018-11-27",
                "checkout": "2018-11-29"
            },
            "totalItem": 205.25
        }
    ],
        "total": 305.50,
        "userId": null,
        "comment": "I want breakfast."
}
}*/
        booking: {
            personResponsible: {
                name: null,
                email: null,
                phone: null,
                fiscalCode: null,
            },
            rooms: [],
            totalAmount: 0,
            userId: null,
            comment: null,
        },
        dataFilter: {}
    },
    actions: {
        setFilter({commit}, item) {
            commit('setFilter', {list: item});
        },
        setRoom({commit}, item) {
            commit('setRoom', {list: item});
        },
        deleteRoom({commit}, item) {
            commit('setRoom', {list: item});
        },
    },
    getters: {
        getDataFilter: state => {
            return state.dataFilter;
        },
        getRooms: state => {
            return state.booking.rooms;
        },
        getTotal: state => {
            return state.booking.totalAmount;
        },
        getBooking: state => {
            return state.booking;
        },
    },
    mutations: {
        setFilter(state, {list}) {
            Vue.set(state, 'dataFilter', list);
        },
        setRoom(state, {list}) {
            let data = state.booking.rooms;

            if (data.length > 0) {
                const response = data.find(key => key.id === list.id);

                if (response === null || response === undefined) {
                    let total = state.booking.totalAmount;
                    total += parseFloat(list.price);

                    state.booking.rooms.push(list);
                    Vue.set(state.booking, 'totalAmount', total);
                }

            } else {
                let total = state.booking.totalAmount;
                total += parseFloat(list.price);

                state.booking.rooms.push(list);
                Vue.set(state.booking, 'totalAmount', total);
            }
        },
        deleteAll(state, {list}) {
            let data = state.booking.rooms;

            for (let a in list) {
                for (let i in data) {
                    if (data[i].id === list[a].id) {
                        Vue.delete(state.booking.rooms, i);
                        Vue.set(state.booking, 'totalAmount', Math.abs(state.booking.totalAmount - list[a].price));
                    }
                }
            }
        },
        destroyState(state) {
            Vue.set(state.booking, 'checkin', null);
            Vue.set(state.booking, 'checkout', null);
            Vue.set(state.booking, 'cart', []);
            Vue.set(state.booking, 'total', 0);
            Vue.set(state.booking.responsable, 'name', null);
            Vue.set(state.booking.responsable, 'phone', null);
            Vue.set(state.booking.responsable, 'identidad', null);
            Vue.set(state.booking.responsable, 'email', null);
        },
        setResponReser(state, {list}) {
            Vue.set(state.booking.responsable, 'name', list.name_reserva);
            Vue.set(state.booking.responsable, 'phone', list.telef_reserva);
            Vue.set(state.booking.responsable, 'identidad', list.identidad_reserva);
            Vue.set(state.booking.responsable, 'email', list.email);
        },
        removerItem(state, {list}) {
            var list_cart = state.booking.cart;
            for (var i in list_cart) {
                if (list_cart[i].id == list.id) {
                    Vue.delete(state.booking.cart, i);
                    Vue.set(state.booking, 'total', state.booking.total - list.price);
                    break;
                }
            }
        }
    }
}
