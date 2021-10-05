<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add User | Admin | Et-Meds</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>
    

    <?php
        require("header.php");
    ?>
    <div class="container">     
        <h2 class="text-center">Add User</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="users.php">Users</a></li>
                <li class="breadcrumb-item active">Add User</li>
            </ul>
    </div>

    <div class="container mx-auto">
    <div class="justify-content-center">
        <ul id="progressbar">
                    <li class="active text-center">Personal</li>
                    <li class="text-center">Contact</li>
                    <li class="text-center">Account</li>
                    <li class="text-center">Security</li>
                </ul>
        <form action="addUser.php" class="form" method="POST" id="msform">
        <fieldset>
            <div class="form-group"><label for="firstName">First Name</label><input class="form-control item" type="text" name="firstName" id="firstName" placeholder="Enter first name"></div>
            <div class="form-group"><label for="middleName">Middle Name</label><input class="form-control item" type="text" name="middleName" id="middleName" placeholder="Enter middle name"></div>
            <div class="form-group"><label for="lastName">Last Name</label><input class="form-control item" type="text" name="lastName" id="lastName" placeholder="Enter last name"></div>
            <label for="gender">Gender</label>
            <select class="form-group w-100 p-2" name="gender">
                <option>Choose</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <div class="form-group"><label for="birthDate">Date of Birth</label><input class="form-control item" type="date" name="birthDate" id="birthDate"></div>                        
            <div class="form-group">ID Card</label><br>
            <input type="file" name="idCard"></div> 
                    <input type="button" name="next" class="btn btn-success next action-button" value="Next"/>        
            </fieldset>

            <fieldset>
            <div class="form-group"><label for="phoneNumber1">Primary Phone Number</label><input class="form-control item" type="tel" name="phoneNumber1" id="phoneNumber1" placeholder="Enter primary phone number"></div>                        
            <div class="form-group"><label for="phoneNumber2">Secondary Phone Number</label><input class="form-control item" type="tel" name="phoneNumber2" id="phoneNumber2" placeholder="Enter secondary phone number"></div>                        
            <div class="form-group"><label for="email1">Primary Email Address</label><input class="form-control item" type="text" name="email1" id="email1" placeholder="Enter primary email address"></div>
            <div class="form-group"><label for="email2">Secondary Email Address</label><input class="form-control item" type="text" name="email2" id="email2" placeholder="Enter secondary email address"></div>
            <div class="form-group"><label for="address">Address</label><input class="form-control item" type="text" name="address" id="address" placeholder="Enter an address"></div>
            <div class="form-group"><label for="fax">Fax Number</label><input class="form-control item" type="tel" name="fax" id="fax"  placeholder="Enter fax number"></div>                        
            <div class="form-group"><label for="pobox">P.O.Box</label><input class="form-control item" type="text" name="pobox" id="pobox" placeholder="Enter P.O.Box"></div>
                    <input type="button" name="previous" class="btn btn-warning previous action-button-previous" value="Previous"/>
                    <input type="button" name="next" class="btn btn-success next action-button" value="Next"/>                                   
            </fieldset>
            
            <fieldset>            
            <div class="form-group>
                <label for="username">Username</label><input class="form-control item" id="username" type="text" name="username" placeholder="Username">
            </div>
            <div class="form-group"><label for="password">Password</label><input class="form-control item" type="password" name="password" id="password" placeholder="Enter password"></div>
            <div class="form-group"><label for="confirmPassword">Confirm Password</label><input class="form-control item" type="password" name="confirmPassword" id="confirmPassword" placeholder="confirm password"></div>
            <div class="form-group">Profile Picture</label><br>
            <input type="file" name="profileImage" class="form-group p-2"></div>
                    <input type="button" name="previous" class="btn btn-warning previous action-button-previous" value="Previous"/>
            <input type="button" name="next" class="btn btn-success next action-button" value="Next"/>        
            </fieldset>                        
             
            <fieldset>
            <div class="form-group">
            <label for="security1">Security Question #1</label><br>
            <select class="form-group w-100 p-2" name="security1">
                <option>Choose one</option>
                <option value="What was your first pet name?">What was your first pet name?</option>
                <option value="What was your first car name?">What was your first car name?</option>
                <option value="What was your first bike name?">What was your first bike name?</option>
            </select>
            <br><label for="answer1">Answer</label><input class="form-control item" type="text" name="answer1" id="answer1" placeholder="Enter answer for your selected security question"></div>
            
            <div class="form-group">
            <label for="security2">Security Question #2</label>
            <select class="form-group w-100 p-2" name="security2">
                <option>Choose one</option>
                <option value="What was your first pet name?">What was your first pet name?</option>
                <option value="What was your first car name?">What was your first car name?</option>
                <option value="What was your first bike name?">What was your first bike name?</option>
            </select>
            <br><label for="answer2">Answer</label><input class="form-control item" type="text" name="answer2" id="answer2" placeholder="Enter answer for your selected security question"></div>
            
            <div class="form-group">
            <label for="security3">Security Question #3</label>
            <select class="form-group w-100 p-2" name="security3">
                <option>Choose one</option>
                <option value="What was your first pet name?">What was your first pet name?</option>
                <option value="What was your first car name?">What was your first car name?</option>
                <option value="What was your first bike name?">What was your first bike name?</option>
            </select>
            <br><label for="answer3">Answer</label><input class="form-control item" type="text" name="answer3" id="answer3" placeholder="Enter answer for your selected security question"></div>
            <div class="form-actions">
                <center><button type="clear" class="btn btn-warning">Clear</button>&nbsp;
                <button type="submit" class="btn btn-primary">Register</button>&nbsp;
                <button type="button" class="btn btn-danger">Cancel</button></center>
            </div>    
        </fieldset>

            
        </form>
    </div>
</div>

    <?php
        require("footer.php");
    ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/theme.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>          

</body>
</html>