<?php
// Connect to your database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="item">';
        echo '<img src="' . $row["image"] . '" alt="">';
        echo '<h2>' . $row["name"] . '</h2>';
        echo '<div class="price">Rs. ' . $row["price"] . '</div>';
        echo '<button class="addCart">Add To Cart</button>';
        echo '</div>';
    }
} else {
    echo "0 results";
}
$conn->close();
?>
