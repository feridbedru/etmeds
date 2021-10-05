<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search Result | Admin | Et-Meds</title>
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
        $firstName = $_POST["user"];
        echo '<h2 class="text-center"> You searched for '.$firstName.' </h2><hr>';

        $sql = "SELECT * FROM tbl_userInfo WHERE firstName='$firstName' OR middleName='$firstName' OR lastName='$firstName' ORDER BY firstName ASC";
            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);
            if($count>'0'){
                $sql = "SELECT * FROM tbl_userInfo WHERE firstName='$firstName' OR middleName='$firstName' OR lastName='$firstName' ORDER BY firstName ASC";
        
                $result2 = mysqli_query($con,$sql);
                $count2 = mysqli_num_rows($result2);
                if($count2!='0'){
                $nl=($count2/3)+0.7;
                $int=intval($nl);
                $k=0;
               while($k<$int){
                   global $getId;
                   echo '  <div class="row justify-content-left">  ';
                   for($i=0;$i<3;$i++){
                    $row = mysqli_fetch_array($result2);
                    if($row!=null){ 
                    echo ('<div class="col-sm-6 col-lg-4"><div class="card clean-card text-center">');
                        $getId=$row["userId"];
                        $gender=$row["gender"];
						if( $gender=='male'){
							echo('<img class="card-img-top w-100 d-block rounded-circle" src="images/male.png">');
						}
						else if($gender=='female'){
							echo('<img class="card-img-top w-100 d-block rounded-circle" src="images/female.png">');
						}
						else{
							echo("Error! Can not Load Image.");
						}
                        echo('<hr>');
                        $name=$row["firstName"].' '.$row["middleName"].' '.$row["lastName"];
                        echo('<div class="card-body info">
                            <h4 class="card-title">'.$name.'</h4>
                            <center>
                            <table>
                            <tbody>
                            <td>
                            <form name="viewUser" method="POST" action="viewUser.php" class="view">
                            <input type="text" value="'.$getId.'" hidden name="userId">
                                <button class="btn btn-primary">View</button>
                            </form>
                            </td>
                            <td>
                            &nbsp;&nbsp;&nbsp;
                            </td>
                            <td>
                            <center><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteUserModal'.$getId.'">Delete</button>
                            </td>
                            </tbody>
                            </table>
                            </center>
                        </div><hr>
                        
                    </div>
                    <!-- Delete User Modal -->
                            <div class="modal animate" id="deleteUserModal'.$getId.'">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h3 class="modal-title">Are you sure you want to delete?</h3>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                <section class="pt-4 pb-4">
                                        <div class="container clearfix">
                                            <p>Are you sure you want to delete this user? Once you do this action you can not undo it. </p>
                                            <form name="deleteUser" method="POST" action="deleteUser.php" class="delete">
                                            <input class="form-group item" type="text" value="'.$getId.'" hidden name="userId">
                                                <button class="btn btn-danger float-left" type="submit">Delete</button>  
                                                <button type="button" class="btn btn-warning float-right" data-dismiss="modal">Close</button>
                                            </form>
                                           </div>
                                    </section>
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- End of Modal--> 
                </div><br>');
                   }
                   }
                   echo '</div><br>';
        $k++;
               }
            }
           echo(' </div>');
        }//closing of the active check if 
            else{
                echo('
                <div class="jumbotron">
                    <h1 class="text-center text-danger">Sorry.</h1>
                    <p class="text-center">We can not find '.$firstName.'.</p>
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