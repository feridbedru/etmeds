<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Officials | Admin | Et-Meds</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
    <script src="js/main.js"></script>
</head>
<body>
    

    <?php
        require("header.php");
    ?>
    
    <div class="container clearfix">     
        <h2 class="text-center">Officials</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Officials</li>
            </ul>
            
            <!-- <a href="terminateOfficials.php"><button class="btn btn-large btn-primary">Terminate Officials</button></a> &nbsp; &nbsp; -->
            
            <?php
                $sql = "SELECT * FROM tbl_officials WHERE status='pending' ";
                $result = mysqli_query($con,$sql);
                if($result){
                    $count = mysqli_num_rows($result);
                    if($count>=1){
                        echo '
                            <a href="pendingOfficials.php"><button class="btn btn-large btn-primary">Pending Officials 
                            <span class="badge badge-danger">&nbsp;'.$count.'&nbsp;new</span>
                            </button></a>&nbsp; &nbsp;
                        ';
                    }
                }
                ?>
            
                <?php
                $sql = "SELECT * FROM tbl_officials WHERE status='terminated' ";
                $result = mysqli_query($con,$sql);
                if($result){
                    $count = mysqli_num_rows($result);
                    if($count>=1){
                        echo '
                        <a href="pastOfficials.php"><button class="btn btn-large btn-primary">Past Officials
                        <span class="badge badge-danger">&nbsp;'.$count.'&nbsp;</span>
                        </button></a><br><br>
                        ';
                    }
                }
                ?>
            

            <?php
                $sql = "SELECT * FROM tbl_officials WHERE status='active' ";
                $result = mysqli_query($con,$sql);
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
                             $name = $row["name"];
                             $company = $row["company"];
                             $role = $row["role"];
                             $officialId = $row["officialId"];
                             
                             echo('<div class="card-body info">
                                 <hr><h4 class="card-title">'.$name.'</h4><hr>
                                 <h4 class="card-title">'.$company.'</h4>
                                 <h4 class="card-title">'.$role.'</h4>
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