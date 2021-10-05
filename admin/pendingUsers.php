<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pending Users | Admin | Et-Meds</title>
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
        <h2 class="text-center">Pending Users</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="users.php">Users</a></li>
                <li class="breadcrumb-item active">Pending Users</li>
            </ul>

            <div class="w-100">
                        <?php
                            $i=1;
                            $sql="SELECT * FROM tbl_login WHERE status='pending' ";
                            $result=mysqli_query($con,$sql);
                            $count = mysqli_num_rows($result);
                            if($count=='0'){
                                echo('
                                <div class="jumbotron">
                                    <h1 class="text-center">No Pending Users.</h1>
                                    <p class="text-center">You do not have any pending users at the moment.</p>
                                </div>
                                ');
                            }
                            else{
                                echo('
                                <table class="table table-responsive table-hover table-striped">
                                <thead>
                                <tr>
                                <th>No.</th>
                                <th>Full Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                ');
                            while ($row = mysqli_fetch_array($result)) {
                                echo('<tr>');
                                echo('<td>'.$i.'</td>');
                                $getId = $row["userId"];
                                global $name;
                                $sql2 = "SELECT * FROM tbl_userInfo WHERE userId='$getId'";
                                $result2=mysqli_query($con,$sql2);
                                while ($rows = mysqli_fetch_array($result2)) {
                                $fname = $rows["firstName"];
                                $mname = $rows["middleName"];
                                $lname = $rows["lastName"];
                                $name = $fname.' '.$mname.' '.$lname;
                                }
                                echo ('<td>'.$name.' </td>');
                                $getUserName = $row["userName"];
                                echo ('<td>'.$getUserName.' </td>');
                                $getEmail=$row["email"];
                                echo ('<td>'.$getEmail.' </td>');
                                echo ('
                                <td>
                                <form name="viewUser" method="POST" action="viewUser.php" target="_blank">
                                <input type="text" value="'.$getId.'" hidden name="userId">
                                    <button class="btn btn-primary">View</button>
                                </form>
                                </td>');
                                echo ('</tr>');
                                $i++;
                            }
                            echo('
                                </tbody>
                                </table>
                            ');
                        }
                            ?> 
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