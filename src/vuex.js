import Vue from 'vue'
import Vuex from 'vuex';

Vue.use(Vuex);

const state = {
    userDetails: null
};

const store = new Vuex.Store({
    state,
    getters: {
        userDetails: (state) => {
            return state.userDetails;
        }
    },
    actions: {
        userDetails(context, userDetails) {
            context.commit('userDetails', userDetails);
        }
    },
    mutations: {
        userDetails(state, userDetails) {
            state.userDetails = userDetails;
        }
    }
});

export default store;