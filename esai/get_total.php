<?php
session_start();

$total = 0;

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
}

echo '<p>Total: $' . number_format($total, 2) . '</p>';
?>
