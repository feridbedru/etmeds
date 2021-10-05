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
    <title>Vehicles | Admin | Transport</title>
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
        <h2 class="text-center">Vehicles</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Vehicles</li>
            </ul>

        <hr><a href="addVehicle.php"><button class="btn btn-large btn-success">Add New Vehicle</button></a>&nbsp;&nbsp;&nbsp;            

        <?php
            $sql = "SELECT * FROM tbl_vehicle WHERE status='repair' ";
            $result2 = mysqli_query($conx,$sql);
            if($result2){
                $count2 = mysqli_num_rows($result2);
                if($count2>=1){
                    echo '
                    <a href="lockedUsers.php"><button class="btn btn-large btn-primary">View Maintainance Requests
                    <span class="badge badge-danger">';
                    echo ($count2.' new');
                    echo '
                    </span>
                    </button></a><br>';
                }
            }
        ?>
        <hr>

        <?php
                $sql = "SELECT * FROM tbl_vehicle WHERE status='active' ";
                $result = mysqli_query($conx,$sql);
                $count = mysqli_num_rows($result);
                if($count=='0'){
                    echo ('
                    <div class="jumbotron">
                        <h1 class="text-center">Sorry!</h1>
                        <p class="text-center">There are no active registered officials on the system.</p>                    
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
                             $manufacturedBy = $row["manufacturedBy"];
                             $plateNumber = $row["plateNumber"];
                             $plateRegion = $row["plateRegion"];
                             $plateIdentifier = $row["plateIdentifier"];
                             $vehicleId = $row["vehicleId"];
                             
                             echo('<div class="card-body info">
                                 <h4 class="card-title">'.$manufacturedBy.'</h4><hr>
                                 <h4 class="card-title"><span class="badge badge-pill badge-default bg-success text-white">'.$plateIdentifier.'</span>'.$plateRegion.' '.$plateNumber.'</h4><hr>
                                 <form name="viewVehicle" method="POST" action="viewVehicle.php">
                                 <input type="text" value="'.$vehicleId.'" hidden name="vehicleId">
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