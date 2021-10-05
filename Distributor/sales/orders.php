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
    if($userRole!='sales' && $companyType!='Distributor'){
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
    <title>Orders | Sales | Distributor</title>
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
        <h2 class="text-center">Orders</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Orders</li>
            </ul>

            <ul class="nav nav-tabs">
                <li><a class="nav-link active" role="tab" data-toggle="tab" href="#activeOrders">Active Orders</a></li>
                <li><a class="nav-link" role="tab" data-toggle="tab" href="#pastOrders">Past Orders</a></li>
            </ul>

            <div class="tab-content">
                <div id="activeOrders" class="tab-pane fade show p-3 active">
                    <h3 class="text-center">Active Orders</h3>
                    <?php
                        $companyName = $_SESSION['companyName'];
                        $companyType = $_SESSION['companyType'];
                        $sql = "SELECT * FROM tbl_purchaseOrder WHERE sCompanyName='$companyName' AND `status`='active'";
                        $result = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($result);
                        if($count>0){
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
                                        $requestedDate = $row["requestedDate"];
                                        $medicineName = $row["medicineName"];
                                        $bCompanyName = $row["bCompanyName"];
                                        $quantity = $row['quantity'];
                                        $id = $row["id"];
                                        echo('<div class="card-body info">
                                            <h4 class="card-title">'.$medicineName.'</h4><hr>
                                            <h4 class="card-title">'.$bCompanyName.'
                                            <h4 class="card-title">'.$quantity.'<hr>
                                            <h4 class="card-title">'.$requestedDate.'
                                            <form method="POST" action="viewOrder.php"><hr>
                                            <input type="text" value="'.$id.'" hidden name="purchaseId">
                                                <button class="btn btn-primary btn-block">View</button>
                                            </form>
                                            </div>
                                            </div>
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
                                    <p class="text-center">There are no active orders.</p>
                                </div>
                            ');
                        }
                        ?>
                </div>
                <div id="pastOrders" class="tab-pane fade show p-3">

                </div>
            </div>

</div>


    <?php
        require("footer.php");
    ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/theme.js"></script>            

</body>
</html>