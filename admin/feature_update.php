<?php 

require('include/db.php');
require('include/essentials.php');
// edit_feature
if(isset($_POST['submit'])){
    $id = isset($_GET['id']) ;
    $name=$_POST['name'];
    $price=$_POST['price'];
    $file_name1=$_FILES['image']['name'];
    // $tempname1=$_FILES['Car_image1']['temp_name'];
    // $tempname2=$_FILES['Car_image2']['temp_name'];
    // $tempname3=$_FILES['Car_image3']['temp_name'];
    // $tempname4=$_FILES['Car_image4']['temp_name'];



    $query=mysqli_query($con,"UPDATE `products` SET `name`='$name',`price`='$price',`image`='$file_name1' WHERE `id`=$id");


    if ($query) {
        echo "<script>alert('You have successfully update the data');</script>";
    } else {
      echo "Failed to Update data.";
    } 
    header('Location: /GamingStore/admin/feature.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Features</title>
    <link rel="stylesheet" href="css/admin.css" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!-- Option 1: Include in HTML -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <link
      rel="stylesheet"
      href="path/to/font-awesome/css/font-awesome.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Wix+Madefor+Text:ital,wght@0,400..800;1,400..800&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <script src="Script/nav.js"></script>
    <style>
        .section-setting-title{
            padding: 10px 20px;
        }
        .card-title{
            display: flex;
            flex-direction: column;
            align-items: normal;
        }
        .setting-form-site-title label{
            color: #000;
        }
        .setting-form-site-title input{
            border: 1px solid #000;
            color: #000 !important;
        }
        .setting-form-site-title{
            display: flex;
            flex-direction: column;
        }
        .setting-contacts-form-feature .feature-image input{
            color: #000;
        }
    </style>
  </head>
<body>
     <!-- nav-banner starts -->
     <nav>
      <div class="nav-banner">
        <div class="nav-logo">
          <span style="font-weight: 800">Dashboard </span>
        </div>
        <div class="profile-content">
          <img src="images/Profilepic.jpg" alt="profile-pic" />
          <span>Lusana Shakya</span>
          <button><i class="fa-regular fa-pen-to-square"></i> Edit</button>
        </div>
        <div class="nav-options">
          <span><i class="bi bi-grid-1x2"></i><a href="admindashboard.php">Dashboard</a></span>
          <span
            ><i class="bi bi-card-checklist"></i><a href="#">Features</a></span
          >
          <span
            ><i class="bi bi-calendar4-week"></i><a href="#">Schedule</a></span
          >
          <span><i class="bi bi-sliders"></i><a href="settings.php">Setting</a></span>
        </div>
        <!-- <div class="nav-mode">
          <button>
            <span></span>
          </button>
        </div> -->
      </div>
    </nav>
    <!-- nav-banner ends -->

    <header>
        <div class="hospital-content">
            <div class="hospital-search">
            </div>
            <div class="login-content">
            <a href="logout.php" style="margin-right: 0">Logout</a>
            </div>
        </div>
        <div class="section-setting-title">
            <div class="card-title">
                <h5>Feature Edit</h5>
                 <!-- edit feature -->
                
                    <div class="edit-feature">
                     <div class="setting-form">
                        <form id="features_edit_form" method="post"  enctype="multipart/form-data"> 
                        <?php
                        $id = isset($_GET['id']) ? $_GET['id'] : null;
                        echo $id;
                        $ret=mysqli_query($con,"SELECT * from  `products` where `id`=$id");
                        while ($row=mysqli_fetch_array($ret)) {
                        
                    
                        ?>
                        <div class="setting-contacts-form">
                            <div class="setting-form-left-side">
                              <div class="setting-form-site-title">
                                  <label>Product Name</label>
                                  <input type="text" name="name" id="name" value="<?php  echo $row['name'];?>">
                              </div>
                              <div class="setting-form-site-title">
                                  <label>Product Price</label>
                                  <input type="number" name="price" id="price" value="<?php  echo $row['price'];?>">
                              </div>
                              <div class="setting-form-site-title">
                                  <label>Product Image</label>
                                  <input type="file" name="image" id="image" value="<?php  echo $row['image'];?>">
                              </div>
                            </div>
                        </div>
                        
                    <?php
                            
                        }
                    ?>
                        <div class="setting-button">
                            <button type="Reset">Cancel</button>
                            <button type="submit" name="submit">Submit</button>
                        </div>
                        </form>
                        
                    </div>
                 </div>
            </div>
        </div>
    </header>
</body>
</html>