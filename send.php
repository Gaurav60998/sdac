<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\login\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\login\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\login\PHPMailer-master\src\SMTP.php';


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
    $mail->setFrom($email, 'gauravdakare8@gmail.com');
    $mail->addAddress('gauravdakare0@gmail.com', 'demo');
    $mail->addReplyTo($email, 'labdemo');


    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email from Localhost';
    $mail->Body    = 'This is a test email sent from localhost using PHPMailer and Gmail SMTP.';

    $mail->send();
    echo 'Email sent successfully';
} catch (Exception $e) {
    echo 'Failed to send email: ', $mail->ErrorInfo;
}
