<?php
require_once("db.php");
$fname = $_POST["firstName"];
$mname = $_POST["middleName"];
$lname = $_POST["lastName"];
$sex = $_POST["gender"];
$dob = $_POST["birthDate"];
$idCard=$_POST["idCard"];

$phone1 = $_POST["phoneNumber1"];
$phone2 = $_POST["phoneNumber2"];
$email1 = $_POST["email1"];
$email2 = $_POST["email2"];
$address = $_POST["address"];
$fax=$_POST["fax"];
$pobox=$_POST["pobox"];

$uname = $_POST["username"];
$pwd = $_POST["password"];
$pp = $_POST["profileImage"];

$security1=$_POST["security1"];
$answer1=$_POST["answer1"];
$security2=$_POST["security2"];
$answer2=$_POST["answer2"];
$security3=$_POST["security3"];
$answer3=$_POST["answer3"];

$sql = "INSERT INTO tbl_userInfo VALUES (null,'$fname','$mname','$lname','$dob','$sex','$idCard')";
$userInfo = mysqli_query($con,$sql);
if($userInfo){
    $sql2= "SELECT * FROM tbl_userInfo WHERE firstName='$fname' AND middleName='$mname' AND lastName='$lname'";
    $id = mysqli_query($con,$sql2);
    $row = mysqli_fetch_array($id);
    $getId = $row["userId"];
    if($getId){
        $sql3 = "INSERT INTO tbl_userContact VALUES('$getId','$phone1','$phone2','$email1','$email2','$address','$pobox','$fax')";
        $userContact = mysqli_query($con,$sql3);
        if ($userContact){
            $sql4 = "INSERT INTO tbl_login VALUES('$uname','$email1',PASSWORD('$pwd'),'$getId','pending','','','','','','','')";
            $login = mysqli_query($con,$sql4);
            if($login){
                $sql5 = "INSERT INTO tbl_userAccount VALUES('$security1','$answer1','$security2','$answer2','$security3','$answer3','$getId','$pp')";
                $userAccount = mysqli_query($con,$sql5);
                if($userAccount){
                    header("location:pendingUsers.php");
                }
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
?>