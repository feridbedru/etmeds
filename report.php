<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Activity Report | Et-Meds</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
</head>
<body>
    

    <?php
        require("header.php");
    ?>
    <br>
    <div class="container">
        <h2 class="text-center"> Activity Report </h2><hr>
        <form action="checkStatus.php" method="POST" >
        <h3>Check Status</h3>
            <p>If you have already submitted an activity and you would like to check the status, please enter the report id below.</p>
            <div class="form-group clearfix"><label for="reportId">Report Id</label>
                <input class="form-control item" type="text" id="reportId" name="reportId" placeholder="XXXXXX XXXXXX" required>
            </div>
            <button class="btn btn-primary" type="submit">Check Status</button>
        </form><hr>
        <button class="btn btn-primary" data-toggle="collapse" data-target="#makeReport">Make Report</button><br>
        <div id="makeReport" class="collapse">
        <form action="reportActivity.php" method="POST" class="form-check" enctype="multipart/form-data"><br>
            <h3>Report Activity</h3>
            <p>Use this form to report a suspicious activity to the officials so that they can review it and take action.</p>
            <div class="form-group"><label for="organizationName">Organization Name</label><input class="form-control item" type="text" name="organizationName" id="organizationName" placeholder="Enter organization name." required></div>
            <div class="form-group">
                    <label for="region">Region</label><br>
                        <select class="w-100 p-2" name="region" required>
                            <option>Choose</option><hr>
                            <option value="Addis Ababa">Addis Ababa</option>
                            <option value="Jimma">Oromia</option>
                            <option value="Amhara">Amhara</option>
                            <option value="Tigray">Tigray</option>
                            <option value="Afar">Afar</option>
                            <option value="Somalia">Somalia</option>
                            <option value="Benishangul Gumz">Benishangul Gumz</option>
                            <option value="Dire Dewa">Dire Dewa</option>
                            <option value="Harar">Harar</option>
                            <option value="SNNP">SNNP</option>
                        </select>
                </div>
            <div class="form-group"><label for="town">Town</label><input class="form-control item" type="text" name="town" placeholder="Enter town name." required id="town"></div>
            <div class="form-group"><label for="problemDescription">Problem Description</label><textarea class="form-control item" name="problemDescription" placeholder="Enter detailed problem description." required id="problemDescription"></textarea></div>
            <div class="form-group"><label for="evidence1">Evidence 1</label><br>
                <input type="file" name="evidence1" class="form-control-file border" required></div>
            <div class="form-group"><label for="evidence2">Evidence 2</label><br>
            <input type="file" name="evidence2" class="form-control-file border" required></div> 
            <div class="form-group"><label for="evidence3">Evidence 3</label><br>
            <input type="file" name="evidence3" class="form-control-file border"required></div>
            <div class="form-group"><label for="reporterName">Full Name</label><input class="form-control item" type="text" name="reporterName" id="reporterName" placeholder="Enter full name."></div>
            <div class="form-group"><label for="reporterPhone">Phone Number</label><input class="form-control item" type="tel" name="reporterPhone" id="reporterPhone" placeholder="Enter phone number."></div>  
            <div class="form-group"><label for="reporterEmail">Email Address</label><input class="form-control item" type="email" name="reporterEmail" id="reporterEmail" placeholder="Enter email address"></div>
            <div class="form-group"><label for="reporterAddress">Address</label><input class="form-control item" type="text" name="reporterAddress" id="reporterAddress" placeholder="Enter your address"></div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>


    <?php
        require("footer.php");
    ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/theme.js"></script>            
    <script src="js/bootstrap-validate.js"></script>
    <script>
        bootstrapValidate('#reportId','min:13:Enter 13 characters at least');
        bootstrapValidate(['#organizationName','#town'],'alpha:You can only input alphabetic characters');
        bootstrapValidate('#reporterEmail','email:Enter a valid email address');
        bootstrapValidate('#reporterPhone', 'max:10:Enter a maximum of 10|integer:Enter a valid phone number');
        bootstrapValidate(['#reporterName','#reporterAddress'], 'min:10:Enter at least 10 characters');
    </script>
</body>
</html>