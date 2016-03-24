<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['username']) && isset($_POST['password'])) {

    // receiving the post params
    $email = $_POST['username'];
    $password = $_POST['password'];

    // get the user by email and password
    $user = $db->getUserByEmailAndPassword($email, $password);

    if ($user != false) {
        // use is found
        $response["error"] = FALSE;
        $response["id"] = $user["id"];
        $response["user"]["id"] = $user["id"];
        $response["user"]["username"] = $user["username"];
        $response["user"]["role_id"] = $user["role_id"];
        $response["user"]["firstname"] = $user["firstname"];
        $response["user"]["lastname"] = $user["lastname"];
        $response["user"]["department_id"] = $user["department_id"];
        $response["user"]["ptf_id"] = $user["ptf_id"];
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Login credentials are wrong. Please try again!";
        echo json_encode($response);
    }
} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters email or password is missing!";
    echo json_encode($response);
}
?>

