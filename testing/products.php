<?php
include 'db.php';

// Fetch all products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="item">';
        echo '<img src="' . $row["image"] . '" alt="' . $row["name"] . '">';
        echo '<h2>' . $row["name"] . '</h2>';
        echo '<div class="price">Rs. ' . $row["price"] . '</div>';
        echo '<button class="addCart"><a href="cart.php?id= '. $row["id"] .'"> Add To Cart</a></button>';
        echo '</div>';
    }
} else {
    echo "0 results";
}
$conn->close();
?>
