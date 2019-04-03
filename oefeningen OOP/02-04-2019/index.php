<?php 
include 'includes/dbh.inc.php';
include 'includes/user.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <center>
    <h1> This is my to do list created with PHP and OOP! </h1>
    <h2> Inlog - Register page </h2>
    </center>

<?php


if(isset($_POST['REGISTER'])){
    $name = $_POST["username"];
    $email = $_POST["useremail"];
    $password = $_POST["userpassword"]; 
    $user = new User();
    $user->name = $name;
    $user->email = $email;
    $user->register($password);
    // var_dump($user);
    // die();

    if ($user) {  
        echo "Registration Success";  
        header('Location:index.php');  
    } else {  
        // Registration Failed  
        echo "<script>alert('Emailid / Password Not Match')</script>";  
    }  
}   
    

?>
    <form autocomplete="off" class="register" action="" method="POST">
            UserName:<br>
            <input type="text" name="username" required><br>
            E-mail:<br>
            <input type="email" name="useremail" required><br>
            Password:<br>
            <input type="password" name="userpassword" required><br><br>
            <input type="submit" value="Register" name="REGISTER" id="">
        
            <br>
        </form>

</body>
</html>