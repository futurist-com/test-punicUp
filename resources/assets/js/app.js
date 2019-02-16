
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import TiketsIndex from './components/tikets/TiketsIndex.vue';
import TiketsCreate from './components/tikets/TiketsCreate.vue';
import TiketsEdit from './components/tikets/TiketsEdit.vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));
const routes = [
    {
        path: '/',
        components: {
            TiketsIndex: TiketsIndex
        }
    },
    {path: '/panel/create', component: TiketsCreate, name: 'createTiket'},
    {path: '/panel/edit/:id', component: TiketsEdit, name: 'editTiket'},
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')
//
/*const app = new Vue({
    el: '#app'
});*/
