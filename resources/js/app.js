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
        url: '//cdn.datatables.net/plug-ins/2.0.3/i18n/it-IT.json',
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
})

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