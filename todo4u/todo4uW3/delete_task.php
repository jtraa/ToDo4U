<?php
// check if value was posted
if($_POST){
 
    // include database and object file //autoload classes // get database connection
    include_once 'config/database.php';
    
    
    spl_autoload_register(function($className) {
	    include_once $_SERVER['DOCUMENT_ROOT'] . '/todo4u/todo4u/todo4uW3/objects/' . $className . '.php';
    });
 

    $database = new Database();
    $db = $database->getConnection();
 
    // prepare task object // set task id to be deleted 
    $tasks = new Task($db);
     
    $tasks->id = $_POST['task_id'];
     

    // delete the task
    if($tasks->delete()){
        echo "Task was deleted.";
    }

    // if unable to delete the task
    else{
        echo "Unable to delete task.";
    }
}
?>