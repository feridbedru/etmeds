<?php
session_start();
require_once("db.php");
$phone1 = $_POST["phoneNumber1"];
$phone2 = $_POST["phoneNumber2"];
$email1 = $_POST["email1"];
$email2 = $_POST["email2"];
$address = $_POST["address"];
$fax=$_POST["fax"];
$pobox=$_POST["pobox"];
$sId = $_SESSION['id'];
$sql = "UPDATE tbl_userContact SET phone1='$phone1', phone2='$phone2', email1='$email1', email2='$email2', address='$address',poBox='$pobox',faxNumber='$fax' WHERE userId='$sId'";
$contact = mysqli_query($con, $sql);
if($contact){
    header("location:profile.php?status=error");
}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
?>