<?php

$servername = "localhost"; 
$username = "root";
$password = "";
$database = "store";


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD']== "POST") {
    
    $username = $_POST['username']; 
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    
    
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $hashed_confirmpassword = password_hash($confirmpassword, PASSWORD_DEFAULT);
    
    
    $sql = "INSERT INTO khelum (username, email, password, confirmpassword) VALUES ('$username', '$email', '$hashed_password', '$hashed_confirmpassword')";
    
    if (mysqli_query($conn,$sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
echo "hello";
if (isset($_POST["submit"])) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'lusanalati@gmail.com';
    $mail->Password = 'dgbmqeixwcukhbyk';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    echo "hello";
    $mail->setFrom('lusanalati@gmail.com');
    $mail->addAddress($_POST['email']);
    $mail->isHTML(true);
    $mail->Subject = "Register";
    $mail->Body = "Your Total Amount is Rs 100";
    $mail->send();

    echo
        "
    <script>
    alert('Sent Successfully');
    </script>";
}

?>