<?php
// check if value was posted
if($_POST){
 
    // include database and object file
    include_once 'config/database.php';
    include_once 'objects/task.php';
 
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