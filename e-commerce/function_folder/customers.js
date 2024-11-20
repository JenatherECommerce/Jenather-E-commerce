document.addEventListener('DOMContentLoaded', () => {
    const hoverElements = document.querySelectorAll('.hover-info');
    const hoverPopup = document.getElementById('hover-popup');

    hoverElements.forEach(element => {
        element.addEventListener('mouseover', (event) => {
            const carInfo = event.target.getAttribute('data-car');
            hoverPopup.textContent = `Car: ${carInfo}`;
            hoverPopup.style.left = `${event.pageX + 10}px`;
            hoverPopup.style.top = `${event.pageY + 10}px`;
            hoverPopup.classList.remove('hidden');
        });

        element.addEventListener('mousemove', (event) => {
            hoverPopup.style.left = `${event.pageX + 10}px`;
            hoverPopup.style.top = `${event.pageY + 10}px`;
        });

        element.addEventListener('mouseout', () => {
            hoverPopup.classList.add('hidden');
        });
    });
});
