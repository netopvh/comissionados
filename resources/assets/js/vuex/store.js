import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        item:{}
    },
    mutations:{
        setItem(state, obj){
            state.item = obj;
        }
    }
})
