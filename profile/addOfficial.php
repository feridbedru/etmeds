<?php
session_start();
require_once("db.php");
$sId = $_SESSION['id'];

$role = $_POST["role"];
$region = $_POST["region"];
$town = $_POST["town"];
$companyType = $_POST["companyType"];
$ofl = $_FILES['officialLetter']['tmp_name'];
$officialLetter = addslashes(file_get_contents($ofl));
$oid = $_FILES['officeId']['tmp_name'];
$officeId = addslashes(file_get_contents($oid));

$userInfo="SELECT * FROM tbl_userInfo WHERE userId=$sId ";
$result=mysqli_query($con,$userInfo);
while ($row = mysqli_fetch_array($result)) {
    $firstName=$row["firstName"];
    $middleName=$row["middleName"];
    $lastName=$row["lastName"];
    $name=$firstName.' '.$middleName.' '.$lastName;
}

$login="SELECT * FROM tbl_login WHERE userId=$sId ";
$result=mysqli_query($con,$login);
while ($row = mysqli_fetch_array($result)) {
    $username=$row["userName"];
}

$sql = "INSERT INTO tbl_officials VALUES (null,'$name','$role','$companyType','$username','$sId','$officialLetter','$officeId',CURRENT_DATE,'pending','$region','$town') ";
$resulto=mysqli_query($con,$sql);

if($resulto){
    header("location:official.php?status=success");
}
else{
    header("location:official.php?status=error");
}
?>