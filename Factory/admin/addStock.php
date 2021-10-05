<?php
session_start();
require_once("db.php");
$medicineName = $_POST["medicineName"];
$batchNumber = $_POST["batchNumber"];
$productionDate = $_POST["productionDate"];
$expiryDate = $_POST["expiryDate"];
$MAId = $_POST["MAId"];
$doc = $_FILES['documents']['tmp_name'];
$documents = addslashes(file_get_contents($doc));
$app = $_FILES['applicationForm']['tmp_name'];
$applicationForm = addslashes(file_get_contents($app));
$agg = $_FILES['agreement']['tmp_name'];
$agreement = addslashes(file_get_contents($agg));
$companyName = $_SESSION['companyName'];
$companyType = $_SESSION['companyType'];
$userId = $_SESSION['id'];
$manufacturedBy = $_POST["manufacturer"];
$quantity = $_POST["quantity"];
$strength = $_POST["strength"];
$dosageForm = $_POST["dosageForm"];
$sql = "INSERT INTO tbl_request VALUES (null,'$medicineName','$batchNumber','$strength','$dosageForm','$productionDate','$expiryDate','$MAId','$manufacturedBy','$companyName','$quantity',CURRENT_DATE,'$userId','pending','$documents','$applicationForm','$agreement','$companyType')";
$request = mysqli_query($conz,$sql);
if($request){
    header("location:request.php?status=success");
}
else{
    header("location:request.php?status=error");
}
?>