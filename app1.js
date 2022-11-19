const openModalButtons1 = document.querySelectorAll('.open-modal1');
const closeModalButton1 = document.querySelector('.close-modal1');
const modalOverlay1 = document.querySelector('#modal-overlay1');

openModalButtons1.forEach((button) =>
    button.addEventListener('click', openModal)
);
modalOverlay1.addEventListener('click', closeModal);
document.addEventListener('keydown', closeModal);

function openModal() {
    modalOverlay1.classList.remove('hidden');
}

function closeModal(event) {
    if (
        event.target.classList.contains('close-modal1') ||
        event.target.id === 'modal-overlay1' ||
        (event.type === 'keydown' && event.key === 'Escape')
    ) {
        modalOverlay1.classList.add('hidden');
    }
}
