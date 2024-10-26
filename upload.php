<?php
header('Content-Type: application/json'); // Set the content type to JSON

$response = []; // Initialize an array for the response

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDirectory = 'uploads/';
    $fileTmpPath = $_FILES['bomMainImg']['tmp_name'];
    $currentDateTime = date('Y-m-d_H-i-s'); // Use underscores and hyphens for filename safety
    $fileName = basename($_FILES['bomMainImg']['name']);
    $fileName .= '_' . $currentDateTime; // Append current date and time with an u
    $fileName .= '.png'; // Append current date and time with an u
    
    $targetFilePath = $targetDirectory . $fileName;


    // Create target directory if it doesn't exist
    if (!is_dir($targetDirectory)) {
        mkdir($targetDirectory, 0755, true);
    }

    // Move the uploaded file
    if (move_uploaded_file($fileTmpPath, $targetFilePath)) {
        $response['status'] = 'success';
        $response['message'] = 'File uploaded successfully';
        $response['filename'] = $fileName; // Include the uploaded filename
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Unable to upload the file';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method';
}

// Output the JSON response
echo json_encode($response);
?>
