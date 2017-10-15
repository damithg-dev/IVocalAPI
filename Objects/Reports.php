<?php
class Reports{
 

    // database connection and table name
    private $conn;
    private $table_name = "reports";
 
    // object properties
    public $rid;
    public $uid;
    public $sid;
    public $score;
    public $comments;
    public $song_Category;
 
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

function create(){

 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                uid=:uid, sid=:sid, score=:score , comments=:comments, songcategory=:songcategory";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->uid=htmlspecialchars(strip_tags($this->uid));
    $this->sid=htmlspecialchars(strip_tags($this->sid));
    $this->score=htmlspecialchars(strip_tags($this->score));
    $this->comments=htmlspecialchars(strip_tags($this->comments));
    $this->songcategory=htmlspecialchars(strip_tags($this->songcategory));
 
    // bind values
    $stmt->bindParam(":uid", $this->uid);
    $stmt->bindParam(":sid", $this->sid);
    $stmt->bindParam(":score", $this->score);
    $stmt->bindParam(":comments", $this->comments);
    $stmt->bindParam(":songcategory", $this->songcategory);
 
    // execute query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}


}



?>