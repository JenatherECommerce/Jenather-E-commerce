const cards = document.querySelectorAll('.card')

let expandedCard = null;

cards.forEach(card => {
    card.addEventListener('click', () => {

        if (expandedCard && expandedCard !== card) {
            expandedCard.classList.remove('expanded')
            expandedCard = null;
        }

        card.classList.add('expanded');
        expandedCard = card;
    })

    const closeBtn = card.querySelector('.close-btn')

    closeBtn.addEventListener('click', (event) => {
        event.stopPropagation();
        card.classList.remove('expanded')
        expandedCard = null;
    })
})
