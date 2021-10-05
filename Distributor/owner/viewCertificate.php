<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate of Registration</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
    <link rel="stylesheet" media="print" href="css/certificate.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
</head>
<body>
<div class="p-3 myHeader">
        <h1 class="text-white text-center" id="intro">Et-Meds</h1>
    </div>
<?php
$id = $_GET['id'];
$name = $_GET['name'];
$date = $_GET['date'];
$t = $_GET['type'];

$certificateNumber = $t.'/'.$id;
?>
    <div class="container">
        <h2 class="text-center" id="myTitle">Certificate of Registration</h2>
        <h4 class="text-center" id="myParagraph">This document certifies that, the organization named <?php echo $name?> is a member of Et-Meds which fights counterfiet medicines in Ethiopia</h4>
        <?php
        //set it to writable location, a place for temp generated PNG files
        $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
                                                        
        //html PNG location prefix
        $PNG_WEB_DIR = 'temp/';

        include "qr/qrlib.php";    
        
        //ofcourse we need rights to create temp dir
        if (!file_exists($PNG_TEMP_DIR))
            mkdir($PNG_TEMP_DIR);
        
        
        // $data = filter_input(INPUT_GET,'data',FILTER_SANITIZE_STRING);

        $data = 'https://localhost/etmeds/viewCompany.php?id='.$id;
        $fn = $id;
        $filename = $PNG_TEMP_DIR.''.$fn.'.png';
        $errorCorrectionLevel = 'H';
        $matrixPointSize = 4;
                
            // user data
            $filename = $PNG_TEMP_DIR.$fn.'.png';
            QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 4);   
            
            
        //display generated file
        echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" class="mx-auto d-block"/>'; 
        ?>
        <h5 class="text-center" id="certificateNumber">Certificate Id: <?php echo $certificateNumber ?></h5>
        <h5 class="text-center" id="regDate">Registered Date: <?php echo $date ?></h5>
        
    </div>
    <div class="p-3 myHeader">
        <h3 class="text-white text-center" id="foot">We fight counterfeit medicines!!!</h3>
    </div>
</body>
</html>