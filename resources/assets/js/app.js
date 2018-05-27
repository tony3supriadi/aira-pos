require('./bootstrap');

import Vue from 'vue';
import router from './routes';
import VueSlimScroll from 'vue-slimscroll';

Vue.use(VueSlimScroll);

Vue.component('navbar-component', require('./components/partials/NavbarComponent.vue'));
Vue.component('sidebar-component', require('./components/partials/SidebarComponent.vue'));

const app = new Vue({
    el: '#app',
    router
});
