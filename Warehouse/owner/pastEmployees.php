<?php
session_start();
$companyName = $_SESSION['companyName'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Past Employees | Owner | Warehouse</title>
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
        <h2 class="text-center">Past Employees</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="employee.php">Employee</a></li>
                <li class="breadcrumb-item active">Past Employee</li>
            </ul>

            <?php
            $sql = "SELECT * FROM tbl_employee WHERE employeeStatus='past'";
            $result = mysqli_query($conx,$sql);
            $count = mysqli_num_rows($result);
            if($count>'0'){
                $result2 = mysqli_query($conx,$sql); 
                $nl=($count/3)+0.7;
                $int=intval($nl);
                $k=0;
               while($k<$int){
                   global $getId;
                   echo '  <div class="row justify-content-left">  ';
                   for($i=0;$i<3;$i++){  
                    $row = mysqli_fetch_array($result2);
                    if($row!=null){ 
                    echo ('<div class="col-sm-6 col-lg-4"><div class="card clean-card text-center">');
                        $getId=$row["employeeId"];
                        $name = $row["employeeName"];
                        $role = $row["employeePosition"];
                        $startDate = $row["startDate"];
                        $endDate = $row["endDate"];
                        $userId = $row["userId"];
                        echo('<div class="card-body info">
                            <h4 class="card-title">'.$name.'</h4><hr>
                            <h4 class="card-title">'.$role.'</h4>
                            <h4 class="card-title">'.$startDate.'</h4>
                            <h4 class="card-title">'.$endDate.'</h4><hr>
                        </div>
                    </div>
                </div><br>');
                   }
                   }
                   echo '</div><br>';
        $k++;
               }
           echo(' </div>');
        }//closing of the active check if 
            else{
                echo('
                <div class="jumbotron">
                    <h1 class="text-center">No Past Employees.</h1>
                    <p class="text-center">You do not have any past employees at the moment.</p>
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