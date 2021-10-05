<?php
require_once("db.php");
$officialId = $_POST["officialId"];
$userId = $_POST["userId"];
$role = $_POST["role"];
$company = $_POST["company"];
$sql = "UPDATE tbl_officials SET status = 'active' WHERE officialId='$officialId' AND userId='$userId'";
$update = mysqli_query($con,$sql);
if($update){
    $sqla = "UPDATE tbl_login SET companyType = '$company', companyName='$company', userRole='$role' WHERE userId='$userId'";
    $result = mysqli_query($con,$sqla);
    if($result){
        header("location:pendingOfficials.php");
    }
}
else{

}
?>