<?php
$host = "localhost";
$user = "root";
$password = "";
$dbName = "etmeds";
$db2 = "EFMHACA";

 
$con = mysqli_connect($host, $user, $password, $dbName);
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}

$conz = mysqli_connect($host, $user, $password, $db2);
if (!$conz) {
	die("Connection failed: " . mysqli_connect_error());
}