<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../Config/database.php';
include_once '../objects/Lessons.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$Lessons = new Lessons($db);
 
// query products
$stmt = $Lessons->read();
$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){
 
    // products array
    $Lessons_arr=array();
    $Lessons_arr["Lessons"]=array();
 
    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        extract($row);
 
        $Lessons_item=array(
            "id" => $id,
            "title  " => $title,
            "description" => $description,
            "imgp" => $imgp
        );
 
        array_push($Lessons_arr["Lessons"], $Lessons_item);
    }
 
    echo json_encode($Lessons_arr);
}
 
else{
    echo json_encode(
        array("message" => "No Lessons found.")
    );
}
?>