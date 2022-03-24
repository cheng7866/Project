<?php
require('connect.php');


$IDgarden	= $_REQUEST['IDgarden'];
$IDPackage	= $_REQUEST['IDPackage'];

$sql = "
	UPDATE packagedetail
	SET 
	Status = 'unconfirm'

	WHERE IDgarden = '" . $IDgarden . "' and IDPackage = '" . $IDPackage . "' ; ";

	$objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");



mysqli_close($conn); // ปิดฐานข้อมูล
header("location: http://localhost/HTML/notificationpage.php");
?>