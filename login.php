<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Et-Meds</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
    <script src="js/main.js"></script>
</head>

<body>


    <?php
        require("header.php");
    ?>
    <?php
    if(isset($_GET['status'])){
        $status = $_GET['status'];
        if($status=="error"){
            echo'
            <div class="container">
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h5 class="text-center">Incorrect Username And/Or Password. Please try again.</h5>
                </div>
                ';
        }
        else if($status=="register"){
            echo'
            <div class="container">
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h5 class="text-center">Please login to continue.</h5>
                </div>
                ';
        }
        else if($status=="login"){
            echo'
            <div class="container">
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h5 class="text-center">You must login first.</h5>
                </div>
                ';
        }
        else if($status=="pending"){
            echo'
            <div class="container">
                <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h5 class="text-center">Your account is not active yet.</h5>
                </div>
                ';
        }

        else if($status=="role"){
            echo'
            <div class="container">
                <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h5 class="text-center">You don\'t have neccessary role to view this page.</h5>
                </div>
                ';
        }
    }
        ?>
    <div class="container">
        <div class="block-heading">
            <h2 class="text-info text-center">Log In</h2>
            <p class="text-center">Please use your login details to login. If you don't have an account <a
                    href="register.php">Register Now.</a></p>
        </div>
        <form name="login-detail" method="POST" action="validateLogin.php">
            <div class="form-group"><label for="email">User Name</label><input class="form-control item" type="text"
                    name="userName" placeholder="Enter your username" required></div>
            <div class="form-group"><label for="password">Password</label><input class="form-control" type="password"
                    name="userPassword" placeholder="Enter your password" required></div>
            <button class="btn btn-primary btn-block" type="submit">Log In</button>
        </form>
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