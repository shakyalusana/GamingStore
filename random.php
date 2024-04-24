<?php 
require('db.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="addtocart.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        header {
            position: relative;
        }
    </style>
</head>
<body>
<header>
    <section class="storeheader">
        <nav>
            <a href="index.html"><img src="images/logo.png"></a>
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="store.html">STORE</a></li>
                    <li><a href="register.php">REGISTER</a></li>
                </ul>
            </div>
        </nav>
    </section>
</header>
<div class="container">
    <div class="container-section">
        <header>
            <div class="title">GAMING CHAIR</div>
            <div class="icon-cart" onclick="toggleAddToCart()">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1"/>
                </svg>
                <span id="increment">0</span>
            </div>
        </header>
        <div class="listProduct">
            <div class="listCart">
                <?php 
                    $mysqli = new mysqli("localhost", "root", "", "store");

                    // Check connection
                    if ($mysqli->connect_error) {
                        die("Connection failed: " . $mysqli->connect_error);
                    }
                    
                    // Check if connection is still alive
                    if (!$mysqli->ping()) {
                        die("Connection lost");
                    }
                    
                    $query = "SELECT * FROM products";
                    $result = $mysqli->query($query);
                    
                    if ($result === false) {
                        die("Error executing query: " . $conn->error);
                    }

                    // Check if products exist
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo <<< query
                                <div class="card">
                                    <div class="card-image">
                                        <img src="images/$row[image]" alt="mouse">
                                    </div>
                                    <div class="card-content">
                                        <p>
                                            $row[name]
                                        </p>
                                        <p>
                                            $row[price]
                                        </p>
                                        <input type="hidden" name="id" value="$row[id]">
                                        <input type="hidden" name="name" value="$row[name]">
                                        <input type="hidden" name="price" value="$row[price]">
                                        <input type="number" name="quantity" value=1>
                                        <button class="add_to_cart" data-id="$row[id]">Add To Cart</button>
                                    </div>    
                                </div>
                            query;
                        }
                    } else {
                        echo "0 results";
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="addtocart" id="addtocart">
        <div class="cart-section">
            <h3>Add to Cart</h3>
        </div>
        <div class="cart-items">
            <!-- Cart items will be displayed here -->
        </div>
        <div class="cart-total">
            <!-- Total price will be displayed here -->
        </div>
        <button class="clear-cart">Clear All</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addToCartButtons = document.querySelectorAll('.add_to_cart');
        const cartItemsContainer = document.querySelector('.cart-items');
        const cartTotalContainer = document.querySelector('.cart-total');
        const clearCartButton = document.querySelector('.clear-cart');

        addToCartButtons.forEach(button => {
            button.addEventListener('click', addToCart);
        });

        function addToCart(event) {
            const button = event.target;
            const productId = button.dataset.id;
            const productName = button.parentElement.querySelector('input[name="name"]').value;
            const productPrice = button.parentElement.querySelector('input[name="price"]').value;
            const productQuantity = button.parentElement.querySelector('input[name="quantity"]').value;

            const formData = new FormData();
            formData.append('id', productId);
            formData.append('name', productName);
            formData.append('price', productPrice);
            formData.append('quantity', productQuantity);

            fetch('add_to_cart.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Update cart UI
                updateCart();
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function updateCart() {
            fetch('get_cart.php')
            .then(response => response.text())
            .then(data => {
                // Update cart items container with new data
                cartItemsContainer.innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
            });

            fetch('get_total.php')
            .then(response => response.text())
            .then(data => {
                // Update cart total container with new data
                cartTotalContainer.innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        clearCartButton.addEventListener('click', function() {
            fetch('clear_cart.php')
            .then(response => response.text())
            .then(data => {
                // Update cart UI
                updateCart();
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });

        // Initial cart update
        updateCart();
    });
</script>
</body>
</html>
