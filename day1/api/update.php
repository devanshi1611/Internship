<?php 

include "connection.php";

$er_num = $_POST['er_num'];
$marks = $_POST['marks'];

$query = "UPDATE student SET marks = '$marks' WHERE er_num = '$er_num'";

if(mysqli_query($conn, $query)){

    $row = [];
    $row[] = [
        'Status' =>  "Updated Succesfully."
    ];
} else {

    $row = [];
    $row[] = [
        'Status' =>  "Updation Failed."
    ];
}

print json_encode($row);

?>