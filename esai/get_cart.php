<?php
session_start();

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cartItems = '';
    foreach ($_SESSION['cart'] as $item) {
        $cartItems .= '<div class="cart-item">';
        $cartItems .= '<span class="item-name">' . $item['name'] . '</span>';
        $cartItems .= '<span class="item-price">$' . number_format($item['price'], 2) . '</span>';
        $cartItems .= '<span class="item-quantity">' . $item['quantity'] . '</span>';
        $cartItems .= '<button class="remove-item" data-id="' . $item['id'] . '">Remove</button>';
        $cartItems .= '</div>';
    }
    echo $cartItems;
} else {
    echo '<p>Your cart is empty</p>';
}
?>
