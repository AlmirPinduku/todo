const openModalButtons2 = document.querySelectorAll('.open-modal2');
const closeModalButton2 = document.querySelector('.close-modal2');
const modalOverlay2 = document.querySelector('#modal-overlay2');

openModalButtons2.forEach((button) =>
    button.addEventListener('click', openModal)
);
modalOverlay2.addEventListener('click', closeModal);
document.addEventListener('keydown', closeModal);

function openModal() {
    modalOverlay2.classList.remove('hidden');
}

function closeModal(event) {
    if (
        event.target.classList.contains('close-modal2') ||
        event.target.id === 'modal-overlay2' ||
        (event.type === 'keydown' && event.key === 'Escape')
    ) {
        modalOverlay2.classList.add('hidden');
    }
}

