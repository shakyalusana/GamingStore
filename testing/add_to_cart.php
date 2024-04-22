<!-- cart.php -->

<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h2>Shopping Cart</h2>
    <div class="cart">
        <?php
        // Check if cart is not empty
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $product_id => $product) {
                echo "<div class='cart-item'>";
                echo "<h3>{$product['name']}</h3>";
                echo "<p>Price: $ {$product['price']}</p>";
                echo "<p>Quantity: {$product['quantity']}</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Your cart is empty.</p>";
        }
        ?>
    </div>
</div>

</body>
</html>
