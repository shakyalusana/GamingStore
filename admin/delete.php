<?php 
require('include/db.php');
require('include/essentials.php');

// Code for deletion
if(isset($_GET['f_id'])) {
    $rid = $_GET['f_id'];
    $rid = preg_replace('/\D/', '', $rid);
    echo "Deleting record with ID: " . $rid . "<br>"; // Debugging statement
    $sql = mysqli_query($con, "DELETE FROM `car_feature` WHERE `f_id` = '$rid'");
    $affected_rows = mysqli_affected_rows($con); // Get the number of affected rows
    if ($sql) {
        if ($affected_rows > 0) {
            echo "Record deleted successfully";
        } else {
            echo "No record found with ID: " . $rid;
        }
        echo "<script>window.location.href = 'feature.php'</script>"; 
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
    mysqli_close($con);    
} 
?>
