<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php
  require('connect.php');
  session_start();
$userid=$_SESSION['userid'];
  $packagename = $_REQUEST['packagename'];
  $description = $_REQUEST['description'];
  $price = $_REQUEST['price'];
  $numberofgardens = $_REQUEST['numberofgardens'];

  $array_garden = array();
  $array_Percent = array();
  $array_IDround = array();
for ($x = 0; $x < $numberofgardens; $x++) {

    
  array_push($array_garden, $_REQUEST["garden$x"]);
  array_push($array_Percent, $_REQUEST["Percent$x"]);
  array_push($array_IDround, $_REQUEST["IDround$x"]);

}
  
$sql = "
INSERT INTO `package` (`IDPackage`, `Name`, `Price`, `Description`, `userid`) 
VALUES (NULL, '$packagename', '$price', '$description', '$userid')
	";

    if ($conn->query($sql) === TRUE) {

            $sql = "  SELECT * 
            FROM package
            Order By IDPackage DESC LIMIT 1;
            ";
            $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
              while ($objResult = mysqli_fetch_array($objQuery)) {
    
                $IDPackage = $objResult['IDPackage'];
                
    
              }
              for ($x = 0; $x < $numberofgardens; $x++) {

                $sql = "
                INSERT INTO `packagedetail` (`IDPackage`, `IDgarden`, `Amount`, `IDround`, `Status`) 
                VALUES ($IDPackage, '$array_garden[$x]', '$array_Percent[$x]', '$array_IDround[$x]', 'wait')
                    ";
                    $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
              }
              header("location: http://localhost/HTML/home.php");
    } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
           }