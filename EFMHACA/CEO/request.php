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
    <title>Request | CEO | EFMHACA</title>
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
        <h2 class="text-center">Request</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Request</li>
            </ul>

            <a href="approvedRequest.php"><button class="btn btn-large btn-primary">Approved Requests 
            <?php
                $sql = "SELECT * FROM tbl_request WHERE status='approved' ";
                $result = mysqli_query($conz,$sql);
                if($result){
                    $count = mysqli_num_rows($result);
                    if($count>=1){
                        echo '<span class="badge badge-danger">&nbsp;'.$count.'&nbsp;</span>';
                    }
                }
                ?>
            </button></a>
            <br><br>

            <?php
                $sql = "SELECT * FROM tbl_request WHERE status='active'";
                $result = mysqli_query($conz,$sql);
                $count = mysqli_num_rows($result);
                if($count=='0'){
                    echo ('
                    <div class="jumbotron">
                        <h1 class="text-center text-success">Sorry!</h1>
                        <p class="text-center text-success">There are no active requests.</p>                    
                    </div>
                    ');
                }
                else{
                    $nl=($count/3)+0.7;
                    $int=intval($nl);
                    $k=0;
                    while($k<$int){
                        global $getId;
                        echo '  <div class="row justify-content-left">  ';
                        for($i=0;$i<3;$i++){
                         $row = mysqli_fetch_array($result);
                         if($row!=null){ 
                         echo ('<div class="col-sm-6 col-lg-4"><div class="card clean-card text-center">');
                             $companyName = $row["companyName"];
                             $applicationNumber = $row["applicationNumber"];
                             $medicineName = $row["medicineName"];
                             $quantity = $row["quantity"];
                             $applicationDate = $row["applicationDate"];
                             
                             echo('<div class="card-body info">
                             <h4 class="card-title">Company Name: '.$companyName.'</h4><hr>
                             <h4 class="card-title">Medicine Name: '.$medicineName.'</h4><hr>
                             <h4 class="card-title">Quantity: '.$quantity.'</h4><hr>
                             <h4 class="card-title">Date: '.$applicationDate.'</h4><hr>
                                 <form name="viewRequest" method="POST" action="viewRequest.php">
                                 <input type="text" value="'.$applicationNumber.'" hidden name="applicationNumber">
                                     <button class="btn btn-primary btn-block">View</button>
                                 </form>
                             </div>
                             
                         </div>
                     </div><br>');
                        }
                        }
                        echo '</div><br>';
                    $k++;
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