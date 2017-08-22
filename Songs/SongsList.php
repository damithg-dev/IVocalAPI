<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../Config/database.php';
include_once '../objects/Song.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$Songs = new Song($db);
 
// query products
$stmt = $Songs->read();
$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){
 
    // products array
    $Songs_arr=array();
    $Songs_arr["records"]=array();
 
    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        extract($row);
 
        $Songs_item=array(
            "id" => $id,
            "name" => $name,
            "length" => $length,
            "description" => $decription,
            "genre" => $genre,
            "file" => $file,
            "img" => $img
        );
 
        array_push($Songs_arr["records"], $Songs_item);
    }
 
    echo json_encode($Songs_arr);
}
 
else{
    echo json_encode(
        array("message" => "No Songs found.")
    );
}
?>