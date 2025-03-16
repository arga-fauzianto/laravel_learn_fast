import Alpine from 'alpinejs'
 
window.Alpine = Alpine
 
Alpine.start()


document.addEventListener('alpine:init', () => {
    Alpine.data('dragAndDrop', () => ({
        init() {
            this.setupDragula();
        },
        setupDragula() {
            const containers = document.querySelectorAll('.list-container');
            dragula([...containers], {
                moves: (el, source, handle, sibling) => {
                    return !el.classList.contains('add-card-button');
                }
            }).on('drop', (el, target, source, sibling) => {
                this.updateCardPosition(el, target);
            });
        },
        updateCardPosition(el, target) {
            const cardId = el.dataset.cardId;
            const listId = target.dataset.listId;
            const cardOrder = Array.from(target.children).map(child => child.dataset.cardId);

            axios.post('/update-card-position', {
                cardId: cardId,
                listId: listId,
                cardOrder: cardOrder
            }).then(response => {
                console.log('Card position updated:', response.data);
            }).catch(error => {
                console.error('Error updating card position:', error);
            });
        }
    }));
});