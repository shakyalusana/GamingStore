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
    $mail->addAddress('shashank10singh2002@gmail.com');
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