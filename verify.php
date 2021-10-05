<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Verify Medicines | Et-Meds</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
</head>
<body>
    

    <?php
        require("header.php");
    ?>
    <br>

    <div class="container text-center w-75 mx-auto d-block">
    <h2 class="text-center">Verify Medicine</h2>
    <form method="POST" action="verifyMedicine.php">
    <p class="justify-text"> Enter Item Id for the medicine you want to verify and make sure that the information on the label matches along with the one here. If there is a mismatch, then there is a problem with it.</p>
    <div class="form-group clearfix"><label for="itemId">Item Id</label><br>
        <input class="form-control item" type="text" id="itemId" name="itemId" placeholder="XX-XX-XX-XX-XX-XX" required>
    </div>
    <button class="btn btn-primary" type="submit">Verify Medicine</button>
    </form>

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
        bootstrapValidate('#itemId','min:20:Enter 20 characters at least');
    </script>           

</body>
</html>