<?php

// class Dbh {

//     private $servername;
//     private $username;
//     private $password;
//     private $dbname;
//     private $charset;

//     public function connect() {
//         $this->servername = "localhost";
//         $this->username = "root";
//         $this->password = "";
//         $this->dbname = "todo";
//         $this->charset = "latin1_swedish_ci";
        

//         try {
//             $dsn = "mysql:host=".$this->servername.";dbname=".
//             $this->dbname;
    
//             $pdo = new PDO($dsn, $this->username, $this->password);
//             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//             return $pdo;

//         } catch (PDOException $e){
//             echo "Connection failed: ".$e->getMessage();
//         }
       
//     }

// } //
 

class Dbh{
  
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "todo";
    private $username = "root";
    private $password = "";
    public $conn;
  
    // get the database connection
    public function connect(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
    
    public function getData($params=NULL){
        $data = $this->connect()->prepare($this->query);
    }
}

?>