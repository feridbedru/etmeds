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
    <title>Official | Profile | Et-Meds</title>
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
        <h2 class="text-center">Official</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Official</li>
            </ul>
            <?php
            if(isset($_GET['status'])){
        $status = $_GET['status'];
        if($status=="error"){
            echo'
            <div class="container">
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h5 class="text-center">Unable to add Official.</h5>
                </div>
                ';
        }
        else if($status=="success"){
            echo'
            <div class="container">
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h5 class="text-center">Official added successfully</h5>
                </div>
                ';
        }
            }?>
            <?php
            $sql = "SELECT * FROM tbl_officials WHERE userId='".$sId."' ";
                $result = mysqli_query($con,$sql);
                $count = mysqli_num_rows($result);
                if($count=='0'){
                    echo ('
                    <div class="jumbotron">
                        <h1 class="text-center">Sorry!</h1>
                        <p class="text-center">You have not been registered as an official. If you represent an official either from EFMHACA or EPFSA, click the add button to add one.</p>                    
                        <center><button class="btn btn-large btn-success" data-toggle="modal" data-target="#addOfficialModal">Add Official </button></center>
                    </div>
                    ');
                }
                else{
                    $sqla = "SELECT * FROM tbl_officials WHERE userId='".$sId."' ";
                    $resulta = mysqli_query($con,$sqla);
                    while ($rowa = mysqli_fetch_array($resulta)) {
                        $status=$rowa["status"];
                    }
                    if($status=='pending'){
                        echo('
                        <div class="jumbotron">
                            <h1 class="text-center">Role Under Review.</h1>
                            <p class="text-center">Your role as an official is currently under review.</p>
                        </div>
                        ');
                    }
                    else{
                        //add things that you want to display about your officiality

                    }
                }
                ?>

</div>

<!-- Add Official Modal -->
<div class="modal animate" id="addOfficialModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Official</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <p> Make sure that you are one of the folowing roles in order to register as an official
            <ol>
                <li>You currently are working either in EFMHACA or EPFSA</li>
                <li>You have a letter from your organization</li>
                <li>Scanned id card</li>
            </ol>
        </p><hr>
        <center><a href="submitOfficial.php"><button class="btn btn-block btn-success" >Next </button></a></center>
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