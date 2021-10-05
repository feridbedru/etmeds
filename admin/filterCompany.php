<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php $companyType=$_POST["companyType"]; echo $companyType; ?> Company | Admin | Et-Meds</title>
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
        echo '<h2 class="text-center">'.$companyType.' Company</h2><hr>';
        $sql = "SELECT * FROM tbl_companyList WHERE status='active' AND companyType='$companyType'";
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if($count>'0'){
            $sql = "SELECT * FROM tbl_companyList WHERE status='active' AND companyType='$companyType'";
            $result2 = mysqli_query($con,$sql);
            $count2 = mysqli_num_rows($result2);
            if($count2!='0'){
            $nl=($count2/3)+0.7;
            $int=intval($nl);
            $k=0;
        while($k<$int){
            global $getId;
            echo '  <div class="row justify-content-left">  ';
            for($i=0;$i<3;$i++){
                $row = mysqli_fetch_array($result2);
                if($row!=null){ 
                echo ('<div class="col-sm-6 col-lg-4"><div class="card clean-card text-center">');
                    $companyId = $row["companyId"];
                    $companyName = $row["companyName"];
                    $companyType = $row["companyType"];
                    $registeredDate = $row["registeredDate"];
                    
                    echo('<div class="card-body info">
                        <h4 class="card-title">'.$companyName.'</h4>
                        <h4 class="card-title">'.$companyType.'</h4>
                        <h4 class="card-title">'.$registeredDate.'</h4>
                        <form name="viewCompany" method="POST" action="viewCompany.php" class="view">
                        <input type="text" value="'.$companyId.'" hidden name="companyId">
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
    echo(' </div>');
    }//closing of the active check if 
        else{
            echo('
            <div class="jumbotron bg-white">
                <h1 class="text-center text-danger">No Companies.</h1>
                <p class="text-center">There is no company with specified filter.</p>
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