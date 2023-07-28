<?php

$server = "localhost";
$username = "root";
$password = "";
$db_name = "project";

$conn = mysqli_connect($server, $username, $password, $db_name);

if (!$conn) {
    die("connection failed!" . mysqli_connect_error());
}


$num = $_POST['id'];

$query = "DELETE FROM student WHERE er_num = '$num' ";

if (mysqli_query($conn, $query)) {
    echo "record deleted.";
} else {
    echo "error : " . mysqli_error($conn);
}


mysqli_close($conn);

?>