<?php 

include "connection.php";

$name = $_POST['name'];
$er_num = $_POST['er_num'];
$sub = $_POST['sub'];
$marks = $_POST['marks'];

$query = "INSERT INTO student 
          VALUES ('$name', '$er_num', '$sub', '$marks')";

if(mysqli_query($conn, $query)){

    $row = [];
    $row[] = [
        'Status' =>  "Inserted Succesfully."
    ];
} else {

    $row = [];
    $row[] = [
        'Status' =>  "Insertion Failed."
    ];
}

print json_encode($row);

?>