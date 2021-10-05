<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Users | Admin | Et-Meds</title>
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
        <h2 class="text-center">User Administration</h2>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
        </ul>

        <hr><a href="addUser.php"><button class="btn btn-large btn-success">Add New User</button></a>&nbsp;&nbsp;&nbsp;

        <?php
            $sql = "SELECT * FROM tbl_login WHERE status='pending' ";
            $result2 = mysqli_query($con,$sql);
            if($result2){
                $count2 = mysqli_num_rows($result2);
                if($count2>=1){
                    echo '
                    <a href="pendingUsers.php"><button class="btn btn-large btn-primary">View Pending Users
                    <span class="badge badge-danger">';
                    echo ($count2.' new');
                    echo '
                    </span>
                    </button></a>&nbsp;&nbsp;&nbsp;&nbsp;';
                }
            }
        ?>

        <?php
            $sql = "SELECT * FROM tbl_login WHERE lockStatus='1' ";
            $result2 = mysqli_query($con,$sql);
            if($result2){
                $count2 = mysqli_num_rows($result2);
                if($count2>=1){
                    echo '
                    <a href="lockedUsers.php"><button class="btn btn-large btn-primary">View Locked Users
                    <span class="badge badge-danger">';
                    echo ($count2.' new');
                    echo '
                    </span>
                    </button></a><br>';
                }
            }
        ?>
        <hr>

        <div class="clearfix">
            <div class="float-left">
                <form class="form" action="filterUsers.php" method="POST">
                    <div class="form-group">
                        <label for="companyType">Company Type</label>
                        <select name="companyType">
                            <option>Choose</option>
                            <hr>
                            <option value="Pharmacy">Pharmacy</option>
                            <option value="Transport">Transport</option>
                            <option value="Importer">Importer</option>
                            <option value="Factory">Factory</option>
                            <option value="Distributor">Distributor</option>
                            <option value="Warehouse">Warehouse</option>
                        </select> &nbsp; &nbsp;
                        <label for="role">Role</label>
                        <select name="role">
                            <option>Choose</option>
                            <hr>
                            <option value="owner">Owner</option>
                            <option value="sales">Sales</option>
                            <option value="purchaser">purchaser</option>
                            <option value="admin">admin</option>
                            <option value="importOfficer">Import Officer</option>
                            <option value="driver">driver</option>
                        </select> &nbsp; &nbsp;
                        <button class="btn btn-primary" type="submit">Filter</button></div>
                </form>
            </div>
            <div class="float-right">
                <form class="form" action="searchUsers.php" method="POST">
                    <div class="form-group">
                        <input list="user" name="user">
                        <datalist id="user">
                            <?php
                            $sql = "SELECT firstName, middleName, lastName FROM tbl_userInfo";
                            $result=mysqli_query($con,$sql);
                            while ($row = mysqli_fetch_array($result)) {
                                if($row["firstName"]!==""){
                                    echo ('<option value="'.$row["firstName"].'">');
                                }
                            }
                        ?>
                        </datalist>
                        <button class="btn btn-primary" type="submit">Search</button></div>
                </form>
            </div>
        </div>
        <hr>

        <?php
            $sql = "SELECT * FROM tbl_login WHERE status='active'";
            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);
            if($count>'0'){
                $sql = "SELECT * FROM tbl_userInfo INNER JOIN tbl_login ON tbl_userInfo.userId = tbl_login.userId WHERE status='active' ORDER BY firstName ASC";
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
                        $lockStatus=$row["lockStatus"];
                        $sqs = "SELECT profilePicture FROM tbl_userAccount WHERE userId='$getId'";
                        $query = mysqli_query($con,$sqs);
                        $rows = mysqli_fetch_array($query);
                        $profilePicture=$rows["profilePicture"];
						echo('<img class="card-img-top w-100 d-block img-fluid" src="data:image/jpg;base64,'); echo base64_encode($profilePicture); echo('" style="max-height: 300px;">');
                        echo('<hr>');
                        $name=$row["firstName"].' '.$row["middleName"].' '.$row["lastName"];
                        echo('<div class="card-body info">
                            <h4 class="card-title">'.$name.'</h4>
                            <center>
                            <table>
                            <tbody>
                            <td>
                            <form name="viewUser" method="POST" action="viewUser.php">
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
                            <td>&nbsp;&nbsp;');
                            if($lockStatus=='1'){
                                echo ('
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#unlockUserModal'.$getId.'">Unlock</button>                                
                                ');
                            }
                            else{
                                echo('
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#lockUserModal'.$getId.'">Lock</button>                                                                
                                ');
                            }
                            echo('</td>
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
                            <h3 class="modal-title">Delete User</h3>
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

                    <!-- Lock User Modal -->
                    <div class="modal animate" id="lockUserModal'.$getId.'">
                    <div class="modal-dialog">
                        <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h3 class="modal-title">Lock User</h3>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                        <section class="pt-4 pb-4">
                                <div class="container clearfix">
                                    <p>Are you sure you want to lock this user?</p>
                                    <form name="lockUser" method="POST" action="lockUser.php">
                                    <input class="form-group item" type="text" value="'.$getId.'" hidden name="userId">
                                        <button class="btn btn-danger float-left" type="submit">Lock</button>  
                                        <button type="button" class="btn btn-warning float-right" data-dismiss="modal">Close</button>
                                    </form>
                                    </div>
                            </section>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- End of Modal-->
                    
                    <!-- Unlock User Modal -->
                    <div class="modal animate" id="unlockUserModal'.$getId.'">
                    <div class="modal-dialog">
                        <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h3 class="modal-title">Unlock User</h3>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                        <section class="pt-4 pb-4">
                                <div class="container clearfix">
                                    <p>Are you sure you want to unlock this user?</p>
                                    <form name="unlockUser" method="POST" action="unlockUser.php">
                                    <input class="form-group item" type="text" value="'.$getId.'" hidden name="userId">
                                        <button class="btn btn-success float-left" type="submit">Unlock</button>  
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
                    <h1 class="text-center">No Active Users.</h1>
                    <p class="text-center">You do not have any active users at the moment.</p>
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