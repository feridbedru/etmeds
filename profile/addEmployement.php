<?php 
session_start();
$sId = $_SESSION['id'];
require("db.php");

$companyName = $_POST["companyName"];
$position = $_POST["position"];

$sql = "SELECT * FROM tbl_login WHERE userId='$sId'";
$user = mysqli_query($con,$sql);
$row = mysqli_fetch_array($user);
$username = $row["userName"];

$sql2 = "SELECT * FROM tbl_companyList WHERE companyName='$companyName'";
$company = mysqli_query($con,$sql2);
$row = mysqli_fetch_array($company);
$companyId = $row["companyId"];
$recieverName = $row["ownerName"];
$recieverId = $row["ownerId"];

$sql3 = "INSERT INTO tbl_employement VALUES (null,'$username','$sId','$companyName','$companyId','$position','pending',null,null)";
$employement = mysqli_query($con,$sql3);
if($employement){
    $message = $username.' is requesting approval for job position of '.$position.' at your company';
    $sql4 = "INSERT INTO tbl_notification VALUES (null,'$username','$sId','$message',CURRENT_TIMESTAMP,'$recieverName','$recieverId',null,'unread','request')";
    $query = mysqli_query($con, $sql4);
    if($query){
        header("location:employement.php?status=success");
    }
    else{
        header("location:employement.php?status=success");
    }
}
else{
    header("location:employement.php?status=success");
}
?>