<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home | Et-Meds</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
    <script src="js/main.js"></script>
</head>
<body>
    

    <?php
        require("header.php");
    ?>
    <br>

    <div class="container">
    <div class="block-heading">
        <h2 class="text-info text-center">Welcome to Et-Meds</h2>
    </div>
    <div class="carousel slide col-8 mx-auto d-block" data-ride="carousel" id="carousel-1">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active"><img class="w-100 d-block" src="images/1.jpg"
                    alt="Slide Image" height="400px"></div>
            <div class="carousel-item"><img class="" src="images/2.png" alt="Slide Image"
                    height="400px"></div>
        </div>
        <div>
        <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span
                    class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a
                class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span
                    class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
        <ol class="carousel-indicators">
            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-1" data-slide-to="1"></li>
            <li data-target="#carousel-1" data-slide-to="2"></li>
        </ol>
        </div>
            <h2 class="text-center"> Features </h2><hr>
        <div class="row justify-content-left">
        <div class="col-sm-6 col-lg-4">
        <div class="card clean-card text-center">
        <div class="card-body info">
        <h2> Secure </h2><hr>
        <h4 class="text-justify">We provide a secure method for encryption and decryption. </h4>
        </div>
        </div>
        </div>

        <div class="col-sm-6 col-lg-4">
        <div class="card clean-card text-center">
        <div class="card-body info">
        <h2> Fast </h2><hr>
        <h4 class="text-justify"> Very fast system based on CDNS.</h4>
        </div>
        </div>
        </div>

        <div class="col-sm-6 col-lg-4">
        <div class="card clean-card text-center">
        <div class="card-body info">
        <h2> Easy </h2><hr>
        <h4 class="text-justify"> Easy to use for new users to register and interact.</h4>
        </div>
        </div>
        </div>

        </div><br><hr>

        <div class="row justify-content-left">
        <div class="col-sm-6 col-lg-4">
        <div class="card clean-card text-center">
        <div class="card-body info">
        <h2> Responsive </h2><hr>
        <h4 class="text-justify">Designed for all web platforms accordingly. </h4>
        </div>
        </div>
        </div>

        <div class="col-sm-6 col-lg-4">
        <div class="card clean-card text-center">
        <div class="card-body info">
        <h2> Elegant </h2><hr>
        <h4 class="text-justify"> Elegant design using Bootstrap framework.</h4>
        </div>
        </div>
        </div>

        <div class="col-sm-6 col-lg-4">
        <div class="card clean-card text-center">
        <div class="card-body info">
        <h2>  </h2><hr>
        <h4 class="text-justify"> </h4>
        </div>
        </div>
        </div>

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