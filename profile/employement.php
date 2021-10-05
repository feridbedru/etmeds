<?php
session_start();
if(isset($_SESSION['id']))
{
    $sId = $_SESSION['id'];
}
else{
	header("location:../login.php?status=login");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Employement | Profile | Et-Meds</title>
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
        <h2 class="text-center">Employement Page</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Employement </li>
            </ul>
            <?php
            if(isset($_GET['status'])){
        $status = $_GET['status'];
        if($status=="error"){
            echo'
            <div class="container">
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h5 class="text-center">Unable to add employement.</h5>
                </div>
                ';
        }
        else if($status=="success"){
            echo'
            <div class="container">
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h5 class="text-center">Employement added successfully</h5>
                </div>
                ';
        }
            }?>
            <?php
                $sql = "SELECT * FROM tbl_employement WHERE userId='".$sId."'";
                $result = mysqli_query($con,$sql);
                $count = mysqli_num_rows($result);
                if($count=='0'){
                    echo ('
                    <div class="jumbotron">
                        <h1 class="text-center">Sorry!</h1>
                        <p class="text-center">You currently do not have any employement. click the below button to add your employement.</p>
                        <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEmployementModal">Add Employement</button></center>                    
                    </div>
                    ');
                }
                else{
                    $sqla = "SELECT * FROM tbl_employement WHERE userId='".$sId."' ";
                    $resulta = mysqli_query($con,$sqla);
                    while ($rowa = mysqli_fetch_array($resulta)) {
                        $status=$rowa["status"];
                    }
                    if($status=='pending'){
                        echo('
                        <div class="jumbotron">
                            <h1 class="text-center">Employement Under Review.</h1>
                            <p class="text-center">Your Employement is currently under review.</p>
                        </div>
                        ');
                    }
                    else{
                        //add things that you want to display about your company
                        echo ('
                        <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEmployementModal">Add Employement</button></center>                    
                        ');
                    }
                }
            ?>
</div>

<!-- Add Employement Modal -->
<div class="modal animate" id="addEmployementModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Employement</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="form form-clean" action="addEmployement.php" method="POST">
            <div class="form-group">
                <label for="companyName">Company Name </label><br>
                <input class="form-control" list="companyName" required name="companyName" placeholder="type in company name">
                <datalist id="companyName">
                    <?php
                        $sql = "SELECT companyName FROM tbl_companyList";
                        $result=mysqli_query($con,$sql);
                        while ($row = mysqli_fetch_array($result)) {
                            if($row["companyName"]!==""){
                                echo ('<option value="'.$row["companyName"].'">');
                            }
                        }
                    ?>
                </datalist>
            </div>
            <div class="form-group">
                <label for="position">Position </label><br>
                <select id="position" name="position" class="form-control item" required>
                    <option value="sales">Sales</option>
                    <option value="purchaser">Purchaser</option>
                    <option value="admin">Admin</option>
                    <option value="officer">Officer</option>
                    <option value="driver">Driver</option>
                </select>
            </div>
            <hr><div class="form-group"><button class="btn btn-success btn-block" type="submit">Submit</button></div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End of Modal-->


    <?php
        require("footer.php");
    ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/theme.js"></script>            

</body>
</html>