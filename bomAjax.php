<?php
session_start();


function uploadFile($file)
{
    // Specify the target directory for uploads
    $targetDir = "uploads/";

    // Create the directory if it doesn't exist
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    // Get the file name and target file path
    $fileName = basename($file['name']);
    $targetFilePath = $targetDir . $fileName;

    // Check if the file is an image
    $check = getimagesize($file['tmp_name']);
    if ($check === false) {
        return ["success" => false, "message" => "File is not an image."];
    }

    // Check for file size (limit to 5MB in this example)
    if ($file['size'] > 5000000) {
        return ["success" => false, "message" => "File is too large. Maximum size is 5MB."];
    }

    // Allow certain file formats
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    if (!in_array($fileType, $allowedTypes)) {
        return ["success" => false, "message" => "Only JPG, JPEG, PNG, and GIF files are allowed."];
    }

    // Attempt to move the uploaded file to the target directory
    if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
        return ["success" => true, "message" => "The file has been uploaded.", "fileName" => $fileName];
    } else {
        return ["success" => false, "message" => "Sorry, there was an error uploading your file."];
    }
}





$con = new mysqli("localhost", "root", "Algo@123", "for_office");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


// if ($_SERVER['REQUEST_METHOD'] == 'POST') {





if (isset($_POST['createBomHead'])) {



    $user = "admin";
    $currentDateTime = date('Y-m-d H:i:s');

    // $record_no = $_POST['header_id'];
    $item_code = $_POST['item_name'];
    $item_name = $_POST['item_name'];
    $percentage = $_POST['percentage'];
    $wharehouse_location = $_POST['wharehouse_'];
    $revision = $_POST['revision'];
    $products = $_POST['products'];
    $img_path = $_POST['filename'];
    $organizin_mapping = $_POST['organizin_mapping'];

    $sql = "INSERT INTO `bom_hedar_detail` (`item_name`, `percentage`, `wharehouse_`, `revision`, `products`, `organizin_mapping`, `created_by`,`img_path`) 
                VALUES (?, ?, ?, ?, ?, ?, ?,?);";

    $stmt = $con->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssssssss", $item_name, $percentage, $wharehouse_location, $revision, $products, $organizin_mapping, $user,$img_path);

    if ($stmt->execute()) {

        $response['success'] = true;
        $response['message'] = 'Header Data inserted Successfully ';
        $response['requested_data'] = $_POST;
        $response['Record_no'] = $stmt->insert_id;
    } else {
        $response['success'] = false;
        $response['message'] = 'Header Data not inserted';
    }







    $stmt->close();



    echo json_encode($response);

}

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {



if (isset($_POST['bom_creation_form'])) {


    // include('../db.php');
    // include('../dbconnection/db.php');

    $inputs_data = $_POST['inputsData'];
    $bom_id = $_POST['bom_id'];




    foreach ($inputs_data as $key => $value) {


        // $user = $_SESSION['username'];
        $user = 'admin';
        $datetime = date('Y-m-d');
        $item_code = $value['item_code'];
        $item_name = $value['item_name'];
        $percentage = $value['percentage_line'];
        $Qty = $value['quantity'];
        $process_seq = $value['process_seq'];
        $total = 00;
        $Price = 00;








        $stmt = "INSERT INTO `for_office`.`bom_line_detail` (`bom_id`, `item_code`, `item_name`, `quantity`, `price`, `total` , `process_seq` , `created_by`,`created_date`,`percentage_line`)
                     VALUES (?, ?, ?, ?, ?, ?,?,?,?,?);";


        $stmt = $con->prepare($stmt);

        $stmt->bind_param("ssssssssss", $bom_id, $item_code, $item_name, $Qty, $Price, $total, $process_seq, $user, $datetime,$percentage);




        if ($stmt->execute()) {


            $response['success'] = true;
        } else {
            $response['success'] = false;
        }







    }







    $response['data'] = $_POST;











    $con->close();





    echo json_encode($response);
}











// }

















?>