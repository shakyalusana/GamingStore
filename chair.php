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
        <header>
            <div class="title">GAMING CHAIR</div>
            <div class="icon-cart">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1"/>
                </svg>
                <span>0</span>
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
                          <button><a href="#">Add to cart</a></button>
                      </div>
                  </div>
                  query;
                      }
                    }else {
                        echo "0 results";
                    }
                ?>
            <!-- <div class="card">
                <div class="card-image">
                    <img src="images/mouse1.jpg" alt="mouse">
                </div>
                <div class="card-content">
                    <p>
                        Mouse
                    </p>
                    <p>
                        Rs.200
                    </p>
                    <button><a href="#">Add to cart</a></button>
                </div>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="images/mouse1.jpg" alt="mouse">
                </div>
                <div class="card-content">
                    <p>
                        Mouse
                    </p>
                    <p>
                        Rs.200
                    </p>
                    <button><a href="#">Add to cart</a></button>
                </div>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="images/mouse1.jpg" alt="mouse">
                </div>
                <div class="card-content">
                    <p>
                        Mouse
                    </p>
                    <p>
                        Rs.200
                    </p>
                    <button><a href="#">Add to cart</a></button>
                </div>
            </div> -->
        </div>
        </div>
    </div>
    <!-- <div class="cartTab">
        <h1>Shopping Cart</h1>
        
        <div class="btn">
            <button class="close">CLOSE</button>
            <button class="checkOut">Check Out</button>
        </div>
    </div> -->

    <section class="footer">
<h4>Us</h4>
<p>We're tech enthusiasts on a mission to teach the world how to use and understand the tech in their lives. 
    Phones, laptops, gadgets, apps, software, websites, services<br>
    if it can make your life better, we'll show you all the tips, tricks, and techniques you need to know to
     get the most out of what you have.</br>We bring you genuine pc parts as well as gift cards all in one place.</p>
      <div class="icons">
        <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
        <a href="https://twitter.com/home?lang=en"><i class="fa fa-twitter"></i></a>
        <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
        <a href="https://www.youtube.com/"><i class="fa fa-youtube-play"></i></a>
      </div>
      <p>Made By Lusana <i class="fa fa-copyright"></i></p>

</section>



</body>
</html>


