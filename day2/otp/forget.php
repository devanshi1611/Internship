<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include("../api/connection.php");

$email = $_POST['email'];

$que = mysqli_query($conn, "SELECT * FROM register WHERE email = '$email'");

if (mysqli_num_rows($que)) {

    $userObj = mysqli_fetch_assoc($que);
    $response['status'] = "success";

    $randomNum = rand(1000, 9999);
    echo "OTP : " . $randomNum;

    // ggl
    $sender_name = "meet bhai";
    $sender_email = "meetbunha@gmail.com";

    //email send kervana data : user input
    $receiver_email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $username = "meetbunha@gmail.com";
    $password = "eaeaavmepumhangx";

    // mail's data
    $mail->setFrom($sender_email, $sender_name);
    $mail->Username = $username;
    $mail->Password = $password;
    $mail->Subject = $subject;
    // $mail->Message
    $mail->msgHTML("OTP sent by System : " . $randomNum);
    $mail->addAddress($receiver_email);

    if (!$mail->send()) {
        $error = "Mailer Error: " . $mail->ErrorInfo;
        echo 'ERROR :' . $error;
    } else {
        echo 'Message sent.';
    }

    $insertQry = "INSERT INTO `otp` VALUES ('$receiver_email','$randomNum')";
    mysqli_query($conn, $insertQry);

} else {

    $response['status'] = "fail";
    $response['error'] = "unsuccess";

}

echo json_encode($response);

?>