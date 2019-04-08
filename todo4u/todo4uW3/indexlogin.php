<?php


// core configuration // set page title // include login checker // include page header HTML
include_once "config/core.php";

$page_title="ToDo4U";

include_once 'layout_head.php';
 
echo "<div class='col-md-12'>";
 
    // to prevent undefined index notice
    $action = isset($_GET['action']) ? $_GET['action'] : "";
 
    // if login was successful
    if($action=='login_success'){
        $id = $_SESSION['ID'];
        echo "<div class='alert alert-info'>";
            echo "<strong>Hi " . $_SESSION['email'] . ", welcome back!</strong>";
        echo "</div>";
        var_dump($_SESSION);
        // header('Location: index.php');
    }
    
    
    // content once logged in
    echo "<div class='alert alert-info'>";
        echo "Below you can click to your task list.";
        echo "</br></br><a href='index.php'> Go to your task list</a>";
    echo "</div>";
 
echo "</div>";
 
// footer HTML and JavaScript codes
include 'layout_foot.php';

?>