<?php

var_dump($_SESSION);
// core configuration // set page title // include login checker // default to false
include_once "config/core.php";
 

$page_title = "Login";








$access_denied=false;
 
// if the login form was submitted // include database //autoload classes
if($_POST){

    
    include_once "config/database.php";
    
    spl_autoload_register(function($className) {
	include_once $_SERVER['DOCUMENT_ROOT'] . '/todo4u/todo4u/todo4uW3/objects/' . $className . '.php';
        });
 
    // get database connection // get User methods
    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);
 
    // check if email and password are in the database
    $email=$_POST['email'];
    $password=$_POST['password'];


    // validate login
    if ($user->login($email, $password)){
        
        // if it is, set the session value to true
        $_SESSION['logged_in'] = true;

        $_SESSION['id'] = $user->id;
        $_SESSION['email'] = htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8') ;
        $_SESSION['name'] = $user->name;
    
        header("Location: {$home_url}indexlogin.php?action=login_success");
        }
        // if username does not exist or password is wrong
    else{
      $access_denied=true;
        echo "<div class='alert alert-danger margin-top-40' role='alert'>
        Access Denied.<br /><br />
        Your username or password maybe incorrect </div>";
}
}
 


// include page header HTML
include_once "layout_head.php";
 
echo "<div class='col-sm-6 col-md-4 col-md-offset-4'>";
 
    // get 'action' value in url parameter to display corresponding prompt messages
$action=isset($_GET['action']) ? $_GET['action'] : "";
 
// tell the user he is not yet logged in
if($action =='not_yet_logged_in'){
    echo "<div class='alert alert-danger margin-top-40' role='alert'>Please login.</div>";
}
 
// tell the user to login
else if($action=='please_login'){
    echo "<div class='alert alert-info'>
        <strong>Please login to access that page.</strong>
    </div>";
}
 
// tell the user email is verified
else if($action=='email_verified'){
    echo "<div class='alert alert-success'>
        <strong>Your email address have been validated.</strong>
    </div>";
}

    // actual HTML login form
    echo "<div class='account-wall'>";
        echo "<div id='my-tab-content' class='tab-content'>";
            echo "<div class='tab-pane active' id='login'>";
                echo "<br><center><img style='width: 60%; height: auto;' class='profile-img' src='images/login-icon.png'></center></br></br>";
                echo "<form class='form-signin' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                    echo "<input type='text' name='email' class='form-control' placeholder='Email' required autofocus />";
                    echo "<input type='password' name='password' class='form-control' placeholder='Password' required />";
                    echo "<input type='submit' class='btn btn-lg btn-primary btn-block' value='Log In' />";
                echo "</form>";
            echo "</div>";
        echo "</div>";
    echo "</div>";
 
echo "</div>";
 
// footer HTML and JavaScript codes
include_once "layout_foot.php";
?>