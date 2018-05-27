require('./bootstrap');

import Vue from 'vue';
import router from './routes';

Vue.component('navbar-component', require('./components/partials/NavbarComponent.vue'));

const app = new Vue({
    el: '#app',
    router
});
