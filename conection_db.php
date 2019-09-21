<?php
session_start();
	$dbHost = "localhost";
	$dbUser = "root";
	$dbDatabase = "shopping";
	$dbPass = "";
	$con = new mysqli($dbHost, $dbUser, $dbPass,$dbDatabase);
$con->set_charset("utf8");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>