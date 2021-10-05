<?php
session_start();
?>
<?php
$id=$_POST["userId"];
require("db.php");
$sql= "UPDATE tbl_login SET status = 'active' WHERE userId='".$id."' ";
$result = mysqli_query($con,$sql);
if ($result) {
    header("location:pendingUsers.php");
}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
?>