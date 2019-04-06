<?php
// core configuration
include_once "config/core.php";

// set page title
$page_title = "Register";

// include login checker
include_once "login_checker.php";

// include classes
include_once 'config/database.php';

//autoload classes
spl_autoload_register(function($className) {
	include_once $_SERVER['DOCUMENT_ROOT'] . '/todo4u/todo4u/todo4uW3/objects/' . $className . '.php';
});

//include_once "libs/php/utils.php";

// include page header HTML
include_once "layout_head.php";

if($_POST){

    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);


    $user->name=$_POST['name'];
    $user->email=$_POST['email'];
    $user->password=$_POST['password'];

    // create the user
if($user->create()){

    echo "<div class='alert alert-info'>";
        echo "Successfully registered. <a href='{$home_url}login'>Please login</a>.";
    echo "</div>";
    }else{
    echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
}
}
?>
<form action='register.php' method='post' id='register'>

    <table class='table table-responsive'>

        <tr>
            <td class='width-30-percent'>Username</td>
            <td><input type='text' name='name' class='form-control' required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><input type='email' name='email' class='form-control' required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>
 <tr>
            <td>Password</td>
            <td><input type='password' name='password' class='form-control' required value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>
        <td></td>
            <td>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span> Register
                </button>
            </td>
        </tr>

    </table>
</form>

<?php

include_once "layout_head.php";

?>