<?php 

require('include/db.php');
require('include/essentials.php');
// edit_feature
if(isset($_POST['submit'])){
    $f_id = isset($_GET['f_id']) ;
    $Vehicle_title=$_POST['Vehicle_title'];
    $Vehicle_brand=$_POST['Vehicle_brand'];
    $Price=$_POST['Price'];
    $Fuel_type=$_POST['Fuel_type'];
    $Model_year=$_POST['Model_year'];
    $Seating_capacity=$_POST['Seating_capacity'];
    $Engine=$_POST['Engine'];
    $Torque=$_POST['Torque'];
    $Top_speed=$_POST['Top_speed'];
    $Power=$_POST['Power'];
    $Transmission=$_POST['Transmission'];
    $Drive_type=$_POST['Drive_type'];
    $Quantity=$_POST['Quantity'];
    $file_name1=$_FILES['Car_image1']['name'];
    $file_name2=$_FILES['Car_image2']['name'];
    $file_name3=$_FILES['Car_image3']['name'];
    $file_name4=$_FILES['Car_image4']['name'];
    // $tempname1=$_FILES['Car_image1']['temp_name'];
    // $tempname2=$_FILES['Car_image2']['temp_name'];
    // $tempname3=$_FILES['Car_image3']['temp_name'];
    // $tempname4=$_FILES['Car_image4']['temp_name'];



    $query=mysqli_query($con,"UPDATE `car_feature` SET `Vehicle_title`='$Vehicle_title',`Vehicle_brand`='$Vehicle_brand',`Price`='$Price',`Fuel_type`='$Fuel_type',`Model_year`='$Model_year',`Seating_capacity`='$Seating_capacity',`Engine`='$Engine',`Torque`='$Torque',`Top_speed`='$Top_speed',`Power`='$Power',`Transmission`='$Transmission',`Drive_type`='$Drive_type',`Quantity`='$Quantity',`Car_image1`='$file_name1',`Car_image2`='$file_name2',`Car_image3`='$file_name3',`Car_image4`='$file_name4' WHERE `f_id`=$f_id");


    if ($query) {
        echo "<script>alert('You have successfully update the data');</script>";
    } else {
      echo "Failed to Update data.";
    } 
    header('Location: /projects/carrental/admin/feature.php');
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
            color: #000;
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
                        $f_id = isset($_GET['f_id']) ? $_GET['f_id'] : null;
                        echo $f_id;
                        $ret=mysqli_query($con,"SELECT * from  `car_feature` where `f_id`=$f_id");
                        while ($row=mysqli_fetch_array($ret)) {
                        
                    
                        ?>
                        <div class="setting-contacts-form">
                            <div class="setting-form-left-side">
                            <div class="setting-form-site-title">
                                <label>Vehicle Title</label>
                                <input type="text" name="Vehicle_title" id="Vehicle_title" value="<?php  echo $row['Vehicle_title'];?>">
                            </div>
                            <div class="setting-form-site-title">
                                <label>Vehicle Brand</label>
                                <input type="text" name="Vehicle_brand" id="Vehicle_brand" value="<?php  echo $row['Vehicle_brand'];?>">
                            </div>
                            <div class="setting-form-site-title">
                                <label>Per Day Price</label>
                                <input type="number" name="Price" id="Price" value="<?php  echo $row['Price'];?>">
                            </div>
                            </div>
                            <div class="setting-form-right-side">
                            <div class="setting-form-site-title">
                                <label>Fuel Type</label>
                                <input type="text" name="Fuel_type" id="Fuel_type" value="<?php  echo $row['Fuel_type'];?>">
                            </div>  
                            <div class="setting-form-site-title">
                                <label>Model Year</label>
                                <input type="number" name="Model_year" id="Model_year" value="<?php  echo $row['Model_year'];?>">
                            </div>
                            <div class="setting-form-site-title">
                                <label>Seating Capacity</label>
                                <input type="number " name="Seating_capacity" id="Seating_capacity" value="<?php  echo $row['Seating_capacity'];?>" >
                            </div>
                            </div>
                        </div>
                        <div class="setting-contacts-form-feature">
                        <div class="form-feature">
                          <div class="setting-form-site-title">
                            <label>Engine Unit(cc)</label>
                            <input type="number " name="Engine" id="Engine" value="<?php  echo $row['Engine'];?>" >
                          </div>
                          <div class="setting-form-site-title">
                            <label>Torque Unit(Nm)</label>
                            <input type="number " name="Torque" id="Torque" value="<?php  echo $row['Torque'];?>" >
                          </div>
                          <div class="setting-form-site-title">
                            <label>Top Speed Unit(kmph)</label>
                            <input type="number " name="Top_speed" id="Top_speed" value="<?php  echo $row['Top_speed'];?>" >
                          </div>
                        </div>
                        <div class="form-feature">
                          <div class="setting-form-site-title">
                            <label>Power Unit(bhp)</label>
                            <input type="number " name="Power" id="Power" value="<?php  echo $row['Power'];?>" >
                          </div>
                          <div class="setting-form-site-title">
                            <label>Transmission</label>
                            <input type="text" name="Transmission" id="Transmission" value="<?php  echo $row['Transmission'];?>" >
                          </div>
                          <div class="setting-form-site-title">
                            <label>Drive Type Unit(WD)</label>
                            <input type="number " name="Drive_type" id="Drive_type" value="<?php  echo $row['Drive_type'];?>" >
                          </div>
                        </div>
                        <div class="form-feature">
                          <div class="setting-form-site-title">
                            <label>Quantity</label>
                            <input type="number " name="Quantity" id="Quantity" value="<?php  echo $row['Quantity'];?>" >
                          </div>
                          
                        </div>
                        </div>
                        <div class="setting-contacts-form-feature">
                            <div class="form-feature">
                            <div class="feature-image">
                                <label>Image 1 <span>*</span></label>
                                <input type="file" name="Car_image1" id="Vehicle_img_1">
                            </div>
                            <div class="feature-image">
                                <label>Image 2 <span>*</span></label>
                                <input type="file" name="Car_image2" id="Car_image2">
                            </div>
                            
                            </div>
                            <div class="form-feature">
                            <div class="feature-image">
                                <label>Image 3 <span>*</span></label>
                                <input type="file" name="Car_image3" id="Car_image3">
                            </div>
                            <div class="feature-image">
                                <label>Image 4 <span>*</span></label>
                                <input type="file" name="Car_image4" id="Car_image4">
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