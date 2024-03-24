import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


const deletButtons = document.querySelectorAll('.delete-button');

deletButtons.forEach((button) => {
    button.addEventListener('click', function(){
        let slug = button.getAttribute('data-slug');
        let path = button.getAttribute('data-path');

        let text_modal = document.getElementById('custom-message-modal');

        switch (path) {
            case 'dishes':
                text_modal.textContent = 'questo piatto';
                break;
            
            default:
                break;
        }

        let url = `${window.location.origin}/user/${path}/${slug}`;

        let form_delete = document.getElementById('form-delete');

        form_delete.setAttribute('action', url);
    })
})