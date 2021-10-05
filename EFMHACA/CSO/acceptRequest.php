<?php
session_start();
if(isset($_SESSION['id']))
{
    $sId = $_SESSION['id'];
    $companyName = $_SESSION['companyName'];
    $userRole = $_SESSION['role'];
    $companyType = $_SESSION['companyType'];
    if($userRole!='CSO' && $companyType!='EFMHACA'){
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
    <title>Request Accepted | CSO | EFMHACA</title>
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
        <h2 class="text-center">Request Accepted</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="request.php">Request</a></li>
                <li class="breadcrumb-item active">Request Accepted</li>
            </ul>

            <?php
            $applicationNumber = $_POST["applicationNumber"];
            $MAId = $_POST["MAId"];
            $username = $_SESSION['username'];
            $approvalComment = $_POST["approvalComment"];
            $sql = "INSERT INTO tbl_review VALUES (null,'$applicationNumber','$MAId','$username','$approvalComment',CURRENT_TIMESTAMP,null,null,null)";
            $result = mysqli_query($conz,$sql);
            if($result){
                $sqla = "UPDATE tbl_request SET status='active' WHERE applicationNumber='$applicationNumber'";
                $update = mysqli_query($conz,$sqla);
                if($update){
                    echo '
                    <div class="jumbotron">
                        <h1 class="text-center text-success">Success</h1>
                        <p class="text-center  text-success">You have successfully reviewed and accepted the application. The CEO now will finally approve it.</p>                    
                    </div>
                    ';
                }
                else{
                    echo '
                    <div class="jumbotron">
                        <h1 class="text-center text-error">Error</h1>
                        <p class="text-center  text-success">Unable to make request.</p>                    
                    </div>
                    ';
                }
            }
            else{
                echo '
                    <div class="jumbotron">
                        <h1 class="text-center text-error">Error</h1>
                        <p class="text-center  text-error">Unable to make request.</p>                    
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