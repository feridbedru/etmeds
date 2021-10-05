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
    <title>Vehicle Added | Admin | Transport</title>
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
        <h2 class="text-center">Vehicle Added</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="vehicles.php">Vehicles</a></li>
                <li class="breadcrumb-item"><a href="addVehicle.php">Add Vehicle</a></li>
                <li class="breadcrumb-item active">Vehicle Added</li>
            </ul>

            <?php
            $manufacturedBy = $_POST['manufacturedBy'];
            $vehicleColor = $_POST['vehicleColor'];
            $chasisNumber = $_POST['chasisNumber'];
            $plateRegion =$_POST['plateRegion'];
            $plateIdentifier = $_POST['plateIdentifier'];
            $plateNumber = $_POST['plateNumber'];
            $li = $_FILES['libre']['tmp_name'];
            $libre = addslashes(file_get_contents($li));
            $sql = "INSERT INTO tbl_vehicle VALUES (null,'$manufacturedBy','$vehicleColor','$plateNumber','$plateRegion','$plateIdentifier','active','$chasisNumber','$libre')";
            $result =mysqli_query($conx,$sql);
            if($result){
                echo('
                <div class="jumbotron bg-white">
                    <h1 class="text-center text-success">Success.</h1>
                    <p class="text-center">You have registered a vehicle successfully.</p>
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