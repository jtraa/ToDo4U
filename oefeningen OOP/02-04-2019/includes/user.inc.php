<?php

include_once 'includes/dbh.inc.php';

class User{

    private $name;
    private $email;

    public function __set($property, $value){
        $this->$property = $value;
    }   

   public function register($password){

    $conn =  new Dbh;
    $conn->connect();


    try {
        $sql = "INSERT INTO users (name, email, password)
                VALUES ('$this->name', '$this->email', '$password')";
                
        // use exec() because no results are returned
        $conn->prepare($sql);
        $conn->execute();
                
            }
    catch(PDOException $e)
        {
            echo "Register Failed";
        }
        
    $conn = null; 
        
    }
}