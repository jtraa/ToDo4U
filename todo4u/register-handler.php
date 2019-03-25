<?php
     
        include "dbconnection.php";

        $name = $_POST["name"];
        $email = $_POST["mail"];
        $password = $_POST["word"];      
        
        try {
                $sql = "INSERT INTO users (name, email, password)
                VALUES ('$name', '$email', '$password')";
                
                // use exec() because no results are returned
                $conn->exec($sql);
                
            }
        catch(PDOException $e)
            {
                
            }
        
        $conn = null;
    
          header('Location:index.php');  
    
?>