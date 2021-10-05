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
    if($userRole!='sales' && $companyType!='Pharmacy'){
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
    <title>Notification | Sales | Pharmacy</title>
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
        <h2 class="text-center">Notification</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Notification</li>
            </ul>

            <?php
            $username = $_SESSION['username'];
            $userId = $_SESSION['id'];
            $sql = "SELECT * FROM tbl_notification WHERE recieverName='$username' AND recieverId='$userId' ORDER BY sentDate DESC";
            $query = mysqli_query($con, $sql);
            if($query){
                while($row = mysqli_fetch_array($query)){
                    $notId = $row['Id'];
                    $senderName = $row['senderName'];
                    $sentDate = $row['sentDate'];
                    $message = $row['message'];
                    $type = $row['type'];
                    $status = $row['status'];
                    if($status == "unread" && $type="request"){
                        echo ('<a href="viewOrder.php?notId='.$notId.'" target="_blank">
                        <div class="alert alert-success">
                        <p class="text-body">'.$sentDate.'<br> '.$message.'</p>
                        </div></a>
                        ');
                    }
                    else if($status == "unread" && $type="approve"){
                        echo ('
                        <div class="alert alert-success">
                        <p class="text-body">'.$sentDate.'<br> '.$message.'</p>
                        </div>
                        ');
                    }
                    else if($status == "read"){
                        echo ('
                        <div class="alert alert-dark">
                        <p class="text-body">'.$sentDate.'<br> '.$message.'</p>
                        </div>
                        ');
                    }
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