<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register | Et-Meds</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
</head>
<body>
    

    <?php
        require("header.php");
    ?>
    <br>
<div class="container mx-auto">
    <div class="justify-content-center">
        <h2 class="text-center">Register</h2>
        <p class="text-center">Please fill in the form below to get registered.</p>
        <ul id="progressbar">
                    <li class="active text-center">Personal</li>
                    <li class="text-center">Contact</li>
                    <li class="text-center">Account</li>
                    <li class="text-center">Security</li>
                </ul>
        <form action="addUser.php" class="form" method="POST" id="msform" enctype="multipart/form-data">
        <fieldset>
            <div class="form-group"><label for="firstName">First Name</label><input class="form-control item" type="text" name="firstName" id="firstName" placeholder="Enter first name" required></div>
            <div class="form-group"><label for="middleName">Middle Name</label><input class="form-control item" type="text" name="middleName" id="middleName" placeholder="Enter middle name" required></div>
            <div class="form-group"><label for="lastName">Last Name</label><input class="form-control item" type="text" name="lastName" id="lastName" placeholder="Enter last name" required></div>
            <label for="gender">Gender</label>
            <select class="form-group w-100 p-2" name="gender" required>
                <option>Choose</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <div class="form-group"><label for="birthDate">Date of Birth</label><input class="form-control item" type="date" name="birthDate" id="birthDate" max="2001-11-01" value="2001-01-10" required></div>                        
            <div class="form-group">ID Card</label><br>
            <input type="file" class="form-control-file border text-center" name="idCard" required></div> 
                    <input type="button" name="next" class="btn btn-success next action-button" value="Next"/>        
            </fieldset>

            <fieldset>
            <div class="form-group"><label for="phoneNumber1">Primary Phone Number</label><input class="form-control item" type="tel" name="phoneNumber1" id="phoneNumber1" placeholder="Enter primary phone number" required></div>                        
            <div class="form-group"><label for="phoneNumber2">Secondary Phone Number</label><input class="form-control item" type="tel" name="phoneNumber2" id="phoneNumber2" placeholder="Enter secondary phone number" required></div>                        
            <div class="form-group"><label for="email1">Primary Email Address</label><input class="form-control item" type="email" name="email1" id="email1" placeholder="Enter primary email address" required></div>
            <div class="form-group"><label for="email2">Secondary Email Address</label><input class="form-control item" type="email" name="email2" id="email2" placeholder="Enter secondary email address" required></div>
            <div class="form-group"><label for="address">Address</label><input class="form-control item" type="text" name="address" id="address" placeholder="Enter your address" required></div>
            <div class="form-group"><label for="fax">Fax Number</label><input class="form-control item" type="tel" name="fax" id="fax"  placeholder="Enter fax number" required></div>                        
            <div class="form-group"><label for="pobox">P.O.Box</label><input class="form-control item" type="text" name="pobox" id="pobox" placeholder="Enter P.O.Box" required></div>
                    <input type="button" name="previous" class="btn btn-warning previous action-button-previous" value="Previous"/>
                    <input type="button" name="next" class="btn btn-success next action-button" value="Next"/>                                   
            </fieldset>
            
            <fieldset>            
            <div class="form-group>
                <label for="username">Username</label><input class="form-control item" id="username" type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form-group"><label for="password">Password</label><input class="form-control item" type="password" name="password" id="password" placeholder="Enter password" required></div>
            <div class="form-group"><label for="confirmPassword">Confirm Password</label><input class="form-control item" type="password" name="confirmPassword" id="confirmPassword" placeholder="confirm password" required></div>
            <div class="form-group">Profile Picture</label><br>
            <input type="file" class="form-control-file border text-center" name="profileImage" required></div>
            <input type="button" name="previous" class="btn btn-warning previous action-button-previous" value="Previous"/>
            <input type="button" name="next" class="btn btn-success next action-button" value="Next"/>        
            </fieldset>                        
             
            <fieldset>
            <div class="form-group">
            <label for="security1">Security Question #1</label><br>
            <select class="form-group w-100 p-2" name="security1" required>
                <option>Choose one</option>
                <option value="What was your first pet name?">What was your first pet name?</option>
                <option value="What was your first car name?">What was your first car name?</option>
                <option value="What was your first bike name?">What was your first bike name?</option>
            </select>
            <br><label for="answer1">Answer</label><input class="form-control item" type="text" name="answer1" id="answer1" placeholder="Enter answer for your selected security question" required></div>
            
            <div class="form-group">
            <label for="security2">Security Question #2</label>
            <select class="form-group w-100 p-2" name="security2" required>
                <option>Choose one</option>
                <option value="What was your first pet name?">What was your first pet name?</option>
                <option value="What was your first car name?">What was your first car name?</option>
                <option value="What was your first bike name?">What was your first bike name?</option>
            </select>
            <br><label for="answer2">Answer</label><input class="form-control item" type="text" name="answer2" id="answer2" placeholder="Enter answer for your selected security question" required></div>
            
            <div class="form-group">
            <label for="security3">Security Question #3</label>
            <select class="form-group w-100 p-2" name="security3" required>
                <option>Choose one</option>
                <option value="What was your first pet name?">What was your first pet name?</option>
                <option value="What was your first car name?">What was your first car name?</option>
                <option value="What was your first bike name?">What was your first bike name?</option>
            </select>
            <br><label for="answer3">Answer</label><input class="form-control item" type="text" name="answer3" id="answer3" placeholder="Enter answer for your selected security question" required></div>
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
    <script src="js/main.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/theme.js"></script>            
    <script src="js/bootstrap-validate.js"></script>
    <script>
        bootstrapValidate('#username','min:10:minimum should be 10'|'alpha:You can only input alphabetic characters');
        bootstrapValidate(['#email1','#email2'],'email:Enter a valid email address');
        bootstrapValidate(['#phoneNumber1','#phoneNumber2','#fax'], 'max:10:Enter a maximum of 10|integer:Enter a valid phone number');
        bootstrapValidate(['#firstName','#middleName','#lastName','#address','#security1','#security2','#security3'], 'min:5:Enter at least 5 characters');
    </script>          

</body>
</html>