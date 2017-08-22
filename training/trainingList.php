<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../Config/database.php';
include_once '../objects/Training.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$Training = new Training($db);
 
// query products
$stmt = $Training->read();
$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){
 
    // products array
    $Training_arr=array();
    $Training_arr["Training"]=array();
 
    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        extract($row);
 
        $Training_item=array(
            "id" => $id,
            "title  " => $title,
            "description" => $description,
            "imgp" => $imgp
        );
 
        array_push($Training_arr["Training"], $Training_item);
    }
 
    echo json_encode($Training_arr);
}
 
else{
    echo json_encode(
        array("message" => "No Training found.")
    );
}
?>