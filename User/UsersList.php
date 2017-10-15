<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 

// get database connection
include_once '../config/database.php';
 
// instantiate User object
include_once '../objects/User.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$users = new User($db);
 
// query products
$stmt = $users->read();
$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){
 
    // products array
    $users_arr=array();
    $users_arr["users"]=array();
 
    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        extract($row);
 
        $users_item=array(
            "uid" => $uid,
            "uname" => $uname,
            "fbuid" => $fbuid,
            "country" => $country,
            "level" => $level,
        );
 
        array_push($users_arr["users"], $users_item);
    }
 
    echo json_encode($users_arr);
}
 
else{
    echo json_encode(
        array("message" => "No users found.")
    );
}
?>