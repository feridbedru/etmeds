<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View Vehicle | Admin | Transport</title>
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
        <h2 class="text-center">View Vehicle</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="vehicles.php">Vehicles</a></li>
                <li class="breadcrumb-item active">View Vehicle</li>
            </ul>

            <?php
            $vehicleId = $_POST['vehicleId'];
            $sql = "SELECT * FROM tbl_vehicle WHERE vehicleId='$vehicleId'";
            $result = mysqli_query($conx,$sql);
            while($row = mysqli_fetch_array($result)){
                $manufacturedBy = $row["manufacturedBy"];
                $plateNumber = $row["plateNumber"];
                $plateRegion = $row["plateRegion"];
                $plateIdentifier = $row["plateIdentifier"];
                $vehicleColor = $row["vehicleColor"];
                $status = $row["status"];
                $chasisNumber = $row["chasisNumber"];
                $libre = $row["libre"];
            }
            ?>
            <div class="clearfix">
                <div class="float-left mx-1">
                    <i class="fas fa-2x fa-check pr-1"></i>
                </div>
                <div class="float-left">
                    <h5>Manufacturer Name</h5>
                    <?php echo $manufacturedBy?>
                </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Vehicle Color</h5>
                <?php echo $vehicleColor?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Chasis Number</h5>
                <?php echo $chasisNumber?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Plate</h5>
                <?php 
                echo ('<span class="badge badge-pill badge-default bg-success text-white">'.$plateIdentifier.'</span>'.$plateRegion.' '.$plateNumber.''); 
                ?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Status</h5>
                <?php echo $status?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Libre</h5>
                <img class="img img-fluid" src="data:image/jpg;base64,<?php echo base64_encode($libre); ?>" />  
            </div>
        </div>
        </div>

    <?php
        require("footer.php");
    ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/theme.js"></script>            

</body>
</html>