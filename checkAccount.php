<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reset Method | Et-Meds</title>
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
                <li class="breadcrumb-item"><a href="passwordReset.php">Password Reset</a></li>
                <li class="breadcrumb-item active">Reset Method</li>
            </ul>

            <?php
                $email = $_POST["email"];
                $sql = "SELECT * FROM tbl_login WHERE email='$email'";
                $result = mysqli_query($con,$sql);
                $count = mysqli_num_rows($result);
                global $id;
                if($count>'0'){
                    while($row=mysqli_fetch_array($result)){
                        $id = $row["userId"];
                    }
                    echo ('
                    <div class="jumbotron bg-white">
                    <h3 class="text-center">Choose Password Reset Method</h3>
                    <p class="text-center">Choose a convinient method to reset your password</p>
                    <form name="resetPwd" method="POST" action="resetPwd.php" class="reset">
                        <input type="text" hidden value="'.$id.'" name="userId">
                        <input type="radio" class="form-group " name="resetMethod" value="email">&nbsp;<strong>Send token to '.$email.'</strong><br>
                        <input type="radio" class="form-group " name="resetMethod" value="securityQuestion">&nbsp;<strong>Answer Security Questions</strong>
                        <br><button type="cancel" class="btn btn-warning" data-toggle="cancel">Cancel</button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary">Next</button>
                    </form>
                </div>
                    ');
                }else{
                   echo('
                    <div class="jumbotron bg-white">
                        <h1 class="text-center">Ooops!</h1>
                        <p class="text-center">We could not find any account that is associated with <b>'.$email.'</b>. Try again. </p>
                    </div>');
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