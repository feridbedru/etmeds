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
    if($userRole!='sales' && $companyType!='EPFSA'){
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
    <title>Stock | Sales | Importer</title>
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
        <h2 class="text-center">Stock</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Stock</li>
            </ul>

            <div class="clearfix">
            <div class="float-left">
            <?php
                $ws = "SELECT * FROM tbl_expiredDefected";
                $qr = mysqli_query($conx, $ws);
                if($qr){
                    $count2 = mysqli_num_rows($qr);
                    if($count2>0){
                        echo '
                            <a href="lockedUsers.php"><button class="btn btn-large btn-primary">View Expired Medicines
                            <span class="badge badge-danger">';
                            echo ($count2.' new');
                            echo '
                            </span>
                            </button></a><br>';
                    }
                }
            ?>
            </div>
            <div class="float-right">
                <form class="form" action="searchStock.php" method="POST">
                    <div class="form-group">
                        <input list="medicineName" name="medicineName">
                        <datalist id="medicineName">
                            <?php
                            $sql = "SELECT distinct medicineName FROM tbl_stock";
                            $result=mysqli_query($conx,$sql);
                            while ($row = mysqli_fetch_array($result)) {
                                if($row["medicineName"]!==""){
                                    echo ('<option value="'.$row["medicineName"].'">');
                                }
                            }
                        ?>
                        </datalist>
                        <button class="btn btn-primary" type="submit">Search</button></div>
                </form>
            </div>
        </div>
        <hr>

        <?php
        $sql2 = "SELECT * FROM tbl_stock GROUP BY batchNumber ORDER BY medicineName ASC";
        $query2 = mysqli_query($conx, $sql2);
        $count = mysqli_num_rows($query2);
        if($count>0){
            $nl=($count/3)+0.7;
                $int=intval($nl);
                $k=0;
               while($k<$int){
                   echo '  <div class="row justify-content-left">  ';
                   for($i=0;$i<3;$i++){  
                    $row = mysqli_fetch_array($query2);
                    if($row!=null){ 
                    echo ('<div class="col-sm-6 col-lg-4"><div class="card clean-card text-center">');
                        $medicineName=$row["medicineName"];
                        $strength = $row["strength"];
                        $dosageForm = $row["dosageForm"];
                        $expiryDate = $row["expiryDate"];
                        $stockId = $row["stockId"];
                        echo('<div class="card-body info">
                            <h4 class="card-title">'.$medicineName.'</h4><hr>
                            <h4 class="card-title">'.$strength.' '.$dosageForm.'</h4>
                            <h4 class="card-title">'.$expiryDate.'</h4><hr>
                            <form method="POST" action="viewItem.php">
                            <input type="text" value="'.$stockId.'" hidden name="stockId">
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
           echo(' </div>');
        }
        else{
            echo('
            <div class="jumbotron bg-white">
                <h1 class="text-center text-danger">No Items.</h1>
                <p class="text-center">There are no items in the stock.</p>
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