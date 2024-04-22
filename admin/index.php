<?php 
    session_start();
    require('include/db.php');
    require('include/essentials.php');
    session_regenerate_id(true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    
</head>
<body>
    <div class="login--form">
        <div class="container">
            <form method="post">
                <h4>Admin Login</h4>
                <div>
                    <div class="login--form__input">
                        <input type="text" name="admin_name" placeholder="Admin Name" required>
                    </div>
                    <div class="login--form__input">
                        <input type="password" name="admin_password" placeholder="Password" required>
                    </div>
                    <div class="log--form__submit">
                        <button name="login">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php 
    if(isset($_POST['login'])){
        $frm_data=filteration($_POST);
        $query="SELECT * FROM `admin_cred` WHERE `admin_name`=? AND `admin_password`=?";
        $values=[$frm_data['admin_name'],$frm_data['admin_password']];
        $res=select($query,$values,"ss");
        if($res->num_rows==1){
            $row=mysqli_fetch_assoc($res);
            session_start();
            $_SESSION['adminLogin']=true;
            $_SESSION['adminId']=$row['sr_no'];
            redirect('admindashboard.php');
        }else{
            echo('error'.'login failed -Invalid input');
        }
    }
    
    ?>
</body>
</html>