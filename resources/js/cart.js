import Swal from 'sweetalert2';

export class Cart {
    constructor() {
        this.initOrderButtonListener();
    }

    initOrderButtonListener() {
        $('#order-btn').on('click', event => {
            Swal.fire({
                title: 'Confirmation',
                text: "Êtes-vous sûr de vouloir passer votre commande ?",
                // icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#38c172',
                cancelButtonColor: '#e3342f',
                confirmButtonText: 'Commander',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.value) {
                    // Effectue la commande
                    this.makeOrder();
                }
            })
        });

        $('#order-btn-bottom').on('click', event => {
            Swal.fire({
                title: 'Confirmation',
                text: "Êtes-vous sûr de vouloir passer votre commande ?",
                // icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#38c172',
                cancelButtonColor: '#e3342f',
                confirmButtonText: 'Commander',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.value) {
                    // Effectue la commande
                    this.makeOrder();
                }
            })
        });
    }

    makeOrder() {
        let url = $('meta[name="cart-validate-url"]').attr('content');
        let data = {
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        $.post(url, data).then(response => {
            Swal.fire(
                'Félicitations !',
                'Votre commande a bien été envoyée à notre équipe qui la traitera dans les plus brefs délais.',
                'success'
            ).then(() => {
                // Redirige vers la page d'accueil
                document.location.href = '/';
            })
        });
    }
}