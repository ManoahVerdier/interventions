
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

if($('meta[name="force-site"]').attr('content') == 'true'){
    $(function(){
        $('#siteModal').modal({backdrop: 'static', keyboard: false});
    });
}

if($('#siteModal').length>0){
    $('#chooseSiteBtn').on('click',function(){
        let url = $('meta[name="choose-site-url"]').attr('content');
        let data = {
            site: $('#site').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        };
        $.post(url, data).then(response => {
            window.location.href = response;
        });
    });
}