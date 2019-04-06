<?php
// core configuration // destroy session, it will remove ALL session settings //redirect to login page
include_once "config/core.php";


session_destroy();

header("Location: {$home_url}login.php");

?>