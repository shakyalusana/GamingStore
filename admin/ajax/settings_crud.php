<?php
require('../include/db.php');
require('../include/essentials.php');
adminLogin();

if(isset($_POST['upd_contacts'])){
    $frm_data = filteration($_POST);
    print_r("From this point");
    print_r($frm_data);
    
    $q = "UPDATE `contact_details` SET `address`=?,`pn1`=?, `pn2`=?, `email`=?, WHERE `sr_no`=?";
    
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
}

if (isset($_POST['get_contacts'])) {
    $q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
    $value = [1];
    $res = select($q, $value, "i");
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    echo $json_data;
}
?>
