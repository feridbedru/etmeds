<?php
$id=$_POST["userId"];
require("db.php");
$sql=" DELETE FROM tbl_login WHERE userId='".$id."' ";
$result = mysqli_query($con,$sql);
if ($result) {   
    $sql2=" DELETE FROM tbl_userInfo WHERE userId='".$id."' ";
    $result2 = mysqli_query($con,$sql2);
    if($result2){
        $sql3=" DELETE FROM tbl_userAccount WHERE userId='".$id."' ";
        $result3 = mysqli_query($con,$sql3); 
        if($result3){
            $sql4=" DELETE FROM tbl_userContact WHERE userId='".$id."' ";
            $result4 = mysqli_query($con,$sql4); 
            if($result4){
                header("location:pendingUsers.php");
            }
            else{
                echo "Error: " . $sql4 . "<br>" . mysqli_error($con);
            }
        } 
        else{
            echo "Error: " . $sql3 . "<br>" . mysqli_error($con);
        }
    }
    else{
        echo "Error: " . $sql2 . "<br>" . mysqli_error($con);
    }
    
}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
?>