<?php 
require('include/db.php');
require('include/essentials.php');

// Code for deletion
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = preg_replace('/\D/', '', $id);
    echo "Deleting record with ID: " . $id . "<br>"; // Debugging statement
    $sql = mysqli_query($con, "DELETE FROM `products` WHERE `id` = '$id'");
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
