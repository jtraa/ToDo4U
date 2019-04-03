<?php
class Product{
 
    // database connection and table name
    private $conn;
    private $table_name = "tasks";
 
    // object properties
    public $id;
    public $task;
    public $note;
    public $begindate;
    public $date;   
    public $lastupdated;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create product
    function create(){
        
        //write query
        $query = 
                "INSERT INTO " . $this->table_name . " (
                `id`, `UserID`, `task`, `note`, `begindate`, `date`, `lastupdated`)
        VALUES (NULL, 11, :task, :note, :begindate, :date, :lastupdated)";

        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->task=htmlspecialchars(strip_tags($this->task));
        $this->note=htmlspecialchars(strip_tags($this->note));
        $this->begindate=htmlspecialchars(strip_tags($this->begindate));
        $this->date=htmlspecialchars(strip_tags($this->date));
        
        // to get time-stamp for 'created' field
        $this->timestamp = date('Y-m-d H:i:s');
 
        // bind values 
        $stmt->bindParam(":task", $this->task);
        $stmt->bindParam(":note", $this->note);
        $stmt->bindParam(":lastupdated", $this->timestamp);
        $stmt->bindParam(":begindate", $this->begindate);
        $stmt->bindParam(":date", $this->date);
 
        if($stmt->execute()){
            return true;
            
        }else{
            return false;
        }
 
    }
}
?>