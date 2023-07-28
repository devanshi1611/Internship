<?php
include("../api/connection.php");

$pass = $_POST['pass'];
$email = $_POST['email'];

$update = "UPDATE register SET pass = '$pass' WHERE email = '$email'";

$qry = mysqli_query($conn, $update);

if ($qry) {
    $response['status'] = true;
    $response['message'] = "reset sucessfully";
} else {
    $response['status'] = false;
    $response['message'] = "Reset failed";
}

// header('Content-Type: application/json; charset=UTF-8');
echo json_encode($response);
?>