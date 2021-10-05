<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Importer Approval | Admin | Et-Meds</title>
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
        <h2 class="text-center">Importer Approval</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="company.php">Company</a></li>
                <li class="breadcrumb-item active">Importer Approval </li>
            </ul>
<?php
    $companyId = $_POST["companyId"];
    $companyName = $_POST["companyName"];
    $companyType = $_POST["companyType"];
    $ownerName = $_POST["ownerName"];
    $ownerId = $_POST["ownerId"];
    $company = str_replace(' ','',$companyName);
    $db = $companyType.$company;
    $active= "UPDATE tbl_companyList SET status = 'active' WHERE companyId='".$companyId."' ";
    $update = mysqli_query($con,$active);
    if($update){
    $login= "UPDATE tbl_login SET companyType = '".$companyType."', companyName='".$companyName."', userRole='owner' WHERE userId='".$ownerId."' ";
    $update2 = mysqli_query($con,$login);
    if($update2){
        $sql = "CREATE DATABASE  IF NOT EXISTS ".$db." DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
            $result=mysqli_query($con,$sql);
            if($result){    
                $sql2 = "
                CREATE TABLE `".$db."`.`tbl_employee` (
                    `employeeId` int(5) NULL AUTO_INCREMENT PRIMARY KEY,
                    `userId` int(10) NOT NULL,
                    `employeeName` varchar(40) NOT NULL,
                    `employeePosition` varchar(40) NOT NULL,
                    `employeeStatus` varchar(15) NOT NULL,
                    `startDate` date NULL,
                    `endDate` date NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
                ";
                $result2=mysqli_query($con,$sql2);
                if($result2){
                    $sql3 = "
                    CREATE TABLE `".$db."`.`tbl_expiredDefected` (
                        `id` int(15) NULL AUTO_INCREMENT PRIMARY KEY,
                        `salesId` int(15) NOT NULL,
                        `medicineName` varchar(100) NOT NULL,
                        `batchNumber` varchar(15) NOT NULL,
                        `strength` varchar(30) NOT NULL,
                        `dosageForm` varchar(45) NOT NULL,
                        `producedDate` date NOT NULL,
                        `expiredDate` date NOT NULL,
                        `MAId` int(15) NOT NULL,
                        `ItemId` varchar(25) NOT NULL,
                        `status` varchar(15) NOT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
                    ";
                    $result3=mysqli_query($con,$sql3);
                    if($result3){
                        $sql4 = "
                        CREATE TABLE `".$db."`.`tbl_pastSales` (
                            `salesId` int(15) NULL AUTO_INCREMENT PRIMARY KEY,
                            `itemId` int(15) NOT NULL,
                            `MAId` int(15) NOT NULL,
                            `medicineName` varchar(100) NOT NULL,
                            `batchNumber` varchar(15) NOT NULL,
                            `strength` varchar(30) NOT NULL,
                            `dosageForm` varchar(45) NOT NULL,
                            `soldDate` date NOT NULL,
                            `buyerCompanyName` varchar(75) NOT NULL,
                            `buyercompanyId` int(15) NOT NULL,
                            `quantity` int(15) NOT NULL
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
                        ";
                        $result4=mysqli_query($con,$sql4);
                        if($result4){
                            $sql5 = "
                            CREATE TABLE `".$db."`.`tbl_stock` (
                                `stockId` int(15) NULL AUTO_INCREMENT PRIMARY KEY,
                                `medicineName` varchar(100) NOT NULL,
                                `batchNumber` varchar(15) NOT NULL,
                                `strength` varchar(30) NOT NULL,
                                `dosageForm` varchar(45) NOT NULL,
                                `productionDate` date NOT NULL,
                                `expiryDate` date NOT NULL,
                                `MAId` int(15) NOT NULL,
                                `quantity` int(15) NOT NULL
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
                            ";
                            $result5=mysqli_query($con,$sql5);
                            if($result5){
                                    echo '
                                    <div class="jumbotron bg-white">
                                        <h1 class="text-center text-success">Congragulations.</h1>
                                        <p class="text-center text-success">You have succesfully approved a company registration.</p>
                                    </div>
                                    ';
                            }else{
                            echo "Error: " . $sql5 . "<br>" . mysqli_error($con);
                        }
                        }else{
                            echo "Error: " . $sql4 . "<br>" . mysqli_error($con);
                        }
                    }else{
                    echo "Error: " . $sql3 . "<br>" . mysqli_error($con);
                }
                }else{
                    echo "Error: " . $sql2 . "<br>" . mysqli_error($con);
                }  
            }


        }
            else{
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        }else{
            echo "Error: " . $update . "<br>" . mysqli_error($con);
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