require('./bootstrap')

import Vue from 'vue'
import router from './routes'

import VueSlimScroll from 'vue-slimscroll'

import BootstrapVue from 'bootstrap-vue'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import VueSweetalert2 from 'vue-sweetalert2'
import Select2 from 'v-select2-component';

import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import DataTables from 'vue-data-tables'
import lang from 'element-ui/lib/locale/lang/en'
import locale from 'element-ui/lib/locale'

locale.use(lang)

Vue.use(ElementUI)
Vue.use(DataTables)
Vue.use(VueSlimScroll)
Vue.use(BootstrapVue)
Vue.use(VueSweetalert2)

Vue.component('navbar-component', require('./components/partials/NavbarComponent.vue'))
Vue.component('sidebar-component', require('./components/partials/SidebarComponent.vue'))
Vue.component('footer-component', require('./components/partials/FooterComponent.vue'))

/** Plugins */
Vue.component('select2', Select2)

const app = new Vue({
    el: '#app',
    router
})
