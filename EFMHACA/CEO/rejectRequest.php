<?php
session_start();
if(isset($_SESSION['id']))
{
    $sId = $_SESSION['id'];
    $companyName = $_SESSION['companyName'];
    $userRole = $_SESSION['role'];
    $companyType = $_SESSION['companyType'];
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
    <title>Reject Request | CEO | EFMHACA</title>
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
        <h2 class="text-center">Reject Request</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="request.php">Requests</a></li>
                <li class="breadcrumb-item active">Reject Request</li>
            </ul>

            <?php
                $MAId = $_POST['MAId'];
                $applicationNumber = $_POST['applicationNumber'];
                $sql = "UPDATE tbl_request SET status='rejected' WHERE applicationNumber='$applicationNumber' ";
                $query = mysqli_query($conz,$sql);
                $count = mysqli_num_rows($query);
                if($count>0){
                    echo '
                    <div class="jumbotron">
                        <h1 class="text-center text-success">Success</h1>
                        <p class="text-center  text-success">Request rejected successfully.</p>                    
                    </div>
                    ';
                }
                else{
                    echo '
                    <div class="jumbotron">
                        <h1 class="text-center text-error">Error</h1>
                        <p class="text-center  text-error">Unable to reject request.</p>                    
                    </div>
                    ';
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