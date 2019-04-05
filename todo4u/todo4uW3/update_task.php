<?php
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
 
// include database and object files
include_once 'config/database.php';
include_once 'objects/task.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$product = new Task($db);
 
// set ID property of product to be edited
$product->id = $id;
 
// read the details of product to be edited
$product->readOne();
 
?>

<?php 
// if the form was submitted
if($_POST){
 
    // set product property values
    $product->task = $_POST['task'];
    $product->note = $_POST['note'];
    $product->begindate = $_POST['begindate'];
    $product->date = $_POST['date'];
    $product->lastupdated = $_POST['lastupdated'];
 
    // update the product
    if($product->update()){
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
            <td><input type='text' name='task' value='<?php echo $product->task; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Description</td>
            <td><textarea name='note' class='form-control'><?php echo $product->note; ?></textarea></td>
        </tr>

        <tr>
            <td>Begin date</td>
            <td><input type='text' name='begindate' value='<?php echo $product->begindate; ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>End date</td>
            <td><input type='text' name='date' value='<?php echo $product->date; ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td></td>
            <td><input type='text' name='lastupdated' value='<?php echo $product->lastupdated; ?>' class='form-control' /></td>
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