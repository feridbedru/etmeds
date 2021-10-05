<?php
session_start();
require_once("db.php");
$opwd = $_POST["oldPassword"];
$npwd = $_POST["newPassword"];
$sId = $_SESSION['id'];
$sql = " UPDATE tbl_login SET password=PASSWORD('$npwd') WHERE userId='$sId' AND password=PASSWORD('$opwd')";
$password = mysqli_query($con, $sql);
if($password){
    header("location:index.php?status=pass");
}
else{
    header("location:index.php?status=error");
}
?>