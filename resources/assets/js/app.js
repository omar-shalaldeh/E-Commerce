
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueStarRating from 'vue-star-rating'
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 src="https://unpkg.com/vue-star-rating/dist/star-rating.min.js"

Vue.component('star-rating', VueStarRating);

const app = new Vue({
    el: '#app'
});
