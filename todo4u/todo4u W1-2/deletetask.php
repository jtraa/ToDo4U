<?php


include 'dbconnection.php';


if (isset($_GET['del_task'])) {
    $id = $_GET['del_task'];

    $sql_querie = "DELETE FROM tasks WHERE id=$id";
    $db_result = $conn->query($sql_querie);
    header('location: home.php');
}

?>