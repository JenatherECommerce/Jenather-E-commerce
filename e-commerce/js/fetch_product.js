document.querySelectorAll('.card-information').forEach(button => {
    button.addEventListener('click', function() {

        const productId = this.closest('.card').getAttribute('data-product-id');
        const detailType = this.getAttribute('data-detail-type');

        document.querySelectorAll('.card-information').forEach(btn => btn.classList.remove('active'));
        this.classList.add('active');

        const detailsElement = document.getElementById(`details-${productId}`);
        detailsElement.querySelectorAll('.detail-section').forEach(detail => {
            detail.style.display = 'none';
        });

        const specificDetail = detailsElement.querySelector(`.detail-section[data-type="${detailType}"]`);
        if (specificDetail) {
            specificDetail.style.display = 'block';
        } else {
            console.error(`Detail type ${detailType} not found for product ID ${productId}`);
        }
    });
});
