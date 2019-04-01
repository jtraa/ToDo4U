<?php
    include 'includes/users.inc.php'; 
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OOP</title>
    <link rel="icon" href="img/adobe.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <p> JOE </p>
    <?php
  
    $users = new Users('John', ' Doe', 'Blond', 'Brown');
    $users2 = new Users('Jelle', ' Traa', 'Blond', 'Blue');
    
    echo $users->fullName() . '<br>';
    echo $users2->fullName();
    ?>
</body>
</html>