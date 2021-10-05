<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Check Status | Et-Meds</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
    <script src="js/main.js"></script>
</head>
<body>
    

    <?php
        require("header.php");
    ?>
    <br>

    <div class="container">
    <?php
    $reportId = $_POST["reportId"];
    $sql = "SELECT * FROM tbl_activityReport WHERE publicReportId='$reportId'";
    $result = mysqli_query($conz,$sql);
    $count = mysqli_num_rows($result);
    if($count>=1){
        $row = mysqli_fetch_array($result);

        $status = $row["status"];
        if($status=='pending'){
            echo '
            <div class="jumbotron">
                <h2 class="text-center">Report is pending</h2>
                <p class="text-center">The report is pending. Please wait a while until an officer reviews it.</p>
            </div>'; 
        }
        elseif($status=='active'){
            echo '
            <div class="jumbotron">
                <h2 class="text-center">Report is being investigated at the moment</h2>
                <p class="text-center">The report is currently being investigated by an officer.</p>
            </div>'; 
        }
        elseif($status=='closed'){
            $investigationReport = $row["investigationReport"];
            $investigationMeasure = $row["investigationMeasure"];
            echo '
            <div class="jumbotron">
                <div class="clearfix">
                    <div class="float-left">
                        <h2>Report Id: '.$reportId.'</h2>
                    </div>
                    <div class="float-right">
                        <h2>Status: '.$status.'</h2>
                    </div>
                </div><hr>
                <h2>Report is Closed.</h2>
                <p>The report is closed after an investigation.</p><hr>
                <h2>Investigation Report</h2>
                '.$investigationReport.'<br><hr>
                <h2>Measures Taken</h2>
                '.$investigationMeasure.'
            </div>'; 
        }
        
    }
    else{
        echo '
        <div class="jumbotron">
            <h2 class="text-center text-danger">Sorry</h2>
            <p class="text-center text-danger">We were not able to find </p><h1 class="text-center"><b><u>'.$reportId.'</u></b></h1> <p class="text-center">Make sure that its all numbers and there is gap between them. It should look like 000000 000000</p>
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