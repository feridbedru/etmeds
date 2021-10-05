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
    if($userRole!='sales' && $companyType!='Importer'){
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
    <title>View Item | Sales | Importer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
    <script src="js/main.js"></script>
</head>
<body>
    

    <?php
        require("header.php");
    ?>
    
    <div class="container">     
        <h2 class="text-center">View Item</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="stock.php">Stock</a></li>
                <li class="breadcrumb-item active">View Item</li>
            </ul>

            <?php
            $stockId = $_POST['stockId'];
            $sql = "SELECT * FROM tbl_stock WHERE stockId='$stockId'";
            $query = mysqli_query($conx, $sql);
            if($query){
                $row = mysqli_fetch_array($query);
                $medicineName = $row['medicineName'];
                $batchNumber = $row['batchNumber'];
                $strength = $row['strength'];
                $dosageForm = $row['dosageForm'];
                $productionDate = $row['productionDate'];
                $expiryDate = $row['expiryDate'];
                $MAId = $row['MAId'];
            }
            ?>

        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Medicine Name</h5>
                <?php echo $medicineName?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Batch Number</h5>
                <?php echo $batchNumber?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Strength</h5>
                <?php echo $strength?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Dosage Form</h5>
                <?php echo $dosageForm?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Production Date</h5>
                <?php echo $productionDate?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Expiry Date</h5>
                <?php echo $expiryDate?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Market Authorization ID</h5>
                <?php echo $MAId?>
            </div>
        </div><hr>
        

</div>


    <?php
        require("footer.php");
    ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/theme.js"></script>            

</body>
</html>