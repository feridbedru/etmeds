<?php
    require_once("db.php");
    $sql = "SELECT status FROM tbl_login WHERE userId='$sId'";
    $query = mysqli_query($con,$sql);
    if($query){
        $row = mysqli_fetch_array($query);
        $status = $row['status'];
    }
?>
<br><br><br><br>
    <nav class="navbar navbar-light navbar-expand-md fixed-top clean-navbar myHeader">
            <a class="navbar-brand logo text-white" href="index.php">Profile | Et-Meds</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                <?php
                    if($status=="active"){
                        echo ('
                        <li class="nav-item" role="presentation"><a class="nav-link text-white" href="company.php">Company</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link text-white" href="employement.php">Employement</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link text-white" href="official.php">Official</a></li>
                        ');
                    }
                ?>
                    
                    <li class="nav-item" role="presentation"><a class="nav-link text-white" href="logout.php">Logout</a></li>
                </ul>
            </div>
    </nav>