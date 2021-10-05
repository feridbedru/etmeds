<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Company | Admin | Et-Meds</title>
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
        <h2 class="text-center">Company</h2>
        <ul class="breadcrumb cyan ">
            <li class="breadcrumb-item white"><a href="index.php">Home</a> </li>
            <li class="breadcrumb-item active">Company </li>
        </ul>

        
                <?php
                $sql = "SELECT * FROM tbl_companyList WHERE status='pending' ";
                $result2 = mysqli_query($con,$sql);
                if($result2){
                    $count2 = mysqli_num_rows($result2);
                    if($count2>=1){
                        echo '
                        <hr><a href="pendingCompanies.php"><button class="btn btn-large btn-primary">View Pending Companies
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
                <form class="form" action="filterCompany.php" method="POST">
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
                        </select>
                        <button class="btn btn-primary" type="submit">Filter</button></div>
                </form>
            </div>
            <div class="float-right">
                <form class="form" action="searchCompany.php" method="POST">
                    <div class="form-group">
                        <input list="companyName" name="companyName">
                        <datalist id="companyName">
                            <?php
                            $sql = "SELECT companyName FROM tbl_companyList";
                            $result=mysqli_query($con,$sql);
                            while ($row = mysqli_fetch_array($result)) {
                                if($row["companyName"]!==""){
                                    echo ('<option value="'.$row["companyName"].'">');
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
            $sql = "SELECT * FROM tbl_companyList WHERE status='active'";
            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);
            if($count>'0'){
                $sql = "SELECT * FROM tbl_companyList WHERE status='active' ";
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
                        $companyId = $row["companyId"];
                        $companyName = $row["companyName"];
                        $companyType = $row["companyType"];
                        $ownerName = $row["ownerName"];
                        
                        echo('<div class="card-body info">
                            <h4 class="card-title">'.$companyName.'</h4>
                            <h4 class="card-title">'.$companyType.'</h4>
                            <h4 class="card-title">'.$ownerName.'</h4>
                            <form name="viewCompany" method="POST" action="viewCompany.php" class="view">
                            <input type="text" value="'.$companyId.'" hidden name="companyId">
                                <button class="btn btn-primary btn-block">View</button>
                            </form>
                        </div>
                        
                    </div>
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
                <div class="jumbotron bg-white">
                    <h1 class="text-center">No Companies.</h1>
                    <p class="text-center">You do not have any companies at the moment.</p>
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