<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lock User | Admin | Et-Meds</title>
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
        <h2 class="text-center">Lock User</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="users.php">Users</a></li>
                <li class="breadcrumb-item active">Lock User</li>
            </ul>

            <?php
                $userId = $_POST["userId"];
                $sql = "UPDATE tbl_login SET lockStatus='1' WHERE userId='$userId'";
                $query = mysqli_query($con,$sql);
                if($query){
                    echo '
                    <div class="jumbotron">
                        <h1 class="text-center text-success">Success.</h1>
                        <p class="text-center">Account has been locked successfully.</p>
                    </div>
                    ';
                }
                else{
                    echo '
                    <div class="jumbotron">
                        <h1 class="text-center text-danger">Error.</h1>
                        <p class="text-center">Unable to complete action. Please try again.</p>
                    </div>
                    '; 
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