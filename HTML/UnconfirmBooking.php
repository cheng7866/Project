<?php
require('connect.php');

$IDbooking	= $_REQUEST['IDbooking'];



$sql = "
	UPDATE booking
	SET 
	Status = 'unconfirm'

	WHERE IDbooking = '" . $IDbooking . "' ; ";

	$objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");



mysqli_close($conn); // ปิดฐานข้อมูล
header("location: http://localhost/HTML/notificationpage.php");
?>