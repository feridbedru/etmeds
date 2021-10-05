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
    if($userRole!='owner' && $companyType!='Transport'){
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
    <title>Employee | Owner | Transport</title>
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
        <h2 class="text-center">Employees</h2>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Employee</li>
        </ul>

        
                <?php
                $sql = "SELECT * FROM tbl_employement WHERE companyName='$companyName' AND status='pending' ";
                $result2 = mysqli_query($con,$sql);
                if($result2){
                    $count2 = mysqli_num_rows($result2);
                    if($count2>=1){
                        echo '
                        <a href="pendingEmployees.php"><button class="btn btn-large btn-primary">Pending Employees
                        <span class="badge badge-danger">&nbsp;'.$count2.' new</span>
                        </button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        ';
                    }
                }
                ?>

            <?php
                $sql = "SELECT * FROM tbl_employee WHERE employeeStatus='past' ";
                $result2 = mysqli_query($conx,$sql);
                if($result2){
                    $count2 = mysqli_num_rows($result2);
                    if($count2>=1){
                        echo '
                        <a href="pastEmployees.php"><button class="btn btn-large btn-primary">Past Employees
                        </button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        ';
                    }
                }
                ?> 

        <?php
            $sql = "SELECT * FROM tbl_employee WHERE employeeStatus='active'";
            $result = mysqli_query($conx,$sql);
            $count = mysqli_num_rows($result);
            if($count>'0'){
                $sql2 = "SELECT * FROM tbl_employee WHERE employeeStatus='active'";
                $result2 = mysqli_query($conx,$sql2); 
                $nl=($count/3)+0.7;
                $int=intval($nl);
                $k=0;
               while($k<$int){
                   global $getId;
                   global $userId;
                   echo '  <div class="row justify-content-left">  ';
                   for($i=0;$i<3;$i++){  
                    $row = mysqli_fetch_array($result2);
                    if($row!=null){ 
                    echo ('<div class="col-sm-6 col-lg-4"><div class="card clean-card text-center">');
                        $getId=$row["employeeId"];
                        $name = $row["employeeName"];
                        $role = $row["employeePosition"];
                        $userId = $row["userId"];
                        $startDate = $row["startDate"];
                        echo('<div class="card-body info">
                            <h4 class="card-title">'.$name.'</h4><hr>
                            <h4 class="card-title">'.$role.'</h4>
                            <h4 class="card-title">'.$startDate.'</h4>
                            <button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#removeEmployeeModal'.$getId.'">Remove</button>
                            
                        </div>
                        
                    </div>
                    <!-- Delete User Modal -->
                            <div class="modal animate" id="removeEmployeeModal'.$getId.'">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Remove Employee</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                <section class="pt-4 pb-4">
                                            <p>Are you sure you want to remove this employee? You can not undo this.</p>
                                            <form method="POST" action="removeEmployee.php">
                                            <input type="text" value="'.$getId.'" hidden name="employeeId">
                                            <input type="text" value="'.$userId.'" hidden name="userId">
                                                <button class="btn btn-danger float-left" type="submit">Remove</button>  
                                                <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
                                            </form>
                                    </section>
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- End of Modal--> 
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
                    <h1 class="text-center">No Employees.</h1>
                    <p class="text-center">You do not have any employees at the moment.</p>
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