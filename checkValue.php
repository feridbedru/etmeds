<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Change Password| Et-Meds</title>
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
        <h2 class="text-center">Change Password</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="passwordReset.php">Password Reset</a></li>
                <li class="breadcrumb-item active">Change Password</li>
            </ul>

            <?php
                $id = $_POST["userId"];
                $answer1 = $_POST["answer1"];
                $answer2 = $_POST["answer2"];
                $answer3 = $_POST["answer3"];
                $user="SELECT * FROM tbl_userAccount WHERE userId='$id'AND answer1='$answer1'";
                $result=mysqli_query($con,$user);
                $count = mysqli_num_rows($result);
                if($count>'0'){
                    $user2="SELECT * FROM tbl_userAccount WHERE userId='$id'AND answer2='$answer2'";
                    $result2=mysqli_query($con,$user2);
                    $count2 = mysqli_num_rows($result2);
                    if($count2>'0'){
                        $user3="SELECT * FROM tbl_userAccount WHERE userId='$id'AND answer3='$answer3'";
                        $result3=mysqli_query($con,$user3);
                        $count3 = mysqli_num_rows($result3);
                        if($count3>'0'){
                            echo ('
                            <div class="jumbotron bg-white">
                                <h3 class="text-center">New Password</h3>
                                <p class="text-center">Type in your new password.</p>
                                <form name="changePassword" method="POST" action="changePassword.php" class="form">
                                <label for="email">Password: </label> <input class="form-control" type="password" name="password" placeholder="Enter your new password."><br>
                                <label for="email">Confirm Password: </label><input class="form-control" type="password" name="checkPassword" placeholder="confirm your new password."><br>
                                <input type="text" name="userId" hidden value="'.$id.'">
                                    <button type="submit" class="btn btn-success mx-auto d-block">Change</button>
                                </form>
                            </div>
                            ');
                        }
                        else{
                            echo('
                            <div class="jumbotron bg-light">
                                <h3 class="text-center">Sorry!</h3>
                                <p class="text-center">You did not answer the security questions properly.</p>
                            </div>
                            ');
                        }
                    }
                    else{
                        echo('
                            <div class="jumbotron bg-light">
                                <h3 class="text-center">Sorry!</h3>
                                <p class="text-center">You did not answer the security questions properly.</p>
                            </div>
                            ');
                    }
                }
                else{
                    echo('
                            <div class="jumbotron bg-light">
                                <h3 class="text-center">Sorry!</h3>
                                <p class="text-center">You did not answer the security questions properly.</p>
                            </div>
                            ');
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