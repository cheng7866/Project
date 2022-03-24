<?php
require('connect.php');
$IDPackage  = $_REQUEST['IDPackage'];
$sql = "
    DELETE FROM package
    WHERE IDPackage = $IDPackage;
    ";

$objQuery = mysqli_query($conn, $sql);
if ($objQuery) {
  header("location: GardenDetailV2.php");
} else {
  echo  die("Error Query [" . $sql . "]");
}
?>