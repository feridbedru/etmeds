<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Password Changed | Et-Meds</title>
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
        <h2 class="text-center">Password Changed</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Password Reset</li>
            </ul>

            <?php
                $userId = $_POST["userId"];
                $new = $_POST["password"];
                $sql = "UPDATE tbl_login SET password=PASSWORD('$new') WHERE userId='$userId'";
                $query = mysqli_query($con,$sql);
                if($query){
                    echo '
                    <div class="jumbotron bg-white">
                        <h1 class="text-center text-success">Congragulations.</h1>
                        <p class="text-center text-success">You have succesfully changed user password. Now you may login using new password.</p>
                    </div>
                    ';
                }
                else{
                    echo'
                    <div class="jumbotron bg-white">
                        <h1 class="text-center text-danger">Error.</h1>
                        <p class="text-center text-error">An error occured. Please try again latter.</p>
                    </div>';
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