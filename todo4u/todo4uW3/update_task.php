<?php
// get ID of the product to be edited 
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
 
// include database and object files //autoload classes // get database connection
include_once 'config/database.php';


spl_autoload_register(function($className) {
	include_once $_SERVER['DOCUMENT_ROOT'] . '/todo4u/todo4u/todo4uW3/objects/' . $className . '.php';
});


$database = new Database();
$db = $database->getConnection();
 
// prepare objects // set ID property of product to be edited // read the details of product to be edited
$tasks = new Task($db);


$tasks->id = $id; 


$tasks->readOne();
 
?>

<?php 
// if the form was submitted
if($_POST){
 
    // set product property values
    $tasks->task = $_POST['task'];
    $tasks->note = $_POST['note'];
    $tasks->begindate = $_POST['begindate'];
    $tasks->date = $_POST['date'];

 
    // update the product
    if($tasks->update()){
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "Product was updated.";
        echo "</div>";
    }
 
    // if unable to update the product, tell the user
    else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "Unable to update product.";
        echo "</div>";
    }
}

// set page header
$page_title = "Update Task";
include_once "layout_header.php";

echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>Show Tasks</a>";
echo "</div>";
 

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Task</td>
            <td><input type='text' name='task' value='<?php echo $tasks->task; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Description</td>
            <td><textarea name='note' class='form-control'><?php echo $tasks->note; ?></textarea></td>
        </tr>

        <tr>
            <td>Begin date</td>
            <td><input type='date' name='begindate' value='<?php echo $tasks->begindate; ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>End date</td>
            <td><input type='date' name='date' value='<?php echo $tasks->date; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
 
    </table>
</form>
<?php
 

 

// set page footer
include_once "layout_footer.php";
?>