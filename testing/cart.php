<?php
include 'db.php';

// Fetch items from the cart
$sql = "SELECT c.quantity, p.name, p.price, p.image FROM cart c JOIN products p ON c.product_id = p.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="item">';
        echo '<div class="image"><img src="' . $row["image"] . '" alt="' . $row["name"] . '"></div>';
        echo '<div class="name">' . $row["name"] . '</div>';
        echo '<div class="totalPrice">Rs. ' . ($row["price"] * $row["quantity"]) . '</div>';
        echo '<div class="quantity">';
        echo '<span class="minus">-</span>';
        echo '<span>' . $row["quantity"] . '</span>';
        echo '<span class="plus">+</span>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "Cart is empty";
}
$conn->close();
?>
