<?php



// page given in URL parameter, default page is one // set number of records per page // calculate for the query LIMIT clause
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$records_per_page = 5;

$from_record_num = ($records_per_page * $page) - $records_per_page;


// include database and object files plus //autoload classes
include_once 'config/database.php';
include_once 'config/core.php';

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

include_once 'navigation.php';

include_once "layout_header.php";


 
echo "<div class='right-button-margin'>";
    echo "<a style='position: absolute; width: 100px; right:8.5%; top: 33%;' href='create_task.php' class='btn btn-default pull-right'>Create Task</a>";
echo "</div>";

echo "<div class='right-button-margin'>";
    echo "<a style='position: absolute; width: 100px; right:8.5%; top: 28%;' href='index.php' class='btn btn-default pull-right'>Reset Filter</a>";
echo "</div>";

// display the products if there are any
if($num>0){

        echo '<form method="post" action="">'; 
        echo '<input type="text"  style="width: 200px;" name="q" placeholder="    Filter On" autocomplete="off">';
        echo '<div class="form-group">';
        echo '<select style= "max-width: 200px;" class="form-control" id="exampleFormControlSelect2" name="column" required>';
        echo '<option value=""> Order By</option>';
        echo '<option value="task">Task</option>';
        echo '<option value="note">Note</option>';
        echo '<option value="lastupdated">Updated date</option>';
        echo '<option value="begindate">Begin date</option>';
        echo '<option value="date">End date</option>';
        echo '</select>';   
        echo '<button type="submit" style="width: 200px;" class="btn btn-default" name="submit" value="Find"> FIND </button>';
        echo '</form>';
        echo '</div>';

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
    
    echo "<br><br><br><center><div style='width:300px;' class='alert alert-info'>No tasks found. <br> Make a task with Create Task</div></center>";
}
 
// set page footer
include_once "layout_footer.php";
?>