<?php

$server = "localhost";
$username = "root";
$password = "";
$db_name = "project";

$conn = mysqli_connect($server, $username, $password, $db_name);

if (!$conn) {
    die("connection failed!" . mysqli_connect_error());
}

$er_num = $_POST['er_num'];
$marks = $_POST['marks'];

$query = "UPDATE student SET marks = $marks WHERE er_num = $er_num";

if (mysqli_query($conn, $query)) {
    echo "record updated.";
} else {
    echo "error : " . mysqli_error($conn);
}

mysqli_close($conn);

?>