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
        </div><br><hr>
        <h3 class="text-center">Actions</h3>
        <div class="clearfix">
            <div class="float-left">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-edit pr-1"></i>Delete Vehicle</button>
            </div>
            <div class="float-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modifyModal"><i class="fas fa-edit pr-1"></i>Modify Vehicle</button>
            </div>
        </div>

</div>

<!--Change vehicle Modal -->
<div class="modal animate" id="modifyModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modify Vehicle</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form  action="updateVehicle.php" method="POST" enctype="multipart/form-data" id="msform">
            <div class="form-group"><label for="manufacturedBy">Manufactured By</label><input class="form-control item" type="text" name="manufacturedBy" id="manufacturedBy" value="<?php echo $manufacturedBy?>" required></div>
            <div class="form-group"><label for="vehicleColor">Vehicle Color</label><input class="form-control item" type="text" name="vehicleColor" id="vehicleColor" value="<?php echo $vehicleColor?>" required></div>
            <div class="form-group"><label for="chasisNumber">Chasis Number</label><input class="form-control item" type="text" name="chasisNumber" id="chasisNumber" value="<?php echo $chasisNumber?>" required></div>
            <div class="form-group"><label for="plateRegion">Plate Region</label><input class="form-control item" type="text" name="plateRegion" id="plateRegion" value="<?php echo $plateRegion?>" required></div>
            <div class="form-group"><label for="plateIdentifier">Plate Identifier</label><input class="form-control item" type="text" name="plateIdentifier" id="plateIdentifier" value="<?php echo $plateIdentifier?>" required></div>
            <div class="form-group"><label for="plateNumber">Plate Number</label><input class="form-control item" type="number" name="plateNumber" id="plateNumber" value="<?php echo $plateNumber?>" required></div>
            <div class="form-group"><input class="form-control item" type="text" name="vehicleId" id="vehicleId" value="<?php echo $vehicleId?>" hidden required></div>
            <button class="btn btn-primary btn-block" type="submit">Update Vehicle</button>            
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End of Modal-->

    <?php
        require("footer.php");
    ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/theme.js"></script>            

</body>
</html>