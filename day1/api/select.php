<?php 

include "connection.php";

$querys = mysqli_query($conn, "SELECT * FROM student");

$rows = array();

while($i = mysqli_fetch_assoc($querys)){

    $rows[] = $i ;
   
} 

print json_encode($rows);

?>