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
    <title>View Delivery | Admin | Transport</title>
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
        <h2 class="text-center">View Delivery</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="tasks.php">Tasks</a></li>
                <li class="breadcrumb-item active">View Delivery</li>
            </ul>

            <?php
            $deliveryId = $_POST['deliveryId'];
            $sql = "SELECT * FROM tbl_delivery WHERE deliveryId='$deliveryId'";
            $result = mysqli_query($conx,$sql);
            while($row = mysqli_fetch_array($result)){
                $itemId = $row["itemId"];
                $pickupAddress = $row["pickupAddress"];
                $deliveryAddress = $row["deliveryAddress"];
                $pickedDate = $row["pickedDate"];
                $deliveredDate = $row['deliveredDate'];
                $buyerCompany = $row["buyerCompany"];
                $sellerCompany = $row["sellerCompany"];
                $status = $row["status"];
                $customerPhone1 = $row["customerPhone1"];
                $customerPhone2 = $row["customerPhone2"];
                $customerRepresentative = $row["customerRepresentative"];
                $vehicle = $row["vehicle"];
                $driverName = $row["driverName"];
                $requestedDate = $row["requestedDate"];
                $transportName = $_SESSION['companyName'];
            }
            $sql2 = "SELECT companyId FROM tbl_companyList WHERE companyName='$transportName' AND companyType='Transport'";
            $result2 = mysqli_query($con,$sql2);
            while($rows=mysqli_fetch_array($result2)){
                $transportId = $rows["companyId"];
            }
            ?>

        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Item Id</h5>
                <?php echo $itemId?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Pick Up Address</h5>
                <?php echo $pickupAddress?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Delivery Address</h5>
                <?php echo $deliveryAddress?>
            </div>
        </div><hr>
        <div class="clearfix">
                <div class="float-left mx-1">
                    <i class="fas fa-2x fa-check pr-1"></i>
                </div>
                <div class="float-left">
                    <h5>Picked Date</h5>
                    <?php 
                    if($pickedDate==null){
                        echo "Not picked up yet.";
                    }
                    else{
                        echo $pickedDate;
                    }
                    ?>
                </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Delivered Date</h5>
                <?php 
                    if($deliveredDate==null){
                        echo "Not delivered yet.";
                    }
                    else{
                        echo $deliveredDate;
                    }
                    ?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Buye Company</h5>
                <?php echo $buyerCompany?>
            </div>
        </div><hr>
        <div class="clearfix">
                <div class="float-left mx-1">
                    <i class="fas fa-2x fa-check pr-1"></i>
                </div>
                <div class="float-left">
                    <h5>Seller Company</h5>
                    <?php echo $sellerCompany?>
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
                <h5>Customer Phone Number</h5>
                <?php echo $customerPhone1?><br>
                <?php echo $customerPhone2?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Customer Representative</h5>
                <?php echo $customerRepresentative?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Vehicle</h5>
                <?php
                if($vehicle==null){
                    echo "Vehicle is not assigned for this task yet.";
                }
                else{
                    echo $vehicle;
                }
                ?>
            </div>
        </div><hr>
        <div class="clearfix">
            <div class="float-left mx-1">
                <i class="fas fa-2x fa-check pr-1"></i>
            </div>
            <div class="float-left">
                <h5>Driver Name</h5>
                <?php
                if($driverName==null){
                    echo "Driver has not been assigned to this task yet.";
                }
                else{
                    echo $driverName;
                }
                ?>
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
        if($status=="pending"){
            echo ('
                    <h3 class="text-center"> Actions </h3>
                    <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#assignModal"><i class="fas fa-edit pr-1"></i>Assign Task</button>
                    <br><hr>
                ');
        }
        ?>
</div>
<!--Assign Task Modal -->
<div class="modal animate" id="assignModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Assign Task</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="assignTask.php" method="POST">
            <div class="form-group">
                <label for="driverName">Driver Name</label>
                <input list="driverName" name="driverName"class="form-control item" placeholder="Enter driver name.">
                <datalist id="driverName">
                    <?php
                    $sql = "SELECT employeeName FROM tbl_employee WHERE employeePosition='driver'";
                    $result=mysqli_query($conx,$sql);
                    while ($row = mysqli_fetch_array($result)) {
                        if($row["employeeName"]!==null){
                            echo ('<option value="'.$row["employeeName"].'">');
                        }
                    }
                ?>
                </datalist>
            </div>
            <div class="form-group">
                <label for="plate">Vehicle</label>
                <input list="plate" name="plate"class="form-control item" placeholder="Enter plate number.">
                <datalist id="plate">
                    <?php
                    $sql = "SELECT * FROM tbl_vehicle WHERE status='active'";
                    $result=mysqli_query($conx,$sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $plateNumber = $row['plateNumber'];
                        $plateIdentifier = $row['plateIdentifier'];
                        $plateRegion = $row['plateRegion'];
                        $plate = $plateIdentifier.' '.$plateRegion.' '.$plateNumber;
                            echo ('<option value="'.$plate.'">');
                    }
                ?>
                </datalist>
            </div>
            <?php
            echo('
            <input type="text" value="'.$deliveryId.'" hidden name="deliveryId">
            <input type="text" value="'.$itemId.'" hidden name="itemId">
            <input type="text" value="'.$sellerCompany.'" hidden name="sellerCompany">
            <input type="text" value="'.$buyerCompany.'" hidden name="buyerCompany">
            <input type="text" value="'.$pickupAddress.'" hidden name="pickupAddress">
            <input type="text" value="'.$deliveryAddress.'" hidden name="deliveryAddress">
            <input type="text" value="'.$transportName.'" hidden name="transportName">
            <input type="text" value="'.$transportId.'" hidden name="transportId">
            ');
            ?>
            <button class="btn btn-primary btn-block" type="submit">Assign Task</button>            
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