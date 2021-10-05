<?php
session_start();
if(isset($_SESSION['id']))
{
    $sId = $_SESSION['id'];
}
else{
	header("location:../login.php?status=login");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Official | Profile | Et-Meds</title>
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
        <h2 class="text-center">Add Official</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="official.php">Official</a></li>
                <li class="breadcrumb-item active">Add Official</li>
            </ul>

            <form action="addOfficial.php"" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                    <label for="companyType">Company Type</label><br>
                    <select class="form-control item" name="companyType" required>
                        <option>Choose</option><hr>
                        <option value="EFMHACA">EFMHACA</option>
                        <option value="EPFSA">EPFSA</option>
                    </select>
                </div> 
                <div class="form-group">
                    <label for="role">Role</label><br>
                        <select class="form-control item" name="role" required>
                            <option>Choose</option><hr>
                            <option value="CEO">Chief Executive Officer</option>
                            <option value="CSO">Customer Service Officer</option>
                            <option value="DDO">Drug Disposal Officer</option>
                            <option value="ARO">Activity Review Officer</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="region">Region</label><br>
                        <select class="form-control item" name="region" required>
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
                <div class="form-group">
                    <label for="town">Town</label><br>
                        <select class="form-control item" name="town" required>
                            <option>Choose</option><hr>
                            <option value="Addis Ababa">Addis Ababa</option>
                            <option value="Jimma">Jimma</option>
                            <option value="Adama">Adama</option>
                            <option value="Mekele">Mekele</option>
                            <option value="Bahirdar">Bahirdar</option>
                        </select>
                </div>
                <div class="form-group"><label for="officialLetter">Official Letter</label><br>
                <input type="file" class="form-control-file border text-center" name="officialLetter" required></div>
                <div class="form-group"><label for="officeId">Office ID Card</label><br>
                <input type="file" class="form-control-file border text-center" name="officeId" required></div><hr>
                <center><button type="clear" class="btn btn-secondary">Clear</button>&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary">Submit</button></center>
            </form>

</div>


    <?php
        require("footer.php");
    ?>

<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/theme.js"></script>            

</body>
</html>