<?php



// get ID of the product to be read // include database and object files //autoload classes
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'config/database.php';


spl_autoload_register(function($className) {
	include_once $_SERVER['DOCUMENT_ROOT'] . '/todo4u/todo4u/todo4uW3/objects/' . $className . '.php';
});
 
// get database connection // prepare objects // set ID property of task to be read
$database = new Database();
$db = $database->getConnection();


$tasks = new Task($db);
 

$tasks->id = $id;
 
// read the details of product to be read
$tasks->readOne();

// set page headers
$page_title = "Read Task";
include_once "layout_header.php";
 
// read tasks button
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-primary pull-right'>";
        echo "<span class='glyphicon glyphicon-list'></span> Show Tasks";
    echo "</a>";
echo "</div>";

// HTML table for display of task details
echo "<table class='table table-hover table-responsive table-bordered'>";
 
    echo "<tr>";
        echo "<td>Task</td>";
        echo "<td>{$tasks->task}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Description</td>";
        echo "<td>{$tasks->note}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Begin Date</td>";
        echo "<td>{$tasks->begindate}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>End Date</td>";
        echo "<td>{$tasks->date}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Last Updated</td>";
       echo "<td>{$tasks->lastupdated}</td>";
    echo "</tr>";
 
echo "</table>";
 
// set footer
include_once "layout_footer.php";

?>