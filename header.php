<?php
    require_once("db.php");
?>
<br><br><br><br>
    <nav class="navbar navbar-light navbar-expand-md fixed-top clean-navbar myHeader">
            <a class="navbar-brand logo text-white" href="index.php">Et-Meds</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link text-white" href="verify.php">Verify</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-white" href="organization.php">Organizations</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-white" href="report.php">Activity Report</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-white" href="ledger.php">Ledger</a></li>
                    <li class="nav-item" role="presentation"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Login</button></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-white" href="register.php">Register</a></li>
                </ul>
            </div>
    </nav>
<!-- The Modal -->
<div class="modal animate" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Login</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <div class="container">
                <form name="login-detail" method="POST" action="validateLogin.php">
                <p>Provide your login details to login.<p>
                    <div class="form-group"><label for="email">User Name</label><input class="form-control item" type="text" name="userName" placeholder="Enter your username"></div>
                    <div class="form-group"><label for="password">Password</label><input class="form-control" type="password" name="userPassword" placeholder="Enter your password"></div>
                    <button class="btn btn-primary btn-block" type="submit">Log In</button>
                </form>
            </div>

        <span class="psw">Forgot <a href="passwordReset.php">password?</a></span>
      </div>
    </div>
  </div>
</div>
