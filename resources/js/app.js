require('./bootstrap');
import Vue from 'vue'


// const app = new Vue({
//     el: '#app',
//     components: { App }
// });
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('cashier-component', require('./components/CashierComponent.vue').default);
Vue.component('complaint-component', require('./components/ComplaintComponent.vue').default);
const app = new Vue({
    el: '#app',
});
