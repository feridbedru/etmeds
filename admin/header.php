<?php
    require_once("db.php");
?>
<br><br><br><br>
<nav class="navbar navbar-light navbar-expand-md fixed-top clean-navbar myHeader">
    <a class="navbar-brand logo text-white" href="index.php">Super Admin | Et-Meds</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle
            navigation</span><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item" role="presentation"><a class="nav-link text-white" href="users.php">Users</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link text-white" href="company.php">Company</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link text-white" href="official.php">Officials</a>
            </li>
            <li class="nav-item" role="presentation"><a class="nav-link text-white" href="passwordReset.php">Password
                    Reset</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link text-white" href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>