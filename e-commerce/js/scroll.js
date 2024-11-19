document.getElementById('suzuki').addEventListener('click', () => {
    document.getElementById('suzuki-section').scrollIntoView({ behavior: "smooth"})
})

document.getElementById('honda').addEventListener('click', () => {
    document.getElementById('honda-section').scrollIntoView({ behavior: "smooth"})
})

document.getElementById('goup').addEventListener('click', () => {
    document.getElementById('header-section').scrollIntoView({ behavior: "smooth"})
})

document.getElementById('promos').addEventListener('click', () => {
    document.getElementById('promos-section').scrollIntoView({ behavior: "smooth"})
})

document.addEventListener("DOMContentLoaded", () => {
        const popup = document.getElementById("popup");
        const closePopup = document.getElementById("closePopup");

        if (popup) {
            closePopup.addEventListener("click", () => {
                popup.style.display = "none";
            });

            // Auto-close the popup after 5 seconds
            setTimeout(() => {
                popup.style.display = "none";
            }, 5000);
        }
    });