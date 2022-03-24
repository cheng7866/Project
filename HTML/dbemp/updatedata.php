<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php
require('connect.php');

//$update_ID    = $_REQUEST['CustomerID'];
//$CustomerID   = $update_ID;
$Name		  = $_REQUEST['Name'];
$Maxpeople	  = $_REQUEST['Maxpeople'];
$Visitor	  = $_REQUEST['Visitor'];
$Maxpeople	  = $_REQUEST['Maxpeople'];
$Description  = $_REQUEST['Description'];

$sql = "
	UPDATE garden
	SET 
	Name = '" . $Name . "', 
	Maxpeople = '" . $Maxpeople . "', 
	Visitor = '" . $Visitor . "', 
	Maxpeople = '" . $Maxpeople . "', 
	Description = '" . $Description . "', 
	WHERE CustomerID = " . $CustomerID . " ; ";

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	echo "Record " . $update_ID . " was Updated.";
} else {
	echo "Error : Update";
}
mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>