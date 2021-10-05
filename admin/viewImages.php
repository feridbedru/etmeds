<?php
$officialId = $_GET['id'];
$type = $_GET['type'];
require("db.php");
$sql = "SELECT $type FROM tbl_officials WHERE officialId='$officialId'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$image = $row[$type];
?>
<img class="img img-fluid" src="data:image/jpg;base64,<?php echo base64_encode($image); ?>" />                                                                        
<?php
?>