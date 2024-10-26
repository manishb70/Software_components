<?php
$conn = mysqli_connect("localhost", "root", "Algo@123", "for_office");

if (!$conn) {
    die(json_encode(["success" => false, "message" => "Connection failed: " . mysqli_connect_error()]));
}



if (isset($_REQUEST['srch'])) {
    $searchData = $conn->real_escape_string($_REQUEST['srch']); // Sanitize input to prevent SQL injection

    $db = $conn->query("SELECT *
FROM for_office.bom_hedar_detail a
INNER JOIN for_office.bom_line_detail b ON a.header_id = b.bom_id
WHERE a.header_id = '$searchData'"); // Use quotes for string values
    if ($db) {
        // $data = mysqli_fetch_assoc($db);
        if ($db) {
            $response["success"] = true;
            $response["message"] = "Data retrieved successfully";


                        
            $rowData = [];


            while ($row = mysqli_fetch_assoc($db)) {

                $rowData[] = $row;
            }




            $response['data'] = $rowData;
        } else {
            $response['success'] = false;
            $response['message'] = "No results found.";
        }
    } else {
        $response['success'] = false;
        $response['message'] = "Query failed: " . mysqli_error($conn);
    }
}

$conn->close();
echo json_encode($response);

?>