<?php 

include 'dbconnection.php';
session_start();
// submit button, when you click on submit the task, note and date will be inserted into the database tasks

if (isset($_POST['submit'])) {
    $task = $_POST['task'];
    $note = $_POST['note'];
    $date = $_POST['date'];
    $begindate = $_POST['begindate'];
    $id = $_SESSION['ID'];
    
    $sql_querie = "INSERT INTO tasks (task, UserID, note, date, begindate) VALUES ('$task', '$id', '$note', '$date', '$begindate')";

    $db_result = $conn->query($sql_querie);
     header('location: home.php');

   
}

?>