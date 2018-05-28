import Vue from 'vue';
import VueRouter from 'vue-router';

/** import ./pages module */
import HomeComponent from './components/HomeComponent';
import ExampleComponent from './components/ExampleComponent.vue';

Vue.use(VueRouter);
export default new VueRouter({
    mode: 'history',
    routes: [
        { path: '/dashboard', component: HomeComponent }
    ]
});