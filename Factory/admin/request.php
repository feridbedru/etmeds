<?php
session_start();
if(isset($_SESSION['id']))
{
    $sId = $_SESSION['id'];
    $companyName = $_SESSION['companyName'];
    $userRole = $_SESSION['role'];
    $companyType = $_SESSION['companyType'];
    if($userRole!='admin' && $companyType!='Factory'){
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
    <title>Request | Admin | Factory</title>
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
        <h2 class="text-center">Request Page</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Request</li>
            </ul>

            <button class="btn btn-large btn-success" data-toggle="modal" data-target="#makeRequestModal">Make Request
            </button>&nbsp; &nbsp;
            
            <a href="approvedRequests.php"><button class="btn btn-large btn-primary">Approved Requests 
            <?php
                $sql = "SELECT * FROM tbl_request WHERE companyName='$companyName' AND status='approved' ";
                $result = mysqli_query($conz,$sql);
                if($result){
                    $count = mysqli_num_rows($result);
                    if($count>=1){
                        echo '<span class="badge badge-danger">&nbsp;'.$count.'&nbsp;</span>';
                    }
                }
                ?>
            </button></a>
            <hr>
            <?php
            if(isset($_GET['status'])){
            $status = $_GET['status'];
            if($status=="error"){
                echo'
                <div class="container">
                    <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h5 class="text-center">Unable to make request.</h5>
                    </div>
                    ';
            }
            else if($status=="success"){
                echo'
                <div class="container">
                    <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h5 class="text-center">Request made successfully</h5>
                    </div>
                    ';
            }
        }
            ?>
            <?php
                $sql = "SELECT * FROM tbl_request WHERE applicantId='".$sId."' ORDER BY applicationDate DESC";
                $result = mysqli_query($conz,$sql);
                $count = mysqli_num_rows($result);
                if($count=='0'){
                    echo ('
                    <div class="jumbotron">
                        <h1 class="text-center">Sorry!</h1>
                        <p class="text-center">You have not made any requests so far.</p>                    
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
                             $applicationNumber = $row["applicationNumber"];
                             $medicineName = $row["medicineName"];
                             $quantity = $row["quantity"];
                             $applicationDate = $row["applicationDate"];
                             
                             echo('<div class="card-body info">
                                 <h4 class="card-title">Medicine Name: '.$medicineName.'</h4><hr>
                                 <h4 class="card-title">Quantity: '.$quantity.'</h4><hr>
                                 <h4 class="card-title">Application Date: '.$applicationDate.'</h4><hr>
                                 <form name="viewRequest" method="POST" action="viewRequest.php" class="view">
                                 <input type="text" value="'.$applicationNumber.'" hidden name="applicationNumber">
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

<!-- Make Request Modal -->
<div class="modal animate" id="makeRequestModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Make Request</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <p> Before you start, make sure that you have the neccessary documents inorder to proceed.
        </p><hr>
        <center><a href="makeRequest.php"><button class="btn btn-large btn-success btn-block" >I do have the documents </button></a></center>
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