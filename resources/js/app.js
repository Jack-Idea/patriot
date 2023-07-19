/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('header-component', require('./components/HeaderComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);
Vue.component('main-component', require('./components/MainComponent.vue').default);
Vue.component('landing-component', require('./components/LandingComponent.vue').default);
Vue.component('coaches-component', require('./components/CoachesComponent.vue').default);
Vue.component('news-component', require('./components/NewsComponent.vue').default);
Vue.component('one-news-component', require('./components/OneNewsComponent.vue').default);
// PARENTS
Vue.component('parents-main-component', require('./components/parents/MainComponent.vue').default);
Vue.component('parents-sections-component', require('./components/parents/SectionsComponent.vue').default);
Vue.component('parents-enrollment-component', require('./components/parents/EnrollmentComponent.vue').default);
// COMPETITIONS
Vue.component('competitions-component', require('./components/competitions/CompetitionsComponent.vue').default);
Vue.component('calendar-component', require('./components/competitions/CalendarComponent.vue').default);
Vue.component('results-component', require('./components/competitions/ResultsComponent.vue').default);
Vue.component('medalists-component', require('./components/competitions/MedalistsComponent.vue').default);
Vue.component('show-competition-component', require('./components/competitions/ShowCompetitionComponent.vue').default);
// CONTACTS
Vue.component('contacts-component', require('./components/ContactsComponent.vue').default);
// ADMIN
Vue.component('admin-component', require('./components/AdminComponent.vue').default);
Vue.component('add-news-component', require('./components/AddNewsComponent.vue').default);
Vue.component('add-competitions-component', require('./components/competitions/AddCompetitionsComponent.vue').default);
Vue.component('add-medalists-component', require('./components/competitions/AddMedalistsComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
