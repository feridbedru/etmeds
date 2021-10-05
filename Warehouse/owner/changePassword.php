<?php
session_start();
require_once("db.php");
$opwd = $_POST["oldPassword"];
$npwd = $_POST["newPassword"];
$sId = $_SESSION['id'];
$sql = "SELECT * FROM tbl_login WHERE userId='$sId' AND `password`=PASSWORD('$opwd')";
$password = mysqli_query($con, $sql);
if(mysqli_num_rows($password)>0){
    $sql2 = "UPDATE tbl_login SET password=PASSWORD('$npwd') WHERE userId='$sId'";
    $query = mysqli_query($con, $sql2);
    if(mysqli_num_rows($query)>0){
        header("location:profile.php?pass");
    }
    else{
        header("location:profile.php?status=pass");
    }
}
else{
    header("location:profile.php?status=wrong");
}
?>
