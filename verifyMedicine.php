<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Verification Result | Et-Meds</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
    <script src="js/main.js"></script>
</head>

<body>


    <?php
        require("header.php");
    ?>
    <br>

    <div class="container">
        <h2 class="text-center">Verification Result</h2>

        <?php
        //Item id to be verified recieved from the post
    $itemId = $_POST['itemId'];
    $item = (explode("-",$itemId));
    $mn = array($item);
    $length = count($item);// get length of the data to make the audit
    if($length==5){
    $sql1 = "SELECT * FROM tbl_transaction WHERE itemId='$itemId'";//make sure that the item exists in the transaction table
    $query1 = mysqli_query($con,$sql1);
    $count1 = mysqli_num_rows($query1);
    $sql2 = "SELECT * FROM tbl_transportTransaction WHERE itemId='$itemId'";//make sure that the item exists in the transport transaction table
    $query2 = mysqli_query($con,$sql2);
    $count2 = mysqli_num_rows($query2);
    if($count1>0){
        $item = (explode("-",$itemId));//Get elements from the node parent id into subsequent items for audit
        $mn = array($item);
        $length = count($item);
        $sellerId = $item[0];
        $applicationNumber = $item[1];
        $requestQuantity = $item[2];
        $buyerId = $item[3];
        $aQuantity = $item[4];
        $sql3 = "SELECT * FROM tbl_companyList WHERE companyId='$sellerId'";//check if the initial importer company exists
        $query3 = mysqli_query($con,$sql3);
        if(mysqli_num_rows($query3)>0){
            while($row1 = mysqli_fetch_array($query3)){//obtain company name and company type of the seller
                $sellerCompanyName = $row1['companyName'];
                $sellerCompanyType = $row1['companyType'];
            }
            if($sellerCompanyType=="Importer"){
            $sql4 = "SELECT * FROM tbl_request WHERE applicationNumber='$applicationNumber' AND quantity='$requestQuantity' AND companyName='$sellerCompanyName' AND companyType='$sellerCompanyType'";//verify that the item exists in the registration process of from the officials
            $query4 = mysqli_query($conz,$sql4);
            if(mysqli_num_rows($query4)>0){
                while($rowe = mysqli_fetch_array($query4)){
                    $MAId = $rowe['MAId'];
                    $manufacturedBy = $rowe['manufacturedBy'];
                    $applicationDate = $rowe['applicationDate'];
                }
                $sql5 = "SELECT * FROM tbl_transaction WHERE itemId='$itemId' AND sCompanyType='$sellerCompanyType' AND sCompanyName='$sellerCompanyName' AND sCompanyId='$sellerId'";//verify the item along with the description on the transaction table
                $query5 = mysqli_query($con,$sql5);
                if(mysqli_num_rows($query5)>0){
                    while($row2= mysqli_fetch_array($query5)){//obtain all the necessary data and contrast again the provided one
                        $medicineName = $row2['medicineName'];
                        $strength = $row2['strength'];
                        $dosageForm = $row2['dosageForm'];
                        $batchNumber = $row2['batchNumber'];
                        $expiryDate = $row2['expiryDate'];
                        $soldDate = $row2['soldDate'];
                        $bCompanyType = $row2['bCompanyType'];
                        $bCompanyName = $row2['bCompanyName'];
                        $transportName = $row2['transportName'];
                    }
                    $sql6 = "SELECT * FROM tbl_transportTransaction WHERE itemId='$itemId' AND transportName='$transportName'";//verify the item along with the description on the transport transaction table
                    $query6 = mysqli_query($con,$sql6);
                    if(mysqli_num_rows($query6)>0){
                        $cc=1;
                        while($ror = mysqli_fetch_array($query6)){
                            $transportDate = $ror['date'];
                            $driverName = $ror['driverName'];
                            $vehicle = $ror['vehicle'];
                            $status[] = $ror['status'];
                            $cc++;
                        }
                        ?>
                        <!-- final output of the product being displayed -->
                                <div class="bg-white">
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <h5 class="text-center">You are buying this product at <?php echo $bCompanyType ?> named
                                            <?php echo $bCompanyName ?></h5>
                                    </div>
                                    <div class="container-fluid ">
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-auto col-md-auto">
                                                <div class="card-group  pt-5 mx-auto d-block">
                                                    <div class="card">
                                                        <hr>
                                                        <div class="card-body">
                                                            <h4 class="card-title">Medicine Name: <?php echo $medicineName?></h4>
                                                            <h4 class="card-title">Strength: <?php echo $strength ?></h4>
                                                            <h4 class="card-title">Dosage Form: <?php echo $dosageForm?></h4>
                                                            <h4 class="card-title">Batch Number: <?php echo $batchNumber?></h4>
                                                            <h4 class="card-title">Expiry Date: <?php echo $expiryDate?></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-4 cold-sm-4">
                                                <div>
                                                    <ul class="nav nav-tabs">
                                                        <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab"
                                                                href="#tab-1">Request Info</a></li>
                                                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab"
                                                                href="#tab-2">Transport</a></li>
                                                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab"
                                                                href="#tab-3">Supply Chain</a></li>
                                                    </ul><br><br>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" role="tabpanel" id="tab-1">
                                                            <h3 class="text-center"> Request Information </h3>
                                                            <h5>Company Name </h5>
                                                            <?php echo $sellerCompanyName?>
                                                            <hr>
                                                            <h5>Company Type</h5>
                                                            <?php echo $sellerCompanyType?>
                                                            <hr>
                                                            <h5>Requested Quantity</h5>
                                                            <?php echo $requestQuantity?>
                                                            <hr>
                                                            <h5>MAId</h5>
                                                            <?php echo $MAId?>
                                                            <hr>
                                                            <h5>Manufactured By</h5>
                                                            <?php echo $manufacturedBy?>
                                                            <hr>
                                                            <h5>Application Date</h5>
                                                            <?php echo $applicationDate?>
                                                            <hr>
                                                            <br>
                                                        </div>
                                                        <div class="tab-pane" role="tabpanel" id="tab-3">
                                                            <h3 class="text-center"> Supply Chain </h3>
                                                            1. <h5>Source Company Name </h5>
                                                            <?php echo $sellerCompanyName?>
                                                            <h5>Obtained Date</h5>
                                                            <?php echo $applicationDate?>
                                                            <hr>
                                                            2. <h5>Purchasing Company</h5>
                                                            <?php echo $bCompanyName?>
                                                            <h5>Obtained Date</h5>
                                                            <?php echo $soldDate?>
                                                            <hr>
                                                            <br>
                                                        </div>
                                                        <div class="tab-pane" role="tabpanel" id="tab-2">
                                                            <h3 class="text-center"> Transport Information </h3>
                                                            <h4>Transport Name</h4>
                                                            <?php echo $transportName?>
                                                            <h5>Transported Date</h5>
                                                            <?php echo $transportDate?>
                                                            <h5>Driver Name</h5>
                                                            <?php echo $driverName?>
                                                            <h5>Vehicle</h5>
                                                            <?php echo $vehicle?>
                                                            <h5>Status</h5>
                                                            <?php echo $status[0]?>
                                                            <hr>
                                                            <h4>Transport Name</h4>
                                                            <?php echo $transportName?>
                                                            <h5>Transported Date</h5>
                                                            <?php echo $transportDate?>
                                                            <h5>Driver Name</h5>
                                                            <?php echo $driverName?>
                                                            <h5>Vehicle</h5>
                                                            <?php echo $vehicle?>
                                                            <h5>Status</h5>
                                                            <?php echo $status[1]?>
                                                            <hr>
                                                            <h4>Transport Name</h4>
                                                            <?php echo $transportName?>
                                                            <h5>Transported Date</h5>
                                                            <?php echo $transportDate?>
                                                            <h5>Driver Name</h5>
                                                            <?php echo $driverName?>
                                                            <h5>Vehicle</h5>
                                                            <?php echo $vehicle?>
                                                            <h5>Status</h5>
                                                            <?php echo $status[2]?>
                                                            <hr>
                                                            <br>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                    }
                    else{
                        echo('
                        <div class="jumbotron bg-white">
                            <h1 class="text-center">Transport Transaction not Found.</h1>
                            <p class="text-center">We were not able to find this item transport transaction on the ledger.</p>
                        </div>
                        ');
                    }
                }
                else{
                    echo('
                    <div class="jumbotron bg-white">
                        <h1 class="text-center">Transaction not Found.</h1>
                        <p class="text-center">We were not able to find this item transaction on the ledger.</p>
                    </div>
                    ');
                }
            }
            else{
                echo('
                <div class="jumbotron bg-white">
                    <h1 class="text-center">Request not Found.</h1>
                    <p class="text-center">We were not able to find request of this item from the importer/producer with the id of '.$itemId.'.</p>
                </div>
                ');
            } 
        }
        else if($sellerCompanyType=="Distributor"){
            echo "seler";
        }
    
    }
    
        else{
            echo('
            <div class="jumbotron bg-white">
                <h1 class="text-center">Source not Found.</h1>
                <p class="text-center">We were not able to find source of this item with the id of '.$itemId.'.</p>
            </div>
            ');
        }
    
    ?>



        <?php
    }
}
    else if($length==8){
        $item = (explode("-",$itemId));
        $mn = array($item);
        $length = count($item);
        $sellerId = $item[0];
        $applicationNumber = $item[1];
        $requestQuantity = $item[2];
        $buyerId = $item[3];
        $aQuantity = $item[4];
        $pharmacyId = $item[5];
        $pharmacyQuantity = $item[6];
        $myItemId = $sellerId.'-'.$applicationNumber.'-'.$requestQuantity.'-'.$buyerId.'-'.$aQuantity.'-'.$pharmacyId.'-'.$pharmacyQuantity;  
        $myOtherItemId = $sellerId.'-'.$applicationNumber.'-'.$requestQuantity.'-'.$buyerId.'-'.$aQuantity;  
        $sql1 = "SELECT * FROM tbl_transaction WHERE itemId='$myItemId'";
        $query1 = mysqli_query($con,$sql1);
        $count1 = mysqli_num_rows($query1);
        $sql2 = "SELECT * FROM tbl_transportTransaction WHERE itemId='$myOtherItemId'";
        $query2 = mysqli_query($con,$sql2);
        $count2 = mysqli_num_rows($query2);
        if($count1>0){     
        $sql3 = "SELECT * FROM tbl_companyList WHERE companyId='$sellerId'";
        $query3 = mysqli_query($con,$sql3);
        if(mysqli_num_rows($query3)>0){
            while($row1 = mysqli_fetch_array($query3)){
                $sellerCompanyName = $row1['companyName'];
                $sellerCompanyType = $row1['companyType'];
            }
            $sql4 = "SELECT * FROM tbl_request WHERE applicationNumber='$applicationNumber' AND quantity='$requestQuantity' AND companyName='$sellerCompanyName' AND companyType='$sellerCompanyType'";
            $query4 = mysqli_query($conz,$sql4);
            if(mysqli_num_rows($query4)>0){
                while($rowe = mysqli_fetch_array($query4)){
                    $MAId = $rowe['MAId'];
                    $manufacturedBy = $rowe['manufacturedBy'];
                    $applicationDate = $rowe['applicationDate'];
                }
                $sql5 = "SELECT * FROM tbl_transaction WHERE itemId='$myItemId'";
                $query5 = mysqli_query($con,$sql5);
                if(mysqli_num_rows($query5)>0){
                    while($row2= mysqli_fetch_array($query5)){
                        $medicineName = $row2['medicineName'];
                        $strength = $row2['strength'];
                        $dosageForm = $row2['dosageForm'];
                        $batchNumber = $row2['batchNumber'];
                        $expiryDate = $row2['expiryDate'];
                        $soldDate = $row2['soldDate'];
                        $bCompanyType = $row2['bCompanyType'];
                        $bCompanyName = $row2['bCompanyName'];
                        $transportName = $row2['transportName'];
                    }
                    $sql6 = "SELECT * FROM tbl_transportTransaction WHERE itemId='$myItemId' AND transportName='$transportName'";
                    $query6 = mysqli_query($con,$sql6);
                    if(mysqli_num_rows($query6)>0){
                        $cc=1;
                        while($ror = mysqli_fetch_array($query6)){
                            $transportDate = $ror['date'];
                            $driverName = $ror['driverName'];
                            $vehicle = $ror['vehicle'];
                            $status = $ror['status'];
                            $cc++;
                        }
                        $sql7 = "SELECT companyName FROM tbl_companyList WHERE companyId='$pharmacyId' AND companyType='Pharmacy'";
                        $query7 = mysqli_query($con,$sql7);
                        if(mysqli_num_rows($query7)>0){
                            $qwa = mysqli_fetch_array($query7);
                            $pharmacyName = $qwa['companyName'];
                        ?>
                                <div class="bg-white">
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <h5 class="text-center">You are buying this product at Pharmacy named
                                            <?php echo $pharmacyName ?></h5>
                                    </div>
                                    <div class="container-fluid ">
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-auto col-md-auto">
                                                <div class="card-group  pt-5 mx-auto d-block">
                                                    <div class="card">
                                                        <hr>
                                                        <div class="card-body">
                                                            <h4 class="card-title">Medicine Name: <?php echo $medicineName?></h4>
                                                            <h4 class="card-title">Strength: <?php echo $strength ?></h4>
                                                            <h4 class="card-title">Dosage Form: <?php echo $dosageForm?></h4>
                                                            <h4 class="card-title">Batch Number: <?php echo $batchNumber?></h4>
                                                            <h4 class="card-title">Expiry Date: <?php echo $expiryDate?></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-4 cold-sm-4">
                                                <div>
                                                    <ul class="nav nav-tabs">
                                                        <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab"
                                                                href="#tab-1">Request Info</a></li>
                                                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab"
                                                                href="#tab-2">Transport</a></li>
                                                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab"
                                                                href="#tab-3">Supply Chain</a></li>
                                                    </ul><br><br>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" role="tabpanel" id="tab-1">
                                                            <h3 class="text-center"> Request Information </h3>
                                                            <h5>Company Name </h5>
                                                            <?php echo $sellerCompanyName?>
                                                            <hr>
                                                            <h5>Company Type</h5>
                                                            <?php echo $sellerCompanyType?>
                                                            <hr>
                                                            <h5>Requested Quantity</h5>
                                                            <?php echo $requestQuantity?>
                                                            <hr>
                                                            <h5>MAId</h5>
                                                            <?php echo $MAId?>
                                                            <hr>
                                                            <h5>Manufactured By</h5>
                                                            <?php echo $manufacturedBy?>
                                                            <hr>
                                                            <h5>Application Date</h5>
                                                            <?php echo $applicationDate?>
                                                            <hr>
                                                            <br>
                                                        </div>
                                                        <div class="tab-pane" role="tabpanel" id="tab-3">
                                                            <h3 class="text-center"> Supply Chain </h3>
                                                            1. <h5>Source Company Name </h5>
                                                            <?php echo $sellerCompanyName?>
                                                            <h5>Obtained Date</h5>
                                                            <?php echo $applicationDate?>
                                                            <hr>
                                                            2. <h5>Purchasing Company</h5>
                                                            <?php echo $bCompanyName?>
                                                            <h5>Obtained Date</h5>
                                                            <?php echo $soldDate?>
                                                            <hr>
                                                            <br>
                                                        </div>
                                                        <div class="tab-pane" role="tabpanel" id="tab-2">
                                                            <h3 class="text-center"> Transport Information </h3><hr>
                                                            <?php
                                                            $sql6 = "SELECT * FROM tbl_transportTransaction WHERE itemId='$myItemId' ";
                                                            $query6 = mysqli_query($con,$sql6);
                                                            while($ror = mysqli_fetch_array($query6)){
                                                                $transportDate = $ror['date'];
                                                                $driverName = $ror['driverName'];
                                                                $vehicle = $ror['vehicle'];
                                                                $status = $ror['status'];
                                                                if($status=="assigned"){
                                                                    echo $transportDate;
                                                                    echo ('<p class="text-left">'.$transportName.' assigned a driver named '.$driverName.' and vehicle '.$vehicle.' for delivery task.</p><hr>');
                                                                }
                                                                elseif($status=="picked up"){
                                                                    echo ('<p class="text-center">'.$transportName.' picked up a delivery item from '.$sCompanyName.'</p>');
                                                                }
                                                                elseif($status=="delivered"){
                                                                    echo ('<p class="text-center">'.$transportName.' delivered an item to '.$bCompanyName.'</p>');
                                                                }
                                                            }
                                                            ?>
                                                            <br>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                        }
                    }
                    else{
                        echo('
                        <div class="jumbotron bg-white">
                            <h1 class="text-center">Transport Transaction not Found.</h1>
                            <p class="text-center">We were not able to find this item transport transaction on the ledger.</p>
                        </div>
                        ');
                    }
                }
                else{
                    echo('
                    <div class="jumbotron bg-white">
                        <h1 class="text-center">Transaction not Found.</h1>
                        <p class="text-center">We were not able to find this item transaction on the ledger.</p>
                    </div>
                    ');
                }
            }
            else{
                echo('
                <div class="jumbotron bg-white">
                    <h1 class="text-center">Request not Found.</h1>
                    <p class="text-center">We were not able to find request of this item from the importer/producer with the id of '.$itemId.'.</p>
                </div>
                ');
            }
    }
}

else{
    echo('
        <div class="jumbotron bg-white">
            <h1 class="text-center">No Items Found.</h1>
            <p class="text-center">We were not able to find any item with the id of '.$itemId.'.</p>
        </div>
        ');
    }
}

    else{
        echo('
        <div class="jumbotron bg-white">
            <h1 class="text-center">No Items Found.</h1>
            <p class="text-center">We were not able to find any item with the id of '.$itemId.'.</p>
        </div>
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