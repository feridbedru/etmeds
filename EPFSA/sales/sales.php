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
    if($userRole!='sales' && $companyType!='EPFSA'){
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
    <title>Sales | Sales | Importer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
</head>
<body>
    

    <?php
        require("header.php");
    ?>
    
    <div class="container">     
        <h2 class="text-center">Sales</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Sales</li>
            </ul>

            
        <ul class="nav nav-tabs">
            <li><a class="nav-link active" role="tab" data-toggle="tab" href="#makeSales">Make Sales</a></li>
            <li><a class="nav-link" role="tab" data-toggle="tab" href="#pastSales">Past Sales</a></li>
        </ul>

        <div class="tab-content">
            <div id="makeSales" class="tab-pane fade show p-3 active">
                <h3 class="text-center">Make Sales</h3>
                <div class="mx-auto">
                    <ul id="progressbar">
                        <li class="active text-center">Buyer</li>
                        <li class="text-center">Medicine</li>
                        <li class="text-center">Transport</li>
                    </ul>
                    <form action="checkSales.php" method="POST" id="msform">
                    <fieldset>
                        <div class="form-group"><label for="publicId">Public Id</label><input class="form-control item" type="text" name="publicId" id="publicId" placeholder="Enter company's public Id."></div>
                        <div class="form-group">
                            <label for="companyName">Company Name</label>
                            <input list="companyName" name="companyName" class="form-control item" placeholder="Enter company name.">
                            <datalist id="companyName">
                                <?php
                                $sql = "SELECT companyName FROM tbl_companyList";
                                $result=mysqli_query($con,$sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    if($row["companyName"]!=null){
                                        echo ('<option value="'.$row["companyName"].'">');
                                    }
                                }
                            ?>
                            </datalist>
                            </div>
                        <div class="form-group">
                            <label for="purchaserName">Purchaser Name</label>
                            <input list="purchaserName" name="purchaserName" class="form-control item" placeholder="Enter purchaser name.">
                            <datalist id="purchaserName">
                                <?php
                                $sql = "SELECT firstName, middleName, lastName FROM tbl_userInfo";
                                $result=mysqli_query($con,$sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    if($row["firstName"]!=null){
                                        echo ('<option value="'.$row["firstName"].' '.$row["middleName"].' '.$row["lastName"].'">');
                                    }
                                }
                            ?>
                            </datalist>
                            </div>
                            <input type="button" name="previous" class="btn btn-warning previous action-button-previous" value="Previous"/>
                        <input type="button" name="next" class="btn btn-success next action-button" value="Next"/>  
                    </fieldset>

                    <fieldset>
                        <div class="form-group">
                            <label for="medicineName">Medicine Name</label>
                            <input list="medicineName" name="medicineName" class="form-control item" placeholder="Enter medicine name.">
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
                        <div class="form-group"><label for="quantity">Quantity</label><input class="form-control item" type="number" name="quantity" id="quantity" placeholder="Enter quantity."></div>
                        <div class="form-group">
                        <label for="strength">Strength</label>
                        <input list="strength" name="strength" class="form-control item" placeholder="Enter strength.">
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
                        <input list="dosageForm" name="dosageForm" class="form-control item" placeholder="Enter dosage form.">
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
                        <input type="button" name="previous" class="btn btn-warning previous action-button" value="Previous"/>
                        <input type="button" name="next" class="btn btn-success next action-button" value="Next"/>
                    </fieldset>

                    <fieldset>
                        <div class="form-group">
                        <label for="transportName">Transport Provider Name</label>
                        <input list="transportName" name="transportName" class="form-control item" placeholder="Enter transport provider name.">
                            <datalist id="transportName">
                                <?php
                                $sql = "SELECT companyName FROM tbl_companyList WHERE companyType='Transport'";
                                $result=mysqli_query($con,$sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    if($row["companyName"]!=null){
                                        echo ('<option value="'.$row["companyName"].'">');
                                    }
                                }
                            ?>
                            </datalist>
                        </div>
                        <div class="form-actions">
                    <hr><br>
                            <center><button type="submit" class="btn btn-primary">Make Sales</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-danger">Cancel</button></center>
                        </div>
                    </fieldset>

                    </form>
                </div>
            </div>
            <div id="pastSales" class="tab-pane fade  p-3">
                <h3 class="text-center">Past Sales</h3>
                <?php
                $sql = "SELECT * FROM tbl_pastSales";
                $result = mysqli_query($conx, $sql);
                $count = mysqli_num_rows($result);
                if($count>0){
                    $nl=($count/3)+0.7;
                    $int=intval($nl);
                    $k=0;
                    while($k<$int){
                        global $getId;
                        echo '  <div class="row justify-content-left">  ';
                        for($i=0;$i<3;$i++){
                            $row = mysqli_fetch_array($result);
                            if($row!=null){ 
                            echo ('<div class="col-sm-6 col-lg-4"><div class="card clean-card text-center">');
                                $buyerCompanyName = $row["buyerCompanyName"];
                                $medicineName = $row["medicineName"];
                                $soldDate = $row["soldDate"];
                                $quantity = $row['quantity'];
                                $salesId = $row["salesId"];
                                echo('<div class="card-body info">
                                    <h4 class="card-title">'.$medicineName.'</h4><hr>
                                    <h4 class="card-title">'.$buyerCompanyName.'</h4>
                                    <h4 class="card-title">'.$quantity.'</h4><hr>
                                    <h4 class="card-title">'.$soldDate.'</h4><hr>
                                    <form method="POST" action="viewSales.php">
                                    <input type="text" value="'.$salesId.'" hidden name="salesId">
                                        <button class="btn btn-primary btn-block">View</button>
                                    </form>
                                    </div>
                            </div>
                        </div><br>');
                        }
                        }
                        echo '</div><br>';
                    $k++;
                    }
                }
                else{
                    echo('
                        <div class="jumbotron bg-white">
                            <h1 class="text-center text-danger">Sorry.</h1>
                            <p class="text-center">There are no past sales.</p>
                        </div>
                    ');
                }
            ?>
            </div>
        </div>
</div>


    <?php
        require("footer.php");
    ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/theme.js"></script>  
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/main.js"></script>        

</body>
</html>