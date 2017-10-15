<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../Config/database.php';
include_once '../objects/Report.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$Report = new Reports($db);
 
// query products
$stmt = $Report->read();
$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){
 
    // products array
    $Report_arr=array();
    $Report_arr["Report"]=array();
 
    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        extract($row);
 
        $Report_item=array(
            "rid" => $rid,
            "uid" => $uid,
            "sid" => $sid,
            "score" => $score,
            "comments" => $comments,
            "songcategory" => $songcategory
        );
 
        array_push($Report_arr["Report"], $Report_item);
    }
 
    echo json_encode($Report_arr);
}
 
else{
    echo json_encode(
        array("message" => "No Report found.")
    );
}
?>