<?php

class Task{
 
    // database connection and table name
    private $conn;
    private $table_name = "tasks";
 
    // object properties -> public, privated, protected: waarom welke?
    public $id;
    public $task;
    public $note;
    public $begindate;
    public $date;   
    public $lastupdated;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create task with function create()
    public function create(){
        
        //Insert Query for creating tasks
        $query = 
                "INSERT INTO " . $this->table_name .
                    "(`id`, `UserID`, `task`, `note`, `begindate`, `date`, `lastupdated`)
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

    public function readAll($from_record_num, $records_per_page){
 
        $query = "SELECT
                    id, task, note, begindate, date, lastupdated
                FROM
                    " . $this->table_name . "
                ORDER BY
                    date ASC
                LIMIT
                    {$from_record_num}, {$records_per_page}";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        return $stmt;
    }
        // used for paging products
    public function countAll(){
 
        $query = "SELECT id FROM " . $this->table_name . "";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        $num = $stmt->rowCount();
 
        return $num;
    }
    function readOne(){
 
        $query = "SELECT
                    id, task, note, begindate, date, lastupdated
                FROM
                    " . $this->table_name . "
                WHERE
                    id = ?
                LIMIT
                    0,1";
        
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->task = $row['task'];
        $this->note = $row['note'];
        $this->begindate = $row['begindate'];
        $this->date = $row['date'];
        $this->lastupdated = $row['lastupdated'];
    }

    function update(){
 
        $query = "UPDATE tasks SET `task` = :task, `note` = :note, `date` = :date , `begindate` = :begindate WHERE `id` = :id";
     
        $stmt = $this->conn->prepare($query);
     
        // posted values
        $this->task=htmlspecialchars(strip_tags($this->task));
        $this->note=htmlspecialchars(strip_tags($this->note));
        $this->date=htmlspecialchars(strip_tags($this->date));
        $this->begindate=htmlspecialchars(strip_tags($this->begindate));
     
        // bind parameters
        $stmt->bindParam(':task', $this->task);
        $stmt->bindParam(':note', $this->note);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':begindate', $this->begindate);
        $stmt->bindParam(':id', $this->id);
     
        // execute the query
        if($stmt->execute()){
            return true;
        }
     
        return false;
         
    }
    // delete the product
    function delete(){
 
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
 
        if($result = $stmt->execute()){
            return true;
        }else{
            return false;
        }
}
}
?>