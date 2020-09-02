
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import '@fortawesome/fontawesome-free/js/all';
import './autoloader';
import { Autoloader } from './autoloader';


$('nav.sub-header a.category').on('click', e => {
    e.preventDefault();

    if ($('#categories').is(':visible')) {
        $('#categories').slideUp();
    } else {
        $('#categories').slideDown();
    }
});

// Sélectionne le texte au clic dans le champ de recherche
$('#search input').on('click', event => {
    $(event.currentTarget).select();
});

new Autoloader();