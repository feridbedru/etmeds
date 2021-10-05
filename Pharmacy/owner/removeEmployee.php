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
    if($userRole!='owner' && $companyType!='Pharmacy'){
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
    <title>Remove Employee | Owner | Pharmacy</title>
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
        <h2 class="text-center">Remove Employee</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="employee.php">Employee</a></li>
                <li class="breadcrumb-item active">Remove Employee</li>
            </ul>

            <?php
            $employeeId = $_POST["employeeId"];
            $userId = $_POST["userId"];
            $stat = "UPDATE tbl_employee SET employeeStatus='past', endDate=CURRENT_DATE WHERE employeeId='$employeeId'";
            $query = mysqli_query($conx,$stat);
            if($query){
                $empl = "UPDATE tbl_employement SET `status`='past', endDate=CURRENT_DATE WHERE userId='$userId'";
                $res = mysqli_query($con,$empl);
                if($res){
                    $login = "UPDATE tbl_login SET companyType='', companyName='', userRole='' WHERE userId='$userId'";
                    $set = mysqli_query($con,$login);
                    if($set){
                        echo ' 
                        <div class="jumbotron">
                            <h1 class="text-center text-success">Success.</h1>
                            <p class="text-center">You have removed an employee.</p>
                        </div>
                        ';
                    }
                    else{
                        echo "Error: " . $login . "<br>" . mysqli_error($con);
                    }
                }
                else{
                    echo "Error: " . $empl . "<br>" . mysqli_error($con);
                }
            }
            else{
                echo "Error: " . $stat . "<br>" . mysqli_error($conx);
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