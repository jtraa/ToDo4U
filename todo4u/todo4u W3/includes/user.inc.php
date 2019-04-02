<?php

class User{

    public function __construct($dsn){
        $this->database = $dsn;
    }




    public function register($name, $email, $password){
        
        try {
                $sql = "INSERT INTO users (name, email, password)
                VALUES ('$name', '$email', '$password')";
                
                // use exec() because no results are returned
                $conn->connect($sql);
                
            }
        catch(PDOException $e)
            {
                
            }
        
        $conn = null;
    
          
        }
    }

