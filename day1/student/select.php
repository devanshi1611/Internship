<?php

$server = "localhost";
$username = "root";
$password = "";
$db_name = "project";

$conn = mysqli_connect($server, $username, $password, $db_name);

if (!$conn) {
    die("connection failed!" . mysqli_connect_error());
}

$rows = array();

$que = mysqli_query($conn, "SELECT * FROM student");

while ($i = mysqli_fetch_assoc($que)) {
    $rows[] = $i;
}

print json_encode($rows);
mysqli_close($conn);

?>