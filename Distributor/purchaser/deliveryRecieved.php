<?php
session_start();
if(isset($_SESSION['id']))
{
    $sId = $_SESSION['id'];
    $companyName = $_SESSION['companyName'];
    $userRole = $_SESSION['role'];
    $companyType = $_SESSION['companyType'];
    $username = $_SESSION['username'];
    $userId = $_SESSION['id'];
    if($userRole!='purchaser' && $companyType!='Distributor'){
        header("location:../../login.php?status=role");
    }
}
else{
	header("location:../../login.php?status=login");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Delivery Recieved | Purchaser | Distributor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="print" href="css/print.css">
    <script src="js/main.js"></script>
</head>
<body>
    

    <?php
        require("header.php");
    ?>
    
    <div class="container">     
        <h2 class="text-center no-print">Delivery Recieved</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="acceptDelivery.php">Accept Delivery</a></li>
                <li class="breadcrumb-item active">Delivery Recieved</li>
            </ul>

            <?php
            $itemId = $_POST['itemId'];
            $pendingId = $_POST['pendingId'];
            $sql = "SELECT * FROM tbl_pendingStock WHERE salesId = '$itemId'";
            $result = mysqli_query($conx,$sql);
            if($result){
                while($row = mysqli_fetch_array($result)){
                    $medicineName = $row["medicineName"];
                    $batchNumber = $row['batchNumber'];
                    $strength = $row['strength'];
                    $dosageForm = $row['dosageForm'];
                    $producedDate = $row['producedDate'];
                    $expiryDate = $row['expiryDate'];
                    $MAId = $row["MAId"];
                    $medicineQuantity = $row['medicineQuantity'];
                }
                $companyName = $_SESSION['companyName'];
                $companyType = $_SESSION['companyType'];
                $sqw = "SELECT companyId FROM tbl_companyList WHERE companyName='$companyName' AND companyType='$companyType'";
                $res = mysqli_query($con,$sqw);
                $rer = mysqli_fetch_array($res);
                $companyId = $rer['companyId'];
                $insert = "INSERT INTO tbl_stock VALUES(null,'$medicineName','$batchNumber','$strength','$dosageForm','$producedDate','$expiryDate','$MAId','$medicineQuantity','$itemId')";
                $query = mysqli_query($conx,$insert);
                if($query){
                $sql2 = "DELETE FROM tbl_pendingStock WHERE pendingId='$pendingId'";
                $result2 = mysqli_query($conx,$sql2);
                if($result2){
                    $sql3 = "UPDATE tbl_verifyDelivery SET status='delivered', recievedDate=CURRENT_TIMESTAMP WHERE itemId='$itemId'";
                    $result3 = mysqli_query($con,$sql3);
                    if($result3){
                        echo('
                        <div class="jumbotron bg-white no-print">
                            <h1 class="text-center text-success">Success.</h1>
                            <p class="text-center">You have recieved a delivery and is now available in stock for sales.</p>
                        </div>
                    ');

                    }
                }
            }
            }
            ?>

</div>


    <?php
        require("footer.php");
    ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/theme.js"></script>            

</body>
</html>