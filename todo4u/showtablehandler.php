<?php
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 

include 'dbconnection.php';

//query select all from table Tasks, filter on every column

if (isset($_POST['submit'])){
    $q = $_POST['q'];
    $column = $_POST['column'];

    if ($column == "" || ($column !="lastupdated" && $column != "date" && $column != "task" && $column != "begindate" && $column != "note"))
    $column = "begindate";
    
    $userID = $_SESSION['ID'];

$sql_querie = "SELECT * FROM tasks WHERE (UserID=$userID AND $column LIKE '%$q%') ORDER BY $column asc";

//else statement for showing the table before filtering
}else{
    $userID = $_SESSION['ID'];
    $sql_querie="SELECT * FROM tasks WHERE UserID='$userID' ORDER BY date desc";
}

$db_result = $conn->query($sql_querie);

//variable $i is for the numbering

$i=1;

//Foreach for showing the table on the site



foreach ($db_result as $row)
{   

    echo 
    '<center>' .
    '<div class="filter">' .
    '<div class = "results">' .
    '<tbody>' .
    '<tr>' .
    '<td>' . $i++ . '</td>' .
    '<td class="task">' . $row['task'] . '</td>' .
    '<td class="note">' . $row['note'] . '</td>' .
    '<td class="date">' . $row['begindate'] . '</td>' .
    '<td class="date">' . $row['date'] . '</td>' .
    '<td class="update">' . $row['lastupdated'] . '</td>' .

// Update class, link to updatetask.php adn to upd_task class, to edit the row in the table.     

    '<td class="edit">' .
    '<a href="updatetask.php?upd_task=' . $row['id'] . '"> edit' . '</a>' .
    '</td>' .


// Delete class, link to deletetask.php and to del_task, to delete the row in the table

    '<td class="delete">' .

    '<a href="deletetask.php?del_task=' . $row['id'] . '"> x' . '</a>' .

    '</td>' .
    '</tr>' .
    
    '<tbody>' .
    '</div></div>';


}