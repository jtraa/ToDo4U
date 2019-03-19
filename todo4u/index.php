<?php
// Variable $dateoftoday: Gets the date of today for the form
$dateoftoday = date('Y-m-d');
session_start()

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
    <div class="heading">
       <center> <h1> New Task </h1> </center>
  </div>
<center>
    <!-- This is the form for adding a task. All the inputs/textarea are required, so that you can't put in blank notes -->
    <form method="POST" action="formhandler.php">

        <br><br>
        Title <br>
        <input type="text" name="task" class="task_input" required>
        <br><br>
        Note <br>
        <textarea rows="4" cols="50" name="note" class="task_input" required></textarea>
        <br><br>
        Begin <br>
        <input type="date" name="begindate" value=<?php echo $dateoftoday; ?> required>
            <br>
        Completed <br>
        <input type="date" name="date" min="2000-01-02" required><br><br>

        

        <button type="submit" name="submit" class="task_btn">Save</button>
    
    </form>
    </center>
    <br> <br>

    <!-- this is the table where is shown what's put in the database, soo your notelist is displayed here.
    There's a link to the showtablehandler.php because there is the rest of the table.-->
    <table>
        <thead>
            <tr>
                <th>N</th>
                <th>Task</th>
                <th>Note</th>
                <th>Begin Date</th>
                <th>End Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

    <?php include "showtablehandler.php"; ?>

    </table>

 </div>
</body>
</html>