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
    if($userRole!='driver' && $companyType!='Transport'){
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
    <title>Item Delivered | Driver | Transport</title>
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
        <h2 class="text-center">Item Delivered</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="tasks.php">Tasks</a></li>
                <li class="breadcrumb-item active">Item Delivered</li>
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
            $vehicle = $_POST['vehicle'];
            $driverName = $_POST['driverName'];
            $ch = "SELECT itemId FROM tbl_delivery WHERE deliveryId='$deliveryId'";
            $rec = mysqli_query($conx,$ch);
            while($rod = mysqli_fetch_array($rec)){
                $dbItemId = $rod['itemId'];
            }
            if($dbItemId == $itemId){
            $sql = "UPDATE tbl_delivery SET deliveredDate=CURRENT_TIMESTAMP, status='delivered' WHERE deliveryId='$deliveryId'";
            $result = mysqli_query($conx,$sql);
            if($result){
                $sql2 = "INSERT INTO tbl_transportTransaction VALUES (null,'$itemId','$sellerCompany','$buyerCompany','$pickupAddress','$deliveryAddress',CURRENT_TIMESTAMP,'$transportName','$transportId','$driverName','$vehicle','delivered')";
                $result2 = mysqli_query($con,$sql2);
                if($result2){
                    echo('
                    <div class="jumbotron bg-white">
                        <h1 class="text-center text-success">Successful.</h1>
                        <p class="text-center">You have delivered an item.</p>
                    </div>
                ');
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
        }
        else{
            echo('
                    <div class="jumbotron bg-white">
                        <h1 class="text-center text-danger">Error.</h1>
                        <p class="text-center">Incorrect item id. Please make sure you have the right item id.</p>
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