<?php




include 'dbconnection.php';

session_start();


if (isset($_GET['upd_task'])) {
    $id = $_GET['upd_task'];
// $userID = $_SESSION['ID'];
$sql_querie = "SELECT * FROM tasks WHERE '$id'=id";
$db_result = $conn->query($sql_querie);
}
//Foreach for showing the table on the site

foreach ($db_result as $row)
{$_SESSION['id']=$row['id'];

echo '<form autocomplete="off" method="POST" action="updatehandler.php">' .
        
        '<br><br>' .
        "Title" . '<br>' .
        '<input type="text" name="task" class="task_input" placeholder=' . $row['task'] . 'required>' . 
        '<br><br>' .
        'Note <br>' .
        '<textarea rows="4" cols="50" name="note" class="task_input" placeholder=' . $row['note'] . '>' . '</textarea>' .
        '<br><br>'.
        'Begin <br>'.
        '<input type="date" name="begindate" min="2015-01-01" value=' . $row['begindate'] . 'required>' .
        '<br>' .
        'Completed <br>'.
        '<input type="date" name="date" min="2015-01-01" value=' . $row['date'] . 'required><br><br>' .

        

        '<button type="submit" name="submit" class="task_btn">Save</button>' .
    
    '</form>';
}

?>