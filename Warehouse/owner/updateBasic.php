<?php
session_start();
require_once("db.php");
$fname = $_POST["firstName"];
$mname = $_POST["middleName"];
$lname = $_POST["lastName"];
$sex = $_POST["gender"];
$dob = $_POST["birthDate"];
$sId = $_SESSION['id'];
$sql = " UPDATE tbl_userInfo SET firstName='$fname', middleName='$mname', lastName='$lname', gender='$sex', dateofBirth='$dob' WHERE userId='$sId'";
$basic = mysqli_query($con, $sql);
if($basic){
    header("location:profile.php");
}
else{
    header("location:profile.php?status=error");
}
?>