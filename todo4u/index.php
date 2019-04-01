<?php
session_start();

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login ToDo4U </title>
    <link rel="icon" href="img/post-it.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
</head>
<body>

<center><br><br><div id="login">
        <div id="titel">
           <strong> LOGIN </strong>
        </div>
        <div id="line">
        </div>
        
        <form autocomplete="off" class="loginForm" action="login-handler.php" method="POST"> <br>
            Name or Mail: <br>
            <input type="text" id="user_email" name="user_email" autofocus required/><br>
            Password: <br>
            <input type="password" id="user_password" name="user_password" required/><br><br>
           
                <input type="submit" value="LOGIN" class="btn btn-info" id="loginknop"/>
           
            <br>
        </form>
       </form>
    </div>
    </div>
    <br><br><br><br>
        <div id="registreer">
        <div id="titel">
           <strong> REGISTER </strong>
        </div>
        <br>
        <div id="line">
        </div>
        <form autocomplete="off" class="registerForm" action="register-handler.php" method="POST">
            Name:<br>
            <input type="text" id="name" name="name" required><br>
            E-mail:<br>
            <input type="email" id="mail" name="mail" required><br>
            Password:<br>
            <input type="password" id="word" name="word" required><br><br>
            <input type="submit" value="REGISTER" id="loginknop">
        
            <br>
        </form>
    </div></center>
    
</body>
</html>