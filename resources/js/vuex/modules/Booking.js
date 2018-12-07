export default {
    state: {
        booking: {
            personResponsible: {
                userId: null,
                name: null,
                email: null,
                phone: null,
                fiscalCode: null,
            },
            rooms: [],
            totalAmount: 0,
            comment: null,
        },
        filter: {
            checkin: null,
            checkout: null,
        },
        rooms: [],
        room_locations: {},
        room_categories: {},
    },
    actions: {
        setFilterDates({commit}, item) {
            commit('setFilterDates', {list: item});
        },
        setFilterRooms({commit}, item) {
            commit('setFilterRooms', {list: item});
        },
        setRoom({commit}, item) {
            commit('setRoom', {list: item});
        },
        deleteRoom({commit}, item) {
            commit('deleteRoom', {list: item});
        },
        deleteBooking({commit}, item) {
            commit('deleteBooking', {list: item});
        },
        setPersonResponsible({commit}, item) {
            commit('setPersonResponsible', {list: item});
        },
        setRoomsWithResponsible({commit}, item) {
            commit('setRoomsWithResponsible', {list: item});
        },
        getLocations(context){
            axios.get('api/admin/room_locations')
                .then(response => {
                    context.commit('getLocations', response.data.data)
                })
                .catch(error => {
                    console.log(error)
                })
        },
        getCategories(context, room_location_id){
            axios.get('api/admin/room_categories')
                .then(response => {
                    context.commit('getCategories', response.data.data)
                })
                .catch(error => {
                    console.log(error)
                })
        },
    },
    getters: {
        getFilter: state => {
            return state.filter;
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
        setFilterDates(state, {list}) {
            Vue.set(state.filter, 'checkin', list.checkin);
            Vue.set(state.filter, 'checkout', list.checkout);
        },
        setFilterRooms(state, {list}) {
            Vue.set(state.filter, 'rooms', list);
        },
        setRoom(state, {list}) {
            let data = state.booking.rooms;

            if (data.length > 0) {
                const response = data.find(key => key.roomId === list.roomId);

                if (response === null || response === undefined) {
                    let total = state.booking.totalAmount;
                    total += parseFloat(list.totalItem);

                    state.booking.rooms.push(list);
                    Vue.set(state.booking, 'totalAmount', total);
                }

            } else {
                let total = state.booking.totalAmount;
                total += parseFloat(list.totalItem);

                state.booking.rooms.push(list);
                Vue.set(state.booking, 'totalAmount', total);
            }
        },
        deleteRoom(state, {list}) {
            let data = state.booking.rooms;

            for (let a in list) {
                for (let i in data) {
                    if (data[i].roomId === list[a].roomId) {
                        Vue.delete(state.booking.rooms, i);
                        Vue.set(state.booking, 'totalAmount', Math.abs(state.booking.totalAmount - list[a].totalItem));
                    }
                }
            }
        },
        deleteBooking(state) {
            Vue.set(state.booking.personResponsible,  'userId', null);
            Vue.set(state.booking.personResponsible, 'name', null);
            Vue.set(state.booking.personResponsible, 'email', null);
            Vue.set(state.booking.personResponsible, 'phone', null);
            Vue.set(state.booking.personResponsible, 'fiscalCode', null);

            Vue.set(state.booking, 'rooms', []);
            Vue.set(state.booking, 'totalAmount', 0);

            Vue.set(state.booking,  'comment', null);

        },
        setPersonResponsible(state, {list}) {
            if (list.userId !== null) Vue.set(state.booking.personResponsible, 'userId', list.userId);

            Vue.set(state.booking.personResponsible, 'name', list.name);
            Vue.set(state.booking.personResponsible, 'email', list.email);
            Vue.set(state.booking.personResponsible, 'phone', list.phone);
            Vue.set(state.booking.personResponsible, 'fiscalCode', list.fiscalCode);
        },
        setRoomsWithResponsible(state, {list}) {
            console.log(list);
            Vue.set(state.booking, 'personResponsible', list.personResponsible);
            Vue.set(state.booking, 'rooms', list.rooms);
            Vue.set(state.booking, 'comment', list.comment);
        },
        getLocations(state, payload){
            state.room_locations = payload
        },
        getCategories(state, payload){
            state.room_categories = payload
        }
    }
}
