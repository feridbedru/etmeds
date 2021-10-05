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
    <title>Tasks | Admin | Transport</title>
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
        <h2 class="text-center">Tasks</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Tasks</li>
            </ul>

            <?php
                $sqls = "SELECT * FROM tbl_delivery WHERE status='delivered' ";
                $result2 = mysqli_query($conx,$sqls);
                if($result2){
                    $count2 = mysqli_num_rows($result2);
                    if($count2>=1){
                        echo '
                        <a href="pendingDeliveries.php"><button class="btn btn-large btn-primary">Past Deliveries
                        
                        </button></a>&nbsp; &nbsp; &nbsp;';
                    }
                }
            ?>
            <?php
                $sqls = "SELECT * FROM tbl_delivery WHERE status='pending' ";
                $result2 = mysqli_query($conx,$sqls);
                if($result2){
                    $count2 = mysqli_num_rows($result2);
                    if($count2>=1){
                        echo '
                        <a href="pendingDeliveries.php"><button class="btn btn-large btn-primary">Pending Deliveries
                        <span class="badge badge-danger">';
                        echo ($count2.' new');
                        echo '
                        </span>
                        </button></a>';
                    }
                }
            ?><br><hr>
            <h3 class="text-center">Active Deliveries</h3>
            <?php
            $sql = "SELECT * FROM tbl_delivery WHERE status='active'";
            $result = mysqli_query($conx,$sql);
            $count = mysqli_num_rows($result);
            if($count>0){
                $nl=($count/3)+0.7;
                    $int=intval($nl);
                    $k=0;
                    while($k<$int){
                        echo '  <div class="row justify-content-left">  ';
                        for($i=0;$i<3;$i++){
                         $row = mysqli_fetch_array($result);
                         if($row!=null){ 
                         echo ('<div class="col-sm-6 col-lg-4"><div class="card clean-card text-center">');
                             $buyerCompany = $row["buyerCompany"];
                             $sellerCompany = $row["sellerCompany"];
                             $itemId = $row["itemId"];
                             $deliveryId = $row["deliveryId"];
                             
                             echo('<div class="card-body info">
                                 <h4 class="card-title">'.$itemId.'</h4><hr>
                                 <h4 class="card-title">'.$buyerCompany.'</h4>
                                 <h4 class="card-title">'.$sellerCompany.'</h4>
                                 <form name="viewDelivery" method="POST" action="viewDelivery.php">
                                 <input type="text" value="'.$deliveryId.'" hidden name="deliveryId">
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
            else{
                echo('
                <div class="jumbotron bg-white">
                    <h1 class="text-center text-danger">Sorry.</h1>
                    <p class="text-center">There are no active deliveries.</p>
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