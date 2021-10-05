<?php
$db1 = $_SESSION['db'];
$host = "localhost";
$user = "root";
$password = "";
$dbName = "etmeds";

$con = mysqli_connect($host, $user, $password, $dbName);
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}

$conx = mysqli_connect($host, $user, $password, $db1);
if (!$conx) {
	die("Connection failed: " . mysqli_connect_error());
}