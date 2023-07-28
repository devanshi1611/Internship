<?php
include("../api/connection.php");

$otp = $_POST['otp'];
$email = $_POST['email'];

$loginqry = "SELECT * FROM `otp` WHERE `email`='$email' AND `otp`=$otp";

$qry = mysqli_query($conn, $loginqry);
if($qry){
    $response['status'] = "success";
}
else{
    $response['status'] = "faild";
}

// header('Content-Type: application/json; charset=UTF-8');
echo json_encode($response);

?>