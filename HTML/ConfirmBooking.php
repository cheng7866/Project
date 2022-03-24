<?php
require('connect.php');

$IDbooking	= $_REQUEST['IDbooking'];



$sql = "
	UPDATE booking
	SET 
	Status = 'confirm'

	WHERE IDbooking = '" . $IDbooking . "' ; ";

	$objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");



mysqli_close($conn); // ปิดฐานข้อมูล
header("location: http://localhost/HTML/testsendmail.php?IDbooking=$IDbooking");
?>