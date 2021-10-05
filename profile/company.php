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
    <title>Company | Profile | Et-Meds</title>
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
        <h2 class="text-center">Company Page</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Company </li>
            </ul>

            <?php
            if(isset($_GET['status'])){
        $status = $_GET['status'];
        if($status=="error"){
            echo'
            <div class="container">
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h5 class="text-center">Unable to add company.</h5>
                </div>
                ';
        }
        else if($status=="success"){
            echo'
            <div class="container">
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h5 class="text-center">Company added successfully</h5>
                </div>
                ';
        }
            }?>
            <?php
                $sql = "SELECT * FROM tbl_companyList WHERE ownerId='".$sId."' ";
                $result = mysqli_query($con,$sql);
                $count = mysqli_num_rows($result);
                if($count=='0'){
                    echo ('
                    <div class="jumbotron">
                        <h1 class="text-center">Sorry!</h1>
                        <p class="text-center">You do not have any company. click the below button to register.</p>
                        <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCompanyModal">Add Company</button></center>
                    </div>
                    ');
                }
                else{
                    $sqla = "SELECT * FROM tbl_companyList WHERE ownerId='".$sId."' ";
                    $resulta = mysqli_query($con,$sqla);
                    while ($rowa = mysqli_fetch_array($resulta)) {
                        $status=$rowa["status"];
                    }
                    if($status=='pending'){
                        echo('
                        <div class="jumbotron">
                            <h1 class="text-center">Company Under Review.</h1>
                            <p class="text-center">Your company is under review. Please wait a while until it is approved.</p>
                        </div>
                        ');
                    }
                    else{
                        echo ('
                        <div class="jumbotron">
                            <h1 class="text-center">Sorry!</h1>
                            <p class="text-center">You do not have any company. click the below button to register.</p>
                            <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCompanyModal">Add Company</button></center>
                        </div>
                        ');

                    }
                }
            ?>

    </div>
<!-- Add Company Modal -->
<div class="modal animate" id="addCompanyModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Before You start</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <div class="container">
                <p>Make sure that you have the required documents for registration</p>
                <hr><a href="addCompany.php"><button class="btn btn-success mx-auto" type="button">Add Company</button></a>&nbsp;&nbsp;
                <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
            </div>
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