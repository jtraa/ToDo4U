<?php
// Variable $dateoftoday: Gets the date of today for the form
$dateoftoday = date('Y-m-d');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/post-it.png"/>
    <title>ToDo4U</title>
</head>
<body>
    <div style="float:right" class="welcomemessage">
    <?php echo "Welcome " . ($_SESSION['name']) . ", this is your notelist!" . '<br>' .
    '<a style="text-decoration: none; float: right;" href="logouthandler.php">' . "LOGOUT" . '</a>' ?>
    </div><br><br>
    <div class="heading">
       <center> <h1> New Task </h1> </center>
  </div>
<center>
    <!-- This is the form for adding a task. All the inputs/textarea are required, so that you can't put in blank notes -->
    <form autocomplete="off" method="POST" action="formhandler.php">

        <br><br>
        Title <br>
        <input type="text" name="task" class="task_input" required>
        <br><br>
        Note <br>
        <textarea rows="4" cols="50" name="note" class="task_input"></textarea>
        <br><br>
        Begin <br>
        <input type="date" name="begindate" min="2015-01-01" value=<?php echo $dateoftoday; ?> required>
            <br>
        Completed <br>
        <input type="date" name="date" min="2015-01-01" required><br><br>

        

        <button type="submit" name="submit" class="task_btn">Save</button>
    
    </form>
    </center>
    <br>

   



    <!-- this is the table where is shown what's put in the database, soo your notelist is displayed here.
    There's a link to the showtablehandler.php because there is the rest of the table.-->
    <table>
    
     <form method="post" action="home.php"> 
        <input type="text" name="q" placeholder="Filter on" autocomplete="off">
        <select name="column" required>
            <option value=""> Select Filter</option>
            <option value="task">Task</option>
            <option value="note">Note</option>
            <option value="lastupdated">Updated date</option>
            <option value="begindate">Begin date</option>
            <option value="date">End date</option>
        </select>   
        <input type="submit" name="submit" value="Find">
    </form>
   <br>
    <br>
    
        <thead>
            <tr>
                <th>N</th>
                <th>Task</th>
                <th>Note</th>
                <th>Begin Date</th>
                <th>End Date</th>
                <th>Updated</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Done</th>
                <th>Delete Multiple</th>
            </tr>
        </thead>
  
    <?php include "showtablehandler.php"; ?>
    

    
    </table>

 </div>
 
</body>
</html>