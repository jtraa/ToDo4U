<?php

// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;
 
// set number of records per page
$records_per_page = 5;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;
 
// include database and object files
include_once 'config/database.php';
include_once 'objects/task.php';
 
// instantiate database and objects
$database = new Database();
$db = $database->getConnection();
 
$product = new Task($db);

// query products
$stmt = $product->readAll($from_record_num, $records_per_page);
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
$total_rows = $product->countAll();
 
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