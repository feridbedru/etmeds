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
    if($userRole!='sales' && $companyType!='Distributor'){
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
    <title>View Order | Sales | Distributor</title>
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
                $bCompanyName = $row['bCompanyName'];
                $bCompanyType = $row['bCompanyType'];
                $bCompanyId = $row['bCompanyId'];
                $transportName = $row['transportName'];
                $requestedDate = $row['requestedDate'];
                $status = $row['status'];
            }
            $publicId = $bCompanyType.'/'.$bCompanyId;
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
                <h5>Buyer Company Type</h5>
                <?php echo $bCompanyType?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Buyer Company Name</h5>
                <?php echo $bCompanyName?>
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
        <?php
        if($status=="active"){
            echo ('
            <h3 class="text-center">Actions</h3><br>
            <div class="clearfix">
            <div class="float-left">
            <form method="POST" action="checkSales.php">
                <input type="text" value="'.$publicId.'" hidden name="publicId">
                <input type="text" value="'.$purchaserName.'" hidden name="purchaserName">
                <input type="text" value="'.$medicineName.'" hidden name="medicineName">
                <input type="text" value="'.$quantity.'" hidden name="quantity">
                <input type="text" value="'.$strength.'" hidden name="strength">
                <input type="text" value="'.$dosageForm.'" hidden name="dosageForm">
                <input type="text" value="'.$transportName.'" hidden name="transportName">
                <input type="text" value="'.$id.'" hidden name="purchaseId">
                <input type="text" value="'.$bCompanyName.'" hidden name="companyName">
                <button class="btn btn-lg btn-success">Approve</button>
            </form>
            </div>
            <div class="float-right">
            <form method="POST" action="rejectOrder.php">
            <input type="text" value="'.$id.'" hidden name="purchaseId">
                <button class="btn btn-lg btn-danger">Reject</button>
            </form>
            </div></div>
            ');
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