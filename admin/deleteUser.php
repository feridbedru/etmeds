<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Deletion | Admin | Et-Meds</title>
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

        <?php
        require_once("db.php");
        $id = $_POST["userId"];
        $info = "SELECT * FROM tbl_userInfo WHERE userId='$id'";
        $result = mysqli_query($con, $info);
        if(mysqli_num_rows($result)>=1){
            while($row = mysqli_fetch_array($result)){
                $fname = $row["firstName"];
                $mname = $row["middleName"];
                $lname = $row["lastName"];
                $name = $fname.' '.$mname.' '.$lname;
                $sex = $row["gender"];
                $dob = $row["dateOfBirth"];        
                $inf = "SELECT * FROM tbl_userContact WHERE userId='$id'";
                $results = mysqli_query($con, $inf);
                if(mysqli_num_rows($results)>=1){
                    while($rows = mysqli_fetch_array($results)){       
                        $phone = $rows["phone1"];
                        $email = $rows["email1"];
                        $address = $rows["address"];
                        }  }                  
                        $infor = "SELECT * FROM tbl_login WHERE userId='$id'";
                        $results = mysqli_query($con, $infor);
                        if(mysqli_num_rows($results)>=1){
                            while($rows = mysqli_fetch_array($results)){
                                $username = $rows["userName"];
                            }
                            
                        if($infor){    
                            $sql = "INSERT INTO tbl_userArchive VALUES ('$name','$sex','$dob','$id','$phone','$email','$address','$username')";
                            $user = mysqli_query($con,$sql);
                            if($user){
                                $sql=" DELETE FROM tbl_login WHERE userId='".$id."' ";
                                $result = mysqli_query($con,$sql);
                                if ($result) {   
                                    $sql2=" DELETE FROM tbl_userInfo WHERE userId='".$id."' ";
                                    $result2 = mysqli_query($con,$sql2);
                                    if ($result2) {   
                                        $sql3=" DELETE FROM tbl_userAccount WHERE userId='".$id."' ";
                                        $result3 = mysqli_query($con,$sql3);
                                        if ($result3) {   
                                            $sql4=" DELETE FROM tbl_userContact WHERE userId='".$id."' ";
                                            $result4 = mysqli_query($con,$sql4);
                                            if($result4){
                                                echo '
                                                <div class="jumbotron">
                                                    <h1 class="text-center text-success">Successful.</h1>
                                                    <p class="text-center">User has been deleted.</p>
                                                </div>
                                                ';
                                            }else{
                                                echo "Error: " . $sql4 . "<br>" . mysqli_error($con);
                                            }
                                    }else{
                                        echo "Error: " . $sql3 . "<br>" . mysqli_error($con);
                                    }
                                }
                                else{
                                    echo "Error: " . $sql2 . "<br>" . mysqli_error($con);
                                }
                            }
                            else{
                                echo "Error: " . $sql . "<br>" . mysqli_error($con);
                            }
                        }
                        else{
                            echo "Error: " . $infor . "<br>" . mysqli_error($con);
                        }
                    }

                }
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