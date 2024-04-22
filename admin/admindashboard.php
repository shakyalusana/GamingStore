<?php 

  require('include/essentials.php');
  adminLogin();
  session_regenerate_id(true);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
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
  </head>
  <body>
    <!-- nav-banner starts -->
    <nav>
      <div class="nav-banner">
        <div class="nav-logo">
          <span style="font-weight: 800">Dashboard </span>
        </div>
        <div class="profile-content">
          <img src="images/blogs.png" alt="profile-pic" />
          <span>Lusana Shakya</span>
          <button>Edit</button>
        </div>
        <div class="nav-options">
          <span><i class="bi bi-grid-1x2"></i><a href="#">Dashboard</a></span>
          <span
            ><i class="bi bi-card-checklist"></i><a href="feature.php">Features</a></span>
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
          <input type="text" class="search" placeholder="Search" /><i
            class="bi bi-search"
          ></i>
        </div>
        <div class="login-content">
          <a href="logout.php" style="margin-right: 0">Logout</a>
        </div>
      </div>
      <div class="content--table">
        <table border="1">
          <thead>
            <tr>
              <th>ID</th>
              <th>Car name</th>
              <th>Car Brand</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Ferari</td>
              <td>Swastik</td>
              <td><button>Edit</button></td>
              <td><button>Delete</button></td>
            </tr>
          </tbody>
        </table>
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
  </body>
</html>
