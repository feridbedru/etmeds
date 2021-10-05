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
    if($userRole!='CEO' && $companyType!='EFMHACA'){
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
    <title>Request Approved | CEO | EFMHACA</title>
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
        <h2 class="text-center">Request Approved</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="request.php">Request</a></li>
                <li class="breadcrumb-item active">Request Approved</li>
            </ul>

            <?php
            $applicationNumber = $_POST["applicationNumber"];
            $MAId = $_POST["MAId"];
            $username = $_SESSION['username'];
            $approvalComment = $_POST["approvalComment"];
            $sql = "UPDATE tbl_review SET approvedDate=CURRENT_DATE, approvedBy='$username', approvalComment='$approvalComment' WHERE applicationNumber='$applicationNumber'";
            $result = mysqli_query($conz,$sql);
            if($result){
                $sqla = "UPDATE tbl_request SET status='approved' WHERE applicationNumber='$applicationNumber'";
                $update = mysqli_query($conz,$sqla);
                if($update){
                    $sqlm = "SELECT * FROM tbl_request WHERE applicationNumber='$applicationNumber'";
                    $result = mysqli_query($conz,$sqlm);
                    while ($row = mysqli_fetch_array($result)) {
                        $medicineName = $row["medicineName"];
                        $batchNumber = $row["batchNumber"];
                        $productionDate = $row["productionDate"];
                        $expiryDate = $row["expiryDate"];
                        $MAId = $row["MAId"];
                        $companyName = $row['companyName'];
                        $quantity = $row["quantity"];
                        $companyType = $row["companyType"];
                        $strength = $row["strength"];
                        $dosageForm = $row["dosageForm"];
                    }
                    $company = str_replace(' ','',$companyName);
                    $database = $companyType.$company;
                    $conf = mysqli_connect("localhost","root","",$database);
                    $add = "INSERT INTO tbl_stock VALUES(null,'$medicineName','$batchNumber','$strength','$dosageForm','$productionDate','$expiryDate','$MAId','$quantity') ";
                    $res = mysqli_query($conf,$add);
                    if($res){
                        echo'
                        <div class="jumbotron">
                            <h1 class="text-center text-success">Success</h1>
                            <p class="text-center  text-success">You have successfully approved the request and the applicant has now added items in to the store.</p>                    
                        </div>
                        ';
                    }
                }
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