<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TODO4U</title>
    <link rel="icon" href="img/post-it.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
</head>
<body>

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

echo '<center>' . '<form autocomplete="off" method="POST" action="updatehandler.php">' .
        '<div class="heading">' .
        '<center> <h1>' . 'Update Task' . '</h1> </center>' .
        '</div>' .  
        '<br><br>' .
        "Title" . '<br>' .
        '<input type="text" name="task" class="task_input" value="' . $row['task'] . '" required>' . 
        '<br><br>' .
        'Note <br>' .
        '<textarea rows="4" cols="50" name="note" class="task_input">' . $row['note'] . '</textarea>' .
        '<br><br>'.
        'Begin <br>'.
        '<input type="date" name="begindate" min="2015-01-01" value="' . $row['begindate'] . '" required>' .
        '<br>' .
        'Completed <br>' .
        '<input type="date" name="date" min="2015-01-01" value="' . $row['date'] .  '" required><br><br>' .

        

        '<button type="submit" name="submit" class="task_btn">Save</button>' .
    
    '</form>' . '</center>';
}

?>
</body>
</html>