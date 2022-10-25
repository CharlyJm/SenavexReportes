/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;


Vue.component('user-component', require('./components/UserComponent.vue').default);
Vue.component('listado-component', require('./components/ListadoComponent.vue').default);


const app = new Vue({
    el: '#app',
});
