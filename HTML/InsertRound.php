<?php
session_start();
$userid=$_SESSION['userid'];
$NumOfRound = $_SESSION['round'] ;
$IDgarden = $_SESSION['IDgarden'] ;
require('connect.php');
$NumOfRound =  $_REQUEST['NumOfRound'];
$array_stime = array();
$array_etime = array();
$array_price = array();
for ($x = 1; $x <= $NumOfRound; $x++) {

	array_push($array_stime, $_REQUEST["stime$x"]);
	array_push($array_etime, $_REQUEST["etime$x"]);
	array_push($array_price, $_REQUEST["price$x"]);
}
for ($x = 0; $x < $NumOfRound; $x++) {

	$sql = "
	INSERT INTO `round` (`IDround`, `IDgarden`, `StartTime`, `EndTime`, `Price`) 
	VALUES (NULL, '$IDgarden', '$stime', '$etime', '$price')
		";
}
	echo "<br>" . $IDgarden . "<br>" ;
	
	if ($conn->query($sql) === TRUE) {
		//header("location: http://localhost/HTML/GardenDetail.php");
		echo "ya: " ;
	  } else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	  }
	  
	  $conn->close();
	  ?>