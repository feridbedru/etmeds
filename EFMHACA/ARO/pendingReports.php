<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pending Reports | ARO | EFMHACA</title>
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
        <h2 class="text-center">Pending Reports</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Pending Reports</li>
            </ul>

            <?php
               $id = $_SESSION['id'];
               $sql = "SELECT * FROM tbl_officials WHERE userId='$id'";
               $result = mysqli_query($con,$sql);
               while($row = mysqli_fetch_array($result)){
                   $region = $row['region'];
                   $town = $row['town'];
               }
               $check = "SELECT * FROM tbl_activityReport WHERE region='$region' AND status='pending'";
               $query = mysqli_query($conz,$check);
               $count = mysqli_num_rows($query);
               if($count==0){
                echo ('
                <div class="jumbotron">
                    <h2 class="text-center text-danger">No reports.</h2>
                    <p class="text-center text-danger">unfortunately there are no reports in Region: '.$region.' </p>
                </div>
                ');
               }
               else{
                   echo ('<h5 class="text-center">Reports in '.$region.'</h5><br>');
                    $nl=($count/3)+0.7;
                    $int=intval($nl);
                    $k=0;
                    while($k<$int){
                        echo '  <div class="row justify-content-left">  ';
                        for($i=0;$i<3;$i++){
                        $row = mysqli_fetch_array($query);
                        if($row!=null){ 
                        echo ('<div class="col-sm-6 col-lg-4"><div class="card clean-card text-center">');
                            $publicReportId = $row["publicReportId"];
                            $organizationName = $row["organizationName"];
                            $reportDate = $row["reportDate"];
                            $reportId = $row["reportId"];
                            
                            echo('<div class="card-body info">
                                <h4 class="card-title">ID: '.$publicReportId.'</h4><hr>
                                <h4 class="card-title">'.$organizationName.'</h4>
                                <h4 class="card-title">'.$reportDate.'</h4><hr>
                                <form name="viewReport" method="POST" action="viewReport.php">
                                <input type="text" value="'.$reportId.'" hidden name="reportId">
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