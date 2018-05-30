import Vue from 'vue';
import VueRouter from 'vue-router';

/** import ./pages module */
import HomeComponent from './components/HomeComponent';
import ExampleComponent from './components/ExampleComponent.vue';

/** import ./Library */
import LibraryComponent from './components/pages/library/items/LibraryComponent.vue';

Vue.use(VueRouter);
export default new VueRouter({
    routes: [
        { path: '/dashboard', component: HomeComponent },
        { path: '/library', component: LibraryComponent }
    ]
});