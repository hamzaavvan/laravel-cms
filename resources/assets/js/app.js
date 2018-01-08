
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
var $ = require('jquery');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

window.onload = () => {
	// Vue.component('example', require('./components/Example.vue'));
	Vue.component('todo-item', {
	    template: `<li>{{ todo.text }}</li>`,
	    props: ['todo'],
	    name: "me"
	});

	const app = new Vue({
	    el: '#app',
	    data: {
	    	message: "Learn vue",
	    	groceryList: [
	            {id: 0, text: "Vegetables"},
	            {id: 1, text: "Pizza"},
	        ]
	    },
	    methods: {
	    	reverse: function() {
	    		this.message = this.message.split('').reverse().join('');
	    	}
	    }
	});
}
