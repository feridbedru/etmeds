<?php
session_start();
if(isset($_SESSION['id']))
{
    $sId = $_SESSION['id'];
    $companyName = $_SESSION['companyName'];
    $userRole = $_SESSION['role'];
    $companyType = $_SESSION['companyType'];
    if($userRole!='officer' && $companyType!='Importer'){
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
    <title>View Request | Officer | Importer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <script src="js/main.js"></script>
</head>
<body>
    

    <?php
        require("header.php");
    ?>
    
    <div class="container">     
        <h2 class="text-center">View Request</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="request.php">Request</a></li>
                <li class="breadcrumb-item active">View Request</li>
            </ul>

        <?php
        $applicationNumber = $_POST["applicationNumber"];
        $sql = "SELECT * FROM tbl_request WHERE applicationNumber='$applicationNumber'";
        $result = mysqli_query($conz,$sql);
        while ($row = mysqli_fetch_array($result)) {
            $medicineName = $row["medicineName"];
            $batchNumber = $row["batchNumber"];
            $productionDate = $row["productionDate"];
            $expiryDate = $row["expiryDate"];
            $MAId = $row["MAId"];
            $documents = $row["documents"];
            $applicationForm = $row["applicationForm"];
            $agreement = $row["agreement"];
            $companyName = $row['companyName'];
            $manufacturedBy = $row["manufacturedBy"];
            $quantity = $row["quantity"];
            $applicationDate = $row["applicationDate"];
            $companyType = $row["companyType"];
            $strength = $row["strength"];
            $dosageForm = $row["dosageForm"];
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
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Manufactured By</h5>
                <?php echo $manufacturedBy?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Company Name</h5>
                <?php echo $companyName?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Company Type</h5>
                <?php echo $companyType?>
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
                <h5>Application Date</h5>
                <?php echo $applicationDate?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Document</h5>
                <a href="viewDocument.php?id=<?php echo $applicationNumber?>&type=documents"><button class="btn btn-primary">View Document</button></a>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Application Form</h5>
                <a href="viewDocument.php?id=<?php echo $applicationNumber?>&type=applicationForm"><button class="btn btn-primary">View Document</button></a>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Agreement</h5>
                <a href="viewDocument.php?id=<?php echo $applicationNumber?>&type=agreement"><button class="btn btn-primary">View Document</button></a>
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