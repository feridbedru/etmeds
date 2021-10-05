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
    if($userRole!='admin' && $companyType!='Transport'){
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
    <title>Add Vehicle | Admin | Transport</title>
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
        <h2 class="text-center">Add Vehicle</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="vehicles.php">Vehicles</a></li>
                <li class="breadcrumb-item active">Add Vehicle</li>
            </ul>

            <ul id="progressbar">
                <li class="active text-center">Basics</li>
                <li class="text-center">Documents</li>
            </ul>
            <form  action="addNewVehicle.php" method="POST" enctype="multipart/form-data" id="msform">
            <fieldset>
            <div class="form-group"><label for="manufacturedBy">Manufactured By</label><input class="form-control item" type="text" name="manufacturedBy" id="manufacturedBy" placeholder="Enter vehicle manufacturer name." required></div>
            <div class="form-group"><label for="vehicleColor">Vehicle Color</label><input class="form-control item" type="text" name="vehicleColor" id="vehicleColor" placeholder="Enter vehicle color." required></div>
            <div class="form-group"><label for="chasisNumber">Chasis Number</label><input class="form-control item" type="text" name="chasisNumber" id="chasisNumber" placeholder="Enter chasis number." required></div>
            <input type="button" name="previous" class="btn btn-warning previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="btn btn-success next action-button" value="Next"/>
            </fieldset>
            <fieldset>
            <div class="form-group"><label for="plateRegion">Plate Region</label><input class="form-control item" type="text" name="plateRegion" id="plateRegion" placeholder="Enter plate region." required></div>
            <div class="form-group">
                <label for="plateIdentifier">Plate Identifier </label><br>
                <input class="form-control" list="plateIdentifier" required name="plateIdentifier" placeholder="Enter plate identifier code number">
                <datalist id="plateIdentifier">
                    <?php
                        for($i=0; $i<50; $i++){
                            echo ('<option value="'.$i.'">');
                        }
                    ?>
                </datalist>
            </div>
            <div class="form-group"><label for="plateNumber">Plate Number</label><input class="form-control item" type="number" name="plateNumber" id="plateNumber" placeholder="Enter plate number." required></div>
            <div class="form-group">Libre</label><br><input type="file" class="form-control-file border text-center" name="libre" required></div>         
            <div class="form-actions clearfix">
                   <center> <button type="submit" class="btn btn-primary">Register</button> &nbsp; &nbsp;&nbsp;
                    <button type="button" class="btn btn-danger">Cancel</button></center>
                </div>
            </fieldset>
            </form>


</div>


    <?php
        require("footer.php");
    ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/theme.js"></script>            

</body>
</html>