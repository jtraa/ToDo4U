<?php

//DBCONNECTION.PHP

//Connect to following database:
$servername = "localhost";
$username = "root";
$password = "";
$database = "todo";

//Making the connection:
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception:
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }
catch(PDOException $e)
    {
        echo ("database not connected");
    }
    
?>