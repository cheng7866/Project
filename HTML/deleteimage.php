<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php


$picture_ID  = $_REQUEST['PictureID'];
$IDgarden  = $_REQUEST['IDgarden'];
require('connect.php');



$sql = '
    DELETE FROM picture
    WHERE PictureID = ' . $picture_ID . ';
    ';

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
    echo "Record " . $picture_ID . " was Deleted.";
    header("Location: UpdateGarden-2.php?IDgarden=$IDgarden");
} else {
    $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
}




mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>
