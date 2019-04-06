<?php
// check if value was posted
if($_POST){
 
    // include database and object file
    include_once 'config/database.php';
    
    //autoload classes
    spl_autoload_register(function($className) {
	    include_once $_SERVER['DOCUMENT_ROOT'] . '/todo4u/todo4u/todo4uW3/objects/' . $className . '.php';
    });
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // prepare task object
    $product = new Task($db);
     
    // set task id to be deleted
    $product->id = $_POST['object_id'];
     
    // delete the task
    if($product->delete()){
        echo "Task was deleted.";
    }
     
    // if unable to delete the task
    else{
        echo "Unable to delete task.";
    }
}
?>