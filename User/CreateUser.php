<?php


// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate User object
include_once '../objects/User.php';
 
$database = new Database();
$db = $database->getConnection();
$User = new User($db);
 
// get posted data
//$data = json_decode(file_get_contents("php://input"));
$json = file_get_contents('php://input');
$data = json_decode($json);


// set User property values
$User->uname = $data->uname;
$User->fbuid = $data->fbuid;
$User->token = $data->token;
$User->created = date('Y-m-d H:i:s');

if($User->create()){
    echo '{';
        echo '"message": "User was created."';
    echo '}';
}
 
// if unable to create the User, tell the user
else{
    echo '{';
        echo '"message": "Unable to create User."';
    echo '}';
}
?>