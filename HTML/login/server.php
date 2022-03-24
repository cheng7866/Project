<?php 


$servername = 'localhost';//con.php สร้างแยก require('ชื่อไฟล') or include('')
$username = 'root';
$password = '';
$dbname = 'projectfgarden';
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn){die("Conncetion : faile.".mysqli_connect_errno());}


?>