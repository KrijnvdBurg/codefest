<?php


require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['crypt_key'])) {

    // receiving the post params

    // get the user by email and password
$key = $db->getKeyPermissions();

if ($key != false) {
    $response["error"] = FALSE;
for($i = 0; $i < count($key); $i++){
    $response["key"][$i] = array();   
    $response["key"][$i]["endpoint_name"] = $key[$i]["endpoint_name"]; 
    $response["key"][$i]["endpoint_description"] = $key[$i]["endpoint_description"];
    $response["key"][$i]["live"] = $key[$i]["live"];
    $response["key"][$i]["activity_name"] = $key[$i]["activity_name"];

}
echo json_encode($response);    } else {
        // key is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "else is thrown";
        echo json_encode($response);
    }
} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter is missing!";
    echo json_encode($response);
}
?>