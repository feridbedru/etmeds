<?php
session_start();
require_once("db.php");
$security1=$_POST["security1"];
$answer1=$_POST["answer1"];
$security2=$_POST["security2"];
$answer2=$_POST["answer2"];
$security3=$_POST["security3"];
$answer3=$_POST["answer3"];
$sId = $_SESSION['id'];
$sql = " UPDATE tbl_userAccount SET security1='$security1', security2='$security2', security3='$security3', answer1='$answer1', answer2='$answer2', answer3='$answer3'   WHERE userId='$sId'";
$security = mysqli_query($con, $sql);
if($security){
    header("location:profile.php");
}
else{
    header("location:profile.php?status=error");
}
?>