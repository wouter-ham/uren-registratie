require('./bootstrap');

window.Vue = require('vue');

Vue.component('home', require('./components/Home.vue').default);

Vue.component('ticket-overview', require('./components/TicketOverview.vue').default);

Vue.component('project-detail', require('./components/ProjectDetail.vue').default);

Vue.component('project-overview', require('./components/ProjectOverview.vue').default);

const app = new Vue({
    el: '#app',
});
