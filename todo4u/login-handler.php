

<?php
    session_start();
   
    


    include "dbconnection.php";

    $user_email = $_POST['user_email']; 

    $user_password = $_POST['user_password'];

    $result = "SELECT email, name, password, ID
               FROM users
               WHERE (email = '$user_email' OR name = '$user_email')
               AND password = '$user_password'";

    $db_result = $conn->query($result);

    if ($db_result->rowCount()==1){
        foreach($db_result as $row){
            $firstname = $row['email'];
            $_SESSION['email']=$row['email'];
            $_SESSION['name']=$row['name'];
            $_SESSION['ID']=$row['ID'];
        }
               
        header("Location: index.php");
        
    } else{
        echo "Failed, email or password wrong"; 
    }


?>