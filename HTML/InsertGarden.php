<?php
session_start();
$userid=$_SESSION['userid'];



require('connect.php');


$name = $_REQUEST['name'];
$maxpeople = $_REQUEST['maxpeople'];
$description = $_REQUEST['description'];
$NumOfRound =  $_REQUEST['NumOfRound'];
$numberofflower = $_REQUEST['numberofflower'];
$Latitude = $_REQUEST['Latitude'];
$Longitude = $_REQUEST['Longitude'];

$array_stime = array();
$array_etime = array();
$array_price = array();
for ($x = 0; $x < $NumOfRound; $x++) {

  array_push($array_stime, $_REQUEST["stime$x"]);
  array_push($array_etime, $_REQUEST["etime$x"]);
  array_push($array_price, $_REQUEST["price$x"]);
}

$array_NameThai = array();
$array_NameEng = array();
$array_DescriptionFlower = array();
for ($x = 0; $x < $numberofflower; $x++) {

  array_push($array_NameThai, $_REQUEST["NameThai$x"]);
  array_push($array_NameEng, $_REQUEST["NameEng$x"]);
  array_push($array_DescriptionFlower, $_REQUEST["DescriptionFlower$x"]);
}
$sql = "
INSERT INTO `garden` (`IDgarden`, `Name`, `userid`, `Maxpeople`, `Visitor`, `Description`, `Latitude`, `Longitude`) 
VALUES (NULL, '$name', '$userid', '$maxpeople', '0', '$description', '$Latitude', '$Longitude')
	";

//$objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
	
	
	if ($conn->query($sql) === TRUE) {
	//	header("location: http://localhost/HTML/GardenDetail.php");

		$sql = "  SELECT * 
		FROM garden
		Order By IDgarden DESC LIMIT 1;
		";
		$objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
		while ($objResult = mysqli_fetch_array($objQuery)) {

			$IDgarden = $objResult['IDgarden'];
			

		}

		for ($x = 0; $x < $NumOfRound; $x++) {

			$sql = "
			INSERT INTO `round` (`IDround`, `IDgarden`, `StartTime`, `EndTime`, `Price`) 
			VALUES (NULL, '$IDgarden', '$array_stime[$x]', '$array_etime[$x]', '$array_price[$x]')
				";
				$objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
		}
		for ($x = 0; $x < $numberofflower; $x++) {

			$sql = "
			INSERT INTO `flowerinthegarden` (`IDgarden`, `IDflower`, `NameThai`, `NameEng`, `Description`) 
			VALUES ('$IDgarden', NULL, '$array_NameThai[$x]', '$array_NameEng[$x]', '$array_DescriptionFlower[$x]')
				";
				$objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
		}
		
	  } 
	  
	  


	  
//ฟังก์ชั่นวันที่
for ($x = 0; $x < $numberofflower; $x++) {
	$ok='fileupload'.$x;
	$fileupload = (isset($_POST[$ok]) ? $_POST[$ok] : '');
        date_default_timezone_set('Asia/Bangkok');
	$date = date("Ymd");	
//ฟังก์ชั่นสุ่มตัวเลข
         $numrand = (mt_rand());

 
//เพิ่มไฟล์


$upload=$_FILES[$ok];



if($upload != '') {   //not select file
//โฟลเดอร์ที่จะ upload file เข้าไป 
$path="fileupload/";  

//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
 $type = strrchr($_FILES[$ok]['name'],".");

	
//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
$newname = $date.$numrand.$type;
$path_copy=$path.$newname;
$path_link="fileupload/".$newname;

//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
move_uploaded_file($_FILES[$ok]['tmp_name'],$path_copy);  	
	}
	// เพิ่มไฟล์เข้าไปในตาราง uploadfile
	
		$sql = "INSERT INTO picture (`IDgarden`,`fileupload`) 
		VALUES('$IDgarden','$newname')";
		
		$result=mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//mysqli_close($conn);
	// javascript แสดงการ upload file
	
	
}

if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Upload File Succesfuly');";
	header("location: http://localhost/HTML/GardenDetailV2.php");
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to upload again');";
	echo "</script>";
}
?>