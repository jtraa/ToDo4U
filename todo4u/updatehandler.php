<?php 

include 'dbconnection.php';
session_start();
// submit button, when you click on submit the task, note and date will be inserted into the database tasks

if (isset($_POST['submit'])) {
    $task = $_POST['task'];
    $note = $_POST['note'];
    $date = $_POST['date'];
    $begindate = $_POST['begindate'];
    $id = $_SESSION['id'];
   
    $sql_querie = "UPDATE tasks SET task = '$task', note = '$note', date = '$date' , begindate = '$begindate' WHERE '$id'=id";

    $db_result = $conn->query($sql_querie);
     header('location: index.php');

}
?>