<?php
class warmups{
 

    // database connection and table name
    private $conn;
    private $table_name = "warmups";
 
    // object properties
    public $wid;
    public $wtitle;
    public $wdescription;
    public $wimgp;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read warm ups
function read(){
 
    // select all query
    $query = "SELECT * FROM " . $this->table_name . "";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}


}



?>