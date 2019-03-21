<?php


include 'dbconnection.php';


$userID = $_SESSION['ID'];
//query select all from table Tasks

// $sql_querie = "SELECT * FROM tasks";  
$sql_querie = "SELECT * FROM tasks WHERE UserID='$userID' ORDER BY date";

$db_result = $conn->query($sql_querie);

//variable $i is for the numbering

$i=1;

//Foreach for showing the table on the site

foreach ($db_result as $row)
{
    echo '<div class = "results">' .
    '<tbody>' .
    '<tr>' .
    '<td>' . $i++ . '</td>' .
    '<td class="task">' . $row['task'] . '</td>' .
    '<td class="note">' . $row['note'] . '</td>' .
    '<td class="date">' . $row['date'] . '</td>' .
    '<td class="date">' . $row['begindate'] . '</td>' .
    '<td class="update">' . $row['lastupdated'] . '</td>' .
    
    '<td class="edit">' .
    '<a href="#">' . 'edit' . '</a>' .


// Delete class, link to deletetask.php and to del_task, to delete the row in the table

    '<td class="delete">' .

    '<a href="deletetask.php?del_task=' . $row['id'] . '"> x' . '</a>' .

    '</td>' .
    '</tr>' .
    
    '<tbody>';
}