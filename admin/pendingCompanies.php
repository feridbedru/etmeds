<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pending Companies | Admin | Et-Meds</title>
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
        <h2 class="text-center">Pending Companies</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="company.php">Company</a></li>
                <li class="breadcrumb-item active">Pending Companies</li>
            </ul>

            <div class="w-100">
                        <?php
                            $i=1;
                            $sql="SELECT * FROM tbl_companyList WHERE status='pending' ";
                            $result=mysqli_query($con,$sql);
                            $count = mysqli_num_rows($result);
                            if($count=='0'){
                                echo('
                                <div class="jumbotron">
                                    <h1 class="text-center">No Pending Company.</h1>
                                    <p class="text-center">You do not have any pending company at the moment.</p>
                                </div>
                                ');
                            }
                            else{
                                echo('
                                <table class="table table-responsive table-hover table-striped">
                                <thead>
                                <tr>
                                <th>No.</th>
                                <th>Company Name</th>
                                <th>Company Type</th>
                                <th>Owner</th>
                                <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                ');
                            while ($row = mysqli_fetch_array($result)) {
                                echo('<tr>');
                                echo('<td>'.$i.'</td>');
                                $getId = $row["companyId"];
                                $companyName = $row["companyName"];
                                echo ('<td>'.$companyName.' </td>');
                                $companyType = $row["companyType"];
                                echo ('<td>'.$companyType.' </td>');
                                $ownerName=$row["ownerName"];
                                echo ('<td>'.$ownerName.' </td>');
                                $ownerId=$row["ownerId"];                              
                                echo ('
                                <td>
                                <form name="viewCompany" method="POST" action="viewCompany.php" target="_blank">
                                <input type="text" value="'.$getId.'" hidden name="companyId">
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