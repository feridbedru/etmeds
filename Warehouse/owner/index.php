<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home | Owner | Warehouse</title>
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
        <h2 class="text-center">Dashboard</h2>
        <ul class="breadcrumb">
            <li class="breadcrumb-item active">Home</li>
        </ul>

        <?php
        $username = $_SESSION['username'];
        $userId = $_SESSION['id'];
        $sql = "SELECT * FROM tbl_notification WHERE recieverName='$username' AND recieverId='$userId' AND status='unread'";
        $query = mysqli_query($con, $sql);
        $count = mysqli_num_rows($query);
        if($count>0){
            echo ('
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h5 class="text-center">You have '.$count.' new notifications. &nbsp; &nbsp; &nbsp;<a href="notification.php"><button class="btn btn-primary">View Notification</button></a></h5>
                    
                </div>
            ');
        }
                $cemployee = "SELECT * FROM tbl_employee WHERE employeeStatus='active' ";
                $queryce = mysqli_query($conx,$cemployee);
                $cemployeeCount = mysqli_num_rows($queryce);

                $pemployee = "SELECT * FROM tbl_employee WHERE employeeStatus='past' ";
                $queryc = mysqli_query($conx,$pemployee);
                $pemployeeCount = mysqli_num_rows($queryc);

                $stock = "SELECT * FROM tbl_stock";
                $querys = mysqli_query($conx,$stock);
                $stockCount = mysqli_num_rows($querys);

                $pendingStock = "SELECT * FROM tbl_pendingStock";
                $queryps = mysqli_query($conx,$pendingStock);
                $pendingStockCount = mysqli_num_rows($queryps);

                $pastSales = "SELECT * FROM tbl_pastSales ";
                $querypss = mysqli_query($conx,$pastSales);
                $pastSalesCount = mysqli_num_rows($querypss);

                $expiredDefected = "SELECT * FROM tbl_expiredDefected ";
                $queryed = mysqli_query($conx,$expiredDefected);
                $expiredDefectedCount = mysqli_num_rows($queryed);                
            ?>

        <div class="row justify-content-left">
            <div class="col-sm-6 col-lg-4">
                <div class="card clean-card text-center pt-1">
                    <h1 class="display-1"><?php echo $cemployeeCount ?></h1>
                    <hr>
                    <h3>Current Employees</h3>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card clean-card text-center pt-1">
                    <h1 class="display-1"><?php echo $pemployeeCount ?></h1>
                    <hr>
                    <h3>Past Employees</h3>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card clean-card text-center pt-1">
                    <h1 class="display-1"><?php echo $stockCount ?></h1>
                    <hr>
                    <h3>Current Stock</h3>
                </div>
            </div>
        </div><br>

        <div class="row justify-content-left">
            <div class="col-sm-6 col-lg-4">
                <div class="card clean-card text-center pt-1">
                    <h1 class="display-1"><?php echo $pendingStockCount ?></h1>
                    <hr>
                    <h3>Pending Stock</h3>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card clean-card text-center pt-1">
                    <h1 class="display-1"><?php echo $pastSalesCount ?></h1>
                    <hr>
                    <h3>Past Sales</h3>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card clean-card text-center pt-1">
                    <h1 class="display-1"><?php echo $expiredDefectedCount ?></h1>
                    <hr>
                    <h3>Expired Medicines</h3>
                </div>
            </div>
        </div><br>
    </div>


    <?php
        require("footer.php");
    ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/theme.js"></script>

</body>

</html>