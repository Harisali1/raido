/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import VueAlertify from 'vue-alertify';
import VueMask from 'v-mask';
import Select2 from 'v-select2-component';
import VueGeolocation from 'vue-browser-geolocation';
import VueGoogleAutocomplete from 'vue-google-autocomplete'

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
window.validateEmail = function (email) {
    return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email);
}

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('customer-add', require('./components/customer/Add.vue').default);
Vue.component('customer-edit', require('./components/customer/Edit.vue').default);
Vue.component('customer-show', require('./components/customer/Show.vue').default);
Vue.component('vendor-add', require('./components/vendor/Add.vue').default);
Vue.component('vendor-edit', require('./components/vendor/Edit.vue').default);
Vue.component('vendor-show', require('./components/vendor/Show.vue').default);
Vue.component('vendor-credit-add', require('./components/vendor/credit/Add.vue').default);
Vue.component('vendor-penalty-add', require('./components/vendor/credit/Penalty.vue').default);
Vue.component('vendor-bonus-add', require('./components/vendor/credit/Bonus.vue').default);
Vue.component('sub-admin-add', require('./components/sub-admin/Add.vue').default);
Vue.component('sub-admin-edit', require('./components/sub-admin/Edit.vue').default);
Vue.component('sub-admin-show', require('./components/sub-admin/Show.vue').default);
Vue.component('driver-add', require('./components/driver/Add.vue').default);
Vue.component('driver-edit', require('./components/driver/Edit.vue').default);
Vue.component('driver-show', require('./components/driver/Show.vue').default);
Vue.component('driver-vehicle-image', require('./components/driver/vehicle-image/List.vue').default);
Vue.component('role-add', require('./components/role/Add.vue').default);
Vue.component('role-edit', require('./components/role/Edit.vue').default);
Vue.component('vehicle-type-add', require('./components/vehicle-type/Add.vue').default);
Vue.component('vehicle-type-edit', require('./components/vehicle-type/Edit.vue').default);
Vue.component('vehicle-type-category-add', require('./components/vehicle-type/vehicle-category/Add.vue').default);
Vue.component('vehicle-category-add', require('./components/vehicle-category/Add.vue').default);
Vue.component('vehicle-category-edit', require('./components/vehicle-category/Edit.vue').default);
Vue.component('vehicle-add', require('./components/vehicle/Add.vue').default);
Vue.component('vehicle-edit', require('./components/vehicle/Edit.vue').default);
Vue.component('setting-add', require('./components/setting/Add.vue').default);
Vue.component('user-request-show', require('./components/user-request/Show.vue').default);

Vue.component('vendor-driver-add', require('./components/vendors/driver/Add.vue').default);
Vue.component('vendor-driver-edit', require('./components/vendors/driver/Edit.vue').default);
Vue.component('vendor-driver-show', require('./components/vendors/driver/Show.vue').default);
Vue.component('vendor-driver-vehicle-image', require('./components/Vendors/driver/vehicle-image/List.vue').default);
Vue.component('vendor-setting-add', require('./components/Vendors/setting/Add.vue').default);
Vue.component('vendor-setting-edit', require('./components/Vendors/setting/Edit.vue').default);
Vue.component('vendor-user-request-show', require('./components/Vendors/user-request/Show.vue').default);
Vue.component('vendor-change-vehicle-Add', require('./components/Vendors/user-request/change-vehicle/Add.vue').default);
Vue.component('vendor-vehicle-type-add', require('./components/vendors/driver/vehicle-type/Add.vue').default);
Vue.component('vendor-profile-show', require('./components/Vendors/profile/Show.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(VueAlertify);
Vue.use(VueMask);
Vue.use(VueGeolocation);
Vue.use(VueGoogleAutocomplete);


Vue.component('Select2', Select2);

new Vue({
    el: '#app',
});
