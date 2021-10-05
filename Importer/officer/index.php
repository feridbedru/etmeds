<?php
session_start();
if(isset($_SESSION['id']))
{
    $sId = $_SESSION['id'];
    $userRole = $_SESSION['role'];
    $companyType = $_SESSION['companyType'];
    if($userRole!='officer' && $companyType!='Importer'){
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
    <title>Home | Officer | Importer</title>
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
            </ul><hr>

        <?php
        $requesta = "SELECT * FROM tbl_request WHERE status='approved' ";
        $queryr = mysqli_query($conz,$requesta);
        $requestCount = mysqli_num_rows($queryr);

        $requestar = "SELECT * FROM tbl_request WHERE status='pending' ";
        $queryra = mysqli_query($conz,$requestar);
        $requestCount2 = mysqli_num_rows($queryra);
        ?>

        <div class="row justify-content-left">
            <div class="col-sm-6 col-lg-4">
                <div class="card clean-card text-center pt-1">
                    <h1 class="display-1"><?php echo $requestCount ?></h1>
                    <hr>
                    <h3>Approved Requests</h3>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card clean-card text-center pt-1">
                    <h1 class="display-1"><?php echo $requestCount2 ?></h1>
                    <hr>
                    <h3>Pending Requests</h3>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card clean-card text-center pt-1">
                    <h1 class="display-1">0</h1>
                    <hr>
                    <h3>Rejected Requests</h3>
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