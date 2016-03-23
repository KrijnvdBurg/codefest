<?php


require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['user_id'] && isset($_POST['startDate'] && isset($_POST['startDate'] && isset($_POST['endDate'] && isset($_POST['status'])) {
    $key = $db->savePeriodOffInput($_POST['user_id'], isset($_POST['startDate'] , isset($_POST['startDate'], isset($_POST['endDate'] , isset($_POST['status']);

    if ($key != false) {
        $response["error"] = FALSE;
    }
    echo json_encode($response);
    
} else {
        // required post params is missing
        $response["error"] = TRUE;
        $response["error_msg"] = "Required parameter is missing!";
        echo json_encode($response);
}
?>