export default {
    state: {
        booking: {},
        filter: {
            checkin: null,
            checkout: null,
        },
        rooms: [],
        room_locations: [],
        room_categories: [],
        loading: false,
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
        deleteRoom({commit}, index) {
            commit('deleteRoom', index);
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
        storeBooking(context, payload){
            context.state.loading = true
            return new Promise((resolve, reject) => {
                axios.post('/api/admin/bookings', payload)
                    .then(response => {
                        context.commit('storeBooking', payload)
                        resolve(response)
                        context.state.loading = false
                    })
                    .catch(error => {
                        console.log(error)
                        context.state.loading = false
                        reject()
                    })

            })
        }
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
        getBookingLoading: state => {
            return state.loading;
        },
        getLocations: (state) => (id) => {
            const RESPONSE = state.room_locations.find(key => key.id === id);

            if (RESPONSE !== null || RESPONSE !== undefined) return RESPONSE.name;
        },
        getCategories: (state) => (id) => {
            const RESPONSE = state.room_categories.find(key => key.id === id);

            if (RESPONSE !== null || RESPONSE !== undefined) return RESPONSE.name;
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
            const ADD_ROOM = () => {
                let total = state.booking.totalAmount;
                total += parseFloat(list.totalItem);

                state.booking.rooms.push(list);
                Vue.set(state.booking, 'totalAmount', total);
            };

            let data = state.booking.rooms;

            if (data.length > 0) {
                const RESPONSE = data.find(key => key.roomId === list.roomId);

                (RESPONSE === null || RESPONSE === undefined) ? ADD_ROOM() : 'already added';

            } else ADD_ROOM()
        },
        deleteRoom(state, index) {
            Vue.delete(state.booking.rooms, index);
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
        getLocations(state, payload) {
            state.room_locations = payload
        },
        getCategories(state, payload) {
            state.room_categories = payload
        },
        storeBooking(state, payload){
            state.booking = payload
        },
    }
}
