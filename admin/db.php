<!-- 
File Name: dbConnection.php
Description: this file contains database connection file
-->
<?php
$host = "localhost";
$user = "root";
$password = "";
$dbName = "etmeds";

//connects to the database where query is excuted 
$con = mysqli_connect($host, $user, $password, $dbName);
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}