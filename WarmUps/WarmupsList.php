<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../Config/database.php';
include_once '../objects/Warmups.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$Warmups = new Warmups($db);
 
// query products
$stmt = $Warmups->read();
$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){
 
    // products array
    $Warmups_arr=array();
    $Warmups_arr["Warmups"]=array();
 
    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        extract($row);
 
        $Warmups_item=array(
            "id" => $id,
            "title  " => $title,
            "description" => $description,
            "imgp" => $imgp
        );
 
        array_push($Warmups_arr["Warmups"], $Warmups_item);
    }
 
    echo json_encode($Warmups_arr);
}
 
else{
    echo json_encode(
        array("message" => "No Warmups found.")
    );
}
?>