
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import $ from 'jquery';
import 'datatables.net';
import swal from 'sweetalert2';
import 'select2';
import 'jquery-bar-rating';
import 'bootstrap-datetimepicker-npm';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Vue.component('language-component', require('./components/LanguageComponent.vue'));

const app = new Vue({
    el: '#app',
    created() {
        // let data = {
        //     grant_type: 'password',
        //     client_id: 2,
        //     client_secret: 'NQekh2G0CtUVGndZfXcCUUCy3hr8BAkfXdgeiGo1', // Laravel Password Grant Client
        //     username: 'admin@admin.com',
        //     password: 'password',
        // };
        // axios.post('http://localhost/woofresh/public/oauth/token', data)
        //     .then(response => {
        //         console.log('got response');
        //         console.log(response.data);

        //     }).catch(response => {
        //         console.log('got a error!');
        //         console.error(response);
        // })
    },
    methods:{
    	// destroy(){
    	// 	swal("err","err","error");
    	// }
    }
});
