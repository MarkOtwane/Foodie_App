document.addEventListener('DOMContentLoaded', () => {
    const menuScreen = document.getElementById('menuScreen');
    const itemDetailScreen = document.getElementById('itemDetailScreen');
    const categoryItems = document.querySelectorAll('.category-item');
    const menuCards = document.querySelectorAll('.menu-card');
    const backIcon = document.querySelector('.back-icon');
    const quantityBtns = document.querySelectorAll('.quantity-btn');
    const menuCard = document.querySelector('.menu-card');

    // Category Filter
    categoryItems.forEach(item => {
        item.addEventListener('click', () => {
            categoryItems.forEach(cat => cat.classList.remove('active'));
            item.classList.add('active');

            const selectedCategory = item.dataset.category;
            menuCards.forEach(card => {
                card.style.display =
                    selectedCategory === 'all' ||
                    card.dataset.category === selectedCategory
                    ? 'block' : 'none';
            });
        });
    });

    // Open Item Detail
    menuCard.addEventListener('click', () => {
        menuScreen.style.display = 'none';
        itemDetailScreen.style.display = 'block';
    });

    // Back to Menu
    backIcon.addEventListener('click', () => {
        menuScreen.style.display = 'block';
        itemDetailScreen.style.display = 'none';
    });

    // Quantity Selector
    quantityBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const quantitySpan = document.querySelector('.quantity');
            let quantity = parseInt(quantitySpan.textContent);
            
            if (btn.classList.contains('plus')) {
                quantity++;
            } else if (btn.classList.contains('minus') && quantity > 1) {
                quantity--;
            }
            
            quantitySpan.textContent = quantity;
        });
    });
});