<?php

include "connection.php";

$username = $_POST['username'];
$number = $_POST['number'];
$email = $_POST['email'];

$validation ="";

$quea = mysqli_query($conn, "SELECT * FROM emp WHERE number = '$number'");

if (mysqli_num_rows($quea) > 0) {

    $row = [];
    $row[] = [
        'Error' => "Number already Exist!.",
        'Message' => "User other Number."
    ];

    print json_encode($row);
    $validation = "false";

}

$que = mysqli_query($conn, "SELECT * FROM emp WHERE email = '$email'");

if (mysqli_num_rows($que) > 0) {

    $row = [];
    $row[] = [
        'Error' => "Email ID already Exist!.",
        'Message' => "User other Email ID."
    ];

    print json_encode($row);
    $validation = "false";

}

if (!$validation) {

    $query = "INSERT INTO emp 
          VALUES ('$username', '$number', '$email')";

    if (mysqli_query($conn, $query)) {

        $row = [];
        $row[] = [
            'Status' => "Inserted Succesfully."
        ];
    } else {

        $row = [];
        $row[] = [
            'Status' => "Insertion Failed."
        ];
    }

    print json_encode($row);
}

?>