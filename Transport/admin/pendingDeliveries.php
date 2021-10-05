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
    <title>Pending Deliveries | Admin | Transport</title>
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
        <h2 class="text-center">Pending Deliveries</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Pending Deliveries</li>
            </ul>

            <?php
            $sql = "SELECT * FROM tbl_delivery WHERE status='pending' ";
            $result = mysqli_query($conx,$sql);
            $count = mysqli_num_rows($result);
            if($count>0){
                $i=1;
                echo('
                    <table class="table table-responsive table-hover table-striped">
                    <thead>
                    <tr>
                    <th>No.</th>
                    <th>Seller Company</th>
                    <th>Pick Up Address</th>
                    <th>Buyer Company</th>
                    <th>Delivery Address</th>
                    <th>Requested Date</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    ');
                    while ($row = mysqli_fetch_array($result)) {
                        echo('<tr>');
                        echo('<td>'.$i.'</td>');
                        $sellerCompany = $row["sellerCompany"];
                        $pickupAddress = $row["pickupAddress"];
                        $buyerCompany = $row["buyerCompany"];
                        $deliveryAddress = $row["deliveryAddress"];
                        $requestedDate = $row["requestedDate"];
                        $deliveryId = $row["deliveryId"];
                        echo ('<td>'.$sellerCompany.' </td>');
                        echo ('<td>'.$pickupAddress.' </td>');
                        echo ('<td>'.$buyerCompany.' </td>');
                        echo ('<td>'.$deliveryAddress.' </td>');
                        echo ('<td>'.$requestedDate.' </td>');
                        echo ('
                        <td>
                        <form name="viewDelivery" method="POST" action="viewDelivery.php" target="_blank">
                        <input type="text" value="'.$deliveryId.'" hidden name="deliveryId">
                            <button class="btn btn-primary">View</button>
                        </form>
                        </td>');
                        echo ('</tr>');
                        $i++;
                    }
                    echo('
                        </tbody>
                        </table>
                    ');
            }
            else{
                echo('
                <div class="jumbotron bg-white">
                    <h1 class="text-center text-danger">No Pending Deliveries.</h1>
                    <p class="text-center">There are no pending deliveries.</p>
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