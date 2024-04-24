<?php 
require('db.php');
session_start();
if(isset($_POST['add_to_cart'])){
    if(isset($_SESSION['cart'])){
        $session_array_id=array_column($_SESSION['cart'],"id");
        if(!in_array($_GET['id'],$session_array_id)){
            $session_array=array(
                'id'=> $_GET['id'],
                "name"=> $_POST['name'],
                "price"=>$_POST['price'],
                "quantity"=>$_POST['quantity']
            );
            $_SESSION['cart'][]=$session_array;
        }
    }else{
        $session_array=array(
            'id'=> $_GET['id'],
            "name"=> $_POST['name'],
            "price"=>$_POST['price'],
            "quantity"=>$_POST['quantity']
        );
        $_SESSION['cart'][]=$session_array;
    }
}

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
    header{
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
                <div class="icon-cart"   onclick="toggleAddToCart()">
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
                                        <form method="post" action="cart.php?id=$row[id]">
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
                                                <input type="hidden" name="name" value="$row[name]">
                                                <input type="hidden" name="price" value="$row[price]">
                                                <input type="number" name="quantity" value=1>
                                                <input type="submit" name="add_to_cart" id="add_to_cart_$row[id]" value="Add To Cart">
                                            </div>    
                                        </form>
                                    </div>
                            query;
                                }
                                }else {
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
            <?php 
                $total=0;
                $output="";
                $output .="
                    <table width=100% border=1 cellspacing=0 cellpadding=0>
                        <tr>
                            <th>ID</th>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Item Quantity</th>
                            <th>Item Price</th>
                            <th>Action</th>
                        </tr>
                ";
                if(!empty($_SESSION['cart'])){
                    foreach($_SESSION['cart'] as $key => $value){
                        $output .="
                        <tr>
                            <td>".$value['id']."</td>
                            <td>".$value['name']."</td>
                            <td>".$value['price']."</td>
                            <td>".$value['quantity']."</td>
                            <td>".number_format($value['price']*$value['quantity'])."</td>
                            <td>
                                <a href='javascript:void(0)' onclick='removeFromCart(".$value['id'].")'>
                                <button>Remove</button>
                                </a>
                            </td>
                        </tr>
                        ";
                        $total += $value['quantity'] * $value['price'];
                    }
                    $output .="
                    <tr>
                        <td colspan='3'>
                            <form method='post' action='email.php'>
                                <input type='submit' name='submit' value='Check Out'>
                            </form>
                        </td>
                        <td><b>Total Price</b></td>
                        <td>".number_format($total,2)."</td>
                        <td>
                            <a href='javascript:void(0)' onclick='clearCart()'>
                                <button>Clear All</button>
                            </a>
                        </td>
                    </tr>
                    </table>
                    ";
                }

                echo $output;
            ?>
            
        </div>
    </div>
<script>
    const increment=document.getElementById('increment');
    let totalQuantity = <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>;
        increment.innerText = totalQuantity;

        function removeFromCart(id) {
            totalQuantity--;
            increment.innerText = totalQuantity;
            const form = document.createElement('form');
            form.method = 'get';
            form.action = 'cart.php';
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'action';
            input.value = 'remove';
            const inputId = document.createElement('input');
            inputId.type = 'hidden';
            inputId.name = 'id';
            inputId.value = id;
            form.appendChild(input);
            form.appendChild(inputId);
            document.body.appendChild(form);
            form.submit();
        }

        function clearCart() {
            totalQuantity = 0;
            increment.innerText = totalQuantity;
            const form = document.createElement('form');
            form.method = 'get';
            form.action = 'cart.php';
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'action';
            input.value = 'clearall';
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }

        function toggleAddToCart() {
            addtocart.classList.toggle("open-addtocart");
        }
        // Increment the total quantity when the "Add to Cart" button is clicked
        <?php
        foreach($result as $row){
            echo "document.getElementById('add_to_cart_$row[id]').addEventListener('click', () => {";
            echo "totalQuantity++;";
            echo "increment.innerText = totalQuantity;";
            echo "});";
        }
        ?>
</script>
</body>
</html>
