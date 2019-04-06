<?php

// include the files //autoload classes // get database connection with database class // connect connection to objects // header of the page
include_once 'config/database.php';



spl_autoload_register(function($className) {
	include_once $_SERVER['DOCUMENT_ROOT'] . '/todo4u/todo4u/todo4uW3/objects/' . $className . '.php';
});


$database = new Database();
$db = $database->getConnection();

$tasks = new Task($db);


$page_title = "Create Task";
include_once "layout_header.php";
 
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>Show Tasks</a>";
echo "</div>";
 
?>
<?php 

// if the form was submitted
if($_POST){ 
     
    // set product property values
    $tasks->task = $_POST['task'];
    $tasks->note = $_POST['note'];
    $tasks->begindate = $_POST['begindate'];
    $tasks->date=$_POST['date'];
    
 
    // create the product
    if($product->create()){
        echo "<div class='alert alert-success'>Product was created.</div>";
    }
 
    // if unable to create the product, tell the user
    else{
        echo "<div class='alert alert-danger'>Unable to create product.</div>";
    }
}
?>
 
<!-- Form for creating a product -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 
    <table class='table table-hover table-responsive table-bordered'>

        
        <tr>
            <td>Task</td>
            <td><input type='text' name='task' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Description</td>
            <td><textarea name='note' class='form-control'></textarea></td>
        </tr>

        <tr>
            <td>Begin Date</td>
            <td><input type='date' name='begindate' class='form-control'></textarea></td>
        </tr>

        <tr>
            <td>End Date</td>
            <td><input type='date' name='date' class='form-control'></textarea></td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
 
    </table>
</form>
<?php
 
// include footer
include_once "layout_footer.php";
