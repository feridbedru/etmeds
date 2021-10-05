<?php
$con = mysqli_connect('localhost','root','','EFMHACA');
if(isset($_POST["submit_file"])){
    $file = $_FILES["file"]["tmp_name"];
    $file_open = fopen($file,"r");
    $x=1;
    while(($csv = fgetcsv($file_open, 130000, ",")) !== false){
        $brandName = $csv[0];
        $genericName = $csv[1];
        $strength = $csv[2];
        $dosageForm = $csv[3];
        $licenseHolder = $csv[4];
        $representative = $csv[5];
        $approvalDate = $csv[6];
        $expiryDate = $csv[7];
        $manufacturer = $csv[8];
        $countryOfOrigin = $csv[9];
        $tgroup = $csv[10];
        $subTgroup = $csv[11];
        $status = 'active';
        $sql = "INSERT INTO tbl_mris VALUES(null,'$brandName','$genericName','$strength','$dosageForm','$licenseHolder','$representative','$approvalDate','$expiryDate','$manufacturer','$countryOfOrigin','$tgroup','$subTgroup','$status')";
        $result = mysqli_query($con,$sql);
        if($result){
            $x++;
            echo "Record No.: ".$x.'<br>';
        }
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
}
?>