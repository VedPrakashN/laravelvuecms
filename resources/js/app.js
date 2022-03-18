/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
window.Vuex = require('vuex');

import Notifications from 'vue-notification'
Vue.use(Notifications)

// import 'sweetalert2/src/sweetalert2.scss'
// import VueSweetalert2 from 'vue-sweetalert2';
// Vue.use(VueSweetalert2);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// Category
Vue.component('category-form-component', require('./components/Admin/CategoryFormComponent.vue').default);
Vue.component('category-table-component', require('./components/Admin/CategoryTableComponent.vue').default);

// Sub Category
Vue.component('sub-category-form-component', require('./components/Admin/SubCategoryFormComponent.vue').default);
Vue.component('sub-category-table-component', require('./components/Admin/SubCategoryTableComponent.vue').default);

// Product
Vue.component('product-form-component', require('./components/Admin/ProductFormComponent.vue').default);
Vue.component('product-table-component', require('./components/Admin/ProductTableComponent.vue').default);


// Frontend
Vue.component('frontend-category-component', require('./components/Frontend/CategoryComponent.vue').default);
Vue.component('frontend-sub-category-component', require('./components/Frontend/SubcategoryComponent.vue').default);
Vue.component('frontend-product-component', require('./components/Frontend/ProductComponent.vue').default);
Vue.component('frontend-view-product-component', require('./components/Frontend/ViewProductComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#vue-app',
});
