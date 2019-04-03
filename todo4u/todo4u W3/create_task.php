<?php

// include database and object files
include_once 'config/database.php';
include_once 'objects/task.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to objects
$product = new Product($db);

// set page headers
$page_title = "Create Task";
include_once "layout_header.php";
 
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>Read Products</a>";
echo "</div>";
 
?>
<?php 
// if the form was submitted - PHP OOP CRUD Tutorial
if($_POST){ 
     
    // set product property values
    $product->id=$_POST['id'];
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
 
<!-- HTML form for creating a product -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 
    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>ID</td>
            <td><input type='text' name='id' class='form-control' /></td>
        </tr>


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
 
// footer
include_once "layout_footer.php";
