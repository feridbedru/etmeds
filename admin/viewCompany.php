<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View Company | Admin | Et-Meds</title>
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
        <h2 class="text-center">View Company</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="company.php">Company</a></li>
                <li class="breadcrumb-item active">View Company</li>
            </ul>

            <div class="bg-white">
            <?php
                $id = $_POST["companyId"];
                $userInfo="SELECT * FROM tbl_companyList WHERE companyId='$id' ";
                $result=mysqli_query($con,$userInfo);
                while ($row = mysqli_fetch_array($result)) {
                    $companyName = $row["companyName"];
                    $companyAddress = $row["companyAddress"];
                    $companyPhone1 = $row["companyPhone1"];
                    $companyPhone2 = $row["companyPhone2"];
                    $companyEmail1 = $row["companyEmail1"];
                    $companyEmail2 = $row["companyEmail2"];
                    $companyFax = $row["companyFax"];
                    $companyPOBox = $row["companyPOBox"];
                    $companyType = $row["companyType"];
                    $ownerName = $row["ownerName"];
                    $ownerId = $row["ownerId"];
                    $status = $row["status"];
                    $registeredDate = $row["registeredDate"];
                    $ownershipType = $row["ownershipType"];
                    $registrationDocument = $row["registrationDocument"];
                    $letter = $row["letter"];
                }
                
            ?>
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-lg-4 col-sm-auto col-md-auto">
                        <div class="card-group">
                            <div class="card ">
                                <div class="profile-header-container">   
                                    <div class="profile-header-img">
                                    <?php
                                        if($companyType=='Pharmacy'){
                                            echo ('<img class="img img-fluid myImage" src="images/pharmacy.svg" />');
                                        }
                                        else if($companyType=='Transport'){
                                            echo ('<img class="img img-fluid myImage" src="images/transport.svg" />');
                                        }
                                        else if($companyType=='Importer'){
                                            echo ('<img class="img img-fluid myImage" src="images/import.svg" />');
                                        }
                                        else if($companyType=='Warehouse'){
                                            echo ('<img class="img img-fluid myImage" src="images/warehouse.svg" />');
                                        }
                                        else if($companyType=='Distributor'){
                                            echo ('<img class="img img-fluid myImage" src="images/distributor.svg" />');
                                        }
                                        else if($companyType=='Factory'){
                                            echo ('<img class="img img-fluid myImage" src="images/factory.svg" />');
                                        }
                                    ?>
                                       
                                        </div>
                                    </div> <hr>
                                <div class="card-body">
                                    <h4 class="text-center card-title"><?php echo $companyName?></h4>
                                    <h4 class="text-center card-title"><?php echo $companyType ?></h4>
                                    <h4 class="text-center card-title"><?php echo $companyAddress?></h4>
                                </div>
                                </div>
                        </div>
            </div>
            <div class="col-lg-8 col-md-4 cold-sm-4">
                <div>
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">Registration Info</a></li>
                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3">Documents</a></li>
                    </ul><br><br>
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="tab-1">
                            <h5>Owner Name </h5>
                            <?php echo $ownerName?><hr>
                            <h5>Ownership Type</h5>
                            <?php echo $ownershipType?><hr>
                            <h5>Registered Date</h5>
                            <?php echo $registeredDate?><hr>
                        <br></div>
                        <div class="tab-pane" role="tabpanel" id="tab-2">
                            <h5>Primary Phone Number</h5>
                            <?php echo $companyPhone1?><hr>
                            <h5>Secondary Phone Number</h5>
                            <?php echo $companyPhone2?><hr>
                            <h5>Primary Email Address</h5>
                            <?php echo $companyEmail1?><hr>
                            <h5>Secondary Email Address</h5>
                            <?php echo $companyEmail2?><hr>
                            <h5>P.O.Box</h5>
                            <?php echo $companyPOBox?><hr>
                            <h5>Fax Number</h5>
                            <?php echo $companyFax?><hr><br>
                            <br></div>
                        <div class="tab-pane" role="tabpanel" id="tab-3">
                            <h5>Bussiness License</h5>
                            <a href="viewBizDocs.php?id=<?php echo $id?>&type=registrationDocument" target="_blank"><button class="btn btn-primary">View Document</button></a>
                            <br><hr>
                            <h5>Registration Letter</h5>
                            <a href="viewBizDocs.php?id=<?php echo $id?>&type=letter" target="_blank"><button class="btn btn-primary">View Document</button></a>
                            
                            <?php
                            if($status=='pending'){
                                echo ('
                                <br><br><hr>
                                <h2 class="text-center">Actions</h2>
                                <div class="float-left">
                                <form name="approveCompany" method="POST" action="approve'.$companyType.'.php">
                                    <input type="text" value="'.$id.'" hidden name="companyId">
                                    <input type="text" value="'.$companyName.'" hidden name="companyName">
                                    <input type="text" value="'.$companyType.'" hidden name="companyType">
                                    <input type="text" value="'.$ownerName.'" hidden name="ownerName">
                                    <input type="text" value="'.$ownerId.'" hidden name="ownerId">
                                    <button class="btn btn-success">Approve</button>
                                </form>
                                </div>
                                <div class="float-right">
                                <form name="rejectCompany" method="POST" action="rejectCompany.php">
                                    <input type="text" value="'.$id.'" hidden name="companyId">
                                        <button class="btn btn-danger">Reject</button>
                                </form>
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
    <?php
        require("footer.php");
    ?>

<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/theme.js"></script>            

</body>
</html>