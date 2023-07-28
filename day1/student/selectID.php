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
$rows = array();

$que = mysqli_query($conn, "SELECT * FROM student WHERE er_num = '$er_num'");

if ($i = mysqli_fetch_assoc($que)) {
    $rows[] = $i;
} else {
    echo "error : " . mysqli_error($conn);
}

print json_encode($rows);
mysqli_close($conn);

?>