<!-- index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h2>Product Listing</h2>
    <div class="products">
        <?php
        // Fetch products from the database
        // For simplicity, let's assume we have a database table named 'products' with fields 'id', 'name', and 'price'
        $products = [
            ['id' => 1, 'name' => 'Product 1', 'price' => 10],
            ['id' => 2, 'name' => 'Product 2', 'price' => 20],
            ['id' => 3, 'name' => 'Product 3', 'price' => 30]
        ];

        // Display products
        foreach ($products as $product) {
            echo "<div class='product'>";
            echo "<h3>{$product['name']}</h3>";
            echo "<p>Price: $ {$product['price']}</p>";
            echo "<form action='add_to_cart.php' method='post'>";
            echo "<input type='hidden' name='product_id' value='{$product['id']}'>";
            echo "<input type='submit' value='Add to Cart'>";
            echo "</form>";
            echo "</div>";
        }
        ?>
    </div>
</div>

</body>
</html>
