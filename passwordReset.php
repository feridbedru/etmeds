<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Password Reset | Et-Meds</title>
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
        <h2 class="text-center">Password Reset</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Password Reset</li>
            </ul>

            <div class="jumbotron bg-white">
                    <h3 class="text-center">Password Reset</h3>
                    <p class="text-center">Enter email of the user that is associated with the account.</p>
                    <form name="checkAccount" method="POST" action="checkAccount.php" class="form">
                    <label for="email">Email: </label><input class="form-control item mx-auto d-block" type="text" name="email" placeholder="Enter your email address."><br>
                        <button class="btn btn-primary mx-auto d-block">Check</button>
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