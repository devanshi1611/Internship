<?php

$server = "localhost";
$username = "root";
$password = "";
$db_name = "project";

$conn = mysqli_connect($server, $username, $password, $db_name);

if (!$conn) {
    die("connection failed!" . mysqli_connect_error());
}

    $name = $_POST["name"];
    $er_num = $_POST["er_num"];
    $sub = $_POST["sub"];
    $marks = $_POST["marks"];

    $query = "INSERT INTO student
              VALUES ('$name','$er_num','$sub','$marks')";

    if (mysqli_query($conn, $query)) {
        echo "new record inserted.";
    } else {
        echo "error : " . mysqli_error($conn);
    }

mysqli_close($conn);

?>