<?php
$host = "localhost";
$user = "root";
$password = "";
$dbName = "etmeds";

$con = mysqli_connect($host, $user, $password, $dbName);
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}