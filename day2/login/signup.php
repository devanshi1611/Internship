<?php

include "../api/connection.php";

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['num'];
$pass = $_POST['pass'];
$ps = $_POST['ps'];

if(!($pass === $ps)){
    
    $row = [];
    $row[] = [
        'Error' => "not match",
        'Message' => "Both pass not matched."
    ];
    
    print json_encode($row);
    die();
}

$quea = mysqli_query($conn, "SELECT * FROM register WHERE num = '$number' OR email = '$email'");

if (mysqli_num_rows($quea) > 0) {

    $row = [];
    $row[] = [
        'Message' => "user already exist, please login to continue..."
    ];

    print json_encode($row);
    die();

} else {

    $query = "INSERT INTO register
          VALUES ('$name', '$email', '$number', '$pass')";

    if (mysqli_query($conn, $query)) {

        $row = [];
        $row[] = [
            'Status' => "Data Inserted Succesfully."
        ];
    } else {

        $row = [];
        $row[] = [
            'Status' => " Data Insertion Failed."
        ];
    }

    print json_encode($row);
}

?>