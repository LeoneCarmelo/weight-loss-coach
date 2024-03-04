import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const closeMessage = document.querySelector('.close_message')
const alertInfo = document.querySelector('.alert-info') 
if(closeMessage != null) {
    closeMessage.addEventListener('click', () => {
        alertInfo.classList.add('d-none')
    })
}