<?php

include('../day1/api/connection.php');

$id = $_POST['id'];

$display = mysqli_query($conn, "SELECT * FROM emp WHERE id = '$id'");

while ($i = mysqli_fetch_assoc($display)) {
    $rows[] = $i;
}

print json_encode($rows);

?>