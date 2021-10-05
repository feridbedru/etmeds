<?php
session_start();
if(isset($_SESSION['id']))
{
    $sId = $_SESSION['id'];
    $companyName = $_SESSION['companyName'];
    $userRole = $_SESSION['role'];
    $companyType = $_SESSION['companyType'];
    if($userRole!='admin' && $companyType!='Factory'){
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
    <title>Make Request | Admin | Factory</title>
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
        <h2 class="text-center">Make Request</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="request.php">Request</a></li>
                <li class="breadcrumb-item active">Make Request</li>
            </ul>
            <h3 class="text-center">Request Form</h3>
            <ul id="progressbar">
                <li class="active text-center">Medicine</li>
                <li class="text-center">Market</li>
                <li class="text-center">Documents</li>
            </ul>
            <form action="addStock.php" method="POST" id="msform" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group">
                    <label for="medicineName">Medicine Name</label>
                    <input list="medicineName" name="medicineName" class="form-control item" placeholder="Enter medicine name." required>
                        <datalist id="medicineName">
                            <?php
                            $sql = "SELECT distinct brandName FROM tbl_mris";
                            $result=mysqli_query($conz,$sql);
                            while ($row = mysqli_fetch_array($result)) {
                                if($row["brandName"]!=null){
                                    echo ('<option value="'.$row["brandName"].'">');
                                }
                            }
                        ?>
                        </datalist>
                    </div>
                <div class="form-group"><label for="batchNumber">Batch Number</label><input class="form-control item" type="text" name="batchNumber" id="batchNumber" placeholder="Enter batch number" required></div>
                <div class="form-group">
                <label for="strength">Strength</label>
                <input list="strength" name="strength" class="form-control item" placeholder="Enter strength." required>
                    <datalist id="strength">
                        <?php
                        $sql = "SELECT distinct strength FROM tbl_mris";
                        $result=mysqli_query($conz,$sql);
                        while ($row = mysqli_fetch_array($result)) {
                            if($row["strength"]!=null){
                                echo ('<option value="'.$row["strength"].'">');
                            }
                        }
                    ?>
                    </datalist>
                </div>
                <div class="form-group">
                <label for="dosageForm">Dosage Form</label>
                <input list="dosageForm" name="dosageForm" class="form-control item" placeholder="Enter dosage form." required>
                    <datalist id="dosageForm">
                        <?php
                        $sql = "SELECT distinct dosageForm FROM tbl_mris";
                        $result=mysqli_query($conz,$sql);
                        while ($row = mysqli_fetch_array($result)) {
                            if($row["dosageForm"]!=null){
                                echo ('<option value="'.$row["dosageForm"].'">');
                            }
                        }
                    ?>
                    </datalist>
                </div>
                <div class="form-group"><label for="productionDate">Production Date</label><input class="form-control item" type="date" name="productionDate" id="productionDate" required></div>                        
                <div class="form-group"><label for="expiryDate">Expiry Date</label><input class="form-control item" type="date" name="expiryDate" id="expiryDate" required></div> 
                <input type="button" name="previous" class="btn btn-warning previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="btn btn-success next action-button" value="Next"/> 
            </fieldset>
            <fieldset>                        
                <div class="form-group"><label for="MAId">Market Authorization ID</label><input class="form-control item" type="text" name="MAId" id="MAId" placeholder="Enter market authorization Id." required></div>
                <div class="form-group">
                    <label for="manufacturer">Manufactured By</label>
                    <input list="manufacturer" name="manufacturer" class="form-control item" placeholder="Enter manufacturer name." required>
                    <datalist id="manufacturer">
                        <?php
                        $sql = "SELECT DISTINCT manufacturer FROM tbl_mris";
                        $result=mysqli_query($conz,$sql);
                        while ($row = mysqli_fetch_array($result)) {
                            if($row["manufacturer"]!=null){
                                echo ('<option value="'.$row["manufacturer"].'">');
                            }
                        }
                    ?>
                    </datalist>
                    </div>
                <div class="form-group"><label for="quantity">Quantity</label><input class="form-control item" type="number" name="quantity" id="quantity" placeholder="Enter quantity." min="1" required></div>
                <input type="button" name="previous" class="btn btn-warning previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="btn btn-success next action-button" value="Next"/> 
            </fieldset>
            <fieldset>                
                <div class="form-group">Documents</label><br>
                <input type="file" name="documents" required></div> 
                <div class="form-group">Application Form</label><br>
                <input type="file" name="applicationForm" required></div> 
                <div class="form-group">Agreement</label><br>
                <input type="file" name="agreement" required></div><hr><br>
                <center><button type="clear" class="btn btn-secondary">Clear</button>&nbsp;
                <button class="btn btn-primary" type="submit">Make Request</button></center>
            </fieldset>
            </form>

</div>


    <?php
        require("footer.php");
    ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/theme.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/main.js"></script> 
    <script src="js/bootstrap-validate.js"></script>
    <script>
        bootstrapValidate('#batchNumber','alphanum:Enter a valid batch number');
        bootstrapValidate(['#MAId','#quantity'],'integer:Enter a valid integer');
    </script>               

</body>
</html>