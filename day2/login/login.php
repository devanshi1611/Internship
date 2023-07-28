<?php

include "../api/connection.php";

$email = $_POST['email'];
$pass = $_POST['pass'];

$quea = mysqli_query($conn, "SELECT * FROM register WHERE pass = '$pass' AND email = '$email'");

if (mysqli_num_rows($quea) > 0) {

    $row = [];
    $row[] = [
        'Message' => "Login Successfully."
    ];

} else {

    $row = [];
    $row[] = [
        'Message' => "Incorrect Data."
    ];
}

print json_encode($row);

?>