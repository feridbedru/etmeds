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
    if($userRole!='owner' && $companyType!='Distributor'){
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
    <title>Approve Employee | Owner | Distributor</title>
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
        <h2 class="text-center">Employees</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="employee.php">Employee</a></li>
                <li class="breadcrumb-item"><a href="pendingEmployees.php">Pending Employees</a></li>
                <li class="breadcrumb-item active">Approve Employee</li>
            </ul>

        <?php
        $companyName = $_SESSION['companyName'];
        $companyType = $_SESSION['companyType'];
        $id=$_POST["userId"];
        $role=$_POST["position"];
        require("db.php");
        $sql= "UPDATE tbl_employement SET status='active', startDate=CURDATE() WHERE userId='$id' AND companyName='$companyName'";
        $result = mysqli_query($con,$sql);
        if ($result) {
            $login= "UPDATE tbl_login SET companyType = '$companyType', companyName='$companyName', userRole='$role' WHERE userId='$id' ";
            $update2 = mysqli_query($con,$login);
            if($update2){
                global $name;
                $sql2 = "SELECT * FROM tbl_userInfo WHERE userId='$id'";
                $result2=mysqli_query($con,$sql2);
                while ($rows = mysqli_fetch_array($result2)) {
                $fname = $rows["firstName"];
                $mname = $rows["middleName"];
                $lname = $rows["lastName"];
                $name = $fname.' '.$mname.' '.$lname;
                }
                $sql3 = "INSERT INTO tbl_employee VALUES (null,$id,'$name','$role','active',CURDATE(),null)";
                $result3=mysqli_query($conx,$sql3);
                if($result3){
                    echo '
                    <div class="jumbotron">
                        <h1 class="text-center text-success">Success.</h1>
                        <p class="text-center">You have approved an employement request.</p>
                    </div>
                    ';
                }
                
            }
            else{
                echo "Error: " . $login . "<br>" . mysqli_error($con);
            }
        }
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
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