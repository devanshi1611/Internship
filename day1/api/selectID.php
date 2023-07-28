<?php 

include "connection.php";

$er_num = $_POST['er_num'];

$querys = mysqli_query($conn, "SELECT * FROM student WHERE er_num = $er_num");

$rows = array();

while($i = mysqli_fetch_assoc($querys)){

    $rows[] = $i ;
   
} 

 print json_encode($rows);

?>