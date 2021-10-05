<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Activity Reported | Et-Meds</title>
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
    <?php
    $organizationName = $_POST["organizationName"];
    $problemDescription = $_POST["problemDescription"];
    $ev1 = $_FILES['evidence1']['tmp_name'];
    $evidence1 = addslashes(file_get_contents($ev1));
    $ev2 = $_FILES['evidence2']['tmp_name'];
    $evidence2 = addslashes(file_get_contents($ev2));
    $ev3 = $_FILES['evidence3']['tmp_name'];
    $evidence3 = addslashes(file_get_contents($ev3));
    $reporterName = $_POST["reporterName"];
    $reporterPhone = $_POST["reporterPhone"];
    $reporterEmail = $_POST["reporterEmail"];
    $reporterAddress = $_POST['reporterAddress'];
    $region = $_POST["region"];
    $town = $_POST["town"];
    $publicReportId = date("d").date("m").date("y").' '.date("h").date("i").date("s");
    

    $insert = "INSERT INTO tbl_activityReport VALUES(null,'$publicReportId',CURRENT_TIMESTAMP,'$organizationName','$reporterName','$problemDescription','$reporterPhone','$reporterEmail','$reporterAddress','$region','$town','$evidence1','$evidence2','$evidence3',null,null,null,'pending')";
    $report = mysqli_query($conz,$insert);
    if($report){
        // the message
        $msg = "First line of text\nSecond line of text";

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

        // send email
        $email = mail("ferid.bedru@gmail.com","My subject",$msg);
        if($email){
            echo "email sent";
        }
        echo '
        <div class="jumbotron">
            <h2 class="text-center text-success">Your Report has been submitted.</h2>
            <p class="text-center text-success">Please write down the number below to follow up your report.</p>
            <h1 class="text-center">Report Id: <u>'.$publicReportId.'</u></h1>
        </div>
        ';
    }
    else{
        echo "Error: " . $insert . "<br>" . mysqli_error($conz);
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