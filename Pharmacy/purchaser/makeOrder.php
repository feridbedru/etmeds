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
    if($userRole!='purchaser' && $companyType!='Pharmacy'){
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
    <title>Order Made | Purchaser | Pharmacy</title>
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
        <h2 class="text-center">Order Made</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="purchaserOrder.php">Purchase Order</a></li>
                <li class="breadcrumb-item active">Order Made</li>
            </ul>

           <?php
           $publicId = $_POST['publicId'];
           $ids = (explode("/",$publicId));
           $mn = array($ids);
           $sellerCompanyType = $ids[0];
           $sellercompanyId = $ids[1];
           $sellerCompanyName = $_POST['companyName'];
           $purchaserId = $_SESSION['id'];
           $medicineName = $_POST['medicineName'];
           $quantity =$_POST['quantity'];
           $strength = $_POST['strength'];
           $dosageForm = $_POST['dosageForm'];
           $transportName = $_POST['transportName'];
           $buyerCompanyName = $_SESSION['companyName'];
           $buyerCompanyType = $_SESSION['companyType'];
           $sql = "SELECT companyId FROM tbl_companyList WHERE companyName='$buyerCompanyName' AND companyType='$buyerCompanyType'";
           $query = mysqli_query($con, $sql);
           if($query){
               $re = mysqli_fetch_array($query);
               $buyerCompanyId = $re['companyId'];
           }
           $qw = "SELECT firstName, middleName, lastName FROM tbl_userInfo WHERE userId='$purchaserId'";
           $qr = mysqli_query($con, $qw);
           if($qr){
               $rt = mysqli_fetch_array($qr);
               $fn = $rt['firstName'];
               $mn = $rt['middleName'];
               $ln = $rt['lastName'];
               $purchaserName = $fn.' '.$mn.' '.$ln;
           }
           $sql2 = "INSERT INTO tbl_purchaseOrder VALUES(null,'$buyerCompanyName','$buyerCompanyType','$buyerCompanyId','$purchaserName','$medicineName','$quantity','$strength','$dosageForm','$sellerCompanyName','$sellerCompanyType','$sellercompanyId','$transportName','active',CURRENT_TIMESTAMP)";
           $result = mysqli_query($con, $sql2);
           if($result){
                echo('
                <div class="jumbotron bg-white">
                    <h1 class="text-center text-success">Success.</h1>
                    <p class="text-center">You have made a purchase order.</p>
                </div>
            ');
           }
           else{
                echo('
                <div class="jumbotron bg-white">
                    <h1 class="text-center text-danger">Sorry.</h1>
                    <p class="text-center">There was a problem with your request. Please try again.</p>
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