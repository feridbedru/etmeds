<?php
require("db.php");
$id = $_GET['id'];
$type = $_GET['type'];
$sql = "SELECT $type FROM tbl_companyList WHERE companyId='$id'";
$result = mysqli_query($con,$sql);
while ($row = mysqli_fetch_array($result)) {
    $document = $row["$type"];
    header('Content-type: application/pdf');
    header('Content-Transfer-Encoding: binary');
    echo $document;  
}
?>