<?php
require('../include/db.php');
require('../include/essentials.php');
adminLogin();

if (isset($_POST['add_member'])){
    $frm_data=filteration($_POST);
    $q="INSERT INTO `features`(`name`) VALUES (?)";
    $values=[$frm_data['name']];
    $res=insert($q,$values,'s');
    if ($res > 0) {
        echo "Data inserted successfully!";
    } else {
        echo "Failed to insert data.";
    } 
}

    
// if(isset($_POST['rem_features'])){
//     echo"hello world";
//     $frm_data=filteration($_POST);
//     $feature_id = key($_POST['rem_features']); // Get the feature ID to delete
//     $values=[$feature_id];

//     $pre_q="SELECT * FROM `features` WHERE `f_id`=?";
//     $res=select($pre_q,$values,'i');
//     $img=mysqli_fetch_assoc($res);

//      // Delete images
//      $deleted_images = 0;
//      if(deleteImage($img['Vehicle_img_1'], ABOUT_FOLDER))
//          $deleted_images++;
//      if(deleteImage($img['Vehicle_img_2'], ABOUT_FOLDER))
//          $deleted_images++;
//      if(deleteImage($img['Vehicle_img_3'], ABOUT_FOLDER))
//          $deleted_images++;
//      if(deleteImage($img['Vehicle_img_4'], ABOUT_FOLDER))
//          $deleted_images++;
//      if(deleteImage($img['Vehicle_img_5'], ABOUT_FOLDER))
//          $deleted_images++;

//      // Delete data from the database
//      $q = "DELETE FROM `features` WHERE `f_id`=?";
//      $res = delete($q, $values, "i");
     
//      if ($res > 0) {
//          echo "Data and $deleted_images images deleted successfully!";
//      } else {
//          echo "Failed to delete data.";
//      }
//      header('Location: /projects/carrental/admin/feature.php');
// }
  
// Check if the form for removing features is submitted
if(isset($_POST['rem_member'])){
    // Get the feature ID to delete
    $feature_id = $_POST['rem_member'];
    
    // Prepare and execute the deletion query
    $q = "DELETE FROM `features` WHERE `f_id`=?";
    $res = delete($q, [$feature_id], "i");
    
    // Check if deletion was successful
    if ($res > 0) {
        echo "1"; // Send success response
    } else {
        echo "0"; // Send error response
    }
    
}

// get_room
if(isset($_POST['get_feature'])){
    $frm_data=filteration($_POST);
    $res=select("SELECT * FROM `features` WHERE `f_id`=?",[$frm_data['get_feature']],'i');

    $featuredata=mysqli_fetch_assoc($res);
   $featuredata=json_encode($featuredata);
    echo $featuredata;

}

