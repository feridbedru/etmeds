<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home | Admin | Et-Meds</title>
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
        <h2 class="text-center">Dashboard</h2>
        <ul class="breadcrumb">
            <li class="breadcrumb-item active"><a href="index.php">Home</a></li>
        </ul>

        <?php
        $user = "SELECT * FROM tbl_login WHERE status='active' ";
        $queryu = mysqli_query($con,$user);
        $userCount = mysqli_num_rows($queryu);

        $company = "SELECT * FROM tbl_companyList WHERE status='active' ";
        $queryc = mysqli_query($con,$company);
        $companyCount = mysqli_num_rows($queryc);

        $officials = "SELECT * FROM tbl_officials WHERE status='active' ";
        $queryo = mysqli_query($con,$officials);
        $officialsCount = mysqli_num_rows($queryo);

        $pharmacy = "SELECT * FROM tbl_companyList WHERE companyType='Pharmacy' ";
        $queryp = mysqli_query($con,$pharmacy);
        $pharmacyCount = mysqli_num_rows($queryp);

        $transport = "SELECT * FROM tbl_companyList WHERE companyType='Transport' ";
        $queryt = mysqli_query($con,$transport);
        $transportCount = mysqli_num_rows($queryt);

        $importer = "SELECT * FROM tbl_companyList WHERE companyType='Importer' ";
        $queryi = mysqli_query($con,$importer);
        $importerCount = mysqli_num_rows($queryi);

        $factory = "SELECT * FROM tbl_companyList WHERE companyType='Factory' ";
        $queryf = mysqli_query($con,$factory);
        $factoryCount = mysqli_num_rows($queryf);

        $distributor = "SELECT * FROM tbl_companyList WHERE companyType='Distributor' ";
        $queryd = mysqli_query($con,$distributor);
        $distributorCount = mysqli_num_rows($queryd);

        $warehouse = "SELECT * FROM tbl_companyList WHERE companyType='Warehouse' ";
        $queryw = mysqli_query($con,$warehouse);
        $warehouseCount = mysqli_num_rows($queryw);
        ?>
        <div class="row justify-content-left">
            <div class="col-sm-6 col-lg-4">
                <div class="card clean-card text-center pt-1">
                    <h1 class="display-1"><?php echo $userCount ?></h1><hr>
                    <h3>Users</h3>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card clean-card text-center pt-1">
                    <h1 class="display-1"><?php echo $companyCount ?></h1><hr>
                    <h3>Companies</h3>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card clean-card text-center pt-1">
                    <h1 class="display-1"><?php echo $officialsCount ?></h1><hr>
                    <h3>Officials</h3>
                </div>
            </div>
        </div><br>

        <div class="row justify-content-left">
            <div class="col-sm-6 col-lg-4">
                <div class="card clean-card text-center pt-1">
                    <h1 class="display-1"><?php echo $pharmacyCount ?></h1><hr>
                    <h3>Pharmacies</h3>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card clean-card text-center pt-1">
                    <h1 class="display-1"><?php echo $transportCount ?></h1><hr>
                    <h3>Transporters</h3>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card clean-card text-center pt-1">
                    <h1 class="display-1"><?php echo $importerCount ?></h1><hr>
                    <h3>Importers</h3>
                </div>
            </div>
        </div><br>

        <div class="row justify-content-left">
            <div class="col-sm-6 col-lg-4">
                <div class="card clean-card text-center pt-1">
                    <h1 class="display-1"><?php echo $factoryCount ?></h1><hr>
                    <h3>Factories</h3>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card clean-card text-center pt-1">
                    <h1 class="display-1"><?php echo $distributorCount ?></h1><hr>
                    <h3>Distributors</h3>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card clean-card text-center pt-1">
                    <h1 class="display-1"><?php echo $warehouseCount ?></h1><hr>
                    <h3>Warehouses</h3>
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