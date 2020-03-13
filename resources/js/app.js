
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import '@fortawesome/fontawesome-free/js/all';

// import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';

$('.owl-carousel').each((index, el) => {
    $(el).owlCarousel({
        loop: $(el).data('loop') === false ? false : true,
        margin: $(el).data('margin') ? $(el).data('margin') : 10,
        center: $(el).data('center') === true ? true : false,
        autoplay: $(el).data('autoplay') === true ? true : false,
        autoplayTimeout: $(el).data('autoplay-timeout') ? $(el).data('autoplay-timeout') : 5000,
        autoplayHoverPause: $(el).data('autoplay-hover-pause') === false ? false : true,
        dots: $(el).data('dots') === false ? false : true,
        responsive:{
            0:{
                items: $(el).data('xs') ? $(el).data('xs') : 1,
            },
            600:{
                items: $(el).data('sm') ? $(el).data('sm') : 3,
            },
            1000:{
                items: $(el).data('md') ? $(el).data('md') : 5,
            }
        }
    })
});

$('nav.sub-header a.category').on('click', e => {
    e.preventDefault();

    if ($('#categories').is(':visible')) {
        $('#categories').slideUp();
    } else {
        $('#categories').slideDown();
    }
});

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app'
// });
