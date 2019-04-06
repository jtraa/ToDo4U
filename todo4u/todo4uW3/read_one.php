<?php
// get ID of the product to be read
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
 
// include database and object files
include_once 'config/database.php';

//autoload classes
spl_autoload_register(function($className) {
	include_once $_SERVER['DOCUMENT_ROOT'] . '/todo4u/todo4u/todo4uW3/objects/' . $className . '.php';
});
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$product = new Task($db);
 
// set ID property of product to be read
$product->id = $id;
 
// read the details of product to be read
$product->readOne();

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
        echo "<td>{$product->task}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Description</td>";
        echo "<td>{$product->note}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Begin Date</td>";
        echo "<td>{$product->begindate}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>End Date</td>";
        echo "<td>{$product->date}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Last Updated</td>";
       echo "<td>{$product->lastupdated}</td>";
    echo "</tr>";
 
echo "</table>";
 
// set footer
include_once "layout_footer.php";
?>