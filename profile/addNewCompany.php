<?php 
session_start();
$sId = $_SESSION['id'];
require("db.php");

$type = $_POST["companyType"];
$name = $_POST["companyName"];
$address = $_POST["companyAddress"];

$phone1 = $_POST["phoneNumber1"];
$phone2 = $_POST["phoneNumber2"];
$email1 = $_POST["email1"];
$email2 = $_POST["email2"];
$fax=$_POST["fax"];
$pobox=$_POST["pobox"];

$reg = $_FILES['registration']['tmp_name'];
$registration = addslashes(file_get_contents($reg));
$let = $_FILES['letter']['tmp_name'];
$letter = addslashes(file_get_contents($let));
$ownershipType = $_POST["ownershipType"];

$sql = "SELECT * FROM tbl_login WHERE userId='$sId'";
$user = mysqli_query($con,$sql);
$row = mysqli_fetch_array($user);
$username = $row["userName"];

$sql2 = "INSERT INTO tbl_companyList VALUES ('$name',null,'$address','$phone1','$phone2','$email1','$email2','$fax','$pobox','$type','$username','$sId','pending',CURRENT_DATE,'$ownershipType','$registration','$letter')";
$company = mysqli_query($con,$sql2);
if($company){
    header("location:company.php?status=success");
}
else {
    header("location:company.php?status=error");
}
?>