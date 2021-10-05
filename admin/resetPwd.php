<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reset Password | Admin | Et-Meds</title>
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
                <li class="breadcrumb-item active">Answer Values</li>
            </ul>

            <?php
               $id = $_POST["userId"];
               $method = $_POST["resetMethod"];
               if($method=='email'){
                    echo ('email method');
               } 
               else{
                   $sql = "SELECT * FROM tbl_userAccount WHERE userId='$id'";
                   $result = mysqli_query($con,$sql);
                   $count = mysqli_num_rows($result);
                   if($count>'0'){
                        while($row=mysqli_fetch_array($result)){
                            $security1 = $row["security1"];
                            $security2 = $row["security2"];
                            $security3 = $row["security3"];
                        }
                        echo ('
                        <form name="checkValue" method="POST" action="checkValue.php" class="reset">
                            <div class="form-group">
                            <input class="form-control item" type="text" name="userId" hidden id="userId" value="'.$id.'">
                            <label for="security1">Security Question #1</label>
                            <strong>'.$security1.'</strong>
                            <br><label for="answer1">Answer</label><input class="form-control item" type="text" name="answer1" id="answer1" placeholder="Enter your answer"></div>
                            
                            <div class="form-group">
                            <label for="security2">Security Question #2</label>
                            <strong>'.$security2.'</strong>
                            <br><label for="answer2">Answer</label><input class="form-control item" type="text" name="answer2" id="answer2" placeholder="Enter your answer"></div>
                            
                            <div class="form-group">
                            <label for="security3">Security Question #3</label>
                            <strong>'.$security3.'</strong>
                            <br><label for="answer3">Answer</label><input class="form-control item" type="text" name="answer3" id="answer3" placeholder="Enter your answer"></div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">submit</button>&nbsp;
                                <button type="button" class="btn btn-danger">Cancel</button></center>
                            </div>
                        </form>
                        ');
               }
               else{
                   echo('
                   <div class="jumbotron bg-white">
                        <h1 class="text-center">Ooops!</h1>
                        <p class="text-center">Sorry.There was eroor with your request.Please try again latter. </p>
                    </div>
                   ');
               }
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