const openModalButtons = document.querySelectorAll('.open-modal');
const closeModalButton = document.querySelector('.close-modal');
const modalOverlay = document.querySelector('#modal-overlay');

openModalButtons.forEach((button) =>
    button.addEventListener('click', openModal)
);
modalOverlay.addEventListener('click', closeModal);
document.addEventListener('keydown', closeModal);

function openModal() {
    modalOverlay.classList.remove('hidden');
}

function closeModal(event) {
    if (
        event.target.classList.contains('close-modal') ||
        event.target.id === 'modal-overlay' ||
        (event.type === 'keydown' && event.key === 'Escape')
    ) {
        modalOverlay.classList.add('hidden');
    }
}

