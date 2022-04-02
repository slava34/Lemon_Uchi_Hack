/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
// import VueRouter from 'vue-router'

// Vue.use(VueRouter)
Vue.use(BootstrapVue)
Vue.use(IconsPlugin);
require('./bootstrap');

window.Vue = require('vue').default;

import router from './router';
import App from './App.vue';

const app = new Vue({
    router,
    el: '#app',
    render: h => h(App)
});
