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
    // language: languageIT,
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
            "sortable": true
        },
    ]
})