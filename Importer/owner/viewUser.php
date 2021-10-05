<?php 
session_start();
$sId = $_POST["userId"];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View User | Owner | Pharmacy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <script src="js/main.js"></script>
</head>
<body>
    

    <?php
        require("header.php");
    ?>
    
    <div class="container">     
        <h2 class="text-center">View User</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="employee.php">Employee</a></li>
                <li class="breadcrumb-item"><a href="pendingEmployees.php">Pending Employees</a></li>
                <li class="breadcrumb-item active">View User</li>
            </ul>

            <div class="bg-white">
            <?php
                $userInfo="SELECT * FROM tbl_userInfo WHERE userId=$sId ";
               $result=mysqli_query($con,$userInfo);
                while ($row = mysqli_fetch_array($result)) {
                    $firstName=$row["firstName"];
                    $middleName=$row["middleName"];
                    $lastName=$row["lastName"];
                    $dob=$row["dateOfBirth"];
                    $gender=$row["gender"];
                    $idCard=$row["idCard"];
                    $name=$firstName.' '.$middleName.' '.$lastName;
                }
                $userContact="SELECT * FROM tbl_userContact WHERE userId=$sId ";
                $result=mysqli_query($con,$userContact);
                while ($row = mysqli_fetch_array($result)) {
                    $phone1=$row["phone1"];
                    $phone2=$row["phone2"];
                    $email1=$row["email1"];
                    $email2=$row["email2"];
                    $address=$row["address"];
                    $pobox=$row["poBox"];
                    $fax=$row["faxNumber"];
                }
                $login="SELECT * FROM tbl_login WHERE userId=$sId ";
                $result=mysqli_query($con,$login);
                while ($row = mysqli_fetch_array($result)) {
                    $username=$row["userName"];
                    $status=$row["status"];
                    $lastLogin=$row["lastLogin"];
                }
                $userAccount="SELECT * FROM tbl_userAccount WHERE userId=$sId ";
                $result=mysqli_query($con,$userAccount);
                while ($row = mysqli_fetch_array($result)) {
                    $security1=$row["security1"];
                    $answer1=$row["answer1"];
                    $security2=$row["security2"];
                    $answer2=$row["answer2"];
                    $security3=$row["security3"];
                    $answer3=$row["answer3"];
                    $pp=$row["profilePicture"];
                }
            ?>
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-lg-4 col-sm-auto col-md-auto">
                        <div class="card-group">
                            <div class="card ">
                                <div class="profile-header-container">   
                                    <div class="profile-header-img">
                                        <img class="img-circle" src="images/photo.jpg" />
                                        </div>
                                    </div> <hr>
                                <div class="card-body">
                                <h4 class=" card-title">
                                        <i class="fas fa-user-circle pr-1"></i>
                                        <?php echo $name?>
                                    </h4><hr>
                                    <h4 class=" card-title">
                                        <i class="fas fa-mars pr-1"></i>
                                        <?php echo $gender ?>
                                    </h4><hr>
                                    <h4 class=" card-title">
                                        <i class="fas fa-calendar pr-1"></i>
                                        <?php echo $dob?>
                                    </h4>
                                </div>
                                </div>
                        </div>
            </div>
            <div class="col-lg-8 col-md-4 cold-sm-4">
                <div>
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">Account Info</a></li>
                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Contact</a></li>
                    </ul><br><br>
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="tab-1">
                        <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-user pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>User Name </h5>
                                    <?php echo $username?>
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
                                    <h5>Last Login</h5>
                                    <?php echo $lastLogin?>
                                </div>
                            </div><hr>
                        <br></div>
                        <div class="tab-pane" role="tabpanel" id="tab-2">
                        <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-phone fa-rotate-90 pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>Primary Phone Number</h5>
                                    <?php echo $phone1?>
                                </div>
                            </div><hr>
                            <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-phone fa-rotate-90 pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>Secondary Phone Number</h5>
                                    <?php echo $phone2?>
                                </div>
                            </div><hr>
                            <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-at pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>Primary Email Address</h5>
                                    <?php echo $email1?>
                                </div>
                            </div><hr>
                            <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-at pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>Secondary Email Address</h5>
                                    <?php echo $email2?>
                                </div>
                            </div><hr>
                            <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-location-arrow pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>Address</h5>
                                    <?php echo $address?>
                                </div>
                            </div><hr>
                            <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-envelope pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>P.O.Box</h5>
                                    <?php echo $pobox?>
                                </div>
                            </div><hr>
                            <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-fax pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>Fax Number</h5>
                                    <?php echo $fax?>
                                </div>
                            </div><hr>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
            </div>

    </div>

    <?php
        require("footer.php");
    ?>

<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/theme.js"></script>            

</body>
</html>