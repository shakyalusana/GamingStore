<?php 

require('include/db.php');
  require('include/essentials.php');
  adminLogin();
  session_regenerate_id(true);

if(isset($_POST['upd_contacts'])){
    $frm_data = filteration($_POST);
    // print_r("From this point");
    // print_r($frm_data['address']);
    
    $q = "UPDATE `contact_details` SET `address`=?, `pn1`=?, `pn2`=?, `email`=? WHERE `sr_no`=?";
    
    // Use parameterized query
    $values = [
        $frm_data["address"], 
        $frm_data['pn1'], 
        $frm_data['pn2'], 
        $frm_data['email'], 
        1
    ];
    // print_r($values);

    $res = update($q, $values, 'ssssi');
    
    if($res !== false) {
        echo "Data updated successfully";
    } else {
        echo "Error updating data: " . mysqli_error($con); // Ensure $con is defined properly
    }
    header('Location: /projects/carrental/admin/settings.php');
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Setting</title>
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
      body{
        position: relative;
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
            ><i class="bi bi-card-checklist"></i><a href="feature.php">Features</a></span
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

    <!-- header starts -->
    <header>
    <div class="hospital-content">
        <div class="hospital-search">
        </div>
        <div class="login-content">
          <a href="logout.php" style="margin-right: 0">Logout</a>
        </div>
      </div>
      <div class="section-setting">
        <div class="section-setting-title">
            <h3>Setting</h3>
        </div>
        <div class="section-setting-card">
            <div class="card-title">
                <h5>Contact Setting</h5>
                <button onclick="openPopup()"><i class="bi bi-pencil-square"></i> <span>Edit</span></button>
                <div class="popup" id="popup" style="width: 800px;">
                  <div class="setting-title">
                    <h2>Contacts Setting</h2>
                  </div>
                  <div class="setting-form">
                    <form id="contacts_s_form" method="post" action="?"> 
                      <div class="setting-contacts">
                        <div class="setting-form">
                          <div class="setting-form-site-title">
                            <label>Address</label>
                            <input type="text" name="address" id="address_inp">
                          </div>  
                          <div class="setting-form-site-title">
                            <label>Phone Numbers (with country code)</label>
                            <input type="text" name="pn1" id="pn1_inp" placeholder="Phone number-1" style="margin-bottom: 1rem;" >
                            <input type="text" name="pn2" id="pn2_inp" placeholder="Phone number-2" >
                          </div> 
                          <div class="setting-form-site-title">
                            <label>Email</label>
                            <input type="email" name="email" id="email_inp">
                          </div> 
                        </div>
                       
                      <div class="setting-button">
                        <button type="cancel" onclick="closePopup(); contacts_inp(contacts_data)">Cancel</button>
                        <button type="submit" name="upd_contacts">Submit</button>
                      </div>
                    </form>
                    
                  </div>
                 
                </div>
            </div>
           
    </div>
    <div class="card-content">
              <div class="card-content-title">
                <h6>Addess</h6>
              </div>
              <div class="card-content-text">
                <p id="address"></p>
              </div>
            <div class="card-content">
              <div class="card-content-title">
                <h6>Phone Number</h6>
              </div>
              <div class="card-content-text">
                <p>
                  <i class='bx bxs-phone'></i>
                  <span id="pn1"></span>
                </p>
                <p>
                  <i class='bx bxs-phone'></i>
                  <span id="pn2"></span>
                </p>
              </div>
            </div>
            <div class="card-content">
              <div class="card-content-title">
                <h6>E-mail</h6>
              </div>
              <div class="card-content-text">
                <p id="email"></p>
              </div>
            </div>
        </div>
      </div>
    </header>

    <!-- header ends -->

    <!-- script starts -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>

    <script>
      
    </script>
    
    <script src="script/script.js"></script>
  </body>
</html>
