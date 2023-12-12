<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\login\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\login\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\login\PHPMailer-master\src\SMTP.php';

$name=$_POST["name"];
$uemail=$_POST["email"];
$uname=$_POST["uname"];
$pass=$_POST["pass"];

$h ="localhost";
$u ="root";
$p ="";
$db ="test1";

$conn = mysqli_connect($h,$u,$p,$db);

if (!$conn) {
    echo "Not COnnected". mysqli_connect_error();
} 

$sql = "INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`) VALUES (NULL, '$name', '$email', '$uname', '$pass');";

if (mysqli_query($conn,$sql)) {
    $mail = new PHPMailer(true);

    $email = 'gauravdakare8@gmail.com';
    $password = 'wgmc cvqn bbeb mzwz';
    
    try {
        // Configure SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $email;
        $mail->Password = $password;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
    
        // Recipient information
        $mail->setFrom($email, 'lab demo');
        $mail->addAddress($uemail, 'demo');
        $mail->addReplyTo($email, 'labdemo');
    
    
        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Test Email from Localhost';
        $mail->Body    = 'register suessfully in website.';
    
        $mail->send();
        header("Location: login.php");
    } catch (Exception $e) {
        echo 'Failed to send email: ', $mail->ErrorInfo;
    }
} else {
    echo "Something went wrong". mysqli_error($conn);
}

mysqli_close($conn);

?>