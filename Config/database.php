<?php
class Database{

    // specify your Local database credentials
    private $host = "localhost";
    private $db_name = "ivocaldb";
    private $username = "root";
    private $password = "root";

    // specify your sever database credentials
    // private $host = "localhost";
    // private $db_name = "steadfe6_IV";
    // private $username = "steadfe6_damith";
    // private $password = "25638621";

    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
            //echo "Connection up";
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>