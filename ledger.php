<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ledger | Et-Meds</title>
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
    <h2 class="text-center">Stats</h2><hr>
    <?php
    $tcount = "SELECT * FROM tbl_transaction";
    $qre = mysqli_query($con,$tcount);
    $tc = mysqli_num_rows($qre);
    $trcount = "SELECT * FROM tbl_transportTransaction";
    $qree = mysqli_query($con,$trcount);
    $trc = mysqli_num_rows($qree);
    ?>
    <div class="row">
    <div class="col-lg-6">
    <h3 class="text-center">Total Transports Made</h3>
    <h3 class="text-center"><?php echo $tc?></h3>
    </div>
    <div class="col-lg-6">
    <h3 class="text-center">Total Medicines Sold</h3>
    <h3 class="text-center"><?php echo $trc?></h3>
    </div>
</div><hr>
    </div><br><hr>
    
    <div class="row mx-auto" style="width:90%;">
        <div class="col-lg-7">
        <h3 class="text-center">Medicine Transaction</h3>
        <?php
        $sql = "SELECT * FROM tbl_transaction ORDER BY soldDate DESC";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)){
            $bCompanyName = $row['bCompanyName'];
            $sCompanyName = $row['sCompanyName'];
            $medicineName = $row['medicineName'];
            $strength = $row['strength'];
            $dosageForm = $row['dosageForm'];
            $quantity = $row['quantity'];
            $soldDate = $row['soldDate'];
            echo ('
            <div class="mx-auto d-block">
            <hr><h5 class="text-center"><span class="badge badge-pill badge-default text-center border border-primary rounded">'.$soldDate.'</span></h5>
            <p class="text-center">'.$bCompanyName.' bought '.$quantity.' '.$medicineName.' '.$strength.' '.$dosageForm.' from '.$sCompanyName.'.</p><hr>
            </div>
    ');
        }
        ?>
        </div>
        <div class="col-lg-5">
        <h3 class="text-center">Transport Transaction</h3>
        <?php
        $sql2 = "SELECT * FROM tbl_transportTransaction ORDER BY `date` DESC";
        $result2 = mysqli_query($con,$sql2);
        while($row2 = mysqli_fetch_array($result2)){
            $transportName = $row2['transportName'];
            $sCompanyName = $row2['sellerCompany'];
            $bCompanyName = $row2['buyerCompany'];
            $time = $row2['date'];
            $status = $row2['status'];
            echo ('
            <div class="mx-auto d-block">
            <hr><h5 class="text-center"><span class="badge badge-pill badge-default text-center border border-primary rounded">'.$time.'</span></h5>
            ');
            if($status=="assigned"){
                echo ('<p class="text-center">'.$transportName.' assigned a driver and vehicle for delivery task.</p>');
            }
            elseif($status=="picked up"){
                echo ('<p class="text-center">'.$transportName.' picked up a delivery item from '.$sCompanyName.'</p>');
            }
            elseif($status=="delivered"){
                echo ('<p class="text-center">'.$transportName.' delivered an item to '.$bCompanyName.'</p>');
            }
            echo "<hr></div>";
        }
        ?>
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