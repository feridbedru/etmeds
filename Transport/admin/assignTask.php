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
    <title>Task Assignment | Admin | Transport</title>
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
        <h2 class="text-center">Task Assignment</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="tasks.php">Tasks</a></li>
                <li class="breadcrumb-item"><a href="pendingDeliveries.php">Pending Deliveries</a></li>
                <li class="breadcrumb-item active">Task Assignment</li>
            </ul>

            <?php
            $deliveryId = $_POST['deliveryId'];
            $itemId = $_POST['itemId'];
            $sellerCompany = $_POST['sellerCompany'];
            $buyerCompany = $_POST['buyerCompany'];
            $pickupAddress = $_POST['pickupAddress'];
            $deliveryAddress = $_POST['deliveryAddress'];
            $transportName = $_POST['transportName'];
            $transportId = $_POST['transportId'];
            $plate = $_POST['plate'];
            $driverName = $_POST['driverName'];
            $sql = "UPDATE tbl_delivery SET driverName='$driverName', vehicle='$plate', status='active' WHERE deliveryId='$deliveryId'";
            $result = mysqli_query($conx,$sql);
            if($result){
                $sql2 = "INSERT INTO tbl_transportTransaction VALUES (null,'$itemId','$sellerCompany','$buyerCompany','$pickupAddress','$deliveryAddress',CURRENT_TIMESTAMP,'$transportName','$transportId','$driverName','$plate','assigned')";
                $result2 = mysqli_query($con,$sql2);
                if($result2){
                    $sql3 = "INSERT INTO tbl_verifyDelivery VALUES (null,'$itemId','$transportName','$driverName','$plate','active',null)";
                    $result3 = mysqli_query($con,$sql3);
                    if($result3){
                        echo('
                        <div class="jumbotron bg-white">
                            <h1 class="text-center text-success">Successful.</h1>
                            <p class="text-center">You have assigned a driver along with a vehicle for a task.</p>
                        </div>
                    ');
                    }
                }
                else{
                    echo('
                    <div class="jumbotron bg-white">
                        <h1 class="text-center text-danger">Error.</h1>
                        <p class="text-center">An error occured while making transaction</p>
                    </div>
                ');
                }
            }
            else{
                echo('
                    <div class="jumbotron bg-white">
                        <h1 class="text-center text-danger">Error.</h1>
                        <p class="text-center">An error occured while making transaction</p>
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