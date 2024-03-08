import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//Message
const closeMessage = document.querySelector('.close_message')
const alertInfo = document.querySelector('.alert-info') 
const alertError = document.querySelector('.alert-error') 
if(alertInfo) {
    setTimeout(() => {
        alertInfo.classList.add('d-none')
    }, 3000)
}

if(alertError){
    setTimeout(() => {
        alertError.classList.add('d-none')
    }, 3000)
}

if(closeMessage) {
    closeMessage.addEventListener('click', () => {
        alertInfo.classList.add('d-none')
    })
}
