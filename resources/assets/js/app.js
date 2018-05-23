
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');
//import {VTable,VPagination} from 'vue-easytable'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Base Components
Vue.component('app-panel', require('./components/Panel.vue'));
Vue.component('app-pagina', require('./components/Page.vue'));
//Vue.component('app-modal', require('./components/modal/Modal.vue'));
//Vue.component('app-modal-link', require('./components/modal/ModalLink.vue'));
//Vue.component('app-form', require('./components/Form.vue'));
//Vue.component(VTable.name, VTable);
//Vue.component(VPagination.name, VPagination);

//Page Components
Vue.component('user-table', require('./components/views/User/Index.vue'));




const app = new Vue({
    el: '#app',
    mounted: function(){
        document.getElementById('app').style.display = "block";
    }
});
