<?php 

include "connection.php";

$er_num = $_POST['er_num'];

$query = "DELETE FROM student WHERE er_num = $er_num";

if(mysqli_query($conn, $query)){

    $row = [];
    $row[] = [
        'Status' =>  "Deleted Succesfully."
    ];
} else {

    $row = [];
    $row[] = [
        'Status' =>  "Deletion Failed."
    ];
}

print json_encode($row);

?>