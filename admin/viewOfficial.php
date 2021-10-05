<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View Official | Admin | Et-Meds</title>
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
        <h2 class="text-center">View Officials</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="officials.php">Officials</a></li>
                <li class="breadcrumb-item"><a href="pendingOfficials.php">Pending Officials</a></li>
                <li class="breadcrumb-item active">View Official</li>
            </ul>

            <?php
            $officialId = $_POST["officialId"];
            $sql = "SELECT * FROM tbl_officials WHERE officialId='$officialId'";
            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);
            if($count>0){
                $row = mysqli_fetch_array($result);
                $name = $row['name'];
                $status = $row['status'];
                $role = $row['role'];
                $company = $row['company'];
                $region = $row['region'];
                $town = $row['town'];
                $registrationDate = $row['registrationDate'];
                $idCard = $row['idCard'];
                $confirmationLetter = $row['confirmationLetter'];
                $userId = $row['userId'];
            }    
            ?>

                            <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-user pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>Full Name </h5>
                                    <?php echo $name?>
                                </div>
                            </div><hr>
                            <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-check pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>Status</h5>
                                    <?php echo $status?>
                                </div>
                            </div><hr>
                            <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-calendar pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>Company</h5>
                                    <?php echo $company?>
                                </div>
                            </div><hr>
                            <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-user pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>Role</h5>
                                    <?php echo $role?>
                                </div>
                            </div><hr>
                            <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-check pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>Region</h5>
                                    <?php echo $region?>
                                </div>
                            </div><hr>
                            <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-calendar pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>Town</h5>
                                    <?php echo $town?>
                                </div>
                            </div><hr>
                            <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-calendar pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>Registration Date</h5>
                                    <?php echo $registrationDate?>
                                </div>
                            </div><hr>
                            <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-calendar pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>Confirmation Letter</h5>
                                    <a href="viewImages.php?id=<?php echo $officialId ?>&type=confirmationLetter" target="_blank"><button class="btn btn-primary">View</button></a>
                                </div>
                            </div><hr>
                            <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-calendar pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>Office ID Card</h5>
                                    <a href="viewImages.php?id=<?php echo $officialId ?>&type=idCard" target="_blank"><button class="btn btn-primary">View</button></a>
                                </div>
                            </div><hr>
                            <?php
                            if($status=="pending"){
                                echo ('
                                <h3 class="text-center">Actions</h3><br>
                                <div class="clearfix">
                                <div class="float-left">
                                <form name="approveOfficial" method="POST" action="approveOfficial.php">
                                    <input type="text" value="'.$officialId.'" hidden name="officialId">
                                    <input type="text" value="'.$userId.'" hidden name="userId">
                                    <input type="text" value="'.$company.'" hidden name="company">
                                    <input type="text" value="'.$role.'" hidden name="role">
                                    <button class="btn btn-success">Approve</button>
                                </form>
                                </div>
                                <div class="float-right">
                                <form name="rejectOfficial" method="POST" action="rejectOfficial.php">
                                <input type="text" value="'.$officialId.'" hidden name="officialId">
                                    <button class="btn btn-danger">Reject</button>
                                </form>
                                </div></div>
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