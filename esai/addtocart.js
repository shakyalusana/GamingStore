let products = [];
let cart = [];
let listProductHTML = document.querySelector('.listProduct');
let listCartHTML = document.querySelector('.listCart');
let iconCart = document.querySelector('.icon-cart');
let cartTab = document.querySelector('.cartTab');
let iconCartSpan = iconCart.querySelector('span');

const addDataToHTML = () => {
    listProductHTML.innerHTML = '';
    if (products.length > 0) {
        products.forEach(item => {
            let newItem = document.createElement('div');
            newItem.classList.add('item');
            newItem.dataset.id = item.id;
            listProductHTML.appendChild(newItem);
            newItem.innerHTML = `
            <div class="image">
                <img src="${item.image}">
            </div>
            <div class="details">
                <div class="name">${item.name}</div>
                <div class="price">Rs. ${item.price}</div>
                <button class="addCart" data-id="${item.id}">Add to Cart</button>
            </div>`;
        });
    }
};

iconCart.addEventListener('click', () => {
    cartTab.classList.toggle('showCart');
});

const addToCart = (product_id) => {
    let positionInCart = cart.findIndex((value) => value.product_id == product_id);
    if (positionInCart >= 0) {
        cart[positionInCart].quantity += 1;
    } else {
        cart.push({ product_id: product_id, quantity: 1 });
    }
    addCartToHTML();
    addCartToMemory();
};

const removeProductFromCart = (product_id) => {
    let positionInCart = cart.findIndex((value) => value.product_id == product_id);
    if (positionInCart >= 0) {
        cart.splice(positionInCart, 1);
    }
    addCartToHTML();
    addCartToMemory();
};

const CartToMemory = () => {
    localStorage.setItem('cart', JSON.stringify(cart));
};

const addCartToMemory = () => {
    localStorage.setItem('cart', JSON.stringify(cart));
};

const addCartToHTML = () => {
    listCartHTML.innerHTML = '';
    let totalQuantity = 0;
    let totalPrice = 0;
    if (cart.length > 0) {
        cart.forEach(item => {
            totalQuantity = totalQuantity + item.quantity;
            let positionProduct = products.findIndex((value) => value.id == item.product_id);
            let info = products[positionProduct];
            let newItem = document.createElement('div');
            newItem.classList.add('item');
            newItem.dataset.id = item.product_id;
            listCartHTML.appendChild(newItem);
            newItem.innerHTML = `
            <div class="image">
                <img src="${info.image}">
            </div>
            <div class="details">
                <div class="name">${info.name}</div>
                <div class="price">Rs. ${info.price}</div>
                <div class="quantity">
                    <span class="minus" data-product-id="${item.product_id}">-</span>
                    <span>${item.quantity}</span>
                    <span class="plus" data-product-id="${item.product_id}">+</span>
                </div>
            </div>
            <div class="totalPrice">Rs. ${info.price * item.quantity}</div>`;
            totalPrice += info.price * item.quantity;
        });
    }
    iconCartSpan.innerText = totalQuantity;
    let totalPriceElement = document.createElement('div');
    totalPriceElement.classList.add('totalPrice');
    totalPriceElement.innerHTML = `<strong>Total Price: Rs. ${totalPrice}</strong>`;
    listCartHTML.appendChild(totalPriceElement);
};

listProductHTML.addEventListener('click', (event) => {
    let positionClick = event.target;
    if (positionClick.classList.contains('addCart')) {
        let product_id = positionClick.getAttribute('data-id');
        addToCart(product_id);
    }
});

listCartHTML.addEventListener('click', (event) => {
    let positionClick = event.target;
    if (positionClick.classList.contains('minus') || positionClick.classList.contains('plus')) {
        let product_id = positionClick.getAttribute('data-product-id');
        let type = 'minus';
        if (positionClick.classList.contains('plus')) {
            type = 'plus';
        }
        changeQuantityCart(product_id, type);
    }
});

const changeQuantityCart = (product_id, type) => {
    let positionItemInCart = cart.findIndex((value) => value.product_id == product_id);
    if (positionItemInCart >= 0) {
        let info = cart[positionItemInCart];
        switch (type) {
            case 'plus':
                cart[positionItemInCart].quantity = cart[positionItemInCart].quantity + 1;
                break;

            default:
                let changeQuantity = cart[positionItemInCart].quantity - 1;
                if (changeQuantity > 0) {
                    cart[positionItemInCart].quantity = changeQuantity;
                } else {
                    cart.splice(positionItemInCart, 1);
                }
                break;
        }
    }
    addCartToHTML();
    addCartToMemory();
};

const initApp = () => {
    // get data product
    fetch('products.json')
        .then(response => response.json())
        .then(data => {
            products = data;
            addDataToHTML();

            // get data cart from memory
            if (localStorage.getItem('cart')) {
                cart = JSON.parse(localStorage.getItem('cart'));
                addCartToHTML();
            }
        });
};
initApp();
