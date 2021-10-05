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
    if($userRole!='purchaser' && $companyType!='Distributor'){
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
    <title>Accept Delivery | Purchaser | Distributor</title>
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
        <h2 class="text-center">Accept Delivery</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Accept Delivery</li>
            </ul>

            <?php
            $sql = "SELECT * FROM tbl_pendingStock";
            $result = mysqli_query($conx, $sql);
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
                            $itemId = $row["salesId"];
                            $medicineName = $row["medicineName"];
                            $MAId = $row["MAId"];
                            $pendingId = $row["pendingId"];
                            echo('<div class="card-body info">
                                <h4 class="card-title">'.$itemId.'</h4><hr>
                                <h4 class="card-title">'.$medicineName.'
                                <h4 class="card-title">'.$MAId.'<hr>
                                <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#acceptModal'.$pendingId.'"><i class="fas fa-edit pr-1"></i>Accept Delivery</button>
                                <!--Accept Delivery Modal -->
                                <div class="modal animate" id="acceptModal'.$pendingId.'">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Accept Delivery</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    <form action="deliveryRecieved.php" method="POST">
                                    <input type="text" value="'.$itemId.'" hidden name="itemId">                                       
                                    <input type="text" value="'.$pendingId.'" hidden name="pendingId">                                       
                                     <h5>You have recieved this item and now items will be added to your stock.</h5>       
                                    <button class="btn btn-primary btn-block" type="submit">Yes, I understand</button>            
                                        </form>
                                    </div>
                                    </div>
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
                        <p class="text-center">There are no pending items.</p>
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