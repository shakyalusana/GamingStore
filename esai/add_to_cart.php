<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    // Sanitize the input
    $productId = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $productName = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $productPrice = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $productQuantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);

    // Initialize cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if the item already exists in the cart
    $existingItemIndex = array_search($productId, array_column($_SESSION['cart'], 'id'));

    if ($existingItemIndex !== false) {
        // Update the quantity if the item exists
        $_SESSION['cart'][$existingItemIndex]['quantity'] += $productQuantity;
    } else {
        // Add new item to the cart
        $_SESSION['cart'][] = [
            'id' => $productId,
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => $productQuantity
        ];
    }

    // Output success message
    echo 'Item added to cart successfully';
} else {
    // Handle invalid request
    echo 'Invalid request';
}
?>
