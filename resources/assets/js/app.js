
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

/**
 * Get ajax handlers
 */
require('./ajaxcalls');

/**
 * SimpleBar by ~https://github.com/Grsmto/simplebar
 */
require('simplebar');
	import SimpleBar from 'simplebar';
	window.SimpleBar = SimpleBar;

// Set mainbody as the main scroll box
let mainBody = new SimpleBar(document.getElementById('main-body'));

$(document).ready(function() {
	// Magnific popup
	$('.image-popup-vertical-fit').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		mainClass: 'mfp-img-mobile',
		image: {
			verticalFit: true
		}
	});

	$('#dontCloseDropdown').on('hide.bs.dropdown', function (e) {
	    let target = $(e.target);
	    if(target.hasClass("keepopen") || target.parents(".keepopen").length){
	        return false; // returning false should stop the dropdown from hiding.
	    }else{
	        return true;
    	}
	});
});