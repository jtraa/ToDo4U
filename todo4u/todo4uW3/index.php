<?php

// page given in URL parameter, default page is one // set number of records per page // calculate for the query LIMIT clause
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$records_per_page = 5;

$from_record_num = ($records_per_page * $page) - $records_per_page;


// include database and object files plus //autoload classes
include_once 'config/database.php';

spl_autoload_register(function($className) {
	include_once $_SERVER['DOCUMENT_ROOT'] . '/todo4u/todo4u/todo4uW3/objects/' . $className . '.php';
});



$database = new Database();
$db = $database->getConnection();
 
$tasks = new Task($db);

// query products
$stmt = $tasks->readAll($from_record_num, $records_per_page);
$num = $stmt->rowCount();

// set page header
$page_title = "Show Task(s)";
include_once "layout_header.php";
 
echo "<div class='right-button-margin'>";
    echo "<a href='create_task.php' class='btn btn-default pull-right'>Create Task</a>";
echo "</div>";

// display the products if there are any
if($num>0){
 
    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>Task</th>";
            echo "<th>Note</th>";
            echo "<th>Begin date</th>";
            echo "<th>End date</th>";
            echo "<th>Last Updated</th>";
            echo "<th>Read Task</th> <th>Edit Task</th> <th> Delete Task</th>";
        echo "</tr>";
 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
 
            extract($row);
 
            echo "<tr>";
                echo "<td>{$task}</td>";
                echo "<td>{$note}</td>";
                echo "<td>{$begindate}</td>";
                echo "<td>{$date}</td>";
                echo "<td>{$lastupdated}</td>";
                echo "<td>";
                //read, edit and delete buttons
                echo "<a href='read_one.php?id={$id}' class='btn btn-primary left-margin'>
                <span class='glyphicon glyphicon-list'></span> Read
                </a> </td>";
                echo "<td>";

                echo "<a href='update_task.php?id={$id}' class='btn btn-info left-margin'>
                <span class='glyphicon glyphicon-edit'></span> Edit
                </a> </td>";
                
                echo "<td>";
                echo "<a delete-id='{$id}' class='btn btn-danger delete-object'>
                <span class='glyphicon glyphicon-remove'></span> Delete
                </a>";
                echo "</td>";
 
            echo "</tr>";
 
        }
 
    echo "</table>";
 
// the page where this paging is used
$page_url = "index.php?";
 
// count all products in the database to calculate total pages
$total_rows = $tasks->countAll();
 
// paging buttons here
include_once 'paging.php';
}
 
// tell the user there are no products
else{
    echo "<div class='alert alert-info'>No products found.</div>";
}
 
// set page footer
include_once "layout_footer.php";
?>