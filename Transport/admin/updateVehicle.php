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
    <title>Update Vehicle | Admin | Transport</title>
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
        <h2 class="text-center">Update Vehicle</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="vehicles.php">Vehicle</a></li>
                <li class="breadcrumb-item active">Update Vehicle</li>
            </ul>

           <?php
           $manufacturedBy = $_POST['manufacturedBy'];
           $vehicleColor = $_POST['vehicleColor'];
           $chasisNumber = $_POST['chasisNumber'];
           $plateRegion =$_POST['plateRegion'];
           $plateIdentifier = $_POST['plateIdentifier'];
           $plateNumber = $_POST['plateNumber'];
           $vehicleId = $_POST['vehicleId'];
           $sql = "UPDATE tbl_vehicle SET manufacturedBy='$manufacturedBy', vehicleColor='$vehicleColor', chasisNumber='$chasisNumber', plateRegion='$plateRegion', plateIdentifier='$plateIdentifier', plateNumber='$plateNumber' WHERE vehicleId='$vehicleId'";
           $result = mysqli_query($conx,$sql);
           if($result){
            echo('
            <div class="jumbotron bg-white">
                <h1 class="text-center text-success">Success.</h1>
                <p class="text-center">You have updated a vehicle information successfully.</p>
            </div>
            ');
           }
           else{
            echo('
            <div class="jumbotron bg-white">
                <h1 class="text-center text-danger">Error.</h1>
                <p class="text-center">An error occured while handling your request. Please try again in a moment</p>
            </div>
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