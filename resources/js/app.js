import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';

import DataTable from 'datatables.net-dt';
// import languageIT from 'datatables.net-plugins/i18n/it-IT.mjs';
import.meta.glob([
    '../img/**'
])


const deletButtons = document.querySelectorAll('.delete-button');

deletButtons.forEach((button) => {
    button.addEventListener('click', function () {
        let slug = button.getAttribute('data-slug');
        let path = button.getAttribute('data-path');
        let name = button.getAttribute('data-name');

        let text_modal = document.getElementById('custom-message-modal');

        switch (path) {
            case 'dishes':
                text_modal.textContent = ` "${name}"`;
                break;

            default:
                break;
        }

        let url = `${window.location.origin}/user/${path}/${slug}`;

        let form_delete = document.getElementById('form-delete');

        form_delete.setAttribute('action', url);
    })
})

// IMPOSTO LA DATATABLE PER LA TABELLA DEGLI ORDINI
let orders_table = new DataTable('#orders-table', {
    responsive: true,
    ordering: true,
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.0.3/i18n/it-IT.json',
    },    
    "columns": [
        {
            "sortable": true
        },
        {
            "sortable": true
        },
        {
            "sortable": true
        },
        {
            "sortable": true
        },
        {
            "sortable": false
        },
    ]
});


// Validazione dei dati del form dei Dish
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('dish-form').addEventListener('submit', function(event) {
        let name = document.getElementById('name').value;
        let genreId = document.getElementById('genre_id').value;
        let price = document.getElementById('price').value;
        let visible = document.getElementById('visible').value;
        let image = document.getElementById('image').value;
        let description = document.getElementById('description').value;

        // Validazione del nome
        if (!name) {
            document.getElementById('name-error').innerText = 'Il campo nome è obbligatorio.';
            event.preventDefault();
        } else if (name.length > 100) {
            document.getElementById('name-error').innerText = 'Il campo nome non può superare i 100 caratteri.';
            event.preventDefault();
        } else {
            document.getElementById('name-error').innerText = '';
        }

        // Validazione del genere
        if (!genreId) {
            document.getElementById('genre-error').innerText = 'Il campo genere è obbligatorio.';
            event.preventDefault();
        } else {
            document.getElementById('genre-error').innerText = '';
        }

        // Validazione del prezzo
        if (!price) {
            document.getElementById('price-error').innerText = 'Il campo prezzo è obbligatorio.';
            event.preventDefault();
        } else if (isNaN(price) || price < 0) {
            document.getElementById('price-error').innerText = 'Il prezzo deve essere un valore numerico maggiore o uguale a 0.';
            event.preventDefault();
        } else {
            document.getElementById('price-error').innerText = '';
        }

        // Validazione della visibilità
        if (!visible) {
            document.getElementById('visible-error').innerText = 'Il campo visibile è obbligatorio.';
            event.preventDefault();
        } else if (visible !== '1' && visible !== '0') {
            document.getElementById('visible-error').innerText = 'Il campo visibile deve essere disponibile o non disponibile.';
            event.preventDefault();
        } else {
            document.getElementById('visible-error').innerText = '';
        }

        // Validazione dell'immagine
        if (image) {
            let validImageExtensions = ['jpeg', 'jpg', 'png', 'gif'];
            let extension = image.split('.').pop().toLowerCase();
            if (validImageExtensions.indexOf(extension) === -1) {
                document.getElementById('image-error').innerText = 'Il file caricato deve essere un\'immagine di tipo: jpeg, png, jpg o gif.';
                event.preventDefault();
            } else {
                document.getElementById('image-error').innerText = '';
            }
        }

        // Validazione della descrizione
        if (!description) {
            document.getElementById('description-error').innerText = 'Il campo descrizione è obbligatorio.';
            event.preventDefault();
        } else {
            document.getElementById('description-error').innerText = '';
        }
    });
});

// Validazione dei dati del form di Registrazione
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('registration-form').addEventListener('submit', function(event) {
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let passwordConfirm = document.getElementById('password-confirm').value;
        let restaurantName = document.getElementById('restaurantName').value;
        let address = document.getElementById('address').value;
        let pIva = document.getElementById('p_iva').value;
        let mainImage = document.getElementById('main_image').value;
        let typologies = document.querySelectorAll('input[name="typologies[]"]:checked').length;

        // Validazione del nome e cognome
        if (!name) {
            document.getElementById('name-error').innerText = 'Il campo Nome e Cognome è obbligatorio.';
            event.preventDefault();
        } else if (name.length > 255) {
            document.getElementById('name-error').innerText = 'Il campo Nome e Cognome non può superare 255 caratteri.';
            event.preventDefault();
        } else {
            document.getElementById('name-error').innerText = '';
        }

        // Validazione dell'email
        if (!email) {
            document.getElementById('email-error').innerText = 'Il campo Indirizzo E-Mail è obbligatorio.';
            event.preventDefault();
        } else {
            document.getElementById('email-error').innerText = '';
        }

        // Validazione della password
        if (!password) {
            document.getElementById('password-error').innerText = 'Il campo Password è obbligatorio.';
            event.preventDefault();
        } else if (password !== passwordConfirm) {
            document.getElementById('password-error').innerText = 'La conferma della password non corrisponde.';
            event.preventDefault();
        } else {
            document.getElementById('password-error').innerText = '';
        }

        // Validazione del nome del ristorante
        if (!restaurantName) {
            document.getElementById('restaurantName-error').innerText = 'Il campo Nome Ristorante è obbligatorio.';
            event.preventDefault();
        } else if (restaurantName.length > 100) {
            document.getElementById('restaurantName-error').innerText = 'Il campo Nome Ristorante non può superare 100 caratteri.';
            event.preventDefault();
        } else {
            document.getElementById('restaurantName-error').innerText = '';
        }

        // Validazione dell'indirizzo
        if (!address) {
            document.getElementById('address-error').innerText = 'Il campo Indirizzo è obbligatorio.';
            event.preventDefault();
        } else if (address.length > 100) {
            document.getElementById('address-error').innerText = 'Il campo Indirizzo non può superare 100 caratteri.';
            event.preventDefault();
        } else {
            document.getElementById('address-error').innerText = '';
        }

        // Validazione della Partita IVA
        if (!pIva) {
            document.getElementById('p_iva-error').innerText = 'Il campo Partita IVA è obbligatorio.';
            event.preventDefault();
        } else if (pIva.length !== 11) {
            document.getElementById('p_iva-error').innerText = 'Il campo Partita IVA deve essere composto da 11 caratteri.';
            event.preventDefault();
        } else {
            document.getElementById('p_iva-error').innerText = '';
        }

        // Validazione dell'immagine di copertina
        if (!mainImage) {
            document.getElementById('main_image-error').innerText = 'Il campo Immagine di Copertina è obbligatorio.';
            event.preventDefault();
        } else {
            document.getElementById('main_image-error').innerText = '';
        }

        // Validazione delle tipologie di ristorante
        if (typologies === 0) {
            document.getElementById('typologies-error').innerText = 'È necessario selezionare almeno una tipologia di ristorante.';
            event.preventDefault();
        } else {
            document.getElementById('typologies-error').innerText = '';
        }

    });
});

