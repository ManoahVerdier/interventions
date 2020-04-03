
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import '@fortawesome/fontawesome-free/js/all';
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

// Change price according to quantity
$('select[name="quantity"]').on('change', (event) => {
    // Récupère les éléments
    let quantityEl = $(event.currentTarget);
    let formEl = quantityEl.parents('form:first');

    // Calcule le prix total
    let unitPrice = parseFloat($('.unit-price', formEl).val());
    let quantity = parseFloat(quantityEl.val());
    let totalPrice = unitPrice * quantity;

    // Formatte le prix
    let totalPriceFormatted = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format(totalPrice);

    // Si on est sur la page Panier, on met à jour la quantité
    if ($('#cart-page').length > 0) {
        let url = $('meta[name="cart-update-url"]').attr('content');

        // Récupère l'id du produit
        let productId = $('input[name="product"]', formEl).val();

        // Crée le champ data
        let data = {
            product: productId,
            quantity: quantity,
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        $.post(url, data).then(response => {
            if (response) {
                // Met à jour le prix total
                $('span.value', formEl).html(totalPriceFormatted);
            }
        });
    } else {
        // Met à jour le prix total
        $('span.value', formEl).html(totalPriceFormatted);
    }
});

// Toggle favorite
$('a.toggle-favorite').on('click', (event) => {
    event.preventDefault();

    let linkEl = $(event.currentTarget);
    let url = linkEl.attr('href');

    $.get(url).then(response => {
        if (response.action === 'delete') {
            // Si on est sur la page des favoris on supprime la ligne
            // et on met à jour le compteur d'ajout
            if ($('#favorites-page').length > 0) {
                $(linkEl).parents('.product-line:first').remove();
                let favoritesCount = $('.product-line').length;
                $('.favorites-count').html(favoritesCount);
            }
            // Sinon on affiche l'icone de favoris inactif
            else {
                $(linkEl).removeClass('active');
                $('.is-favorite', linkEl).hide();
                $('.is-not-favorite', linkEl).show();
            }

        } else {
            // On affiche l'icone de favoris actif
            $(linkEl).addClass('active');
            $('.is-favorite', linkEl).show();
            $('.is-not-favorite', linkEl).hide();
        }
    });
})