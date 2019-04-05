<?php

spl_autoload_register(function($className) {
	include_once $_SERVER['DOCUMENT_ROOT'] . '/todo4u/todo4u/todo4uW3/objects/' . $className . '.php';
});





include_once "config/database.php";


$database = new Database();
$db = $database->getConnection();


$user = new User($db);
$task = new Task($db);
var_dump($user, $task);
?>