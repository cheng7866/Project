<?php
  require('connect.php');
  session_start();
  $userid=$_SESSION['userid'];
  $IDgarden  = $_REQUEST['IDgarden'];
  $price = $_REQUEST['Price'];

  $bookingdate = $_REQUEST['bookingdate'];
  $IDround =  $_REQUEST['IDround'];
  $Numberofpeoplebooking = $_REQUEST['Numberofpeoplebooking'];
  
  $sql = "
INSERT INTO `booking` ( `IDgarden`,  `userid`, `Status`, `Numberofpeoplebooking`, `IDround`, `bookingdate`, `timestamp`, `price`) 
VALUES ( '$IDgarden', '$userid', 'wait', '$Numberofpeoplebooking', '$IDround', ' $bookingdate', CURRENT_TIMESTAMP ,' $price')
	";
    if ($conn->query($sql) === TRUE) {

      $sql = "
      INSERT INTO `payment` ( `paymentdate`,  `userid`,  `IDgarden`) 
      VALUES ( CURRENT_TIMESTAMP, '$userid' ,'$IDgarden')
        ";
        $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
      header("location: http://localhost/HTML/home.php");
    } else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	  }
  ?>
  