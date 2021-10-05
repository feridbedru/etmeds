<?php 
session_start();
require_once("db.php");
global $username, $passWord;
$username = $_POST["userName"];
$passWord = $_POST["userPassword"];
$sqlb = "SELECT * FROM tbl_login WHERE userName='$username'";
$qs = mysqli_query($con,$sqlb);
$check = mysqli_num_rows($qs);
$row = mysqli_fetch_array($qs);
$lockStatus = $row["lockStatus"];
if($lockStatus==0){
	$sql = "SELECT * FROM tbl_login WHERE userName='$username' AND password=PASSWORD('$passWord')";
	$qr = mysqli_query($con,$sql);
	$okay = mysqli_num_rows($qr);
	if ($okay>=1) {	
		session_regenerate_id();
		$getRow = mysqli_fetch_array($qr);	
		$getId = $getRow["userId"];
		$userStatus = $getRow["status"];
		if($userStatus=="active"){
		$last= "UPDATE tbl_login SET lastLogin = CURRENT_TIMESTAMP WHERE userId='".$getId."' ";
		$result1 = mysqli_query($con,$last);
		$companyType=$getRow["companyType"];
		if($companyType!=null){
			session_regenerate_id();
			$companyName=$getRow["companyName"];
			$role = $getRow["userRole"];
			$_SESSION['id']=$getId;
			$_SESSION['role']=$role;
			$_SESSION['username']=$username;
			$_SESSION['companyName']=$companyName;
			$_SESSION['companyType']=$companyType;
			$company = str_replace(' ','',$companyName);
			$db = $companyType.$company;
			$_SESSION['db']=$db;
			if($companyName=='admin' && $companyType=='admin'){
				header("location:admin/index.php");
			}
			else{
				header("location:$companyType/$role/index.php");
			}
		}
		else{
			session_regenerate_id();
			$_SESSION['id']=$getId;
			header("location:profile/index.php");
		}
	}
	else{
		header("location:login.php?status=pending");
	}	
} 

	else{
		$count = "SELECT * FROM tbl_login WHERE userName='$username' ";
		$res = mysqli_query($con,$count);
		global $failedLogin;
		if (mysqli_num_rows($res)) {
			$getRow = mysqli_fetch_array($res);
			$failedLogin = $getRow["failedLogin"];
		}
		$failedLogin = $failedLogin+1;
		$failed= "UPDATE tbl_login SET failedLogin = '$failedLogin' WHERE userName='".$username."' ";
		$result = mysqli_query($con,$failed);
		if($result && $failedLogin%3==0){
			$lock= "UPDATE tbl_login SET lockStatus = '1' WHERE userName='".$username."' ";
			$resut = mysqli_query($con,$lock);
			if($resut){
				header("location:accountLocked.php");
			}
			
		}else{
			header("location:login.php?status=error");
		}
	}
}else{
	header("location:accountLocked.php");
}
?>