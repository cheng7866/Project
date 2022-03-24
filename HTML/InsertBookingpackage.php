<?php
  require('connect.php');
  session_start();
  $userid=$_SESSION['userid'];
  $price = $_REQUEST['Price'];
  $IDPackage  = $_REQUEST['IDPackage'];

  $bookingdate = $_REQUEST['bookingdate'];
  $Numberofpeoplebooking = $_REQUEST['Numberofpeoplebooking'];
  
  $sql = "
INSERT INTO `booking` (  `IDPackage`, `userid`, `Status`, `Numberofpeoplebooking`, `bookingdate`, `timestamp`, `price`) 
VALUES (  '$IDPackage','$userid', 'wait', '$Numberofpeoplebooking', ' $bookingdate', CURRENT_TIMESTAMP ,' $price')
	";
    if ($conn->query($sql) === TRUE) {

      $sql = "
      INSERT INTO `payment` ( `paymentdate`,  `userid`,  `IDPackage`) 
      VALUES ( CURRENT_TIMESTAMP, '$userid' ,'$IDPackage')
        ";
        $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
      header("location: http://localhost/HTML/home.php");
    } else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	  }
  ?>