// Shopping Cart
let cart = [];
let total = 0;

function addToCart(itemName, itemPrice, itemImg) {
    cart.push({ name: itemName, price: itemPrice });
    total += itemPrice;

    // Updating cart icon
    const cartIcon = document.querySelector('.icon-cart span');
    cartIcon.textContent = cart.length;

    // Displaying items in the cart
    displayCart();
}

function displayCart() {
    const cartProducts = document.getElementById('cart-products');
    cartProducts.innerHTML = '';

    cart.forEach(item => {
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');

        const itemName = document.createElement('p');
        itemName.textContent = item.name;

        const itemPrice = document.createElement('p');
        itemPrice.textContent = `$${item.price}`;

        cartItem.appendChild(itemName);
        cartItem.appendChild(itemPrice);

        cartProducts.appendChild(cartItem);
    });

    // Displaying the total price
    const cartTotal = document.getElementById('cart-total');
    cartTotal.textContent = total.toFixed(2);
}

function checkout() {
    alert(`Total: $${total.toFixed(2)}`);
}

document.addEventListener('DOMContentLoaded', () => {
    const cartIcon = document.querySelector('.icon-cart');
    const cartTab = document.querySelector('.cartTab');
    const closeCartTab = document.querySelector('.cartTab .close-button');

    cartIcon.addEventListener('click', () => {
        cartTab.classList.toggle('show');
    });

    closeCartTab.addEventListener('click', () => {
        cartTab.classList.remove('show');
    });
});
