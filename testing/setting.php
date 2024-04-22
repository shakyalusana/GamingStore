<?php
require('include/db.php');
require('include/essential.php');
adminLogin();
session_regenerate_id(true);

// Check if form is submitted for updating contacts
if(isset($_POST['upd_contacts'])){
    $frm_data = filteration($_POST);
    
    $q = "UPDATE `contact_details` SET `address`=?, `pn1`=?, `pn2`=?, `email`=? WHERE `sr_no`=?";
    
    // Use parameterized query
    $values = [
        $frm_data["address"], 
        $frm_data['pn1'], 
        $frm_data['pn2'], 
        $frm_data['email'], 
        1 // Assuming sr_no is always 1
    ];

    $res = update($q, $values, 'ssssi');
    
    if($res !== false) {
        echo "Data updated successfully";
    } else {
        echo "Error updating data: " . mysqli_error($con);
    }
}

// Fetch contact details from the database
$contact_details = select("SELECT * FROM `contact_details` WHERE `sr_no`=?", [1], 'i');

// Display contact details
if($contact_details->num_rows > 0) {
    $row = $contact_details->fetch_assoc();
    // Output contact details
    echo "Address: " . $row["address"] . "<br>";
    echo "Phone Number 1: " . $row["pn1"] . "<br>";
    echo "Phone Number 2: " . $row["pn2"] . "<br>";
    echo "Email: " . $row["email"] . "<br>";
} else {
    echo "No contact details found";
}
?>

<!-- HTML form for updating contact details -->
<form method="post" action="">
    <label for="address">Address:</label>
    <input type="text" name="address" id="address" value="<?php echo $row['address']; ?>"><br>
    <label for="pn1">Phone Number 1:</label>
    <input type="text" name="pn1" id="pn1" value="<?php echo $row['pn1']; ?>"><br>
    <label for="pn2">Phone Number 2:</label>
    <input type="text" name="pn2" id="pn2" value="<?php echo $row['pn2']; ?>"><br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>"><br>
    <input type="submit" name="upd_contacts" value="Update">
</form>
