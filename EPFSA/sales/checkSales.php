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
    if($userRole!='sales' && $companyType!='EPFSA'){
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
    <title>Sales Invoice | Sales | Importer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="print" href="css/print.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
    <script src="js/main.js"></script>
</head>
<body>
    

    <?php
        require("header.php");
    ?>
    
    <div class="container">     
        <h2 class="text-center hid">Sales Invoice</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="Sales.php">Sales</a></li>
                <li class="breadcrumb-item active">Sales Invoice</li>
            </ul>

            <?php
            if(isset($_POST['purchaseId'])){
                $purchaseId = $_POST['purchaseId'];
                $set = "UPDATE tbl_purchaseOrder SET `status`='past' WHERE id='$purchaseId'";
                $pop = mysqli_query($con, $set);
            }
            $publicId = $_POST['publicId'];
            $ids = (explode("/",$publicId));
            $mn = array($ids);
            $buyerCompanyType = $ids[0];
            $buyercompanyId = $ids[1];
            $buyerCompanyName = $_POST['companyName'];
            $purchaserName = $_POST['purchaserName'];
            $medicineName = $_POST['medicineName'];
            $quantity = $_POST['quantity'];
            $strength = $_POST['strength'];
            $dosageForm = $_POST['dosageForm'];
            $transportName = $_POST['transportName'];
            $sellerCompanyName = $_SESSION['companyName'];
            $sellerCompanyType = $_SESSION['companyType'];
            $sql = "SELECT * FROM tbl_companyList WHERE companyName='$sellerCompanyName' AND companyType='$sellerCompanyType'";
            $query = mysqli_query($con,$sql);
            if($query){
                $rows = mysqli_fetch_array($query);
                $sellerCompanyId = $rows['companyId'];
                $sellerCompanyAddress = $rows['companyAddress'];
            }
            $userId = $_SESSION['id'];
            $sql2 = "SELECT * FROM tbl_userInfo WHERE userId='$userId'";
            $result = mysqli_query($con,$sql2);
            if($result){
                $row = mysqli_fetch_array($result);
                $fn = $row['firstName'];
                $mn = $row['middleName'];
                $ln = $row['lastName'];
                $soldBy = $fn.' '.$mn.' '.$ln;
            }
            
            $qry1 = "SELECT * FROM tbl_companyList WHERE companyId='$buyercompanyId' AND companyName='$buyerCompanyName'";
            $exec1 = mysqli_query($con,$qry1);
            $count1 = mysqli_num_rows($exec1);
            if($count1>0){
                $qry2 = "SELECT * FROM tbl_stock WHERE medicineName='$medicineName' AND strength='$strength' AND dosageForm='$dosageForm'";
                $exec2 = mysqli_query($conx,$qry2);
                $count2 = mysqli_num_rows($exec2);
                if($count2>0){
                    $rowd = mysqli_fetch_array($exec2);
                    $stockQuantity = $rowd['quantity'];
                    $stockId = $rowd['stockId'];
                    $batchNumber = $rowd['batchNumber'];
                    $expiryDate = $rowd['expiryDate'];
                    $MAId = $rowd['MAId'];
                    $productionDate = $rowd['productionDate'];
                    if($quantity<$stockQuantity){
                        $qry3= "SELECT * FROM tbl_companyList WHERE companyName='$transportName'";
                        $exec3 = mysqli_query($con,$qry3);
                        $count3 = mysqli_num_rows($exec3);
                        if($count3>0){
                            $newStock = $stockQuantity - $quantity;
                            $qry4 = "UPDATE tbl_stock SET quantity='$newStock' WHERE stockId='$stockId'";
                            $exec4 = mysqli_query($conx,$qry4);
                            if($exec4){
                                $qry5 = "SELECT * FROM tbl_request WHERE medicineName='$medicineName' AND batchNumber='$batchNumber' AND MAId='$MAId' AND strength='$strength' AND dosageForm='$dosageForm'";
                                $exec5 = mysqli_query($conz,$qry5);
                                if($exec5){
                                    $rod = mysqli_fetch_array($exec5);
                                    $applicationNumber = $rod['applicationNumber'];
                                    $requestQuantity = $rod['quantity'];
                                    $itemId = $sellerCompanyId.'-'.$applicationNumber.'-'.$requestQuantity.'-'.$buyercompanyId.'-'.$quantity;
                                    $ccompany = str_replace(' ','',$buyerCompanyName);
                                    $buyerDb = $buyerCompanyType.$ccompany;
                                    $qry6 = "INSERT INTO `".$buyerDb."`.`tbl_pendingStock` VALUES(null,'$itemId','$medicineName','$batchNumber','$strength','$dosageForm','$productionDate','$expiryDate','$MAId','$quantity')";
                                    $cony = mysqli_connect('localhost','root','',$buyerDb);
                                    $exec6 = mysqli_query($cony,$qry6);
                                    if($exec6){
                                        $qry7 = "INSERT INTO tbl_pastSales VALUES(null,'$itemId','$MAId','$medicineName','$batchNumber','$strength','$dosageForm',CURRENT_DATE,'$buyerCompanyName','$buyercompanyId','$quantity')";
                                        $exec7 = mysqli_query($conx,$qry7);
                                        if($exec7){
                                            $qry8 = "SELECT * FROM tbl_companyList WHERE companyId='$buyercompanyId'";
                                            $exec8 = mysqli_query($con,$qry8);
                                            if($exec8){
                                                $dor = mysqli_fetch_array($exec8);
                                                $buyerAddress = $dor['companyAddress'];
                                                $buyerPhone1 = $dor['companyPhone1'];
                                                $buyerPhone2 = $dor['companyPhone2'];
                                                $tcompany = str_replace(' ','',$transportName);
                                                $transportDb = 'Transport'.$tcompany;
                                                $cont = mysqli_connect('localhost','root','',$transportDb);
                                                $qry9 = "INSERT INTO `".$transportDb."`.`tbl_delivery` VALUES(null,'$itemId','$sellerCompanyAddress','$buyerAddress',null,null,'$buyerCompanyName','$sellerCompanyName','pending','$buyerPhone1','$buyerPhone2','$purchaserName',null,null,CURRENT_TIMESTAMP)";
                                                $exec9 = mysqli_query($cont,$qry9);
                                                if($exec9){
                                                    $qry10 = "INSERT INTO tbl_transaction VALUES(null,'$itemId','$medicineName','$quantity','$strength','$dosageForm','$batchNumber','$expiryDate','$MAId','$sellerCompanyType','$sellerCompanyName','$sellerCompanyId','$soldBy',CURRENT_TIMESTAMP,'$buyerCompanyType','$buyerCompanyName','$buyercompanyId','$purchaserName','$transportName')";
                                                    $exec10 = mysqli_query($con,$qry10);
                                                    if($exec10){
                                                        echo ('
                                                        <div class="clearfix" id="labelHeader">
                                                            <div class="float-left">
                                                                <h3>Medicine Name: '.$medicineName.'</h3>
                                                                <h3>Strength: '.$strength.'</h3>
                                                                <h3>Dosage Form: '.$dosageForm.'</h3>
                                                            </div>
                                                            <div class="float-right">
                                                            <h3>Batch Number: '.$batchNumber.'</h3>
                                                                <h3>Production Date: '.$productionDate.'</h3>
                                                                <h3>Expiry Date: '.$expiryDate.'</h3>
                                                            </div>
                                                        </div><br>
                                                        ');
                                                        //set it to writable location, a place for temp generated PNG files
                                                        $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
                                                        
                                                        //html PNG location prefix
                                                        $PNG_WEB_DIR = 'temp/';

                                                        include "qr/qrlib.php";    
                                                        
                                                        //ofcourse we need rights to create temp dir
                                                        if (!file_exists($PNG_TEMP_DIR))
                                                            mkdir($PNG_TEMP_DIR);
                                                        
                                                        
                                                        // $data = filter_input(INPUT_GET,'data',FILTER_SANITIZE_STRING);
                                                        $data = $itemId;
                                                        $filename = $PNG_TEMP_DIR.''.$data.'.png';
                                                        $errorCorrectionLevel = 'H';
                                                        $matrixPointSize = 10;
                                                                
                                                            // user data
                                                            $filename = $PNG_TEMP_DIR.$data.'.png';
                                                            QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 4);   
                                                            
                                                            
                                                        //display generated file
                                                        echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" class="mx-auto d-block"/>'; 
                                                        echo '<br>';
                                                        echo ('
                                                        <div class="clearfix">
                                                        <div class="float-left placeholder">
                                                        <h3 class="text-center"> Seller Stamp </h3>
                                                        </div>
                                                        <div class="float-right placeholder">
                                                        <h3 class="text-center"> Buyer Stamp</h3>
                                                        </div>
                                                        </div>
                                                        ');
                                                        echo '<br>';
                                                        echo ('
                                                        <div class="clearfix">
                                                        <div class="float-left">
                                                        <h3 class="text-center"> Seller Signature </h3>
                                                        ___________________________________
                                                        </div>
                                                        <div class="float-right">
                                                        <h3 class="text-center"> Buyer Signature</h3>
                                                        ___________________________________
                                                        </div>
                                                        </div>
                                                        ');
        echo "<script>var pfHeaderImgUrl = '';var pfHeaderTagline = '';var pfdisableClickToDel = 0;var pfHideImages = 0;var pfImageDisplayStyle = 'right';var pfDisablePDF = 0;var pfDisableEmail = 1;var pfDisablePrint = 0;var pfCustomCSS = '';var pfBtVersion='2';(function(){var js,pf;pf=document.createElement('script');pf.type='text/javascript';pf.src='//cdn.printfriendly.com/printfriendly.js';document.getElementsByTagName('head')[0].appendChild(pf)})();</script>";
                                                    }
                                                }
                                                else{
                                                    echo ('
                                                    <div class="jumbotron">
                                                        <h1 class="text-center text-danger">Sorry.</h1>
                                                        <p class="text-center">An error occured while making an order to the delivery company.</p>                    
                                                    </div>
                                                    ');
                                                }
                                            }
                                        }
                                    }
                                    else{
                                        echo ('
                                        <div class="jumbotron">
                                            <h1 class="text-center text-danger">Sorry.</h1>
                                            <p class="text-center">An error occured while inserting to clients\' database.</p>                    
                                        </div>
                                        ');  
                                    }
                                }
                            }
                        }
                        else{
                            echo ('
                            <div class="jumbotron">
                                <h1 class="text-center text-danger">Error</h1>
                                <p class="text-center">There is no transport service provider named '.$transportName.' in the system.</p>                    
                            </div>
                            '); 
                        }
                    }
                    else{
                        echo ('
                        <div class="jumbotron">
                            <h1 class="text-center text-danger">Error</h1>
                            <p class="text-center">There is only '.$stockQuantity.' '.$medicineName.' '.$strength.' '.$dosageForm.' in our store.</p>                    
                        </div>
                        ');
                    }
                }
                else{
                    echo ('
                    <div class="jumbotron">
                        <h1 class="text-center text-danger">Error</h1>
                        <p class="text-center">Can not find '.$medicineName.' '.$strength.' '.$dosageForm.'</p>                    
                    </div>
                    ');
                }
            }
            else{
                echo ('
                <div class="jumbotron">
                    <h1 class="text-center text-danger">Error</h1>
                    <p class="text-center">We were not able to found a '.$buyerCompanyType.' named '.$buyerCompanyName.' on our system.</p>                    
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