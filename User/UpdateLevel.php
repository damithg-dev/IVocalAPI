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

 
// get database connection
$database = new Database();
$db = $database->getConnection();
$User = new User($db);

 
// get posted data
//$data = json_decode(file_get_contents("php://input"));
$json = file_get_contents('php://input');
$data = json_decode($json);
 
// set ID property of User to be edited
$User->id = $data->id;
$User->level = $data->level;
 
// update the User
if($User->updateLevel()){
    echo '{';
        echo '"message": "User was updated."';
    echo '}';
}
 
// if unable to update the User, tell the user
else{
    echo '{';
        echo '"message": "unable to update user."';
    echo '}';
}
?>