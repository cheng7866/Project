<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php
require('connect.php');

$IDgarden	= $_REQUEST['IDgarden'];
$Name		  = $_REQUEST['Name'];
//$Visitor	  = $_REQUEST['visitor'];
$Maxpeople	  = $_REQUEST['Maxpeople'];
$Description  = $_REQUEST['Description'];

$NumOfRound =  $_REQUEST['NumOfRound'];
$array_stime = array();
$array_etime = array();
$array_price = array();
$array_IDround = array();
$array_fileupload = array();
for ($x = 0; $x < $NumOfRound; $x++) {

  array_push($array_stime, $_REQUEST["stime$x"]);
  array_push($array_etime, $_REQUEST["etime$x"]);
  array_push($array_price, $_REQUEST["price$x"]);
  array_push($array_IDround, $_REQUEST["IDround$x"]);
  
}
$numberofflower = $_REQUEST['NumOfFlower'];
$array_NameThai = array();
$array_NameEng = array();
$array_DescriptionFlower = array();
$array_IDflower = array();
for ($x = 0; $x < $numberofflower; $x++) {

  array_push($array_NameThai, $_REQUEST["NameThai$x"]);
  array_push($array_NameEng, $_REQUEST["NameEng$x"]);
  array_push($array_DescriptionFlower, $_REQUEST["DescriptionFlower$x"]);
  array_push($array_IDflower, $_REQUEST["IDflower$x"]);
}

$sql = "
	UPDATE garden
	SET 
	Name = '" . $Name . "', 
	Maxpeople = '" . $Maxpeople . "', 
	Description = '" . $Description . "'
	WHERE IDgarden = '" . $IDgarden . "' ; ";

	$objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");

for ($x = 0; $x < $NumOfRound; $x++) {

	$sql = "
	UPDATE round SET  
	StartTime = '" . $array_stime[$x] . "', 
	EndTime = '" . $array_etime[$x] . "',  
	Price  = '" . $array_price[$x] . "'
	WHERE IDround = '" . $array_IDround[$x] . "' ; ";


		$objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
}
for ($x = 0; $x < $numberofflower; $x++) {

	$sql = "
	UPDATE flowerinthegarden SET
	NameThai = '" . $array_NameThai[$x] . "', 
	NameEng = '" . $array_NameEng[$x] . "', 
	Description = '" . $array_DescriptionFlower[$x] . "'
	WHERE IDflower = '" . $array_IDflower[$x] . "' ; ";
		$objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
}

if(isset($_POST['submit']))
{
	$extension=array('jpeg','jpg','png','gif');
	foreach ($_FILES['image']['tmp_name'] as $key => $value) {
		$filename=$_FILES['image']['name'][$key];
		$filename_tmp=$_FILES['image']['tmp_name'][$key];
		echo '<br>';
		$ext=pathinfo($filename,PATHINFO_EXTENSION);

		$finalimg='';
		if(in_array($ext,$extension))
		{
			if(!file_exists('fileupload/'.$filename))
			{
			move_uploaded_file($filename_tmp, 'fileupload/'.$filename);
			$finalimg=$filename;
			}else
			{
				 $filename=str_replace('.','-',basename($filename,$ext));
				 $newfilename=$filename.time().".".$ext;
				 move_uploaded_file($filename_tmp, 'fileupload/'.$newfilename);
				 $finalimg=$newfilename;
			}
			$creattime=date('Y-m-d h:i:s');
			//insert
			$sql ="INSERT INTO picture ( `IDgarden`,`fileupload`) 
			VALUES ('$IDgarden','$finalimg')";
			
			 mysqli_query($conn, $sql) or die ("Error Query [" . $sql . "]");
			header("Location: UpdateGarden-2.php?IDgarden=$IDgarden");
		}else
		{
			header("Location: UpdateGarden-2.php?IDgarden=$IDgarden");
		}
	}
}
mysqli_close($conn); // ปิดฐานข้อมูล

?>