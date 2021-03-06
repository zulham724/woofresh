
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import $ from 'jquery';
import 'datatables.net';
import 'datatables.net-buttons';
import 'datatables.net-editor';
import 'datatables.net-buttons/js/buttons.colVis.js';
import 'datatables.net-buttons/js/buttons.html5.js';
import 'datatables.net-buttons/js/buttons.flash.js';
import 'datatables.net-buttons/js/buttons.print.js';
import 'datatables.net-buttons/js/dataTables.buttons.min.js';
import 'select2';
import 'jquery-bar-rating';
window.swal = require('sweetalert2');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('nutrition-component', require('./components/NutritionComponent.vue'));
Vue.component('ingredient-component', require('./components/IngredientComponent.vue'));
Vue.component('recipeimage-component', require('./components/RecipeImageComponent.vue'));
Vue.component('recipetutorial-component', require('./components/RecipeTutorialComponent.vue'));
Vue.component('selectgroup-component', require('./components/SelectGroupComponent.vue'));
Vue.component('productimage-component', require('./components/ProductImageComponent.vue'));

const app = new Vue({
    el: '#app',
    created() {

    },
    methods:{
    	
    }
});
