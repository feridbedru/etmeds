<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo</title>
    <link rel="stylesheet" type="text/css" media="print" href="css/demo.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
</head>
<body>
    <div class="some">dw apache_child_terminate
    <br>
    <br>
    <br>
    <br>
    </div>

    <div class="some">dw apache_child_terminate
    <br>
    <br>
    <br>
    <br>
    <br>
    </div>
    
    <div class="some">dw apache_child_terminate
    <br>
    <br>
    <br>
    <br>
    <br>
    </div>

   <div class="some">dw
   <br>
    <br>
    <br>
    <br>
    <br>
   </div>

    <div class="qrcode container">
    <?php
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;

    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    include "qr/qrlib.php";    

    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
    mkdir($PNG_TEMP_DIR);




    for($i=0; $i<19; $i++){
        // $data = filter_input(INPUT_GET,'data',FILTER_SANITIZE_STRING);
        $data = array(101010101010101010,202020202020202020,3030303030303030,505050505050505050,6060606060606060,101010101010101010,202020202020202020,3030303030303030,505050505050505050,6060606060606060,101010101010101010,202020202020202020,3030303030303030,505050505050505050,6060606060606060,101010101010101010,202020202020202020,3030303030303030,505050505050505050,6060606060606060,101010101010101010,202020202020202020,3030303030303030,505050505050505050,6060606060606060);
        $filename = $PNG_TEMP_DIR.''.$data[$i].'.png';
        $errorCorrectionLevel = 'H';
        $matrixPointSize = 3;

        // user data
        $filename = $PNG_TEMP_DIR.$data[$i].'.png';
        QRcode::png($data[$i], $filename, $errorCorrectionLevel, $matrixPointSize, 4);   


        //display generated file
        echo '
        <img src="'.$PNG_WEB_DIR.basename($filename).'" class="mx-auto d-inline pb-3"/> 
        </&nbsp;&nbsp;&nbsp;';
    }
    ?>
    </div>    
</body>
</html>

