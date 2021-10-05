<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pending Officials | Admin | Et-Meds</title>
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
        <h2 class="text-center">Pending Officials</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="official.php">Officials</a></li>
                <li class="breadcrumb-item active">Pending Officials</li>
            </ul>

            <div class="fluid fluid-container w-100">
                        <?php
                            $i=1;
                            $sql="SELECT * FROM tbl_officials WHERE status='pending' ";
                            $result=mysqli_query($con,$sql);
                            $count = mysqli_num_rows($result);
                            if($count=='0'){
                                echo('
                                <div class="jumbotron">
                                    <h1 class="text-center">No Pending Officials.</h1>
                                    <p class="text-center">You do not have any pending officials at the moment.</p>
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
                                <th>Company</th>
                                <th>Role</th>
                                <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                ');
                            while ($row = mysqli_fetch_array($result)) {
                                echo('<tr>');
                                echo('<td>'.$i.'</td>');
                                $officialId = $row["officialId"];
                                $name = $row["name"];
                                $company = $row["company"];
                                $role = $row["role"];
                                $userId = $row["userId"];
                                echo ('<td>'.$name.' </td>');
                                echo ('<td>'.$company.' </td>');
                                echo ('<td>'.$role.' </td>');
                                echo ('
                                <td>
                                <form name="viewOfficial" method="POST" action="viewOfficial.php" target="_blank">
                                <input type="text" value="'.$officialId.'" hidden name="officialId">
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