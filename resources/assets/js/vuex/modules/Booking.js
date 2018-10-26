export default {
    state: {
        booking: {
            responsible: {
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
    },
    getters: {
        getDataFilter: state => {
            return state.dataFilter;
        },
        getRooms: state => {
            return state.booking.rooms;
        },
        getTotal: state => {
            return state.booking.total;
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
            let total = state.booking.totalAmount;
            total += parseFloat(list.price);

            state.booking.rooms.push({room: list});
            Vue.set(state.booking, 'totalAmount', total);
        },
        deleteAll(state, {list}) {
            for (var a in list) {
                var list_cart = state.booking.cart;
                for (var i in list_cart) {
                    if (list_cart[i].id == list[a].id) {
                        Vue.delete(state.booking.cart, i);
                        Vue.set(state.booking, 'total', Math.abs(state.booking.total - list[a].price));
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
