require('./bootstrap');

import Vue from 'vue';
import router from './routes';

import VueSlimScroll from 'vue-slimscroll';

import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import DataTables from 'vue-data-tables'
import lang from 'element-ui/lib/locale/lang/en'
import locale from 'element-ui/lib/locale'

locale.use(lang)

Vue.use(ElementUI)
Vue.use(DataTables)
Vue.use(VueSlimScroll);

Vue.component('navbar-component', require('./components/partials/NavbarComponent.vue'));
Vue.component('sidebar-component', require('./components/partials/SidebarComponent.vue'));
Vue.component('footer-component', require('./components/partials/FooterComponent.vue'));

const app = new Vue({
    el: '#app',
    router
});
