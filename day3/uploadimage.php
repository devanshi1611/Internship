<?php

include('../day1/api/connection.php');

$file = $_FILES['file1'];
$id = $_POST['id'];
$upload_dir = "upload/";

$file_name = $_FILES["file1"]["name"];
$file_tmp_name = $_FILES["file1"]["tmp_name"];
$error = $_FILES["file1"]["error"];

$filepath = $upload_dir . $file_name;
if (file_exists($filepath)) {
    $response['Error'] = "File Already Exist!";
    $response['Message'] = "Use Different File.";

} else {
    if (move_uploaded_file($file_tmp_name, $filepath)) {
        $response = array(
            "message" => "File uploaded successfully",
            "location" => $filepath
        );

        $que = mysqli_query($conn, "UPDATE emp SET img = '$filepath' WHERE id = '$id'");

        if ($que) {
            $response['error'] = "Database Insertion Done";
        } else {
            $response['error'] = 'Failed to insert data into database';
        }

    } else {
        $response = array(
            "status" => "error",
            "error" => true,
            "message" => "Error uploading the file!"
        );
    }
}

echo json_encode($response)
;

?>