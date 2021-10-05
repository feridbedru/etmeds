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
    if($userRole!='owner' && $companyType!='Importer'){
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
    <title>Reject Employee | Owner | Importer</title>
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
        <h2 class="text-center">Reject Employee</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="employee.php">Employee</a></li>
                <li class="breadcrumb-item"><a href="pendingEmployees.php">Pending Employees</a></li>
                <li class="breadcrumb-item active">Reject Employee</li>
            </ul>

            <?php
            $employeeId = $_POST["employeeId"];
            $sql = "DELETE FROM tbl_employement WHERE employeeId='$employeeId'";
            $result = mysqli_query($con,$sql);
            if($result){
                echo '
                <div class="jumbotron">
                    <h1 class="text-center text-success">Success.</h1>
                    <p class="text-center">You have rejected an employement request.</p>
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