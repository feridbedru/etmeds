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
    <title>Add Company | Profile | Et-Meds</title>
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
        <h2 class="text-center">Add New Company</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="company.php">Company</a></li>
                <li class="breadcrumb-item active">Add New Company </li>
            </ul>

            <ul id="progressbar">
                <li class="active text-center">Type</li>
                <li class="text-center">Basics</li>
                <li class="text-center">Documents</li>
            </ul>
            <form  action="addNewCompany.php" method="POST" enctype="multipart/form-data" id="msform">
            <fieldset>
            <h3 class="text-center">Choose Your Organization Type</h3>
                    <div class="row justify-content-left">
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center">
                                <img src="images/pharmacy.svg" class="mx-auto d-block img-fluid myImage" ><hr>
                                <input type="radio" name="companyType" value="Pharmacy"><h4>Pharmacy</h4><hr>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center">
                                <img src="images/import.svg" class="mx-auto d-block img-fluid myImage" ><hr>
                                <input type="radio" name="companyType" value="Importer"><h4>Importer</h4><hr>
                        </div>
                    </div>


                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center">
                                <img src="images/transport.svg" class="mx-auto d-block img-fluid myImage" ><hr>
                                <input type="radio" name="companyType" value="Transport"><h4>Transport</h4><hr>
                        </div>
                    </div>
                </div><br><hr>

                <div class="row justify-content-left">
                <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center">
                                <img src="images/pharmacy.svg" class="mx-auto d-block img-fluid myImage" ><hr>
                                <input type="radio" name="companyType" value="Factory"><h4>Factory</h4><hr>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center">
                                <img src="images/warehouse.svg" class="mx-auto d-block img-fluid myImage" ><hr>
                                <input type="radio" name="companyType" value="Warehouse"><h4>Warehouse</h4><hr>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center">
                                <img src="images/pharmacy.svg" class="mx-auto d-block img-fluid myImage" ><hr>
                                <input type="radio" name="companyType" value="Distributor"><h4>Distributor</h4><hr>
                        </div>
                    </div>
                </div><br><hr>
                <div class="form-group"><label for="companyName">Company Name</label><input class="form-control item" type="text" name="companyName" id="companyName" placeholder="Enter Full company name here." required></div>
                <div class="form-group"><label for="companyAddress">Company Address</label><input class="form-control item" type="text" name="companyAddress" id="companyAddress" placeholder="Enter Full company address here." required></div>
                <input type="button" name="previous" class="btn btn-warning previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="btn btn-success next action-button" value="Next"/>    
            </fieldset>
            
                <fieldset>
                    <div class="form-group"><label for="phoneNumber1">Primary Phone Number</label><input class="form-control item" type="tel" name="phoneNumber1" id="phoneNumber1" placeholder="Enter primary phone number here." required></div>                        
                    <div class="form-group"><label for="phoneNumber2">Secondary Phone Number</label><input class="form-control item" type="tel" name="phoneNumber2" id="phoneNumber2" placeholder="Enter secondary phone number here." required></div>                        
                    <div class="form-group"><label for="email1">Primary Email Address</label><input class="form-control item" type="email" name="email1" id="email1" placeholder="Enter primary email address here." required></div>
                    <div class="form-group"><label for="email2">Secondary Email Address</label><input class="form-control item" type="email" name="email2" id="email2" placeholder="Enter secondary email address here." required></div>
                    <div class="form-group"><label for="fax">Fax Number</label><input class="form-control item" type="tel" name="fax" id="fax" placeholder="Enter fax number here." required></div>                        
                    <div class="form-group"><label for="pobox">P.O.Box</label><input class="form-control item" type="text" name="pobox" id="pobox" placeholder="Enter POBox address here." required></div>                                   
                    <input type="button" name="previous" class="btn btn-warning previous action-button-previous" value="Previous"/>
                    <input type="button" name="next" class="btn btn-success next action-button" value="Next"/> 
                </fieldset>

                <fieldset>
                <div class="form-group">Bussiness License & Registration Document</label><br><input type="file" class="form-control-file border text-center" name="registration" required></div>         
                <div class="form-group">Letter of Indemity</label><br><input type="file" class="form-control-file border text-center" name="letter" required></div> 
                <div class="form-group">
                    <label for="ownershipType">Ownership Type</label><br>
                    <select name="ownershipType" class="form-control" required>
                        <option>Choose</option><hr>
                        <option value="Share Company">Share Company</option>
                        <option value="Incorporate">Incorporate</option>
                        <option value="Government Based">Government Based</option>
                        <option value="Private Limited Company">Private Limited Company</option>
                    </select>
                </div> 

                <div class="form-actions clearfix">
                   <center> <button type="submit" class="btn btn-primary">Register</button> &nbsp; &nbsp;&nbsp;
                    <button type="button" class="btn btn-danger">Cancel</button></center>
                </div>
            </fieldset>       
            </form> 

            </div>


    <?php
        require("footer.php");
    ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/theme.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap-validate.js"></script>
    <script>
        bootstrapValidate(['#companyName','#companyAddress'],'min:6: you should enter a minimum of 6 characters');
        bootstrapValidate(['#email1','#email2'],'email:Enter a valid email address');
        bootstrapValidate(['#phoneNumber1','#phoneNumber2','#fax'], 'max:10:Enter a maximum of 10|integer:Enter a valid phone number');
        
    </script>          

</body>
</html>