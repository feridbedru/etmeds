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
    <title>Profile | Et-Meds</title>
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
        <h2 class="text-center">Your Profile</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active"> </li>
            </ul>

            <div class="bg-white">
            <?php
            if(isset($_GET['status'])){
            $status = $_GET['status'];
            if($status=="error"){
                echo'
                <div class="container">
                    <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h5 class="text-center">Unable to make update.</h5>
                    </div>
                    ';
            }
            else if($status=="success"){
                echo'
                <div class="container">
                    <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h5 class="text-center">Update made successfully</h5>
                    </div>
                    ';
            }
            else if($status=="pass"){
                echo'
                <div class="container">
                    <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h5 class="text-center">password changed successfully</h5>
                    </div>
                    ';
            }
                }
                ?>
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
                                        <img class="img img-circle img-fluid" src="data:image/jpg;base64,<?php echo base64_encode($pp); ?>" />
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
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#basicModal"><i class="fas fa-edit pr-1"></i>Edit Basic Information</button>
                                <hr>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#passwordModal"><i class="fas fa-edit pr-1"></i>Change Password</button>
                            </div>
                        </div>
            </div>
            <div class="col-lg-8 col-md-4 cold-sm-4">
                <div>
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">Account Info</a></li>
                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3">Employement</a></li>
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
                            <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-calendar pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>Id Card</h5>
                                    <img class="img img-circle img-fluid" src="data:image/jpg;base64,<?php echo base64_encode($idCard); ?>" />                                    
                                </div>
                            </div><hr>
                            <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-question pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>Security Question #1</h5>
                                    <?php echo $security1?>
                                </div>
                            </div><hr>
                            <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-question pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>Security Question #2</h5>
                                    <?php echo $security2?>
                                </div>
                            </div><hr>
                            <div class="clearfix">
                                <div class="float-left mx-1">
                                    <i class="fas fa-2x fa-question pr-1"></i>
                                </div>
                                <div class="float-left">
                                    <h5>Security Question #3</h5>
                                    <?php echo $security3?>
                                </div>
                            </div><hr>
                            <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#securityModal"><i class="fas fa-edit pr-1"></i>Edit Security Information</button>
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
                            </div><hr><br>
                            <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#contactModal"><i class="fas fa-edit pr-1"></i>Edit Contact Information</button>
                        <br></div>
                        <div class="tab-pane" role="tabpanel" id="tab-3">
                            <?php
                            
                            $sql = "SELECT * FROM tbl_employement WHERE userName='$username'";
                            $pop = mysqli_query($con,$sql);
                            $cc = mysqli_num_rows($pop);
                            if($cc>0){
                                while($row = mysqli_fetch_array($pop)){
                                    $companyName = $row['companyName'];
                                    $position = $row['position'];
                                    $statuss = $row['status'];
                                    $startDate = $row['startDate'];
                                    $endDate = $row['endDate'];
                                    echo ('
                                    You worked as '.$position.' at a company named '.$companyName.' starting from '.$startDate.' upto '.$endDate.' .<hr>');
                                }

                            }
                            else{
                                echo ('
                                <div class="jumbotron">
                                    <h1>No Employement Added.</h1>
                                    <p>You currently are not employed to any company. To add an employement, Click the add button below.</p>
                                    <button type="button" class="btn btn-success">Add Employement</button>
                                </div>
                                ');
                            }
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            </div>

    </div>

<!-- Basic Info Modal -->
<div class="modal animate" id="basicModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Basic Information</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <div class="container">
                <form name="login-detail" method="POST" action="updateBasic.php">
                <div class="form-group"><label for="firstName">First Name</label><input class="form-control item" type="text" name="firstName" id="firstName" value="<?php echo $firstName?>"></div>
                <div class="form-group"><label for="middleName">Middle Name</label><input class="form-control item" type="text" name="middleName" id="middleName" value="<?php echo $middleName?>"></div>
                <div class="form-group"><label for="lastName">Last Name</label><input class="form-control item" type="text" name="lastName" id="lastName" value="<?php echo $lastName?>"></div>
                <label for="role">Gender</label>
                <div class="form-group">
                <select class="form-control item" name="gender">
                    <option>Choose</option>
                    <?php
                    if($gender=='male'){
                        echo ("<option value=\"male\" selected>Male</option>
                        <option value=\"female\">Female</option>");
                    }
                    else{
                    echo ("<option value=\"male\">Male</option>
                    <option value=\"female\" selected>Female</option>");
                    }
                    ?>
                </select>
                </div>
                <div class="form-group"><label for="birthDate">Date of Birth</label><input class="form-control item" type="date" name="birthDate" id="birthDate" value="<?php echo $dob ?>"></div>                        
            <hr><button class="btn btn-primary btn-block" type="submit">Update</button>
                </form>
            </div>
      </div>
    </div>
  </div>
</div>
<!-- End of Modal-->

<!-- Security Info Modal -->
<div class="modal animate" id="securityModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Security Information</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <div class="container">
                <form name="login-detail" method="POST" action="updateSecurity.php">
                    <div class="form-group">
                    <label for="security1">Security Question #1</label>
                    <select class="form-control item" name="security1">
                        <option>Choose one</option>
                        <option value="What was your first pet name?">What was your first pet name?</option>
                        <option value="What was your first car name?">What was your first car name?</option>
                        <option value="What was your first bike name?">What was your first bike name?</option>
                    </select>
                    </div>
                    <div class="form-group"><label for="answer1">Answer</label><input class="form-control item" type="text" name="answer1" id="answer1"></div>
                    
                    <div class="form-group">
                    <label for="security2">Security Question #2</label>
                    <select class="form-control item" name="security2">
                        <option>Choose one</option>
                        <option value="What was your first pet name?">What was your first pet name?</option>
                        <option value="What was your first car name?">What was your first car name?</option>
                        <option value="What was your first bike name?">What was your first bike name?</option>
                    </select>
                    </div>
                    <div class="form-group"><label for="answer2">Answer</label><input class="form-control item" type="text" name="answer2" id="answer2"></div>
                    
                    <div class="form-group">
                    <label for="security3">Security Question #3</label>
                    <select class="form-control item" name="security3">
                        <option>Choose one</option>
                        <option value="What was your first pet name?">What was your first pet name?</option>
                        <option value="What was your first car name?">What was your first car name?</option>
                        <option value="What was your first bike name?">What was your first bike name?</option>
                    </select>
                    </div>
                    <div class="form-group"><label for="answer3">Answer</label><input class="form-control item" type="text" name="answer3" id="answer3"></div>
                    
                    <hr><button class="btn btn-primary btn-block" type="submit">Update</button>
                </form>
            </div>
      </div>
    </div>
  </div>
</div>
<!-- End of Modal-->

<!--Change Password Modal -->
<div class="modal animate" id="passwordModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Change Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <div class="container">
                <form name="login-detail" method="POST" action="changePassword.php">
                <div class="form-group"><label for="oldPassword">Old Password</label><input class="form-control item" type="password" name="oldPassword" id="oldPassword" required></div>
                    <div class="form-group"><label for="newPassword">New Password</label><input class="form-control item" type="password" name="newPassword" id="newPassword" required></div>
                    <hr><button class="btn btn-primary btn-block" type="submit">Change Password</button>
                </form>
            </div>
      </div>
    </div>
  </div>
</div>
<!-- End of Modal-->

<!-- Contact Information Modal -->
<div class="modal animate" id="contactModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Contact Information</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <div class="container">
                <form name="login-detail" method="POST" action="updateContact.php">
                <div class="form-group"><label for="phoneNumber1">Primary Phone Number</label><input class="form-control item" type="tel" name="phoneNumber1" id="phoneNumber1" value="<?php echo $phone1 ?>"></div>                        
                <div class="form-group"><label for="phoneNumber2">Secondary Phone Number</label><input class="form-control item" type="tel" name="phoneNumber2" id="phoneNumber2" value="<?php echo $phone2 ?>"></div>                        
                <div class="form-group"><label for="email1">Primary Email Address</label><input class="form-control item" type="text" name="email1" id="email1" value="<?php echo $email1?>"></div>
                <div class="form-group"><label for="email2">Secondary Email Address</label><input class="form-control item" type="text" name="email2" id="email2" value="<?php echo $email2?>"></div>
                <div class="form-group"><label for="address">Address</label><input class="form-control item" type="text" name="address" id="address" value="<?php echo $address?>"></div>
                <div class="form-group"><label for="fax">Fax Number</label><input class="form-control item" type="tel" name="fax" id="fax" value="<?php echo $fax?>"></div>                        
                <div class="form-group"><label for="pobox">P.O.Box</label><input class="form-control item" type="text" name="pobox" id="pobox" value="<?php echo $pobox?>"></div>                                   
                <hr><button class="btn btn-primary btn-block" type="submit">Update</button>
                </form>
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
    <script src="js/bootstrap-validate.js"></script>
    <script>
        bootstrapValidate(['#email1','#email2'],'email:Enter a valid email address');
        bootstrapValidate(['#phoneNumber1','#phoneNumber2','#fax'], 'max:10:Enter a maximum of 10|integer:Enter a valid phone number');
        bootstrapValidate(['#firstName','#middleName','#lastName','#address','#security1','#security2','#security3'], 'min:5:Enter at least 5 characters');
    </script> 

</body>
</html>