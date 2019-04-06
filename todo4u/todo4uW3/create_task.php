<?php

// include the files
include_once 'config/database.php';


//autoload classes
spl_autoload_register(function($className) {
	include_once $_SERVER['DOCUMENT_ROOT'] . '/todo4u/todo4u/todo4uW3/objects/' . $className . '.php';
});
 
// get database connection with database class
$database = new Database();
$db = $database->getConnection();
 
// connect connection to objects
$product = new Task($db);

// header of the page
$page_title = "Create Task";
include_once "layout_header.php";
 
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>Show Tasks</a>";
echo "</div>";
 
?>
<?php 
// if the form was submitted - PHP OOP CRUD Tutorial
if($_POST){ 
     
    // set product property values
    $product->task = $_POST['task'];
    $product->note = $_POST['note'];
    $product->begindate = $_POST['begindate'];
    $product->date=$_POST['date'];
    
 
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
