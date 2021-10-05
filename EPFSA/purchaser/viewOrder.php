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
    if($userRole!='purchaser' && $companyType!='EPFSA'){
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
    <title>View Order | Purchaser | EPFSA</title>
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
        <h2 class="text-center">View Order</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="purchaseOrder.php">Purchase Order</a></li>
                <li class="breadcrumb-item active">View Order</li>
            </ul>

            <?php
            $id = $_POST['purchaseId'];
            $sql = "SELECT * FROM tbl_purchaseOrder WHERE id='$id'";
            $query = mysqli_query($con, $sql);
            if($query){
                $row = mysqli_fetch_array($query);
                $purchaserName = $row['purchaserName'];
                $medicineName = $row['medicineName'];
                $quantity = $row['quantity'];
                $strength = $row['strength'];
                $dosageForm = $row['dosageForm'];
                $sCompanyName = $row['sCompanyName'];
                $sCompanyType = $row['sCompanyType'];
                $transportName = $row['transportName'];
                $requestedDate = $row['requestedDate'];
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
                <h5>Quantity</h5>
                <?php echo $quantity?>
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
                <h5>Purchaser Name</h5>
                <?php echo $purchaserName?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Seller Company Type</h5>
                <?php echo $sCompanyType?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Seller Company Name</h5>
                <?php echo $sCompanyName?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Transport Company Name</h5>
                <?php echo $transportName?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Requested Date</h5>
                <?php echo $requestedDate?>
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