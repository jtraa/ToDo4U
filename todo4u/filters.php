<?php
session_start();

include "dbconnection.php";


if (isset($_POST['submit'])){
    $q = $_POST['q'];
    $column = $_POST['column'];

    if ($column == "" || ($column !="lastupdated" && $column != "date" && $column != "task"))
    $column = "last_updated";

  
    $sql_querie = "SELECT task, lastupdated, date FROM tasks WHERE $column LIKE '%$q%' WHERE id = '$id'";
    $db_result = $conn->query($sql_querie);

    foreach ($db_result as $row)
    {
        echo $row["task"] . "<br>";
        echo $row["lastupdated"] . "<br>";
        echo $row["date"] . "<br>";
    }
}

// //variable $i is for the numbering

// $i=1;

// //Foreach for showing the table on the site

// foreach ($db_result as $row)
// {
//     echo '<div class = "results">' .
//     '<tbody>' .
//     '<tr>' .
//     '<td>' . $i++ . '</td>' .
//     '<td class="task">' . $row['task'] . '</td>' .
//     '<td class="note">' . $row['note'] . '</td>' .
//     '<td class="date">' . $row['begindate'] . '</td>' .
//     '<td class="date">' . $row['date'] . '</td>' .
//     '<td class="update">' . $row['lastupdated'] . '</td>' .

// // Update class, link to updatetask.php adn to upd_task class, to edit the row in the table.    

//     '<td class="edit">' .
//     '<a href="updatetask.php?upd_task=' . $row['id'] . '"> edit' . '</a>' .
//     '</td>' .


// // Delete class, link to deletetask.php and to del_task, to delete the row in the table

//     '<td class="delete">' .

//     '<a href="deletetask.php?del_task=' . $row['id'] . '"> x' . '</a>' .

//     '</td>' .
//     '</tr>' .
    
//     '<tbody>';
// }
// ?>