<?php
include "loginfirst.php";
date_default_timezone_set("Asia/Colombo");
if(session_id() == '') { session_start(); }
$db_username = 'root';
$db_password = 'vasee07';
$db_name = 'hospitalms';
$db_host = 'localhost';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);


// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>